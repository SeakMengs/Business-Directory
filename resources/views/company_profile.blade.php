@extends('layout.master')

@section('dyncontent')

<div class="container-fluid mt-4">
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Company Details</h5>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a href="#">Company Profile</a>
            </li>
            <li class="list-group-item">
              <a href="#">Add Company</a>
            </li>
            <li class="list-group-item">
              <a href="#">Edit Company</a>
            </li>
            <li class="list-group-item">
              <a href="#">Delete Company</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Company Profile</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Company Name:</label>
                <input type="text" class="form-control" id="name" value="S-Cool Cambodia" readonly>
              </div>
              <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" class="form-control" id="category" value="Education" readonly>
              </div>
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" value="855-123-456" readonly>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" value="info@scool.com" readonly>
              </div>
              <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control" id="website" value="https://scool.com" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" rows="3" readonly>Street 123, Sangkat Phnom Penh Thmey, Khan Sen Sok, Phnom Penh, Cambodia</textarea>
              </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" rows="5" readonly>S-Cool Cambodia is a leading education institution in Cambodia that offers a wide range of courses and programs for students of all ages. Our mission is to provide quality education to help students achieve their full potential.</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

@endsection
