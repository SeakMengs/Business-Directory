@extends('layout.mastertwo')

@section('dyncontent')

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card mx-auto">
        <div class="card-header text-center">
          <h5>Create New Listing</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="name" class="form-label">Company Name:</label>
                <input type="text" class="form-control" id="name">
              </div>
              <div class="form-group mb-2">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group mb-2">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email">
              </div>
              <div class="form-group mb-2">
                <label for="website" class="form-label">Website:</label>
                <input type="text" class="form-control" id="website">
              </div>
              <div class="form-group mb-2">
                <label for="logo" class="form-label">Logo:</label>
                <input type="file" class="form-control" id="logo">
              </div>
              <div class="form-group mb-2">
                <label for="galleries" class="form-label">Galleries:</label>
                <input type="file" class="form-control" id="galleries" multiple>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group mb-2">
                <label for="address" class="form-label">Address:</label>
                <textarea class="form-control" id="address" rows="3"></textarea>
              </div>
              <div class="form-group mb-2">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" rows="5"></textarea>
              </div>
              <div class="form-group mb-2">
                <label for="services" class="form-label">Services:</label>
                <textarea class="form-control" id="services" rows="5"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="button" class="btn btn-primary">Submit for Approval</button>
        </div>
      </div>
    </div>
  </div>
</div>





@stop

