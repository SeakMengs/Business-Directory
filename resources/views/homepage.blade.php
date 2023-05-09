@extends('layout.master')

@section('dyncontent')
<div class="container my-5">
  <div class="row">
    <div class="col">
      <h2 class="text-primary pb-4">Featured Categories</h2>
    </div>
    <div class="col text-end">
      <a href="/categoryshow" class="btn btn-primary btn-sm">View More</a>
    </div>
  </div>

  <!-- <div class="row row-cols-1 row-cols-md-3 g-4"> -->
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- first category -->
    <!-- <div class="col ">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
              <h5 class="card-title mb-0"> Business Services </h5>
          </a>
        </div>
      </div>
    </div> -->
    <div class="col">
      <div class="card h-100">
        <img src="https://dummyimage.com/400x200/000/fff" class="card-img-top" alt="Business Services">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-2">Business Services</h5>
            <p class="card-subtitle text-muted">Get help with your business needs</p>
          </a>
        </div>
      </div>
    </div>
    <!-- end first category -->

    <!-- 2nd category -->
    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Banking & Finance</h5>
          </a>
        </div>
      </div>
    </div>
    <!-- End 2nd category -->

    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Construction</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Home & Household</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Industry, Agricultural & Garment</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Travel & Tourism</h5>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@stop