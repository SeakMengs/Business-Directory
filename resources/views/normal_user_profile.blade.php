@extends('layout.mastertwo')

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

<div class="container py-5">
      <h1>User Profile</h1>
      <!-- Saved Companies -->
      <div class="row mt-4">
        <div class="col">
          <h2>Saved Companies</h2>
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
            <!-- Add more cards here for each saved company -->
          </div>
        </div>
      </div>
      <!-- Edit Personal Information -->
      <div class="row mt-4">
        <div class="col">
          <h2>Edit Personal Information</h2>
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
    </div>

@stop
