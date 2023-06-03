@extends('layout.mastertwo')

@section('dyncontent')

    <div class="container my-5 custom-login-form">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Login for company</h5> <!-- Card title -->
                        <form action="{{ route('logging-in.company') }}" method="POST">
                            <!-- Start of the form -->
                            @csrf
                            <div class="mb-3">
                                <label for="emailInput" class="form-label">Email address</label>
                                <!-- Label for the email input field -->
                                <input type="email" name='email' class="form-control" id="emailInput" required>
                                <!-- Email input field -->
                            </div>
                            <div class="mb-3">
                                <label for="passwordInput" class="form-label">Password</label>
                                <!-- Label for the password input field -->
                                <input type="password" name="password" class="form-control" id="passwordInput" required>
                                <!-- Password input field -->
                            </div>
                            {{-- error style here --}}
                            @if ($errors->any())
                                <div class="">
                                    @foreach ($errors->all() as $error)
                                        <label>{{ $error }}</label>
                                    @endforeach
                                </div>
                            @endif
                            <div class="d-grid gap-2 mb-3">
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form> <!-- End of the form -->
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
