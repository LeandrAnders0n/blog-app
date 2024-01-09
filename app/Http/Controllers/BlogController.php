<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function search(Request $request){
    $request->validate([
        'query' => 'required|string', // Ensure 'query' parameter is present and is a string
    ]);

    $query = $request->input('query');

    // Call the search method on the Post model
    $posts = Post::search($query);

    return view('index', ['posts' => $posts]);
    }

    public function related($tag)
    {   
        // Assuming you have a method named 'relatedPosts' in your Post model
        // Adjust this based on your actual method name and logic
        $relatedPosts = Post::where('tag', $tag)->take(2)->get();
    
        return $relatedPosts;
    }    
    
    public function index(){
        // Fetch all posts sorted by the latest
        $posts = Post::orderBy('created_at', 'desc')->get();

        // You can then pass $posts to your view or return it as JSON, depending on your application
        return view('index', ['posts' => $posts]);
    }

    public function show($id){
        // Fetch the post with the given ID
        $post = Post::with('subheadings')->findOrFail($id);
        $relatedPosts=$this->related($post->tag);
        // Pass the $post variable to your view or use it as needed
        return view('view-post', ['post' => $post,'relatedPosts'=>$relatedPosts]);
    }

}
