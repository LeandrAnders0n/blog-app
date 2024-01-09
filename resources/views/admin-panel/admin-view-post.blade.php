<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Your Title</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('css/admin-home.css') }}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Posts Table</title>
      <link rel="stylesheet" href="{{ asset('css/admin-home.css') }}">
   </head>
   <body>
      @include('admin-panel.components.admin-topbar')
      <div class="mt-5 form-container">
         <form action="{{ isset($post) ? route('posts.update', ['post' => $post->post_id]) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($post))
            @method('PUT')
            @endif
            <!-- Author Name -->
            <div class="mb-3">
               <label for="author_name" class="form-label">Author Name</label>
               <input type="text" class="form-control" id="author_name" name="author_name" value="{{ isset($post) ? $post->author_name : '' }}">
            </div>
            <!-- Title -->
            <div class="mb-3">
               <label for="title" class="form-label">Title</label>
               <input type="text" class="form-control" id="title" name="title" value="{{ isset($post) ? $post->title : '' }}">
            </div>
            <!-- Introduction Content -->
            <div class="mb-3">
               <label for="introduction_content" class="form-label">Introduction Content</label>
               <textarea class="form-control" id="introduction_content" name="introduction_content" rows="4">{{ isset($post) ? $post->introduction_content : '' }}</textarea>
            </div>
            <!-- File Upload (Image) -->
            <div class="mb-3">
               <label for="image" class="form-label">Image Upload</label>
               <input type="file" class="form-control" id="image" name="image" accept="image/*">
            </div>
            <!-- Tag -->
            <div class="mb-3">
               <label for="tag" class="form-label">Tag</label>
               <select class="form-select" id="tag" name="tag">
               <option value="Movies and TV" {{ isset($post) && $post->tag === 'Movies and TV' ? 'selected' : '' }}>Movies and TV</option>
               <option value="Music" {{ isset($post) && $post->tag === 'Music' ? 'selected' : '' }}>Music</option>
               <option value="Gaming" {{ isset($post) && $post->tag === 'Gaming' ? 'selected' : '' }}>Gaming</option>
               <option value="Celebrities" {{ isset($post) && $post->tag === 'Celebrities' ? 'selected' : '' }}>Celebrities</option>
               <option value="Lifestyle" {{ isset($post) && $post->tag === 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
               <option value="Technology" {{ isset($post) && $post->tag === 'Technology' ? 'selected' : '' }}>Technology</option>
               <option value="Latest" {{ isset($post) && $post->tag === 'Latest' ? 'selected' : '' }}>Latest</option>
               </select>
            </div>
            <!-- Featured (Admin-only) -->
            @if (isset($post) && auth()->user()->isAdmin())
            <div class="mb-3 form-check">
               <input type="checkbox" class="form-check-input" id="featured" name="featured" {{ isset($post) && $post->featured ? 'checked' : '' }}>
               <label class="form-check-label" for="featured">Featured</label>
            </div>
            @endif
            <!-- Subheading Section -->
            <div id="subheadings-section">
               <!-- Subheading Title -->
               <div class="mb-3">
                  <label for="subheading_title" class="form-label">Subheading Title</label>
                  <input type="text" class="form-control" id="subheading_title" name="subheading_title[]">
               </div>
               <!-- Subheading Content -->
               <div class="mb-3">
                  <label for="subheading_content" class="form-label">Subheading Content</label>
                  <textarea class="form-control" id="subheading_content" name="subheading_content[]" rows="4"></textarea>
               </div>
               <!-- Image Path (for Image Upload) -->
               <div class="mb-3">
                  <label for="subheading_image" class="form-label">Image Path (for Image Upload)</label>
                  <input type="file" class="form-control" id="subheading_image" name="subheading_image[]" accept="image/*">
               </div>
            </div>
            <!-- Button to Generate More Subheading Sections -->
            <button type="button" class="btn btn-primary font-weight-bold mb-3" onclick="generateSubheadingSection()">Add Subheading</button>
            <!-- Comments Field for Admin -->
            @if (isset($post) && auth()->user()->isAdmin())
            <div class="mb-3">
               <label for="comments" class="form-label">Admin Comments</label>
               <textarea class="form-control" id="comments" name="comments" rows="4"></textarea>
            </div>
            <!-- Publish and Reject Buttons for Admin -->
            <div class="d-flex justify-content-between mt-3">
               <button type="button" class="btn btn-success font-weight-bold col-md-6 m-2" onclick="publishPost({{ isset($post) ? $post->post_id : 0 }})">Publish</button>
               <button type="button" class="btn btn-danger font-weight-bold col-md-6 m-2" onclick="rejectPost({{ isset($post) ? $post->post_id : 0 }})">Reject</button>
            </div>
            @else
            <br><br>
            <!-- Save Changes Button for Non-Admin Users -->
            <button type="submit" class="btn btn-dark font-weight-bold col-md-12 mb-3">{{ isset($post) ? 'Update' : 'Save Changes' }}</button>
            @endif
         </form>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <script>
         function submitForm() {
    var formData = new FormData(document.querySelector('form'));

    $.ajax({
        type: '{{ isset($post) ? "PUT" : "POST" }}',
        url: '{{ isset($post) ? route("posts.update", ["post" => $post->post_id]) : route("posts.store") }}',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response, status, xhr) {
            // Check the status code and show a toast accordingly
            if (xhr.status === 200) {
                Toastify({
                    text: response.message,
                    duration: 2000,
                    gravity: 'top',
                    backgroundColor: '#33cc33',
                    callback: function() {
                        // Redirect to the posts.index route after the toast disappears
                        window.location.href = '{{ route("posts.index") }}';
                    } // Green color for success
                }).showToast();
            } else {
                Toastify({
                    text: response.message,
                    duration: 2000,
                    gravity: 'top',
                    backgroundColor: '#ff3333', // Red color for error
                }).showToast();
            }
        },
        error: function(xhr, status, error) {
            // Handle validation errors
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;

                // Loop through errors and display them
                $.each(errors, function(key, value) {
                    Toastify({
                        text: value[0],
                        duration: 2000,
                        gravity: 'top',
                        backgroundColor: '#ff3333', // Red color for error
                    }).showToast();
                });
            } else {
                // Other types of errors
                Toastify({
                    text: 'Error: ' + xhr.responseJSON.message,
                    duration: 2000,
                    gravity: 'top',
                    backgroundColor: '#ff3333', // Red color for error
                }).showToast();
            }
        },
    });
}

          // JavaScript function to generate more subheading sections
          function generateSubheadingSection() {
              // Clone the first subheading section and append it to the parent container
              var firstSubheadingSection = document.querySelector('#subheadings-section');
              var newSubheadingSection = firstSubheadingSection.cloneNode(true);
              document.querySelector('#subheadings-section').appendChild(newSubheadingSection);
          }         
          // AJAX function for publishing a post
          function publishPost(postId) {
                     $.ajax({
                         type: 'POST',
                         url: '/posts-update',
                         data: {
                             _token: '{{ csrf_token() }}',
                             post_id: postId,
                             status: 'accepted', // Additional parameter to identify the action
                         },
                         success: function(response, status, xhr) {
                             // Check the status code and show a toast accordingly
                             if (xhr.status === 200) {
                                 Toastify({
                                     text: response.message,
                                     duration: 2000,
                                     gravity: 'top',
                                     backgroundColor: '#33cc33',
                                     callback: function() {
                         // Redirect to the posts.index route after the toast disappears
                         window.location.href = '{{ route("posts.index") }}';
                     } // Green color for success
                                 }).showToast();
                             } else {
                                 Toastify({
                                     text: response.message,
                                     duration: 2000,
                                     gravity: 'top',
                                     backgroundColor: '#ff3333', // Red color for error
                                 }).showToast();
                             }
                         },
                         error: function(error) {
                             Toastify({
                                 text: 'Error: ' + error.responseJSON.message,
                                 duration: 2000,
                                 gravity: 'top',
                                 backgroundColor: '#ff3333', // Red color for error
                             }).showToast();
                         },
                     });
                 }
         
                 // AJAX function for rejecting a post
                 function rejectPost(postId) {
                     var comments = $('#comments').val();
                     $.ajax({
                         type: 'POST',
                         url: '/posts-update',
                         data: {
                             _token: '{{ csrf_token() }}',
                             post_id: postId,
                             status: 'rejected', // Additional parameter to identify the action
                             comments:comments,
                         },
                         success: function(response, status, xhr) {
                             // Check the status code and show a toast accordingly
                             if (xhr.status === 200) {
                                 Toastify({
                                     text: response.message,
                                     duration: 2000,
                                     gravity: 'top',
                                     backgroundColor: '#33cc33',
                                     callback: function() {
                         // Redirect to the posts.index route after the toast disappears
                         window.location.href = '{{ route("posts.index") }}';
                     } // Green color for success
                                 }).showToast();
                             } else {
                                 Toastify({
                                     text: response.message,
                                     duration: 2000,
                                     gravity: 'top',
                                     backgroundColor: '#ff3333', // Red color for error
                                 }).showToast();
                             }
                         },
                         error: function(error) {
                             Toastify({
                                 text: 'Error: ' + error.responseJSON.message,
                                 duration: 2000,
                                 gravity: 'top',
                                 backgroundColor: '#ff3333', // Red color for error
                             }).showToast();
                         },
                     });
                 }
      </script>
   </body>
</html>