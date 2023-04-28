<!DOCTYPE html>
<html lang="en">

<!-- Head -->
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>VOS Business Directory</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Link to CSS custom -->
    <link href="assets/css/style.css" rel="stylesheet"/>

  </head>
<!-- End Head -->

  <body>

      <!-- Header section -->
      <div class="container-fluid bg-light sticky-top">
        <nav class="navbar navbar-expand-md navbar-light mb-3">
          <div class="container">
            <a class="navbar-brand" href="#">VOS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <button type="button" class="btn btn-outline-primary me-2">Login</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="btn btn-primary">Sign-up</button>
                </li>
              </ul>
            </div>
          </div>
        </nav> 
        
         <!-- Search bar -->
        <div class="container">
          <h1 class="pb-4">Business Directory</h1>
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
     </div>
     <!-- End header section -->

    <!-- Featured Category -->
    <div class="container my-5">
      <div class="row">
        <div class="col">
          <h2 class="pb-4">Featured Categories</h2>
        </div>
        <div class="col text-end">
          <a href="#" class="btn btn-primary">View More</a>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="#" class="text-decoration-none">
                <h5 class="card-title">Accountants - General</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="#" class="text-decoration-none">
                <h5 class="card-title">Architectural - Design</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="#" class="text-decoration-none">
                <h5 class="card-title">Consultants</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="#" class="text-decoration-none">
                <h5 class="card-title">Banks &amp; Finance</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="#" class="text-decoration-none">
                <h5 class="card-title">Pest Control Services</h5>
              </a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <a href="#" class="text-decoration-none">
                <h5 class="card-title">Printing Houses</h5>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- End Featured Category -->

    <!-- Footer Section-->

      <footer class="bg-light py-4">
        <div class="container">
          <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
              <h5 class="text-uppercase mb-4">About Us</h5>
              <p>VOS is a business directory website dedicated to helping people find local 
                businesses in their area. Our goal is to provide accurate information on businesses across various 
                industries, making it easy for users to find what they need.</p>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h5 class="text-uppercase mb-4">Office Location</h5>
              <address class="mb-0">
                <strong>VOS Inc.</strong><br>
                123 Main St.<br>
                Moon 200<br>
                Nowhere, Jupiter 223311<br>
              </address>
            </div>
            <div class="col-md-4">
              <h5 class="text-uppercase mb-4">Connect With Us</h5>
              <ul class="list-unstyled">
                <li class="mb-2"><a href="#" class="text-decoration-none">Facebook</a></li>
                <li class="mb-2"><a href="#" class="text-decoration-none">Instagram</a></li>
                <li class="mb-2"><a href="#" class="text-decoration-none">LinkedIn</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="bg-light text-center py-3">
          <p class="mb-0">&copy; VOS Inc. All rights reserved.</p>
        </div>
      </footer>
      
     <!-- End Footer section -->

     <!-- script -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>    
     <!-- end script -->       
    
  </body>
</html>

