@extends('layout.mastertwo')

@section('dyncontent')
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card shadow">
        <div class="card-body">
          <h5 class="card-title text-center mb-4">Login</h5>
          <form>
            <div class="mb-3">
              <label for="emailInput" class="form-label">Email address</label>
              <input type="email" class="form-control" id="emailInput" required>
            </div>
            <div class="mb-3">
              <label for="passwordInput" class="form-label">Password</label>
              <input type="password" class="form-control" id="passwordInput" required>
            </div>
            <div class="d-grid gap-2 mb-3">
              <button class="btn btn-primary" type="submit" name="loginAsUser">Login as User</button>
            </div>
            <div class="d-grid gap-2">
              <button class="btn btn-primary" type="submit" name="loginAsCompany">Login as Company</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@stop