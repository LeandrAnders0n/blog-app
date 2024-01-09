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
   </head>
   <body>
      <!-- @include('components.topbar') -->
      @include('components.navbar')
      <div class="container">
         <div class="container">
            <div class="image-row">
               @foreach ($posts->take(3) as $post) {{-- Display first 4 posts --}}
               <a href="/blog/post/{{ $post->post_id }}" class="image-container">
                  <img class="image" src="{{ $post->image_path }}" alt="{{ $post->title }}">
                  <div class="text-container">
                     <div class="button-text button">{{ $post->tag }}</div>
                     <br>
                     <h3>{{ $post->title }}</h3>
                  </div>
               </a>
               @endforeach
            </div>
         </div>
         <br><br>

         <div style="margin-left:60px; margin-right:60px">

         <div class="image-row second-row">
            @foreach ($posts->slice(3, 5) as $post) {{-- Display next 3 posts --}}
            <a href="/blog/post/{{ $post->post_id }}" class="image-container" style="margin-left:-60px">
               <img class="image" src="{{ $post->image_path }}" alt="{{ $post->title }}">
               <div class="button-text button">{{ $post->tag }}</div>
            </a>
            <a href="/blog/post/{{ $post->post_id }}" class="image-container">
               <div>
                  <h4>{{ $post->title }}</h4>
                  <p>{{ $post->introduction_content }}</p>
                  <div class="button-text read-more">READ MORE</div>
               </div>
            </a>
            <br>
            @endforeach
         </div>
</div>
         <center>
            <div class="load-more btn btn-dark" id="loadMore">LOAD MORE</div>
         </center>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      @include('components.footer')
   </body>
   <script>
      var offset = 6; // Number of posts already loaded
      var limit = 3; // Number of posts to load on each click
      
      $('#loadMore').on('click', function () {
          $.ajax({
              url: '/load-more', // Replace with your actual endpoint
              method: 'GET',
              data: { offset: offset, limit: limit },
              success: function (data) {
                  // Append the new posts to the second-row container
                  $('.second-row').append(data);
                  offset += limit; // Update the offset for the next request
              },
              error: function (error) {
                  console.error('Error loading more posts:', error);
              }
          });
      });
   </script>
</html>