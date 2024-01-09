<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login Page</title>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" action="/login" method="post">
            @csrf <!-- Add CSRF token for security -->
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script>
$(document).ready(function() {
    // Intercept the form submission
    $('#loginForm').submit(function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Perform an Ajax request
        $.ajax({
            type: 'POST',
            url: '/login',
            data: $('#loginForm').serialize(), // Serialize the form data
            success: function(response) {
                // Check if the response contains a token
                if (response.token) {
                    // Redirect to posts.index
                    window.location.href = '{{ route("posts.index") }}';
                } else {
                    // Show a toast with an error message
                    showToast('Invalid credentials');
                }
            },
            error: function() {
                // Show a toast for any other errors
                showToast('An error occurred');
            }
        });
    });

    // Function to show a toast
    function showToast(message) {
        // Customize this function based on your toast library or implementation
        alert(message);
    }
});
</script>
</body>
</html>
