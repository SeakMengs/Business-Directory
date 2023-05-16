<nav class="navbar navbar-expand-md navbar-light mb-3">
    <div class="container">
        <a class="navbar-brand" href="/">VOS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-outline-primary me-2" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="/signup">Sign-up</a>
                </li>

                <!-- company profile icon -->
                <!-- <li class="nav-item">
                <img src="{{ asset('images/company-profile.png') }}" alt="company-rofile" class="company-profile-icon">
                        company profile
                </li> -->

                <!-- user profile icon -->
                <!-- <li class="nav-item">
                <img src="{{ asset('images/user-profile.png') }}" alt="company-rofile" class="company-profile-icon">
                        user profile
                </li> -->
                
                <!-- the logout button -->
                <!-- <li class="nav-item">
                    <a class="btn btn-primary" href="/logout">
                    <img src=" {{ asset('images/icon-logout.png') }}" alt="Logout" class="logout-icon">
                       logout
                    </a>
                </li> -->

                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Search bar -->
<div class="container">
    <h1 class="pb-4 header-align">Business Directory</h1>
    <div class="row justify-content-center pb-5">
        <div class="col-sm-8 col-md-6">
            <div class="input-group">
                <input type="text" class="form-control search-input" placeholder="Business type or name">
                <select class="form-select" aria-label="Search by">
                    <option selected>Search by</option>
                    <option value="name">Name</option>
                    <option value="category">Category</option>
                </select>
                <button class="btn btn-primary" type="button">Search</button>
            </div>
        </div>
    </div>
</div>
<!-- End Search bar -->