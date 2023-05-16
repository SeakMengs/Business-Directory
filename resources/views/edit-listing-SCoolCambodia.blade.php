@extends('layout.mastertwo')

@section('dyncontent')

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card mx-auto">
        <div class="card-header text-center">
          <h5>Edit Listing</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
               <!-- Company Name field -->
              <div class="form-group mb-2">
                <label for="name" class="form-label">Company Name:</label>
                <input type="text" class="form-control" id="name" value="S-Cool Cambodia">
              </div>
               <!-- Phone field -->
              <div class="form-group mb-2">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" class="form-control" id="phone" value="012 345 678 / 016 836 896">
              </div>
               <!-- Email field -->
              <div class="form-group mb-2">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" value="cambodia@scoolfilm.com">
              </div>
               <!-- Website field -->
              <div class="form-group mb-2">
                <label for="website" class="form-label">Website:</label>
                <input type="text" class="form-control" id="website" value="www.scool-international.com">
              </div>
              <!-- Logo field -->
              <div class="form-group mb-2">
                <label for="logo" class="form-label">Logo:</label>
                <input type="file" class="form-control" id="logo">
              </div>
               <!-- Galleries field -->
              <div class="form-group mb-2">
                <label for="galleries" class="form-label">Galleries:</label>
                <input type="file" class="form-control" id="galleries" multiple>
              </div>
            </div>
            <div class="col-md-6">
              <!-- Address field -->
              <div class="form-group mb-2">
                <label for="address" class="form-label">Address:</label>
                <textarea class="form-control" id="address" rows="3">No.901, Kampuchea Krom Blvd (128), Sangkat Teuk Laak II, Khan Toul Kork , 12156, Phnom Penh</textarea>
              </div>
              <!-- Description field -->
              <div class="form-group mb-2">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" rows="5">S-COOL is the world leading heat protection window film company with its head office in Singapore. Our proprietary products included Super Ceramic ATO window film, provides the best high heat protection and value for money. This is the result of dedications and efforts by our R&D team, whom founded the use of this special ceramic compound for maximum heat rejection. Our founders started marketing solar control window film since 2007, under the brand S-COOL Solar & Security Window Film.</textarea>
              </div>
              <!-- Services field -->
              <div class="form-group mb-2">
                <label for="services" class="form-label">Services:</label>
                <textarea class="form-control" id="services" rows="5">Building Energy Saving Film, Security Window Film, Roofing Insulation, Aircon Ducting/HVAC ducting, and Auto Glass Coating.</textarea>
              </div>
            </div>
          </div>
        </div>
        <!-- Save Changes button -->
        <div class="card-footer text-center">
          <button type="button" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

