<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <!-- Link to your custom CSS file -->
      <link rel="stylesheet" href="/css/index.css">
      <link rel="stylesheet" href="/css/view-post.css">
   </head>
   <body class="bg-light">
      @include('components.navbar')

      <div class="container main-container">
         <!-- Replace the static content with dynamic data from the database -->
         <div class="title">{{ $post->title }}</div>
         <div class="details">by {{ $post->author_name }} {{ $post->publish_date }} | {{ $post->tag }}</div>
         <!-- Main Content -->
         <img src="{{ $post->image_path }}" alt="{{ $post->title }}">
         <div class="content">{{ $post->introduction_content }}</div>
         <!-- Loop through subheadings and their associated images -->
         @foreach ($post->subheadings as $subheading)
         <div class="subheading-title">{{ $subheading->subheading_title }}</div>
         @if ($subheading->image_path)
         <img src="{{ $subheading->image_path }}" alt="{{ $subheading->subheading_title }}">
         @endif
         <div class="content">{{ $subheading->subheading_content }}</div>
         @endforeach

         <!-- Button for Sharing -->
         <div class="button-text read-more p-2 mr-2" onclick="sharePost()">
            <i class="fas fa-share-alt"></i></div>

         <!-- Button for Displaying Disqus Section -->
         <div class="button-text read-more bg-dark p-2" onclick="toggleDisqus()">
            <i class="fas fa-comments"></i></div>

         <!-- comments go here -->
         <div class="container" id="disqus_thread" style="display: none;"></div>
         <script id="dsq-count-scr" src="//blog-app-11.disqus.com/count.js" async></script>
         
         <script>
            /**
            * RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            * LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables */
            var disqus_config = function () {
               this.page.url = "{{ url()->current() }}";  // Replace with your dynamic URL
               this.page.identifier = "{{ $post->post_id }}"; // Replace with your post identifier
            };

            (function() {
               var d = document, s = d.createElement('script');
               s.src = 'https://blog-app-11.disqus.com/embed.js';
               s.setAttribute('data-timestamp', +new Date());
               (d.head || d.body).appendChild(s);
            })();

            function sharePost() {
            if (navigator.share) {
               navigator.share({
                  title: '{{ $post->title }}',
                  text: 'Check out this post!',
                  url: '{{ url()->current() }}'
               })
               .then(() => console.log('Successful share'))
               .catch((error) => console.log('Error sharing:', error));
            } else {
               // Fallback for browsers that do not support the Web Share API
               alert('Web Share API is not supported in this browser. You can manually share the link.');
            }
         }
            function toggleDisqus() {
               // Toggle visibility of Disqus section
               var disqusContainer = document.getElementById('disqus_thread');
               disqusContainer.style.display = (disqusContainer.style.display === 'none') ? 'block' : 'none';
            }
         </script>
         @csrf
      </div>
      <br>
      <div class="also-read m-5">
   <h3 class="text-dark ml-7">Related Posts</h3>
   <div class="image-row second-row bg-light">
      @foreach ($relatedPosts as $relatedPost)
         <a href="/blog/post/{{ $relatedPost->post_id }}" class="read-item">
            <figcaption>{{ $relatedPost->title }}</figcaption>
            <img class="read-image" src="{{ $relatedPost->image_path }}" alt="{{ $relatedPost->title }}">
         </a>
      @endforeach
   </div>
</div>


      <!-- Bootstrap and other scripts -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
   </body>
</html>
