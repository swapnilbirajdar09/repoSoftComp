
// ------------POST form data to PHP controller--------------
$(function () {
    $("#editAdminProfileForm").submit(function () {
        $('#prof_form_message').html('');
        dataString = $("#editAdminProfileForm").serialize();
        // alert(dataString);
        // validate form fields
        $('#ofctypeerror').html('');
        if($('#officeType').val()=='0'){
          $('#ofctypeerror').html('<i class="fa fa-times"></i> ERROR: Please select appropriate Office Type!');
          return false;
        }

        $.ajax({
            type: "POST",
            url: BASE_URL + "admin/admin_profile/updateAdminDetails",
            data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
              beforeSend: function () {
                $("#editAdminProfileBtn").attr("disabled", true);
                $('#editAdminProfileBtn').html(' <i class="fa fa-circle-o-notch fa-spin w3-large"></i> Updating Admin details ... ');
            },
            success: function (data) {
                //$.alert(data);
                $('#prof_form_message').html(data);
                $('#editAdminProfileBtn').removeAttr("disabled");
                $('#editAdminProfileBtn').html('Save Changes');
            },
            error: function (data) {
                $('#editAdminProfileBtn').removeAttr("disabled");
                $('#prof_form_message').html('<p class="w3-text-white w3-red w3-padding-small"><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</p>');
                $('#editAdminProfileBtn').html('Save Changes');
                window.setTimeout(function () {
                    $(".message").fadeTo(500, 0).slideUp(500, function () {
                        $(this).remove();
                    });
                }, 5000);
            }
        });
        return false;  //stop the actual form post !important!
    });
});
// POST method to add admin details ends here--------------------------