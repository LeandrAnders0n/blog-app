<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed for a post with associated subheadings
        $post1 = Post::create([
            'author_name' => 'John Doe',
            'publish_date' => now(),
            'title' => 'Sample Post One',
            'introduction_content' => 'This is the introduction for post one.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/jkl5HxiA3uezdxNCFZ0cxoZOQ4XcJ5AnO7wbdAy3.jpg', // Replace with your actual image path
            'comments' => 'Some comments here for post one.',
            'post_status' => 'accepted',
            'author_id' => 2, // Replace with the actual author ID
            'tag' => 'Technology',
            'featured' => true,
        ]);

        $post1->subheadings()->create([
            'subheading_id' => 1,
            'subheading_title' => 'Sample Subheading Title One',
            'subheading_content' => 'This is the Subheading Content for post one.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/Bwm1cXLoM6TxoTccxPQOasLMqffAHyC0WUJCn9GW.jpg', // Replace with your actual image path
        ]);

        $post1->subheadings()->create([
            'subheading_id' => 2,
            'subheading_title' => 'Sample Subheading Title Two',
            'subheading_content' => 'This is the Subheading Content for post one.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/eL2A8j8DOdwcEDSMKckNnLDP6Q39ggVsUa8vV76Z.jpg', // Replace with your actual image path
        ]);

        // Seed for another post with associated subheadings
        $post2 = Post::create([
            'author_name' => 'Jane Doe',
            'publish_date' => now(),
            'title' => 'Sample Post Two',
            'introduction_content' => 'This is the introduction for post two.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/mZuHNLVdMl8i9chkrpVjiR923UgNZbgFW48cX2iq.jpg', // Replace with your actual image path
            'comments' => 'Some comments here for post two.',
            'post_status' => 'accepted',
            'author_id' => 2, // Replace with the actual author ID
            'tag' => 'Music',
            'featured' => false,
        ]);

        $post2->subheadings()->create([
            'subheading_id' => 1,
            'subheading_title' => 'Sample Subheading Title Three',
            'subheading_content' => 'This is the Subheading Content for post two.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/OBTY5kO3GZdKSuMgHbHukhGf9Dpb2v4YorB4rU4P.jpg', // Replace with your actual image path
        ]);

    }

}
