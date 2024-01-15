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
            'title' => 'Indie Dogs - A Unique Canine World',
            'introduction_content' => 'Indie dogs, also known as independent or "indie" pups, represent a fascinating and distinct facet of the canine world. These free-spirited companions defy conventional norms, embodying a lifestyle that mirrors the indie culture found in music, art, and film. In this post, we\'ll explore the charm and individuality that sets indie dogs apart, celebrating their authenticity and the joy they bring to their owners.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/OBTY5kO3GZdKSuMgHbHukhGf9Dpb2v4YorB4rU4P.jpg',
            'comments' => 'Some comments here for post one.',
            'post_status' => 'accepted',
            'author_id' => 2, // Replace with the actual author ID
            'tag' => 'Technology',
            'featured' => true,
        ]);
        
        $post1->subheadings()->create([
            'subheading_id' => 1,
            'subheading_title' => 'The Indie Dog Lifestyle:',
            'subheading_content' => 'Indie dogs are not your typical furry friends; they are trailblazers, forging their',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/mZuHNLVdMl8i9chkrpVjiR923UgNZbgFW48cX2iq.jpg',
        ]);
        
        $post1->subheadings()->create([
            'subheading_id' => 2,
            'subheading_title' => 'Embracing Independence:',
            'subheading_content' => 'Indie dogs take pride in embracing independence, echoing the spirit of their human counterparts in the indie scene. Unlike traditional dog breeds that may thrive on routine and structure, these unique canines march to the beat of their own drum. Their free-spirited nature often leads to unexpected and heartwarming surprises for their owners.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/eL2A8j8DOdwcEDSMKckNnLDP6Q39ggVsUa8vV76Z.jpg',
        ]);        
        
        $post2 = Post::create([
            'author_name' => 'Jane Smith',
            'publish_date' => now(),
            'title' => 'The Enchanting World of Havanese Dogs',
            'introduction_content' => 'Havanese dogs, often referred to as "Velcro dogs," captivate the hearts of dog enthusiasts with their affectionate nature and vibrant personalities. In this post, we\'ll delve into the enchanting world of Havanese dogs, exploring their unique qualities and the joy they bring to their owners.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/Bwm1cXLoM6TxoTccxPQOasLMqffAHyC0WUJCn9GW.jpg',
            'comments' => 'Comments about Havanese dogs.',
            'post_status' => 'accepted',
            'author_id' => 2, // Replace with the actual author ID
            'tag' => 'Lifestyle',
            'featured' => true,
        ]);
        
        $post2->subheadings()->create([
            'subheading_id' => 1,
            'subheading_title' => 'The Velcro Dog Phenomenon:',
            'subheading_content' => 'Havanese dogs have earned the endearing nickname "Velcro dogs" due to their affectionate and clingy nature. They form strong bonds with their human companions, seeking constant companionship and showering them with love. This unique trait makes them ideal companions for those looking for a loyal and affectionate pet.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/jkl5HxiA3uezdxNCFZ0cxoZOQ4XcJ5AnO7wbdAy3.jpg',// Replace with your actual image path
        ]);
        
        $post2->subheadings()->create([
            'subheading_id' => 2,
            'subheading_title' => 'Playful Personalities:',
            'subheading_content' => 'In addition to their affectionate nature, Havanese dogs are known for their playful personalities. These charming canines exhibit a joyful and spirited demeanor, making them excellent family pets. Their playful antics and boundless energy contribute to a lively and engaging home environment.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/OBTY5kO3GZdKSuMgHbHukhGf9Dpb2v4YorB4rU4P.jpg', // Replace with your actual image path
        ]);

        $post3 = Post::create([
            'author_name' => 'Alice Johnson',
            'publish_date' => now(),
            'title' => 'The Golden Charm of Retrievers',
            'introduction_content' => 'Golden Retrievers, often hailed as one of the most lovable and versatile dog breeds, have an innate charm that captivates dog lovers worldwide. In this post, we\'ll explore the golden qualities that make Retrievers cherished companions, bringing joy and warmth to countless households.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/mZuHNLVdMl8i9chkrpVjiR923UgNZbgFW48cX2iq.jpg',// Replace with your actual image path
            'comments' => 'Comments about Golden Retrievers.',
            'post_status' => 'accepted',
            'author_id' => 2, // Replace with the actual author ID
            'tag' => 'Lifestyle',
            'featured' => true,
        ]);
        
        $post3->subheadings()->create([
            'subheading_id' => 1,
            'subheading_title' => 'The Family\'s Best Friend:',
            'subheading_content' => 'Golden Retrievers are renowned for their friendly and gentle nature, making them exceptional family pets. Their affinity for children and adults alike establishes them as devoted companions, enriching the lives of those fortunate enough to have them as part of the family.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/eL2A8j8DOdwcEDSMKckNnLDP6Q39ggVsUa8vV76Z.jpg',
        ]);
        
        $post3->subheadings()->create([
            'subheading_id' => 2,
            'subheading_title' => 'Intelligent and Versatile:',
            'subheading_content' => 'Beyond their affable demeanor, Golden Retrievers showcase remarkable intelligence and versatility. Whether serving as guide dogs, therapy animals, or excelling in obedience training, these Retrievers prove their adaptability and make a positive impact in various roles.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/Bwm1cXLoM6TxoTccxPQOasLMqffAHyC0WUJCn9GW.jpg',
        ]);
        
        $post4 = Post::create([
            'author_name' => 'Robert Turner',
            'publish_date' => now(),
            'title' => 'The Enchanting World of Cocker Spaniels',
            'introduction_content' => 'Cocker Spaniels, with their enchanting expressions and charming personalities, hold a special place in the hearts of dog enthusiasts. In this post, we\'ll unravel the delightful qualities that define Cocker Spaniels, making them beloved companions that bring joy and warmth to any household.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/jkl5HxiA3uezdxNCFZ0cxoZOQ4XcJ5AnO7wbdAy3.jpg',
            'comments' => 'Comments about Cocker Spaniels.',
            'post_status' => 'accepted',
            'author_id' => 2, // Replace with the actual author ID
            'tag' => 'Lifestyle',
            'featured' => true,
        ]);
        
        $post4->subheadings()->create([
            'subheading_id' => 1,
            'subheading_title' => 'Expressive Eyes and Affectionate Nature:',
            'subheading_content' => 'Cocker Spaniels are renowned for their expressive eyes that can melt hearts instantly. Paired with an affectionate nature, these dogs excel in forming strong bonds with their owners. Their love and loyalty create a lasting and meaningful connection in any household.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/OBTY5kO3GZdKSuMgHbHukhGf9Dpb2v4YorB4rU4P.jpg',
        ]);
        
        $post4->subheadings()->create([
            'subheading_id' => 2,
            'subheading_title' => 'Playful Companionship:',
            'subheading_content' => 'Cocker Spaniels thrive in playful companionship, making them ideal for families and individuals alike. Their energy and enthusiasm for interactive play ensure a lively and engaging atmosphere, bringing smiles and laughter to everyone fortunate enough to share their lives with these delightful companions.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/mZuHNLVdMl8i9chkrpVjiR923UgNZbgFW48cX2iq.jpg',
        ]);
        
        $post5 = Post::create([
            'author_name' => 'John Doe',
            'publish_date' => now(),
            'title' => 'Labrador Retrievers: Pawsitively Amazing Companions',
            'introduction_content' => 'Labrador Retrievers, often dubbed as the most popular dog breed, are known for their friendly demeanor, intelligence, and versatility. In this post, we\'ll dive into the wonderful world of Labradors, exploring the qualities that make them pawsitively amazing companions for any lifestyle.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/eL2A8j8DOdwcEDSMKckNnLDP6Q39ggVsUa8vV76Z.jpg',
            'comments' => 'Comments about Labrador Retrievers.',
            'post_status' => 'accepted',
            'author_id' => 2, // Author ID set to 2
            'tag' => 'Lifestyle', // Tag set to "Lifestyle"
            'featured' => true,
        ]);
        
        $post5->subheadings()->create([
            'subheading_id' => 1,
            'subheading_title' => 'Friendly and Sociable:',
            'subheading_content' => 'Labrador Retrievers are renowned for their friendly and sociable nature. Their love for human interaction makes them excellent companions for families, individuals, and even other pets. The Labrador\'s affable demeanor ensures a warm and welcoming atmosphere in any home.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/Bwm1cXLoM6TxoTccxPQOasLMqffAHyC0WUJCn9GW.jpg',
        ]);
        
        $post5->subheadings()->create([
            'subheading_id' => 2,
            'subheading_title' => 'Versatile Companions:',
            'subheading_content' => 'Beyond their friendly nature, Labradors showcase remarkable versatility. From being loyal family pets to excelling in service roles like search and rescue or therapy, Labradors adapt seamlessly to various lifestyles. Their intelligence and eagerness to please make them ideal for a wide range of activities.',
            'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/jkl5HxiA3uezdxNCFZ0cxoZOQ4XcJ5AnO7wbdAy3.jpg',
        ]);
        
        // Post for German Shepherds
$post6 = Post::create([
    'author_name' => 'John Doe',
    'publish_date' => now(),
    'title' => 'German Shepherds: The Noble Guardians',
    'introduction_content' => 'German Shepherds, recognized for their intelligence and loyalty, stand as noble guardians in the world of dog breeds. In this post, we\'ll delve into the remarkable qualities that make German Shepherds exceptional companions, fitting seamlessly into various lifestyles.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/OBTY5kO3GZdKSuMgHbHukhGf9Dpb2v4YorB4rU4P.jpg',
    'comments' => 'Comments about German Shepherds.',
    'post_status' => 'accepted',
    'author_id' => 2,
    'tag' => 'Lifestyle',
    'featured' => true,
]);

$post6->subheadings()->create([
    'subheading_id' => 1,
    'subheading_title' => 'Intelligent Protectors:',
    'subheading_content' => 'German Shepherds are celebrated for their intelligence and natural protective instincts. They make excellent family protectors and are often used in various service roles, showcasing their versatility and adaptability to different lifestyles.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/mZuHNLVdMl8i9chkrpVjiR923UgNZbgFW48cX2iq.jpg',
]);

$post6->subheadings()->create([
    'subheading_id' => 2,
    'subheading_title' => 'Loyal Companions:',
    'subheading_content' => 'Beyond their protective nature, German Shepherds form deep bonds with their owners, offering unwavering loyalty. Their affectionate and loyal demeanor contributes to a strong and meaningful connection in any household.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/eL2A8j8DOdwcEDSMKckNnLDP6Q39ggVsUa8vV76Z.jpg',
]);


// Post for Poodles
$post7 = Post::create([
    'author_name' => 'John Doe',
    'publish_date' => now(),
    'title' => 'Poodles: Elegant and Intelligent Companions',
    'introduction_content' => 'Poodles, known for their elegance and high intelligence, bring a touch of sophistication to the world of canine companions. In this post, we\'ll explore the unique qualities that make Poodles exceptional and adaptable to a variety of lifestyles.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/Bwm1cXLoM6TxoTccxPQOasLMqffAHyC0WUJCn9GW.jpg',
    'comments' => 'Comments about Poodles.',
    'post_status' => 'accepted',
    'author_id' => 2,
    'tag' => 'Lifestyle',
    'featured' => true,
]);

$post7->subheadings()->create([
    'subheading_id' => 1,
    'subheading_title' => 'Elegance in Motion:',
    'subheading_content' => 'Poodles are renowned for their elegant appearance and graceful movement. Their stylish and curly coat adds to their charm, making them a favorite choice for those who appreciate a touch of sophistication in their canine companions.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/jkl5HxiA3uezdxNCFZ0cxoZOQ4XcJ5AnO7wbdAy3.jpg',
]);

$post7->subheadings()->create([
    'subheading_id' => 2,
    'subheading_title' => 'Exceptional Intelligence:',
    'subheading_content' => 'Poodles consistently rank among the most intelligent dog breeds. Their sharp minds and eagerness to learn make them highly trainable, excelling in various activities from obedience training to canine sports.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/OBTY5kO3GZdKSuMgHbHukhGf9Dpb2v4YorB4rU4P.jpg',
]);


// Post for Bulldogs
$post8 = Post::create([
    'author_name' => 'John Doe',
    'publish_date' => now(),
    'title' => 'Bulldogs: The Charming Couch Potatoes',
    'introduction_content' => 'Bulldogs, with their distinctive appearance and lovable demeanor, carve a unique niche as charming couch potatoes. In this post, we\'ll uncover the delightful qualities that make Bulldogs cherished companions, especially for those seeking a laid-back lifestyle.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/mZuHNLVdMl8i9chkrpVjiR923UgNZbgFW48cX2iq.jpg',
    'comments' => 'Comments about Bulldogs.',
    'post_status' => 'accepted',
    'author_id' => 2,
    'tag' => 'Lifestyle',
    'featured' => true,
]);

$post8->subheadings()->create([
    'subheading_id' => 1,
    'subheading_title' => 'Distinctive Charm:',
    'subheading_content' => 'Bulldogs are easily recognizable with their distinctive wrinkled face and pushed-in nose. This charming appearance, combined with their gentle and friendly nature, makes Bulldogs a favorite choice for those seeking a laid-back and affectionate companion.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/eL2A8j8DOdwcEDSMKckNnLDP6Q39ggVsUa8vV76Z.jpg',
]);

$post8->subheadings()->create([
    'subheading_id' => 2,
    'subheading_title' => 'Laid-Back Lifestyle:',
    'subheading_content' => 'Bulldogs are often referred to as "couch potatoes" due to their love for relaxation. While they may enjoy a leisurely lifestyle, Bulldogs remain loyal and loving, making them perfect for individuals or families looking for a more relaxed pace.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/Bwm1cXLoM6TxoTccxPQOasLMqffAHyC0WUJCn9GW.jpg',
]);


// Post for Dachshunds
$post9 = Post::create([
    'author_name' => 'John Doe',
    'publish_date' => now(),
    'title' => 'Dachshunds: Small Dogs, Big Personalities',
    'introduction_content' => 'Dachshunds, often affectionately called "wiener dogs," boast big personalities in small packages. In this post, we\'ll unravel the unique qualities that make Dachshunds delightful and endearing companions for a variety of lifestyles.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/jkl5HxiA3uezdxNCFZ0cxoZOQ4XcJ5AnO7wbdAy3.jpg',
    'comments' => 'Comments about Dachshunds.',
    'post_status' => 'accepted',
    'author_id' => 2,
    'tag' => 'Lifestyle',
    'featured' => true,
]);

$post9->subheadings()->create([
    'subheading_id' => 1,
    'subheading_title' => 'Distinctive Appearance:',
    'subheading_content' => 'Dachshunds are known for their long bodies and short legs, creating a distinctive appearance that captures attention. Their unique look, combined with their spunky and bold personalities, makes Dachshunds a favorite among small dog enthusiasts.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/OBTY5kO3GZdKSuMgHbHukhGf9Dpb2v4YorB4rU4P.jpg',
]);

$post9->subheadings()->create([
    'subheading_id' => 2,
    'subheading_title' => 'Bold and Spirited:',
    'subheading_content' => 'Despite their small size, Dachshunds are bold and spirited. They often exhibit a fearless attitude, making them entertaining and endearing companions. Their playful nature ensures that they bring joy and laughter to any household.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/mZuHNLVdMl8i9chkrpVjiR923UgNZbgFW48cX2iq.jpg',
]);


// Post for Beagles
$post10 = Post::create([
    'author_name' => 'John Doe',
    'publish_date' => now(),
    'title' => 'Beagles: Energetic Explorers with a Heart of Gold',
    'introduction_content' => 'Beagles, with their keen sense of smell and friendly demeanor, are energetic explorers with a heart of gold. In this post, we\'ll uncover the qualities that make Beagles wonderful companions for those who appreciate an active and affectionate lifestyle.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/eL2A8j8DOdwcEDSMKckNnLDP6Q39ggVsUa8vV76Z.jpg',
    'comments' => 'Comments about Beagles.',
    'post_status' => 'accepted',
    'author_id' => 2,
    'tag' => 'Lifestyle',
    'featured' => true,
]);

$post10->subheadings()->create([
    'subheading_id' => 1,
    'subheading_title' => 'Keen Sense of Smell:',
    'subheading_content' => 'Beagles are renowned for their exceptional sense of smell, often used in roles such as detection dogs. Their olfactory prowess adds an intriguing dimension to their personality, making them excellent companions for those who appreciate a dog with a keen nose.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/Bwm1cXLoM6TxoTccxPQOasLMqffAHyC0WUJCn9GW.jpg',
]);

$post10->subheadings()->create([
    'subheading_id' => 2,
    'subheading_title' => 'Affectionate and Playful:',
    'subheading_content' => 'Despite their hunting instincts, Beagles are affectionate and playful. Their friendly disposition makes them suitable for families, and their boundless energy ensures an active and joyful lifestyle for both the dog and their human companions.',
    'image_path' => 'https://blog-app.nyc3.cdn.digitaloceanspaces.com/post-files/jkl5HxiA3uezdxNCFZ0cxoZOQ4XcJ5AnO7wbdAy3.jpg',
]);

    }

}
