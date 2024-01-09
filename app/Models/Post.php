<?php

namespace App\Models;

use App\Enums\BlogEnums;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $primaryKey = 'post_id';

    protected $fillable = [
        'author_name',
        'publish_date',
        'title',
        'introduction_content',
        'image_path',
        'comments',
        'post_status',
        'author_id',
        'tag',
        'featured'
    ];

    protected $dates = ['publish_date'];

    /**
     * Scope a query to find a post by post_id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $postId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function findByPostId($postId)
    {
        return static::where('post_id', $postId)->first();
    }
    
    /**
     * Scope a query to only include posts by a specific author.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  int  $authorId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByAuthor($query, $authorId)
    {
        return $query->where('author_id', $authorId);
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function ($post) {
            if ($post->isDirty('post_status') && $post->post_status === BlogEnums::ACCEPTED) {
                $post->publish_date = now();
            }
        });

        static::deleting(function ($post) {
            // When a post is deleted, also delete its associated subheadings
            $post->subheadings()->delete();

            // Delete the post image file
            Storage::disk('do')->delete($post->image_path);
        });

        static::manageFeaturedPosts();
    }

    public static function manageFeaturedPosts()
    {
        $maxFeaturedPosts = 5;

        // Get the oldest featured post
        $oldestFeaturedPost = self::where('featured', BlogEnums::FEATURED)
            ->orderBy('created_at')
            ->first();

        if ($oldestFeaturedPost) {
            // Check if the count exceeds the limit
            $count = self::where('featured', BlogEnums::FEATURED)->count();

            if ($count > $maxFeaturedPosts) {
                // Unfeature the oldest post
                $oldestFeaturedPost->update(['featured' => BlogEnums::NOT_FEATURED]);
            }
        }
    }

    public function subheadings()
    {
        return $this->hasMany(Subheading::class, 'post_id', 'post_id');
    }

    public static function search($query)
    {
        return self::where('tag', 'like', '%' . $query . '%')
            ->orWhere('title', 'like', '%' . $query . '%')
            ->get();
    }

    public static function relatedPosts($tag, $limit = 5)
    {
        return self::where('tag', $tag)
            ->latest() // Order by the latest posts
            ->limit($limit)
            ->get();
    }
}
