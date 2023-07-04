@extends('layout.master')

@section('dyncontent')

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
