@extends('layout.master')

@section('dyncontent')

    <div class="container py-3">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li> <!-- Home breadcrumb link -->
                <li class="breadcrumb-item"><a href="/category">Category</a></li> <!-- Category breadcrumb link -->
                <li class="breadcrumb-item"><a href="/category/{{ $categoryName }}">{{ $categoryName }}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a
                        href="/category/{{ $categoryName }}/{{ $companyName }}">{{ $companyName }}</a></li>
            </ol>
        </nav>
        <!-- End Breadcrumbs -->
        @if ($company)
            <!-- Start company detail overview -->
            <div class="row">
                <div class="col-12">
                    <div class="card-comdetail card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <!-- Company logo -->
                                    <img src="{{ $company->logo }}" class="img-fluid card-image-comdetail"
                                        alt="Company Logo">
                                </div>

                                <div class="col-md-8 position-relative">
                                    <!-- Company name -->
                                    <h3 class="card-title-comdetail mb-0">{{ $company->name }}</h3>
                                    <!-- Company address -->
                                    {{-- <p class="card-comdetail my-3">No.901, Kampuchea Krom Blvd (128), Sangkat Teuk Laak II,
                                        Khan
                                        Toul Kork , 12156, Phnom Penh</p> --}}
                                        <address class="card-comdetail my-3">Address: {{ $company->street}}, {{ $company->district}}, {{ $company->commune}} , {{ $company->city }}</address>
                                    <!-- Contact details -->
                                    @if (count($company->contacts) >= 1)
                                        @foreach ($company->contacts as $contact)
                                            <p class="card-comdetail">Contact Number: 0{{ $contact->phone_number }} </p>
                                        @endforeach
                                    @else
                                        <span>This company does not have contact number</span>
                                    @endif
                                    <p class="card-comdetail">Email: {{ $company->email }}</p>
                                    <p class="card-comdetail">Website: <a href="{{ $company->website }}"
                                            target="_blank">{{ $company->website }}</a></p>
                                    <!-- Action buttons -->
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-primary me-md-2 mb-2" type="button">Save Company</button>
                                        <button class="btn btn-primary me-md-2 mb-2" type="button" data-bs-toggle="modal"
                                            data-bs-target="#feedbackModal">Give Feedback</button>
                                        <button class="btn btn-primary me-md-2 mb-2" type="button" data-bs-toggle="modal"
                                            data-bs-target="#reportModal">Report Company</button>
                                    </div>
                                    <!-- Star rating -->
                                    <!-- <div class="position-absolute bottom-0 end-0">
                                                            <div class="star-rating" id="star-rating"></div>
                                                        </div> -->

                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <!-- Overall rating -->
                                        <div class="average-rating">
                                            <span class="text-muted">Average Rating:</span>
                                            <span class="rating-value">{{ round($company->avg_star_rate) }}</span>
                                            <!-- Replace with actual overall rating -->
                                            <span class="text-muted">out of 5</span>
                                        </div>
                                        <!-- Star rating -->
                                        <div class="star-rating" id="star-rating"></div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End company detail overview -->

            <!-- Feedback Modal -->
            <div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- Modal title -->
                            <h5 class="modal-title" id="feedbackModalLabel">Provide Feedback</h5>
                            <!-- Close button -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Feedback form -->
                            <form id="feedbackForm">
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
            <!-- End feedback modal -->


            <!-- Report Modal -->
            <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- Modal title -->
                            <h5 class="modal-title" id="reportModalLabel">Report Company</h5>
                            <!-- Close button -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Report form -->
                            <form>
                                <div class="mb-3">
                                    <label for="report-reason" class="form-label">Reason for report</label>
                                    <textarea class="form-control" id="report-reason" rows="5" required></textarea>
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
            <!-- End report modal -->

            <!-- The 3 tabs -->
            <div class="row mt-4">
                <div class="col-12 d-flex">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <!-- Description tab button -->
                            <button class="nav-link active navbar-color" id="description-tab" data-bs-toggle="tab"
                                data-bs-target="#description" type="button" role="tab" aria-controls="description"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <!-- Services tab button -->
                            <button class="nav-link navbar-color" id="services-tab" data-bs-toggle="tab"
                                data-bs-target="#services" type="button" role="tab" aria-controls="services"
                                aria-selected="false">Services</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <!-- Galleries tab button -->
                            <button class="nav-link navbar-color" id="galleries-tab" data-bs-toggle="tab"
                                data-bs-target="#galleries" type="button" role="tab" aria-controls="galleries"
                                aria-selected="false">Galleries</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <!-- Feedback tab button -->
                            <button class="nav-link navbar-color" id="feedback-tab" data-bs-toggle="tab"
                                data-bs-target="#feedback" type="button" role="tab" aria-controls="feedback"
                                aria-selected="false">Feedback</button>
                        </li>
                    </ul>
                </div>

                <div class="col-12">
                    <div class="tab-content mt-3">
                        <!-- Description Tab -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            <p>{{ $company->description }}</p>
                        </div>
                        <!-- End Description Tab -->

                        <!-- Service Tab -->
                        <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                            <h5 class="mb-4">Our Services</h5>
                            @if (count($company->services) >= 1)
                                <ul>
                                </ul>
                                @foreach ($company->services as $service)
                                    <li>{{ $service->name }}</li>
                                @endforeach
                            @else
                                <p>No services available</p>
                            @endif
                        </div>
                        <!-- End Service Tab -->

                        <!-- Galleries Tab -->
                        <div class="tab-pane fade" id="galleries" role="tabpanel" aria-labelledby="galleries-tab">
                            <h5 class="mb-4">Galleries</h5>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                                <!-- Gallery images -->
                                @if (count($company->galleries) >= 1)
                                    @foreach ($company->galleries as $gallery)
                                        <div class="col">
                                            <div class="card">
                                                <img src="{{ $gallery->photo_url }}" class="card-img-top"
                                                    alt="Gallery Image 1">
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No galleries available</p>
                                @endif
                            </div>
                        </div>
                        <!-- End Galleries Tab -->

                        <!-- Feedback Tab -->
                        <div class="tab-pane fade" id="feedback" role="tabpanel" aria-labelledby="feedback-tab">
                            <h5 class="mb-4">Feedback</h5>
                            @if (count($company->feedbacks) >= 1)
                            <ul class="list-group">
                                @foreach ($company->feedbacks as $feedback)
                                    <li class="list-group-item">
                                        {{-- https://stackoverflow.com/questions/47005539/strange-thing-in-laravel-where-on-dd-its-ok-without-its-not-an-object --}}
                                        @if (isset($feedback->normalUser->name))
                                            <strong>{{$feedback->normalUser->name}}:</strong> {{$feedback->feedback}}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                            @else
                                <p>No feedbacks available</p>
                            @endif
                        </div>
                        <!-- End Feedback Tab -->
                    </div>
                </div>
            </div>
            <!-- End the 3 tabs -->
        @else
            <span>No company found :(</span>
        @endif

    </div>


    <!-- Script for rating -->
    <script>
        // Select the rating container element
        const ratingContainer = document.querySelector("#star-rating");

        // Loop to create five star elements
        for (let i = 0; i < 5; i++) {
            const star = document.createElement("span");
            star.classList.add("fa", "fa-star", "unchecked");
            star.dataset.rating = i + 1;
            ratingContainer.appendChild(star);
        }

        // Event listener for mouseover event
        ratingContainer.addEventListener("mouseover", event => {
            const rating = event.target.dataset.rating;
            if (rating) {
                // Iterate over all stars and update their classes based on the rating
                ratingContainer.querySelectorAll("span").forEach(star => {
                    if (star.dataset.rating <= rating) {
                        star.classList.remove("unchecked");
                        star.classList.add("checked");
                    } else {
                        star.classList.remove("checked");
                        star.classList.add("unchecked");
                    }
                });
            }
        });

        // Event listener for mouseout event
        ratingContainer.addEventListener("mouseout", event => {
            // Reset all star classes to unchecked
            ratingContainer.querySelectorAll("span").forEach(star => {
                star.classList.remove("checked");
                star.classList.add("unchecked");
            });
        });
    </script>




@stop
