@extends('layout.master')

@section('dyncontent')
<!-- <div class="container">
    <h2 class="text-center pb-3">Categories</h2>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="card mb-3">
                    <div class="card-body py-3">
                        <a href="#" title="Automotive - Vehicles">
                            <div class="d-flex">
                                <span class="mb-2 px-1">Automotive - Vehicles</span>
                            </div>
                        </a>
                        <a href="#" title="Banking & Finance">
                            <div class="d-flex">
                                <span class="mb-2 px-1">Banking & Finance</span>
                            </div>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div> 

        
</div> -->

<div class="container">
     <h2 class="header-align pb-3">Categories</h2>

        <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-center">
            <a href="#" class="text-decoration-none">
                <h5 class="card-title mb-0">Automotive - Vehicles</h5>
            </a>
            </div>
        </div>
        </div>
        <div class="col">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-center">
            <a href="#" class="text-decoration-none">
                <h5 class="card-title mb-0">Banking & Finance</h5>
            </a>
            </div>
        </div>
        </div>
        <div class="col">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-center">
            <a href="#" class="text-decoration-none">
                <h5 class="card-title mb-0">Business Services</h5>
            </a>
            </div>
        </div>
        </div>
        <div class="col">
        <div class="card h-100">
            <div class="card-body d-flex flex-column justify-content-center">
            <a href="#" class="text-decoration-none">
                <h5 class="card-title mb-0">Entertainment</h5>
            </a>
            </div>
        </div>
        </div>
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
                <h5 class="card-title mb-0">Education</h5>
            </a>
            </div>
        </div>
        </div>
    </div>


</div>

@stop