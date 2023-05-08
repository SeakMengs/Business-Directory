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

    <!-- Start company detail overview -->
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
                            <p class="card-comdetail">Contact Number: 012 345 678 / 016 836 896</p>
                            <p class="card-comdetail">Email: cambodia@scoolfilm.com</p>
                            <p class="card-comdetail">Website: <a href="https://www.scool-international.com/" target="_blank">www.scool-international.com</a></p>
                            <div class="d-grid gap-2 d-md-block">
                                <button class="btn btn-primary me-md-2 mb-2" type="button">Save Company</button>
                                <button class="btn btn-primary me-md-2 mb-2" type="button">Report Company</button>
                                <!-- Feedback button -->
                                <button class="btn btn-primary me-md-2 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#feedbackModal">Give Feedback</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End company detail overview -->

    <!-- Feedback Modal -->
    <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="feedbackModalLabel">Provide Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="feedback-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="feedback-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="feedback-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="feedback-email" required>
                    </div>
                    <div class="mb-3">
                        <label for="feedback-message" class="form-label">Message</label>
                        <textarea class="form-control" id="feedback-message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

   <!-- The 3 tabs -->
   <div class="row mt-4">
        <div class="col-12 d-flex">
            <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active navbar-color" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link navbar-color" id="services-tab" data-bs-toggle="tab" data-bs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link navbar-color" id="gallaries-tab" data-bs-toggle="tab" data-bs-target="#gallaries" type="button" role="tab" aria-controls="gallaries" aria-selected="false">Gallaries</button>
            </li>
            </ul>
        </div>
        <div class="col-12">
            <div class="tab-content mt-3">
            <!-- Description Tab -->
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <p>S-COOL is the world leading heat protection window film company with its head office in Singapore. Our proprietary products included Super Ceramic ATO window film, provides the best high heat protection and value for money. This is the result of dedications and efforts by our R&D team, whom founded the use of this special ceramic compound for maximum heat rejection. Our founders started marketing solar control window film since 2007, under the brand S-COOL Solar & Security Window Film.</p>
            </div>
            <!-- End Description Tab -->

            <!-- Service Tab -->
            <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                <h5 class="mb-4">Our Services</h5>
                <ul>
                    <li>Building Energy Saving Film</li>
                    <li>Security Window Film</li>
                    <li>Roofing Insulation</li>
                    <li>Aircon Ducting/HVAC ducting</li>
                    <li>Auto Glass Coating</li>
                </ul>
                <p>We are committed to bringing the latest technology in cooling solutions and building efficiency to the Kingdom of Cambodia.</p>
                <p>We are the exclusive distributor of S-Cool, V-Kool, Cooltex & Kool Foil brands in Cambodia.</p>
            </div>
            <!-- End Serivce Tab -->

            <!-- Gallaries Tab -->
            <div class="tab-pane fade" id="gallaries" role="tabpanel" aria-labelledby="gallaries-tab">
                <h5 class="mb-4">Gallaries</h5>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    <!-- First image -->
                     <div class="col">
                        <div class="card">
                            <img src="https://s3-ap-southeast-1.amazonaws.com/yp-s3-dev/uploads/kh/gallery_images/original/2118249.jfif" class="card-img-top" alt="Gallery Image 1">
                        </div>
                    </div>

                    <!-- Second image -->
                    <div class="col">
                        <div class="card">
                            <img src="https://s3-ap-southeast-1.amazonaws.com/yp-s3-dev/uploads/kh/gallery_images/original/2027244.jfif" class="card-img-top" alt="Gallery Image 2">
                        </div>
                    </div>

                    <!-- Third image -->
                    <div class="col">
                        <div class="card">
                            <img src="https://s3-ap-southeast-1.amazonaws.com/yp-s3-dev/uploads/kh/gallery_images/original/2027250.jfif" class="card-img-top" alt="Gallery Image 3">
                        </div>
                    </div>

                    <!-- Fourth image -->
                    <div class="col">
                        <div class="card">
                            <img src="https://s3-ap-southeast-1.amazonaws.com/yp-s3-dev/uploads/kh/gallery_images/original/2027253.jfif" class="card-img-top" alt="Gallery Image 4">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Gallaries Tab -->

            </div>
        </div>
    </div>
    <!-- End the 3 tabs -->
    

</div>




@stop