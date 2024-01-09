<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Enums\BlogEnums;
use App\Models\Subheading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $user = auth()->user();
    
        if ($user->role === BlogEnums::WRITER) {
            // If the user is a writer, retrieve posts authored by them
            $posts = Post::byAuthor($user->id)->get();
        } elseif ($user->role === BlogEnums::ADMIN) {
            // If the user is an admin, retrieve all posts
            $posts = Post::all();
        } else {
            // Handle other roles as needed
            return response()->json(['message' => 'Unauthorized role'], 403);
        }
        return view('admin-panel.admin-index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        // Get the authenticated user
        $user = auth()->user();
    
        // Check if the user is a writer and the post was written by them
        if ($user->role === BlogEnums::WRITER && $user->id !== $post->author_id) {
            return response()->json(['message' => 'Unauthorized'], 403); // Forbidden
        }
    
        // If the user is an admin or the post was written by them, show the post
        $post->load('subheadings');
    // Return the view with the post data
    return view('admin-panel.admin-view-post', ['post' => $post]);
    }

    public function newPost()
    {
        return view('admin-panel.admin-view-post');
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'author_name' => 'required|string',
        //     'title' => 'required|string|max:255',
        //     'introduction_content' => 'nullable|string',
        //     'tag' => 'required|string',
        //     'image' => 'required|file|mimes:jpeg,png',
        //     'subheadings' => 'required|array',
          
        // ]);
    
        try {
            // Upload main post image to DigitalOcean Spaces
            $postImage = $request->file('image');
            $postImagePath = Storage::disk('do')->putFile('post-files', $postImage, 'public');
            // Check if the post image was uploaded successfully
            if (!$postImagePath) {
                throw new \Exception('Failed to upload post image.');
            }
    
            // Use CDN endpoint for serving post image
            $postImageUrl = env('DO_CDN_ENDPOINT') . '/' . $postImagePath;
    
            // Assuming authenticated user is the author
            $authorId = auth()->user()->id;
    
            // Create the post
            $post = Post::create([
                'author_name' => $request->input('author_name'),
                'title' => $request->input('title'),
                'introduction_content' => $request->input('introduction_content'),
                'author_id' => $authorId,
                'image_path' => $postImageUrl,
                'tag' => $request->input('tag'),
            ]);
    
            // foreach ($request->input('subheadings') as $index => $subheadingData) {
            //     // Upload subheading image to DigitalOcean Spaces
            //     $subheadingImage = $subheadingData['subheading_image'];
            //     $subheadingImagePath = Storage::disk('do')->putFile('subheading-files', $subheadingImage, 'public');
    
            //     // Check if the subheading image was uploaded successfully
            //     if (!$subheadingImagePath) {
            //         throw new \Exception('Failed to upload subheading image.');
            //     }
    
            //     // Use CDN endpoint for serving subheading image
            //     $subheadingImageUrl = env('DO_CDN_ENDPOINT') . '/' . $subheadingImagePath;
    
            //     $postId = $post->post_id;
            //     $subheading = Subheading::create([
            //         'post_id' => $postId,
            //         'subheading_id' => $index + 1,
            //         'subheading_title' => $subheadingData['subheading_title'],
            //         'subheading_content' => $subheadingData['subheading_content'],
            //         'image_path' => $subheadingImageUrl,
            //     ]);
            // }
    
            return response()->json(['post' => $post], 201);
    
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }    
    
    public function update(Request $request, Post $post)
    {
        // Validate the request data
        $request->validate([
            'author_name' => 'required|string',
            'title' => 'required|string|max:255',
            'introduction_content' => 'nullable|string'
        ]);

        // Check if the authenticated user is the author of the post
        $user = auth()->user();
        if ($user->role === BlogEnums::WRITER && $user->id !== $post->author_id) {
            return response()->json(['message' => 'Unauthorized'], 403); // Forbidden
        }

        // Update the post
        $post->update([
            'author_name' => $request->input('author_name'),
            'title' => $request->input('title'),
            'introduction_content' => $request->input('introduction_content'),
        ]);

        return response()->json(['post' => $post], 201);
    }

    public function destroy($id)
    {
        $post = Post::findByPostId($id);

        if ($post) {
            $post->delete();
            return response()->json(['message' => 'Post deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Post not found or already deleted'], 404);
        }
    }

    public function postUpdate(Request $request)
    {
        $request->validate([
            'status' => 'required|string',
            'post_id' => 'required|int',
        ]);
    
        $status = $request->input('status');
        $id = $request->input('post_id');
    
        $post = Post::findByPostId($id);
    
        if ($post) {
            $post->post_status = $status;
    
            if ($status == BlogEnums::REJECTED) {
                $comments = $request->input('comments');
    
                if (!empty($comments)) {
                    $post->comments = $comments;
                } else {
                    return response()->json(['message' => 'Comments are required for rejected status'], 400);
                }
            } else {
                // If not rejected, set comments to the value provided in the request or null if not present
                $post->comments = $request->input('comments', null);
            }
    
            // Update the featured status based on the request
            if ($request->filled('featured')) {
                $post->featured = $request->input('featured') ? BlogEnums::FEATURED : BlogEnums::NOT_FEATURED;
            }
    
            $post->save(); // Save changes
    
            // Call the function to manage older featured posts
            Post::manageFeaturedPosts();
    
            return response()->json(['message' => 'Post Updated'], 200);
        } else {
            return response()->json(['message' => 'Post not Exist'], 404);
        }
    }
    
}
