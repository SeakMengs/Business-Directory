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