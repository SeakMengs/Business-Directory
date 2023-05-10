@extends('layout.master')

@section('dyncontent')

<div class="container my-4">
     <!-- Breadcrumbs -->
     <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active"><a href="/categoryshow">Category</a></li>
            </ol>
        </nav>
    <!-- End Breadcrumbs -->
     <h2 class="header-align pb-3">Categories</h2>
    
        <div class="row row-cols-1 row-cols-md-4 g-4">
        <!-- Automotive-Vehicle category -->
        <div class="col">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <a href="/automotive_cate" class="text-decoration-none">
                        <h5 class="card-title mb-0"> 
                            <i class="fa-solid fa-car fontawe-icon"></i>
                            Automotive - Vehicles
                        </h5>
                    </a>
                </div>
            </div>
        </div>
         <!-- End Automotive-Vehicle category -->

         <!-- Banking & Finance  -->
        <div class="col">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title mb-0">
                            <i class="fa-solid fa-coins fontawe-icon"></i>
                            Banking & Finance
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Banking & Finance -->

        <!-- Business Services -->
        <div class="col">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title mb-0">
                            <i class="fa-solid fa-briefcase fontawe-icon"></i>
                            Business Services
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Business Services -->

        <!-- Entertainment -->
        <div class="col">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title mb-0">
                            <i class="fa-solid fa-gamepad fontawe-icon"></i>
                            Entertainment
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Entertainment -->

        <!-- Construction -->
        <div class="col">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title mb-0">
                            <i class="fa-solid fa-helmet-safety fontawe-icon"></i>
                            Construction
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Construction -->

        <!-- Education -->
        <div class="col">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title mb-0">
                            <i class="fa-solid fa-school fontawe-icon"></i>
                            Education
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Education -->

        <!--  Food & Beverages -->
        <div class="col">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title mb-0">
                            <i class="fa-solid fa-bowl-food fontawe-icon"></i>
                            Food & Beverages
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        <!-- End Food & Beverages -->

        <!--  Health & Medicine -->
        <div class="col">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title mb-0">
                            <i class="fa-solid fa-suitcase-medical fontawe-icon"></i>
                            Health & Medicine
                        </h5>
                    </a>
                </div>
            </div>
        </div>
        <!-- End  Health & Medicine -->

    </div>


</div>

@stop