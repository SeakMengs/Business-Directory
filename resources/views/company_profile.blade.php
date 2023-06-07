@extends('layout.master')

@section('dyncontent')

    <!-- Sorya Code -->
    <!-- <div class="container mt-4">
                      <div class="row">

                        <div class="col-md-3">
                          <div class="card">
                            <div class="card-header">
                              <h5>Company Details</h5>
                            </div>
                            <div class="card-body">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                  <a href="#">Company Profile</a>
                                </li>
                                <li class="list-group-item">
                                  <a href="#">Listings</a>
                                </li>
                                <li class="list-group-item">
                                  <a href="#">Add New Listings</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-9">
                          <div class="card">
                            <div class="card-header">
                              <h5>Company Profile</h5>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="name">Company Name:</label>
                                    <input type="text" class="form-control" id="name" value="S-Cool Cambodia" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="category">Category:</label>
                                    <input type="text" class="form-control" id="category" value="Automotive - Vehicles" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" id="phone" value="012 345 678 / 016 836 896" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" value="cambodia@scoolfilm.com" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="website">Website:</label>
                                    <input type="text" class="form-control" id="website" value="www.scool-international.com" readonly>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="address">Address:</label>
                                    <textarea class="form-control" id="address" rows="3" readonly>No.901, Kampuchea Krom Blvd (128), Sangkat Teuk Laak II, Khan Toul Kork , 12156, Phnom Penh</textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description" rows="5" readonly>S-COOL is the world leading heat protection window film company with its head office in Singapore. Our proprietary products included Super Ceramic ATO window film, provides the best high heat protection and value for money. This is the result of dedications and efforts by our R&D team, whom founded the use of this special ceramic compound for maximum heat rejection. Our founders started marketing solar control window film since 2007, under the brand S-COOL Solar & Security Window Film.</textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br> -->
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

    <div class="container pb-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 col-lg-6">
                <!-- Company Profile -->
                <div class="card">
                    <div class="card-header text-center">
                        <!-- Card header title -->
                        <h5>Company User Account Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="company_user_name" class="form-label">Name</label>
                            <!-- Input field for company user name -->
                            <input type="text" class="form-control" name="company_user_name" id="company_user_name"
                                value="{{ $userData->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="company_user_email" class="form-label">Email address</label>
                            <!-- Input field for company user email -->
                            <input type="email" class="form-control" name="company_user_email" id="company_user_email"
                                value="{{ $userData->email }}" readonly>
                        </div>
                        <div class="mb-3 text-center">
                            <!-- Edit account button -->
                            <a href="/user/company/{{ $userData->name }}/{{ $userData->company_user_id }}/profile/edit"
                                class="btn btn-primary">Edit Account</a>
                        </div>
                    </div>
                </div>
                <!-- End Company Account Profile -->

                <!-- Company Listings -->
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <!-- Card header title -->
                        <h5>Business Listings</h5>
                    </div>
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach ($userData->companies as $company)
                                <div class="col">
                                    <div class="card h-100">
                                        <img src="{{ $company->logo }}" class="card-img-top company-logo"
                                            alt="Company Logo">
                                        <div class="card-body">
                                            <h5 class="card-title"> {{ $company->name }}</h5>
                                        </div>
                                        <div class="card-footer">
                                            <!-- Edit listing button for S-Cool Cambodia -->
                                            <a href="/user/company/{{ $userData->name }}/{{ $userData->company_user_id }}/edit-company?company_id={{ $company->company_id }}"
                                                class="btn btn-danger btn-remove" type="button">Edit</a>
                                            <!-- Remove listing button for S-Cool Cambodia -->
                                            <a href="/user/company/{{ $userData->name }}/{{ $userData->company_user_id }}/remove-company?company_id={{ $company->company_id }}" class="btn btn-danger btn-remove" type="button">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add new listing button -->
                        <div class="text-center mt-4">
                            <a href="/user/company/{{ Auth::guard('companyUser')->user()->name }}/{{ Auth::guard('companyUser')->user()->company_user_id }}/add-company"
                                class="btn btn-success">Create New Listing</a>
                        </div>
                    </div>
                </div>
                <!-- End company listings -->

            </div>
        </div>
    </div>
    </div>
@stop
