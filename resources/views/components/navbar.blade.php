<style>
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
    }
</style>

<div class="nav-bar">
    <div class="container">
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


<script>
    function navigateToSearch(query) {
        var baseUrl = '{{ url("/blog/search?query=") }}';
        var fullUrl = baseUrl + encodeURIComponent(query);
        window.location.href = fullUrl;
    }
</script>
