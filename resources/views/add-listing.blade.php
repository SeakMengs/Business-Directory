@extends('layout.mastertwo')

@section('dyncontent')

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card mx-auto">
        <div class="card-header text-center">
          <h5>Create New Listing</h5> <!-- Card title -->
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="name" class="form-label">Company Name:</label> <!-- Label for the company name input field -->
                <input type="text" class="form-control" id="name"> <!-- Company name input field -->
              </div>
              <div class="form-group mb-2">
                <label for="phone" class="form-label">Phone:</label> <!-- Label for the phone input field -->
                <input type="text" class="form-control" id="phone"> <!-- Phone input field -->
              </div>
              <div class="form-group mb-2">
                <label for="email" class="form-label">Email:</label> <!-- Label for the email input field -->
                <input type="email" class="form-control" id="email"> <!-- Email input field -->
              </div>
              <div class="form-group mb-2">
                <label for="website" class="form-label">Website:</label> <!-- Label for the website input field -->
                <input type="text" class="form-control" id="website"> <!-- Website input field -->
              </div>
              <div class="form-group mb-2">
                <label for="logo" class="form-label">Logo:</label> <!-- Label for the logo file input field -->
                <input type="file" class="form-control" id="logo"> <!-- Logo file input field -->
              </div>
              <div class="form-group mb-2">
                <label for="galleries" class="form-label">Galleries:</label> <!-- Label for the galleries file input field -->
                <input type="file" class="form-control" id="galleries" multiple> <!-- Galleries file input field -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="address" class="form-label">Address:</label> <!-- Label for the address textarea field -->
                <textarea class="form-control" id="address" rows="3"></textarea> <!-- Address textarea field -->
              </div>
              <div class="form-group mb-2">
                <label for="description" class="form-label">Description:</label> <!-- Label for the description textarea field -->
                <textarea class="form-control" id="description" rows="5"></textarea> <!-- Description textarea field -->
              </div>
              <div class="form-group mb-2">
                <label for="services" class="form-label">Services:</label> <!-- Label for the services textarea field -->
                <textarea class="form-control" id="services" rows="5"></textarea> <!-- Services textarea field -->
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="button" class="btn btn-primary">Submit for Approval</button> <!-- Button to submit the form for approval -->
        </div>
      </div>
    </div>
  </div>
</div>






@stop

