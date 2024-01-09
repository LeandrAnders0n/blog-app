<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subheading extends Model
{
    use HasFactory;

    protected $fillable = [
        'subheading_id',
        'post_id',
        'subheading_title',
        'subheading_content',
        'image_path',
    ];

    protected $primaryKey = ['subheading_id', 'post_id'];

    // Assuming that subheading_id and post_id are integers
    protected $keyType = 'integer';

    // Disable auto-incrementing for composite key
    public $incrementing = false;

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'post_id');
    }
    
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($subheading) {
            // Delete the subheading image file
            Storage::disk('do')->delete($subheading->image_path);
        });
    }
}
