@extends('layout.mastertwo')

@section('dyncontent')

<!-- Sorya Code -->
<!-- <div class="container mt-4">
  <div class="row">
    
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          <h5>Company Details</h5>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a href="#">Company Profile</a>
            </li>
            <li class="list-group-item">
              <a href="#">Listings</a>
            </li>
            <li class="list-group-item">
              <a href="#">Add New Listings</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-9">
      <div class="card">
        <div class="card-header">
          <h5>Company Profile</h5>
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
                <input type="text" class="form-control" id="category" value="Automotive - Vehicles" readonly>
              </div>
              <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" value="012 345 678 / 016 836 896" readonly>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" value="cambodia@scoolfilm.com" readonly>
              </div>
              <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" class="form-control" id="website" value="www.scool-international.com" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" rows="3" readonly>No.901, Kampuchea Krom Blvd (128), Sangkat Teuk Laak II, Khan Toul Kork , 12156, Phnom Penh</textarea>
              </div>
              <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" rows="5" readonly>S-COOL is the world leading heat protection window film company with its head office in Singapore. Our proprietary products included Super Ceramic ATO window film, provides the best high heat protection and value for money. This is the result of dedications and efforts by our R&D team, whom founded the use of this special ceramic compound for maximum heat rejection. Our founders started marketing solar control window film since 2007, under the brand S-COOL Solar & Security Window Film.</textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br> -->


<!-- Test -->

<div class="container pb-5">
  <div class="row justify-content-center mt-5">
    <div class="col-md-8 col-lg-6">
      <!-- Company Profile -->
      <div class="card">
        <div class="card-header text-center">
          <h5>Company Account Information</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">  
                <label for="company_user_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="company_user_name" id="company_user_name" value="John Doe" readonly>
            </div>
            <div class="mb-3">
                <label for="company_user_email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="company_user_email" id="company_user_email" value="johndoe@example.com" readonly>
            </div>
            <div class="mb-3 text-center">
              <a href="/edit-company-account" class="btn btn-primary">Edit Account</a>
            </div>
        </div>
      </div>
      <!-- End Company Account Profile -->
      </div>
    </div>
  </div>
</div>



<!-- Testing -->
    <!-- <div class="container my-4">
      <h4 class="text-center">Manage your company profile and listings.</h4>

      <div class="row my-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5>Company Profile</h5>
              <p class="card-text">View and edit your company profile information.</p>
              <a href="#" class="btn btn-primary">Manage Profile</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5>Listings</h5>
              <p class="card-text">View and manage your company listings.</p>
              <a href="#" class="btn btn-primary">Manage Listings</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5>Add New Listing</h5>
              <p class="card-text">Create a new company listing.</p>
              <a href="#" class="btn btn-primary">Add Listing</a>
            </div>
          </div>
        </div>
      </div>

      
  </div> -->




@stop


<!-- Listing -->
<!-- <div class="row my-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Company Information</h5>
              <p class class="card-text">View and edit your company information.</p>
              <form>
                <div class="mb-3">
                  <label for="company-name" class="form-label">Company Name</label>
                  <input type="text" class="form-control" id="company-name" value="Your Company Name">
                </div>
                <div class="mb-3">
                  <label for="company-logo" class="form-label">Company Logo</label>
                  <input type="file" class="form-control" id="company-logo">
                </div>
                <div class="mb-3">
                  <label for="company-email" class="form-label">Email Address</label>
                  <input type="email" class="form-control" id="company-email" value="info@yourcompany.com">
                </div>
                <div class="mb-3">
                  <label for="company-address" class="form-label">Address</label>
                  <textarea class="form-control" id="company-address" rows="3">1234 Main St, Suite 200, Anytown, USA 12345</textarea>
                </div>
                <div class="mb-3">
                  <label for="company-website" class="form-label">Website</label>
                  <input type="url" class="form-control" id="company-website" value="https://www.yourcompany.com">
                </div>
                <div class="mb-3">
                  <label for="company-description" class="form-label">Description</label>
                  <textarea class="form-control" id="company-description" rows="5">We are a leading provider of quality products and services.</textarea>
                </div>
                <div class="mb-3">
                  <label for="company-services" class="form-label">Services</label>
                  <textarea class="form-control" id="company-services" rows="5">We offer a wide range of products and services to meet the needs of our customers.</textarea>
                </div>
                <div class="mb-3">
                  <label for="company-gallery" class="form-label">Gallery</label>
                  <input type="file" class="form-control" id="company-gallery" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </form>
            </div>
          </div>
        </div> -->