@extends('layout.master')

@section('dyncontent')

<div class="container py-3">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/categoryshow">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Automotive - Vehicles</a></li>
            </ol>
        </nav>
    <!-- End Breadcrumbs -->

    <div class="row row-cols-1 row-cols-md-3">
    <!-- First company -->
    <div class="col mb-4">
     <div class="card h-100">
       <img src="https://s3-ap-southeast-1.amazonaws.com/yp-s3-dev/uploads/7/20220322020754/s_cool_logo_bw_small.png" class="card-img-top company-logo" alt="Company Logo">
       <div class="card-body">
         <h5 class="card-title company-name"><a href="#" class="company-link">S-Cool Cambodia</a></h5>
         <div>
             <span class="company-phone"><i class="fa-solid fa-phone fontawe-icon"></i> 012 836 896 / 016 836 896</span><br>
             <span class="company-address"><small>No.901, Kampuchea Krom Blvd (128), Sangkat Teuk Laak II, Khan Toul Kork , 12156, Phnom Penh </small></span>
         </div>
         <div class="company-rating">
           <i class="fa fa-star"></i>
           <i class="fa fa-star"></i>
           <i class="fa fa-star"></i>
           <i class="fa fa-star"></i>
           <i class="fa fa-star-o"></i>
         </div>
       </div>
     </div>
   </div>

   <!-- End first company -->
  
   <!-- Second company -->
   <div class="col mb-4">
     <div class="card h-100">
       <img src="https://s3-ap-southeast-1.amazonaws.com/yp-s3-dev/uploads/7/20220322020754/s_cool_logo_bw_small.png" class="card-img-top company-logo" alt="Company Logo">
       <div class="card-body">
         <h5 class="card-title company-name"><a href="#" class="company-link">Company Name</a></h5>
         <div>
             <span class="company-phone"><i class="fa-solid fa-phone fontawe-icon"></i> 012 836 896 / 016 836 896</span><br>
             <span class="company-address"><small>Address</small></span>
         </div>
         <div class="company-rating">
           <i class="fa fa-star"></i>
           <i class="fa fa-star"></i>
           <i class="fa fa-star"></i>
           <i class="fa fa-star"></i>
           <i class="fa fa-star-o"></i>
         </div>
       </div>
     </div>
   </div>
   <!-- End Second company -->

   <!-- Third Company -->
   <div class="col mb-4">
     <div class="card h-100">
       <img src="https://s3-ap-southeast-1.amazonaws.com/yp-s3-dev/uploads/7/20220322020754/s_cool_logo_bw_small.png" class="card-img-top company-logo" alt="Company Logo">
       <div class="card-body">
         <h5 class="card-title company-name"><a href="#" class="company-link">Company Name</a></h5>
         <div>
             <span class="company-phone"><i class="fa-solid fa-phone fontawe-icon"></i> 012 836 896 / 016 836 896</span><br>
             <span class="company-address"><small>Address</small></span>
         </div>
         <div class="company-rating">
           <i class="fa fa-star"></i>
           <i class="fa fa-star"></i>
           <i class="fa fa-star"></i>
           <i class="fa fa-star"></i>
           <i class="fa fa-star-o"></i>
         </div>
       </div>
     </div>
   </div>
   <!-- End third company -->


   <!-- Add more company here -->
 </div>
</div>






@stop