@extends('layout.mastertwo')

@section('dyncontent')

    <div class="container my-5 custom-login-form">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Sign-up for regular account</h5> <!-- Card title -->
                        <form action="{{ route('register.user') }}" method="POST">
                            @csrf
                            <!-- Start of the form -->
                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Name</label>
                                <!-- Label for the name input field -->
                                <input type="text" name='name' class="form-control" id="nameInput" required>
                                <!-- Name input field -->
                            </div>
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email address</label>
                                <!-- Label for the email input field -->
                                <input type="email" name='email' class="form-control" id="emailInput" required>
                                <!-- Email input field -->
                            </div>
                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Password</label>
                                <!-- Label for the password input field -->
                                <input type="password" name='password' class="form-control" id="passwordInput" required>
                                <!-- Password input field -->
                            </div>
                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Confirm Password</label>
                                <!-- Label for the password input field -->
                                <input type="password" name='password_confirmation' class="form-control" id="passwordInput"
                                    required> <!-- Password input field -->
                            </div>
                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-primary" type="submit">Sign Up</button>
                                <!-- Button for company signup -->
                            </div>
                        </form> <!-- End of the form -->
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
