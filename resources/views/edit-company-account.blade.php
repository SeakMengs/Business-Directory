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
        @elseif ($errors->any())
            <!-- Alert for error -->
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ $errors->first() }}
                <!-- Error message -->
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <!-- Button to close the alert -->
            </div>
        @endif

        <div class="container pb-5 custom-listing-form">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8 col-lg-6">
                    <!-- Company Profile -->
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>Edit Company Account Information</h5>
                        </div>
                        <div class="card-body">
                            <form
                                action="{{ route('user.company.name.id.profile.edit.save', [
                                    'name' => Auth::guard('companyUser')->user()->name,
                                    'id' => Auth::guard('companyUser')->user()->company_user_id,
                                ]) }}"
                                method="POST">
                                @csrf
                                <!-- Name field -->
                                <div class="mb-3">
                                    <label for="company_user_name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="company_user_name"
                                        value={{ $user->name }}>
                                </div>
                                <!-- Email field -->
                                <div class="mb-3">
                                    <label for="company_user_email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="company_user_email"
                                        value={{ $user->email }}>
                                </div>
                                <!-- Change Password checkbox -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="change_password"
                                        id="change_password">
                                    <label class="form-check-label" for="change_password">
                                        Change Password
                                    </label>
                                </div>
                                <!-- Password fields (hidden by default) -->
                                <div id="password_fields" style="display: none;">
                                    <!-- Old Password field -->
                                    <div class="mb-3">
                                        <label for="company_user_old_password" class="form-label">Old Password</label>
                                        <input type="password" class="form-control" name="old_password"
                                            id="company_user_old_password">
                                    </div>
                                    <!-- New Password field -->
                                    <div class="mb-3">
                                        <label for="company_user_new_password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="new_password"
                                            id="company_user_new_password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="company_user_new_password_confirm" class="form-label">Confirm New
                                            Password</label>
                                        <input type="password" class="form-control" name="new_password_confirmation"
                                            id="company_user_new_password_confirm">
                                    </div>
                                </div>
                                <!-- Save Changes button -->
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>

                                @if ($errors->any())
                                    <div class="error-message">
                                        <ul class="error-list">
                                            @foreach ($errors->all() as $error)
                                                <!-- <li>{{ $error }}</li> -->
                                                <li><i class="fas fa-exclamation-circle error-icon"></i>{{ $error }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                    <!-- End Company Account Profile -->

                </div>
            </div>
        </div>
    @else
        <span class="text-danger">User not found!</span>
    @endif

    <!-- Include the JavaScript file -->
    <script src="{{ asset('assets/js/edit-company-account.js') }}"></script>

@stop
