@extends('layout.master')

@section('dyncontent')
<div class="container my-5">
  <div class="row">
    <div class="col">
       <!-- Heading for featured categories -->
      <h2 class="text-success pb-4">Featured Categories</h2>
    </div>
    <div class="col text-end">
       <!-- Link to view more categories -->
      <a href="/categoryshow" class="btn btn-primary btn-sm">View More</a>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4">
   <!-- first category -->
    <div class="col">
      <div class="card h-100">
        <a href="#" class="text-decoration-none">
          <!-- Category logo -->
          <img src="{{ asset('images/business-logo.jpg') }}" class="card-home-img" alt="Business Logo">
          <div class="card-body d-flex flex-column justify-content-center">
            <!-- Category title -->
            <h5 class="card-title mb-2">Business Services</h5>
            <!-- Category subtitle -->
            <p class="card-subtitle text-muted">Solutions for legal, accounting, marketing, and HR</p>
          </div>
        </a>
      </div>
    </div>
    <!-- end first category -->


    <!-- 2nd category -->
    <div class="col">
      <div class="card h-100">
         <a href="#" class="text-decoration-none">
          <!-- Category logo -->
        <img src=" {{ asset('images/bank-logo.jpg') }}" class="card-home-img" alt="Bank Logo">
        <div class="card-body d-flex flex-column justify-content-center">
          <!-- Category title -->
            <h5 class="card-title mb-2">Banking & Finance</h5>
             <!-- Category subtitle -->
            <p class="card-subtitle text-muted">Manage your money and investments with confidence</p>
          </a>
        </div>
      </div>
    </div>
    <!-- End 2nd category -->

    <!-- 3rd Category -->
    <div class="col">
      <div class="card h-100">
        <a href="#" class="text-decoration-none">
           <!-- Category logo -->
        <img src=" {{ asset('images/construction-logo.jpg') }}" class="card-home-img" alt="Construction logo">
        <div class="card-body d-flex flex-column justify-content-center">
          <!-- Category title -->
            <h5 class="card-title mb-2">Construction</h5>
             <!-- Category subtitle -->
            <p class="card-subtitle text-muted">Comprehensive solutions for your business needs</p>
          </a>
        </div>
      </div>
    </div>
    <!-- End 3rd Category -->

    <!-- 4th Category -->
    <div class="col">
      <div class="card h-100">
        <a href="#" class="text-decoration-none">
           <!-- Category logo -->
        <img src=" {{ asset('images/house-logo.jpg') }}" class="card-home-img" alt="Home & Household logo">
        <div class="card-body d-flex flex-column justify-content-center">
          <!-- Category title -->
            <h5 class="card-title mb-2">Home & Household</h5>
             <!-- Category subtitle -->
            <p class="card-subtitle text-muted">Professional help for all your household needs</p>
          </a>
        </div>
      </div>
    </div>
    <!-- End 4th Category -->

    <!-- 5th Category -->
    <div class="col">
      <div class="card h-100">
        <a href="#" class="text-decoration-none">
           <!-- Category logo -->
        <img src=" {{ asset('images/agriculture-logo.jpg') }}" class="card-home-img" alt="Industry, Agricultural & Garment">
        <div class="card-body d-flex flex-column justify-content-center">  
          <!-- Category title -->
            <h5 class="card-title mb-2">Industry, Agricultural & Garment</h5>
             <!-- Category subtitle -->
            <p class="card-subtitle text-muted">Tailored services for your business needs</p>
          </a>
        </div>
      </div>
    </div>
    <!-- End 5th Category -->

    <!-- 6th Category -->
    <div class="col">
      <div class="card h-100">
        <a href="#" class="text-decoration-none">
           <!-- Category logo -->
        <img src=" {{ asset('images/travel-logo.jpg') }}" class="card-home-img" alt="Travel & Tourism">
        <div class="card-body d-flex flex-column justify-content-center">
          <!-- Category title -->
            <h5 class="card-title mb-2">Travel & Tourism</h5>
             <!-- Category subtitle -->
            <p class="card-subtitle text-muted">Take your travel and tourism business to new heights</p>
          </a>
        </div>
      </div>
    </div>
    <!-- End 6th Category -->
    
  </div>
</div>

@stop