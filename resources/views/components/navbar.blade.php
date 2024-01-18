<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path-to-your-styles.css">

    <style>
        body {
            background-color: #141414;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;
            background-color: black;
            padding: 10px;
        }

        .social-icons {
            display: block;
            margin-bottom: 10px;
            text-align: center;
        }

        .nav-bar {
            background-color: black;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            margin-bottom: 30px;
            padding:14px;
        }

        .nav-link-container {
            position: relative;
            display: inline-block;
        }

        .nav-link {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: 600;
            position: relative;
            display: inline-block;
            padding: 15px 20px;
        }

        .nav-link:after {
            content: "";
            display: block;
            position: absolute;
            bottom: 0;
            left: 50%;
            background: #3d72a6; /* Blue underline color */
            height: 2px;
            width: 0;
            transition: width 0.3s ease 0s, left 0.3s ease 0s;
        }

        .nav-link:hover:after {
            width: 100%;
            left: 0;
        }

        .nav-link:hover {
            color: #fff;
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #333;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .nav-link-container:hover .dropdown {
            display: block;
            z-index: 1000;
        }

        .dropdown-item {
            color: #fff;
            margin: 5px 0;
        }

        .navbar-toggler-white {
            color: #ddd; /* Set the color to white */
        }

        /* Customizing the modal styles */
        .modal-content {
            background-color: #141414;
            color: #fff;
        }

        .modal-header {
            border-bottom: 1px solid #ddd;
        }

        .modal-title {
            color: #fff;
        }

        .close {
            color: #fff;
        }

        .modal-body,
        .modal-footer {
            border-top: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg nav-bar">
        <div class="container">
            <a href="#" class="navbar-link h4 text-info" >BlueSeal</a>
            <button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="modal" data-target="#mobileMenuModal">
                <span class="navbar-toggler-icon"><i class="fa fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
         <div class="nav-link-container">
            <a href="#" class="nav-link">Entertainment <i class="fas fa-caret-down dropdown-icon"></i></a>
            <div class="dropdown">
               <div class="dropdown-item" onclick="navigateToSearch('Celebrities')">Celebrities</div>
            </div>
         </div>
         <div class="nav-link-container">
            <a href="#" class="nav-link" onclick="navigateToSearch('Movies & TV Shows')">Movies & TV Shows</a>
         </div>
         <div class="nav-link-container">
            <a href="#" class="nav-link" onclick="navigateToSearch('Music')">Music</a>
         </div>
         <div class="nav-link-container">
            <a href="#" class="nav-link" onclick="navigateToSearch('Lifestyle')">Lifestyle</a>
         </div>
         <div class="nav-link-container">
            <a href="#" class="nav-link" onclick="navigateToSearch('Technology')">Technology</a>
         </div>
         <div class="nav-link-container">
            <a href="#" class="nav-link" onclick="navigateToSearch('Gaming')">Gaming</a>
         </div>
         <div class="nav-link-container">
            <a href="#" class="nav-link" onclick="navigateToSearch('Latest')">Latest</a>
         </div>
         <div class="nav-link-container" style="margin-top:-10px">
            <a href="#" class="social-icons" style="height:20px"><i class="fab fa-twitter fa-xs"></i></a>
            <a href="#" class="social-icons" style="height:20px"><i class="fab fa-facebook fa-xs"></i></a>
         </div>
         <div class="nav-link-container" style="margin-top:-10px">
            <a href="#" class="social-icons" style="height:20px"><i class="fab fa-linkedin fa-xs"></i></a>
            <a href="#" class="social-icons" style="height:20px"><i class="fab fa-youtube fa-xs"></i></a>
         </div>
      </div>
        </div>
    </nav>
<!-- Mobile Menu Modal -->
<div class="modal fade" id="mobileMenuModal" tabindex="-1" role="dialog" aria-labelledby="mobileMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mobileMenuModalLabel">Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body tet-right">
                <div class="nav-link-container">
                    <a href="#" class="nav-link">Entertainment <i class="fas fa-caret-down dropdown-icon"></i></a>
                    <div class="dropdown">
                        <div class="dropdown-item" onclick="navigateToSearch('Celebrities')">Celebrities</div>
                    </div>
                </div>
                <br/>
                <div class="nav-link-container">
                    <a href="#" class="nav-link" onclick="navigateToSearch('Movies & TV Shows')">Movies & TV Shows</a>
                </div>
                <br/>
                <div class="nav-link-container">
                    <a href="#" class="nav-link" onclick="navigateToSearch('Music')">Music</a>
                </div>
                <br/>
                <div class="nav-link-container">
                    <a href="#" class="nav-link" onclick="navigateToSearch('Lifestyle')">Lifestyle</a>
                </div>
                <br/>
                <div class="nav-link-container">
                    <a href="#" class="nav-link" onclick="navigateToSearch('Technology')">Technology</a>
                </div>
                <br/>
                <div class="nav-link-container">
                    <a href="#" class="nav-link" onclick="navigateToSearch('Gaming')">Gaming</a>
                </div>
                <br/>
                <div class="nav-link-container">
                    <a href="#" class="nav-link" onclick="navigateToSearch('Latest')">Latest</a>
                </div>
                <br/>
                <div class="row" style="margin-top: 15px; margin-bottom: 15px; margin-left: 12px">

                    <a href="#" class="social-icons col-1" style="height: 20px;"><i class="fab fa-twitter fa-xs"></i></a>
                    <a href="#" class="social-icons col-1" style="height: 20px;"><i class="fab fa-facebook fa-xs"></i></a>
                    <a href="#" class="social-icons col-1" style="height: 20px;"><i class="fab fa-linkedin fa-xs"></i></a>
                    <a href="#" class="social-icons col-1" style="height: 20px;"><i class="fab fa-youtube fa-xs"></i></a>
                </div>

            </div>
        </div>
    </div>
</div>

    <!-- End Mobile Menu Modal -->
    <div class="container">
        <!-- Your existing content goes here -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function navigateToSearch(query) {
            var baseUrl = '{{ url("/blog/search?query=") }}';
            var fullUrl = baseUrl + encodeURIComponent(query);
            window.location.href = fullUrl;
        }
    </script>
</body>

</html>
