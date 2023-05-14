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

  <div class="container pb-5">
  <div class="row justify-content-center mt-5">
    <div class="col-md-8 col-lg-6">
      <!-- User Profile -->
      <div class="card">
        <div class="card-header text-center">
          <h5>User Profile</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">  
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Hello World" value="Hello World">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" value="helloworld@gmail.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="********" value="password123">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary btn-edit" type="submit">Edit</button>
            </div>
        </div>
      </div>

      <!-- Saved Companies -->
      <div class="card mt-5">
        <div class="card-header text-center">
          <h5>Saved Companies</h5>
        </div>
        <div class="card-body">
          <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
              <div class="card h-100">
                <img src="https://s3-ap-southeast-1.amazonaws.com/yp-s3-dev/uploads/7/20220322020754/s_cool_logo_bw_small.png" class="card-img-top company-logo" alt="Company Logo">
                <div class="card-body">
                  <h5 class="card-title">S-Cool Cambodia</h5>
                  <!-- <button class="btn btn-danger btn-remove" type="button">Remove</button> -->
                </div>
                <div class="card-footer">
                  <button class="btn btn-danger btn-remove" type="button">Remove</button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100">
                <img src="https://s3-ap-southeast-1.amazonaws.com/yp-s3-dev/uploads/kh/logo_images/original/1501462.jfif" class="card-img-top company-logo" alt="Company Logo">
                <div class="card-body">
                  <h5 class="card-title">Heng Seng International Marketing Co., Ltd.</h5>
                  <!-- <button class="btn btn-danger btn-remove" type="button">Remove</button> -->
                </div>
                <div class="card-footer">
                  <button class="btn btn-danger btn-remove" type="button">Remove</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
