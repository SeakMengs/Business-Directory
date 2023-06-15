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
                <a href="/category" class="btn btn-primary btn-sm home-btn">View More</a>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- First category -->
            <div class="col">
                <div class="card h-100">
                    <a href="#" class="text-decoration-none">
                        <!-- Category logo -->
                        <div class="text-center mt-2">
                            <!-- Add a class to center the image -->
                            <img src="assets/images/businessserviceimg.jpeg" class="card-home-img mx-auto"
                                alt="Business Logo"> <!-- Add mx-auto class for horizontal centering -->
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <!-- Category title -->
                            <h5 class="card-title mb-2">Business Services</h5>
                            <!-- Category subtitle -->
                            <p class="card-subtitle text-muted">Solutions for legal, accounting, marketing, and HR</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End first category -->


            <!-- 2nd category -->
            <div class="col">
                <div class="card h-100">
                    <a href="#" class="text-decoration-none">
                        <!-- Category logo -->
                        <div class="text-center mt-2">
                            <!-- Add a class to center the image -->
                            <img src="assets/images/financeimg.jpeg" class="card-home-img mx-auto" alt="Bank Logo">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <!-- Category title -->
                            <h5 class="card-title mb-2">Banking & Finance</h5>
                            <!-- Category subtitle -->
                            <p class="card-subtitle text-muted">Manage your money and investments with confidence</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End 2nd category -->

            <!-- 3rd Category -->
            <div class="col">
                <div class="card h-100">
                    <a href="#" class="text-decoration-none">
                        <!-- Category logo -->
                        <div class="text-center mt-2">
                            <!-- Add a class to center the image -->
                            <img src="assets/images/constructionimg.jpeg" class="card-home-img mx-auto"
                                alt="Construction logo">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <!-- Category title -->
                            <h5 class="card-title mb-2">Construction</h5>
                            <!-- Category subtitle -->
                            <p class="card-subtitle text-muted">Comprehensive solutions for your business needs</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End 3rd Category -->

            <!-- 4th Category -->
            <div class="col">
                <div class="card h-100">
                    <a href="#" class="text-decoration-none">
                        <!-- Category logo -->
                        <div class="text-center mt-2">
                            <!-- Add a class to center the image -->
                            <img src="assets/images/householdimg.jpeg" class="card-home-img mx-auto"
                                alt="Home & Household logo">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <!-- Category title -->
                            <h5 class="card-title mb-2">Home & Household</h5>
                            <!-- Category subtitle -->
                            <p class="card-subtitle text-muted">Professional help for all your household needs</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End 4th Category -->

            <!-- 5th Category -->
            <div class="col">
                <div class="card h-100">
                    <a href="#" class="text-decoration-none">
                        <!-- Category logo -->
                        <div class="text-center mt-2">
                            <!-- Add a class to center the image -->
                            <img src="assets/images/agricultureimg.jpeg" class="card-home-img mx-auto"
                                alt="Industry, Agricultural & Garment">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <!-- Category title -->
                            <h5 class="card-title mb-2">Industry, Agricultural & Garment</h5>
                            <!-- Category subtitle -->
                            <p class="card-subtitle text-muted">Tailored services for your business needs</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End 5th Category -->

            <!-- 6th Category -->
            <div class="col">
                <div class="card h-100">
                    <a href="#" class="text-decoration-none">
                        <!-- Category logo -->
                        <div class="text-center mt-2">
                            <!-- Add a class to center the image -->
                            <img src="assets/images/travelimg.jpeg" class="card-home-img mx-auto" alt="Travel & Tourism">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <!-- Category title -->
                            <h5 class="card-title mb-2">Travel & Tourism</h5>
                            <!-- Category subtitle -->
                            <p class="card-subtitle text-muted">Take your travel and tourism business to new heights</p>
                        </div>
                    </a>
                </div>
            </div>
            <!-- End 6th Category -->

        </div>
    </div>

@stop
