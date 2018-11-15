<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
        <div class="row x_title"><div class="w3-padding"><h3><i class="fa fa-plus"></i> Add Service</h3></div></div>
        <fieldset>
            <div class="row" style=" margin-top: 5px;">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="" id="App" ng-app="serviceApp" ng-controller="serviceController">
                        <form id="add_ServiceForm" name="add_ServiceForm" method="post" role="form" enctype="multipart/form-data">
                            <div class="w3-col l12" id="service_err"></div>

                            <div class="w3-col l12 w3-margin-bottom">
                                <div class="col-lg-6 col-xs-12 col-sm-12" id="materialGrade">
                                    <label>Service Name <b class="w3-text-red w3-medium">*</b></label>
                                    <input type="text" name="service_name" ng-model="service_name" id="service_name"  class="form-control" placeholder="Service Name" value="" required>
                                </div>
                                <div class="col-lg-6 col-xs-12 col-sm-12 w3-margin-bottom">
                                    <label>Service Image <b class="w3-text-red w3-medium">*</b></label>
                                    <input type="file" name="serviceImage" id="serviceImage" value="" class="form-control">
                                    <input type="hidden" class="form-control w3-small" name="profile_imageEdit" id="profile_imageEdit" value="">
                                </div>
                            </div>

                            <div class="w3-col l12 w3-margin-bottom">
                                <div class="col-lg-6 col-xs-12 col-sm-12">
                                    <label>Service Description <b class="w3-text-red w3-medium">*</b></label>
                                    <textarea class="form-control" name="serviceDescription" id="serviceDescription" ng-model="serviceDescription" placeholder="Service Description" rows="6" cols="50" style="resize: none;"></textarea>
                                </div>
                                <div class="col-lg-6 col-xs-12 col-sm-12 w3-margin-bottom">
                                    <label>
                                        <img class="img img-thumbnail w3-margin-bottom" alt="Service Image" style="height: 100%; width: 100%; object-fit:contain; " align="right" id="serviceImagePreview" src="<?php echo base_url() ?>assets/images/default.png">
                                    </label>
                                </div>
                            </div>

                            <div class="w3-center" style="">
                                <button type="submit" title="add Service" id="btnsubmit" class="w3-medium w3-button theme_bg">Add Service</button>
                            </div>
                        </form>
                    </div>
                    <!-- REGISTER DIV ENDS -->   
                </div>
                <div class="col-lg-1" id="message"></div>
            </div>
        </fieldset>
    </div>
    <!-- /top tiles -->
</div>
<!-- /page content -->
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#serviceImagePreview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#serviceImage").change(function () {
        readURL(this);
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/module/addservice.js"></script>
