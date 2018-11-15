$(function () {
    $("#add_ServiceForm").submit(function () {
        dataString = $("#add_ServiceForm").serialize();
        $('#btnsubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Adding Service. Hang on...</b></span>');
        $.ajax({
            type: "POST",
            url: BASE_URL + "admin/add_services/addServices",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data)
            {
                //alert(data);
                $('#service_err').html(data);
                $('#btnsubmit').html('<span>Add Service</span>');
            }
        });
        return false;  //stop the actual form post !important!

    });
});