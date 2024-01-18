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
   <body>
      <!-- Top Bar -->
      @include('components.navbar')
      <!-- @include('components.navbar') -->

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
      </div>

      <!-- comments go here -->
      <div class="container" id="disqus_thread"></div>
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
    </script>
    @csrf


      <!-- "Also Read" Section -->
      <div class="also-read container">
        <p>Also Read</p>
         <div class="image-row second-row">
            @foreach ($relatedPosts as $relatedPost)
            <a href="/blog/post/{{ $relatedPost->post_id }}">
            <img class="read-image" src="{{ $relatedPost->image_path }}" alt="{{ $relatedPost->title }}">
            <span>{{ $relatedPost->title }}</span>
            </a>
            @endforeach
         </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      
      <!-- @include('components.footer') -->
   </body>
</html>