@extends('layout.master')

@section('dyncontent')

<div class="container py-3">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/categoryshow">Category</a></li>
                <li class="breadcrumb-item"><a href="/automotive_cate">Automotive - Vehicles</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/s-cool-cambodia">S-Cool Cambodia</a></li>
            </ol>
        </nav>
    <!-- End Breadcrumbs -->

    <!-- Start company detail -->
    <div class="row">
        <div class="col-12">
            <div class="card-comdetail card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <img src="https://s3-ap-southeast-1.amazonaws.com/yp-s3-dev/uploads/7/20220322020754/s_cool_logo_bw_small.png" class="img-fluid card-image-comdetail" alt="Company Logo">
                        </div>
                        <div class="col-md-8">
                            <h3 class="card-title-comdetail mb-0">S-Cool Cambodia</h3>
                            <p class="card-comdetail my-3">No.901, Kampuchea Krom Blvd (128), Sangkat Teuk Laak II, Khan Toul Kork , 12156, Phnom Penh</p>
                            <p class="card-comdetail"><small>Contact Number: 012 345 678</small></p>
                            <p class="card-comdetail"><small>Email: <a href="#">info@scoolcambodia.com</a></small></p>
                            <p class="card-comdetail"><small>Website: <a href="#">www.scoolcambodia.com</a></small></p>
                            <div class="d-grid gap-2 d-md-block">
                                <button class="btn btn-primary me-md-2 mb-2" type="button">Save Company</button>
                                <button class="btn btn-danger mb-2" type="button">Report Company</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    
 </div>
</div>






@stop