<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('css/admin-home.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico|Dancing+Script|Handlee|Lobster|Great+Vibes&display=swap">
      <title>Posts Table</title>
   </head>
   <body>
      @include('admin-panel.components.admin-topbar')
      <div class="container-fluid">
         <div class="row">
            <!-- Table Container (8 parts out of 12) -->
            <div class="col-md-9">
               <div class="d-flex justify-content-between">
                  <h2>All Posts</h2>
               </div>
               <div class="container custom-table-container">
                  <table class="table table-striped custom-table">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Author</th>
                           <th>Title</th>
                           <th>Introduction</th>
                           <th>Image</th>
                           <th>Tag</th>
                           <th>Status</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($posts as $post)
                        @if(auth()->user()->isAdmin() || $post['post_status'] != 'accepted')
                        <tr>
                           <td>{{ $post['post_id'] }}</td>
                           <td>{{ $post['author_name'] }}</td>
                           <td>{{ $post['title'] }}</td>
                           <td>{{ $post['introduction_content'] }}</td>
                           <td>
                              <img src="{{ $post['image_path'] }}" alt="Post Image" width="50">
                           </td>
                           <td>{{ $post['tag'] }}</td>
                           <td>
                              <button class="btn btn-sm rounded-4 font-weight-bold
                                 @if($post['post_status'] == 'in_progress')
                                 btn-primary
                                 @elseif($post['post_status'] == 'accepted')
                                 btn-success
                                 @elseif($post['post_status'] == 'rejected')
                                 btn-secondary
                                 @endif
                                 ">
                              <strong><span style="font-weight: lighter;">
                              @if($post['post_status'] == 'in_progress')
                              In Progress
                              @else
                              {{ ucfirst($post['post_status']) }}
                              @endif
                              </span></strong>
                              </button>
                           </td>
                           <td>
                              <a href="{{ route('posts.show', ['post' => $post['post_id']]) }}"><i class="fas fa-edit" style="cursor: pointer;"></i></a>
                              <i class="fas fa-trash" onclick="deletePost({{ $post['post_id'] }})" {{ auth()->user()->isAdmin() ? '' : 'style=display:none' }}></i>
                           </td>
                        </tr>
                        @endif
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- Right-side Container (4 parts out of 12) -->
            <div class="col-md-3">
               @if(auth()->user()->isAdmin())
               <h2>Featured Posts (Admin View)</h2>
               @else
               <h2>Accepted Posts</h2>
               @endif
               <div class="container custom-table-container">
                  <table class="table table-striped custom-table">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Author</th>
                           <th>Title</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $acceptedPostsCount = 0; @endphp
                        @foreach($posts as $post)
                        @if(!auth()->user()->isAdmin() && $post['post_status'] == "accepted" && $acceptedPostsCount < 5)
                        <tr>
                           <td>{{ $post['post_id'] }}</td>
                           <td>{{ $post['author_name'] }}</td>
                           <td>{{ $post['title'] }}</td>
                        </tr>
                        @php $acceptedPostsCount++; @endphp
                        @elseif(auth()->user()->isAdmin() && $post['featured'] == 1)
                        <tr>
                           <td>{{ $post['post_id'] }}</td>
                           <td>{{ $post['author_name'] }}</td>
                           <td>{{ $post['title'] }}</td>
                        </tr>
                        @endif
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="row">
         <div class="col-md-9">
            @if(!auth()->user()->isAdmin())
            <a href="{{ route('new-post') }}" class="btn btn-dark font-weight-bold col-md-12 mb-3 mt-3">New Post</a>
                  @endif
            </div>
         </div>
      </div>
      <!-- Include your JavaScript scripts here -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
      <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
      <script>
         function deletePost(postId) {
         // Implement your delete logic here
         console.log('Delete post with ID:', postId);
         
         // Send an AJAX request to delete the post
         $.ajax({
            url: '/posts/'+postId,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Add CSRF token for Laravel
            },
            success: function(response, status, xhr) {
                // Check the status code and show a toast accordingly
                if (xhr.status === 200) {
                    Toastify({
                        text: response.message,
                        duration: 3000,
                        gravity: 'top',
                        backgroundColor: '#33cc33', // Green color for success
                    }).showToast();
                } else {
                    Toastify({
                        text: response.message,
                        duration: 3000,
                        gravity: 'top',
                        backgroundColor: '#ff3333', // Red color for error
                    }).showToast();
                }
            },
            error: function(xhr) {
                // Handle the error response, e.g., show a toast
                if (xhr.status === 404) {
                    Toastify({
                        text: 'Post not found or already deleted',
                        duration: 3000,
                        gravity: 'bottom',
                        backgroundColor: '#ff3333', // Red color for error
                    }).showToast();
                } else {
                    Toastify({
                        text: 'Error deleting post',
                        duration: 3000,
                        gravity: 'bottom',
                        backgroundColor: '#ff3333', // Red color for error
                    }).showToast();
                }
            }
         });
         }
      </script>
   </body>
</html>