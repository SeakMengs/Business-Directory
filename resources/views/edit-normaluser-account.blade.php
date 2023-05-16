@extends('layout.mastertwo')

@section('dyncontent')

<div class="container pb-5">
  <div class="row justify-content-center mt-5">
    <div class="col-md-8 col-lg-6">
      <!-- Normal User Profile -->
      <div class="card">
        <div class="card-header text-center">
          <h5>Edit Normal User Account Information</h5>
        </div>
        <div class="card-body">
          <form method="POST">
            <!-- Name field -->
            <div class="mb-3">  
              <label for="normal_user_name" class="form-label">Name</label>
              <input type="text" class="form-control" name="normal_user_name" id="normal_user_name" value="Hello World">
            </div>
            <!-- Email field -->
            <div class="mb-3">
              <label for="normal_user_email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="normal_user_email" id="normal_user_email" value="helloworld@gmail.com">
            </div>
            <!-- Change Password checkbox -->
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="" id="change_password">
              <label class="form-check-label" for="change_password">
                Change Password
              </label>
            </div>
            <!-- Password fields (hidden by default) -->
            <div id="password_fields" style="display: none;">
              <!-- Old Password field -->
              <div class="mb-3">
                <label for="normal_user_old_password" class="form-label">Old Password</label>
                <input type="password" class="form-control" name="normal_user_old_password" id="normal_user_old_password">
              </div>
              <!-- New Password field -->
              <div class="mb-3">
                <label for="normal_user_new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" name="normal_user_new_password" id="normal_user_new_password">
              </div>
            </div>
            <!-- Save Changes button -->
            <div class="mb-3 text-center">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
      <!-- End Normal User Account Profile -->

    </div>
  </div>
</div>


<script>
  // Execute the code when the document is ready
  $(document).ready(function() {
    // Attach a change event listener to the element with ID "change_password"
    $("#change_password").change(function() {
      // Check if the checkbox is checked
      if ($(this).is(":checked")) {
        // Show the password fields
        $("#password_fields").show();
      } else {
        // Hide the password fields
        $("#password_fields").hide();
      }
    });
  });
</script>




@stop


