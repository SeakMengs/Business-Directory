@extends('layout.master')

@section('dyncontent')

    <!-- Sorya Code -->
    <!-- <div class="container py-5">
                                                  <div class="row justify-content-center">
                                                    <div class="col-md-8">
                                                      <div class="card">
                                                        <div class="card-header">
                                                          <h4>Profile Information</h4>
                                                        </div>
                                                        <div class="card-body">
                                                          <form>
                                                            <div class="form-group">
                                                              <label for="full_name">Full Name</label>
                                                              <input type="text" class="form-control" id="full_name" placeholder="Enter Full Name">
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="email">Email Address</label>
                                                              <input type="email" class="form-control" id="email" placeholder="Enter Email Address">
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="contact">Contact Number</label>
                                                              <input type="text" class="form-control" id="contact" placeholder="Enter Contact Number">
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="province">Province</label>
                                                              <select class="form-control" id="province">
                                                                <option>Please Select a Province</option>
                                                                <option>Province 1</option>
                                                                <option>Province 2</option>
                                                                <option>Province 3</option>
                                                              </select>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="district">District</label>
                                                              <select class="form-control" id="district">
                                                                <option>Please Select a District</option>
                                                                <option>District 1</option>
                                                                <option>District 2</option>
                                                                <option>District 3</option>
                                                              </select>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="commune">Commune</label>
                                                              <select class="form-control" id="commune">
                                                                <option>Please Select a Commune</option>
                                                                <option>Commune 1</option>
                                                                <option>Commune 2</option>
                                                                <option>Commune 3</option>
                                                              </select>
                                                            </div>
                                                            <div class="form-group">
                                                              <label for="village">Village</label>
                                                              <select class="form-control" id="village">
                                                                <option>Please Select a Village</option>
                                                                <option>Village 1</option>
                                                                <option>Village 2</option>
                                                                <option>Village 3</option>
                                                              </select>
                                                            </div>
                                                            <div class="form-group pb-3">
                                                              <label for="location_details">Location Details</label>
                                                              <textarea class="form-control" id="location_details" rows="3"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                            <button type="button" class="btn btn-success">Edit</button>
                                                          </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div> -->

    <!-- First V -->
    <!-- <div class="container py-5">
                                                      <h2 class="header-align pb-3">User Profile</h2>
                                                        Saved Companies
                                                        <div class="row mt-4">
                                                          <div class="col">
                                                            <h4>Saved Companies</h4>
                                                            <div class="card-deck">
                                                              <div class="card">
                                                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Company Logo"/>
                                                                <div class="card-body">
                                                                  <h5 class="card-title">Company Name</h5>
                                                                  <p class="card-text">
                                                                    Brief description of the company.
                                                                  </p>
                                                                  <a href="#" class="btn btn-primary">View Company</a>
                                                                </div>
                                                              </div>
                                                              Add more cards here for each saved company
                                                            </div>
                                                          </div>
                                                        </div>
                                                        Edit Personal Information
                                                        <div class="row mt-4">
                                                          <div class="col">
                                                            <h4>Edit Personal Information</h4>
                                                            <form>
                                                              <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input type="text" class="form-control" id="name" value="John Doe"/>
                                                              </div>
                                                              <div class="mb-3">
                                                                <label for="email" class="form-label">Email address</label>
                                                                <input type="email" class="form-control" id="email" value="johndoe@example.com"/>
                                                              </div>
                                                              <div class="mb-3">
                                                                <label for="password" class="form-label">Password</label>
                                                                <input type="password" class="form-control" id="password" value="********"/>
                                                              </div>
                                                              <button type="submit" class="btn btn-primary">Save Changes</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div> -->
    <!-- End First V -->


    <!-- Second V -->
    @if ($user)
        @if (session('success'))
            <!-- Alert for success -->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <!-- Success message -->
                <button type="button" class="btn-close alert-success" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <!-- User Profile -->
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>Normal User Account Information</h5>
                        </div>
                        <div class="card-body">
                            <!-- Name field -->
                            <div class="mb-3">
                                <label for="normal_user_name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="normal_user_name" id="normal_user_name"
                                    value="{{ $user->name }}" readonly>
                            </div>
                            <!-- Email field -->
                            <div class="mb-3">
                                <label for="normal_user_email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="normal_user_email"
                                    id="normal_user_email" value="{{ $user->email }}" readonly>
                            </div>
                            <!-- Edit Account button -->
                            <div class="mb-3 text-center">
                                <a href="/user/normal/{{ Auth::guard('normalUser')->user()->name }}/{{ Auth::guard('normalUser')->user()->normal_user_id }}/profile/edit"
                                    class="btn btn-primary">Edit Account</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile -->


                    <!-- Saved Companies -->
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <h5>Saved Companies</h5>
                        </div>
                        <div class="card-body">
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                <!-- First saved company -->
                                @if (count($user->savedCompanies) >= 1)
                                    @foreach ($user->savedCompanies as $savedCompany)
                                        @if (isset($savedCompany->company))
                                            <div class="col">
                                                <div class="card h-100">
                                                    <a
                                                        href="/category/{{ $savedCompany->company->category->name }}/{{ $savedCompany->company->name }}">
                                                        <!-- Company logo -->
                                                        <img src="{{ $savedCompany->company->logo }}"
                                                            class="card-img-top company-logo" alt="Company Logo">
                                                    </a>
                                                    <div class="card-body">
                                                        <!-- Company name -->
                                                        {{-- <h5 class="card-title">{{ $savedCompany->company->name }}</h5> --}}
                                                        <h5 class="card-title company-name"><a
                                                                href="/category/{{ $savedCompany->company->category->name }}/{{ $savedCompany->company->name }}"
                                                                class="company-link">{{ $savedCompany->company->name }}</a>
                                                        </h5>
                                                    </div>
                                                    <div class="card-footer">
                                                        <!-- Remove button -->
                                                        <form
                                                            action="/user/normal/{{ $user->name }}/{{ $user->normal_user_id }}/remove-saved-company?company_id={{ $savedCompany->company->company_id }}"
                                                            method="POST">
                                                            @csrf
                                                            <button class="btn btn-danger btn-remove"
                                                                type="submit">Remove</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- @else --}}
                                            {{-- <span class="text-danger">No company found</span> --}}
                                        @endif
                                    @endforeach
                                @else
                                    <span class="text-danger">No saved companies</span>
                                @endif
                                {{-- end --}}
                            </div>
                        </div>
                    </div>
                    <!-- End Saved Companies -->

                </div>
            </div>
        </div>
    @else
        <span class="text-danger">No user found</span>
    @endif
@stop
