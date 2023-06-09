<nav class="navbar navbar-expand-md navbar-light mb-3">
    <div class="container">
        <!-- Navigation Brand -->
        <a class="navbar-brand" href="/">VOS</a>
        <!-- Navigation Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if (!Auth::guard('companyUser')->check() && !Auth::guard('normalUser')->check())
                    @if (!request()->is('login*') && !request()->is('sign-up*'))
                        <!-- Login button -->
                        <li class="nav-item">
                            <a class="btn btn-outline-success me-2 home-btn" href="/login">Login</a>
                        </li>

                        <!-- Sign up button -->
                        <li class="nav-item">
                            <a class="btn btn-primary home-btn" href="/sign-up">Sign-up</a>
                        </li>
                    @endif
                @elseif (Auth::guard('normalUser')->check())
                    <!-- Logout For normal user -->
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-user fa-xl fontawe-icon"></i>
                            {{ Auth::guard('normalUser')->user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"
                                href="/user/normal/{{ Auth::guard('normalUser')->user()->name }}/{{ Auth::guard('normalUser')->user()->normal_user_id }}/profile">Account
                                Settings</a>
                            <a class="dropdown-item" href="/user/normal/logout">Logout</a>
                        </div>
                    </div>
                @elseif (Auth::guard('companyUser')->check())
                    <!-- Logout For company user -->
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa-solid fa-building fa-xl fontawe-icon"></i>
                            {{ Auth::guard('companyUser')->user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item"
                                href="/user/company/{{ Auth::guard('companyUser')->user()->name }}/{{ Auth::guard('companyUser')->user()->company_user_id }}/profile">Account
                                Settings</a>
                            <a class="dropdown-item" href="/user/company/logout">Logout</a>
                        </div>
                    </div>
                @endif
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Search bar -->
<div class="container">
    <h1 class="pb-3 header-align">Business Directory</h1>
    <div class="row justify-content-center pb-5">
        <div class="col-sm-8 col-md-6">
            <form action="/search" method="GET" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="text" class="form-control search-input" placeholder="Business type or name" name="search_query" value="{{ isset($search_query) ? $search_query : ""}}">
                    <select class="form-select" aria-label="Search by" name="search_by">
                        <option value="company" {{ isset($search_by) && $search_by == 'company' ? 'selected' : '' }}>
                            Search company </option>
                        <option value="category"
                            {{ isset($search_by) && $search_by == 'category' ? 'selected' : '' }}>Search category
                        </option>
                    </select>
                    <button class="btn btn-primary home-btn" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Search bar -->

<!-- For the dropdown -->
<!-- Include the JavaScript file -->
<script src="{{ asset('assets/js/search-dropdown.js') }}"></script>

