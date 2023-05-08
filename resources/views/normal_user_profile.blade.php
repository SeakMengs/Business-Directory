@extends('layout.master')

@section('dyncontent')

<div class="container py-5">
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
            <div class="form-group">
              <label for="location_details">Location Details</label>
              <textarea class="form-control" id="location_details" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary">Edit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
