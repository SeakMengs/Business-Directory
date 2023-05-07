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
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col ">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Accountants - General</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Architectural - Design</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Consultants</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Banks & Finance</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Pest Control Services</h5>
          </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <div class="card-body d-flex flex-column justify-content-center">
          <a href="#" class="text-decoration-none">
            <h5 class="card-title mb-0">Printing Houses</h5>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


@stop