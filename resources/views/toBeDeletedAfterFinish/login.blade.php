@extends('layout.mastertwo')

@section('dyncontent')

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow">
        <div class="card-body">
          <h5 class="card-title text-center mb-4">Login</h5> <!-- Card title -->
          <form> <!-- Start of the form -->
            <div class="mb-3">
              <label for="emailInput" class="form-label">Email address</label> <!-- Label for the email input field -->
              <input type="email" class="form-control" id="emailInput" required> <!-- Email input field -->
            </div>
            <div class="mb-3">
              <label for="passwordInput" class="form-label">Password</label> <!-- Label for the password input field -->
              <input type="password" class="form-control" id="passwordInput" required> <!-- Password input field -->
            </div>
            <div class="d-grid gap-2 mb-3">
              <button class="btn btn-primary" type="submit" name="loginAsUser">Login as User</button> <!-- Button for user login -->
            </div>
            <div class="d-grid gap-2">
              <button class="btn btn-primary" type="submit" name="loginAsCompany">Login as Company</button> <!-- Button for company login -->
            </div>
          </form> <!-- End of the form -->
        </div>
      </div>
    </div>
  </div>
</div>


@stop