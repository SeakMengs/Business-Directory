@extends('layout.mastertwo')

@section('dyncontent')

<div class="container pb-5">
  <div class="row justify-content-center mt-5">
    <div class="col-md-8 col-lg-6">
      <!-- Company Profile -->
      <div class="card">
        <div class="card-header text-center">
          <h5>Edit Company Account Information</h5>
        </div>
        <div class="card-body">
            <form method="POST">
              <div class="mb-3">  
                <label for="company_user_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="company_user_name" id="company_user_name" value="John Doe">
              </div>
              <div class="mb-3">
                <label for="company_user_email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="company_user_email" id="company_user_email" value="johndoe@example.com">
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="change_password">
                <label class="form-check-label" for="change_password">
                  Change Password
                </label>
              </div>
              <div id="password_fields" style="display: none;">
                <div class="mb-3">
                  <label for="company_user_old_password" class="form-label">Old Password</label>
                  <input type="password" class="form-control" name="company_user_old_password" id="company_user_old_password">
                </div>
                <div class="mb-3">
                  <label for="company_user_new_password" class="form-label">New Password</label>
                  <input type="password" class="form-control" name="company_user_new_password" id="company_user_new_password">
                </div>
              </div>
              <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
        </div>
      </div>
      <!-- End Company Account Profile -->
    </div>
  </div>
</div>


<script>
    $(document).ready(function() {
    $("#change_password").change(function() {
        if ($(this).is(":checked")) {
        $("#password_fields").show();
        } else {
        $("#password_fields").hide();
        }
    });
    });
</script>









@stop


