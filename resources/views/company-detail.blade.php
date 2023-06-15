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
            @if (session('success'))
                <!-- Alert for success -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <!-- Success message -->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <!-- Button to close the alert -->
                </div>
            @elseif (session('error'))
                <!-- Alert for error -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                    <!-- Error message -->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <!-- Button to close the alert -->
                </div>
            @endif
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
                                    <address class="card-comdetail my-3">Address: {{ $company->street }},
                                        {{ $company->district }}, {{ $company->commune }} , {{ $company->city }}
                                    </address>
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
                                        <form style="display: contents"
                                            action="/category/{{ $categoryName }}/{{ $company->name }}/save"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $company->company_id }}" name="company_id">
                                            <button class="btn btn-primary me-md-2 mb-2" type="submit">
                                            <i class="fa-regular fa-bookmark fontawe-icontwo"></i> Save Company
                                            </button>
                                        </form>
                                        <button class="btn btn-primary me-md-2 mb-2" type="button" data-bs-toggle="modal"
                                            data-bs-target="#feedbackModal">
                                            <i class="fa-regular fa-comment fontawe-icontwo"></i>Give Feedback
                                        </button>
                                        <button class="btn btn-primary me-md-2 mb-2" type="button" data-bs-toggle="modal"
                                            data-bs-target="#reportModal">
                                            <i class="fa-regular fa-flag fontawe-icontwo"></i> Report Company
                                        </button>
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
                            <form id="feedbackForm"
                                action="/category/{{ $categoryName }}/{{ $companyName }}/feedback/post" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="hidden" value="{{ $company->company_id }}" name="company_id">
                                    <label for="feedback-message" class="form-label">Message</label>
                                    <textarea class="form-control" id="feedback-message" rows="5" required name="feedback"></textarea>
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
            <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- Modal title -->
                            <h5 class="modal-title" id="reportModalLabel">Report Company</h5>
                            <!-- Close button -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Report form -->
                            <form action="/category/{{ $categoryName }}/{{ $companyName }}/report/post" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input type="hidden" value="{{ $company->company_id }}" name="company_id">
                                    <label for="report-reason" class="form-label">Reason for report</label>
                                    <textarea class="form-control" id="report-reason" rows="5" required name="report"></textarea>
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
                                                <strong>{{ $feedback->normalUser->name }}:</strong>
                                                {{ $feedback->feedback }}
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

            {{-- Hidden form to post rating star --}}
            <form style="display: none" action="/category/{{ $categoryName }}/{{ $companyName }}/rate/post"
                method="POST">
                @csrf
                <input type="hidden" value="{{ $company->company_id }}" name="company_id">
                <input id="hidden-rate-input" type="hidden" name="rate_number">
                <button id="hidden-rate-submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        @else
            <span>No company found :(</span>
        @endif

    </div>


    <!-- Script for rating -->
    <script src="{{ asset('assets/js/company-detail.js') }}"></script>
    <script>
        var currentUserRateNumber = {{ $currentUserRateNumber ?? 0 }};
    </script>
    

@stop
