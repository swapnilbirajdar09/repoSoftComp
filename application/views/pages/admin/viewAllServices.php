<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->

    <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;" >
        <div id="err_message"></div>
        <div class="row x_title">
            <div class="w3-padding">
                <h3><i class="fa fa-cubes"></i> All Services</h3>
            </div>
        </div>
        <div class="container x_title" style=" margin-top: 5px;">

            <table id="datatable" class="table">
                <thead>
                    <tr class="theme_bg">
                        <th class="w3-center"><span>Sr No</span></th>
                        <th class="w3-center"><span>Service Image</span></th>
                        <th class="w3-center"><span>Service Name</span></th>
                        <th class="w3-center"><span>Service Description</span></th>                        
                        <th class="w3-center"><span>Action</span></th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php
                    $color = '';
                    $alt = '';
                    if ($services != '' && $services != '500') {
                        $count = 1;
                        foreach ($services as $key) {
                            ?>
                            <tr>
                                <td class="w3-center"><?php echo $count; ?></td>
                                <td class="text-center">                  
                                    <img src="<?php echo base_url(); ?><?php echo $key['service_image']; ?>" onerror="this.src='<?php echo base_url(); ?>assets/images/default.png'" alt="<?php echo $key['service_name']; ?> image" class="img img-thumbnail w3-center" style="width: 100px;height: 100px">                                
                                </td>
                                <td class="w3-center" style="vertical-align: middle;">
                                    <span class=""><b><?php echo $key['service_name']; ?></b></span>
                                </td>
                                <td class="w3-center" width="180px" style="vertical-align: middle;">
                                    <p><?php echo $key['service_description']; ?></p>
                                </td>

                                <td class="w3-center" style="vertical-align: middle;">
                                    <div class="btn-group">
                                        <a class="btn w3-padding-small" data-toggle="modal" data-target="#updateServiceModal_<?php echo $key['service_id']; ?>" title="Update Service Details">
                                            <i class="w3-text-green w3-xlarge fa fa-edit"></i>
                                        </a>                   
                                        <a class="btn w3-padding-small" onclick="deleteServiceDetails(<?php echo $key['service_id']; ?>)" title="Delete Service">
                                            <i class="w3-text-red w3-xlarge fa fa-close"></i>
                                        </a>
                                        <?php
                                        $color = 'w3-text-black';
                                        $alt = 'Make This Service Featured.';
                                        if ($key['is_featured'] == 0) {
                                            ?>
                                            <a class="btn w3-padding-small" onclick="featuredService(<?php echo $key['service_id']; ?>)" title="<?php echo $alt; ?>">
                                                <i class="<?php echo $color; ?> w3-xlarge fa fa-star"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a class="btn w3-padding-small" onclick="unFeaturedService(<?php echo $key['service_id']; ?>)" title="Featured Service.">
                                                <i class="w3-text-orange w3-xlarge fa fa-star"></i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </td>
                                <!-- Modal -->
                        <div id="updateServiceModal_<?php echo $key['service_id']; ?>" class="modal" role="dialog">
                            <form id="updateServiceForm_<?php echo $key['service_id']; ?>" name="updateServiceForm_<?php echo $key['service_id']; ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-dialog modal-lg">
                                    <!----------------------------------- Modal content------------------------------------>
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Material Details</h4>
                                        </div>
                                        <!----------------------------------- Modal Body------------------------------------>                                        
                                        <div class="modal-body">
                                            <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;">
                                                <fieldset>
                                                    <div class="row" style=" margin-top: 5px;">
                                                        <div class="col-lg-1"></div>
                                                        <div class="col-lg-10">
                                                            <div class="">
                                                                <div class="w3-col l12" id="service_err"></div>
                                                                <div class="w3-col l12 w3-margin-bottom">
                                                                    <div class="col-lg-6 col-xs-12 col-sm-12" id="materialGrade">
                                                                        <label>Service Name <b class="w3-text-red w3-medium">*</b></label>
                                                                        <input type="text" name="service_name" id="service_name" value="<?php echo $key['service_name']; ?>" class="form-control" placeholder="Service Name" value="" required>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xs-12 col-sm-12 w3-margin-bottom">
                                                                        <label>Service Image <b class="w3-text-red w3-medium">*</b></label>
                                                                        <input type="file" name="serviceImage" id="serviceImage_<?php echo $key['service_id']; ?>" onchange="readURL(this, '<?php echo $key['service_id']; ?>')" value="" class="form-control">
                                                                        <input type="hidden" class="form-control w3-small" name="serviceImageEdit" id="serviceImageEdit" value="<?php echo $key['service_image']; ?>">
                                                                        <input type="hidden" class="form-control w3-small" name="service_id" id="service_id" value="<?php echo $key['service_id']; ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="w3-col l12 w3-margin-bottom">
                                                                    <div class="col-lg-6 col-xs-12 col-sm-12">
                                                                        <label>Service Description <b class="w3-text-red w3-medium">*</b></label>
                                                                        <textarea class="form-control" name="serviceDescription" id="serviceDescription" placeholder="Service Description" rows="6" cols="50" style="resize: none;"><?php echo $key['service_description']; ?></textarea>
                                                                    </div>
                                                                    <div class="col-lg-6 col-xs-12 col-sm-12 w3-margin-bottom">
                                                                        <label>

                                                                            <img class="img img-thumbnail w3-margin-bottom" alt="Service Image not found" style="height: 100%; width: 100%; object-fit:contain; " align="right" id="serviceImagePreview_<?php echo $key['service_id']; ?>" onerror="this.src='<?php echo base_url() ?>assets/images/default.png'" src="<?php echo base_url() . $key['service_image'] ?>">
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <div class="w3-center" style="">
                                                                    <button type="submit" title="Update Service" id="btnsubmit" class="w3-medium w3-button theme_bg">Update Service</button>
                                                                </div>
                                                            </div>
                                                            <!-- REGISTER DIV ENDS -->   
                                                        </div>
                                                        <div class="col-lg-1" id="message"></div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <!----------------------------------- Modal Body------------------------------------>                                                                               
                                    </div>
                                    <!----------------------------------- Modal content------------------------------------->
                                </div>
                            </form>
                        </div>
                        <!-------script for update material-->
                        <script type="text/javascript">
                            $(function () {
                                $("#updateServiceForm_<?php echo $key['service_id']; ?>").submit(function (e) {
                                    e.preventDefault();
                                    dataString = $("#updateServiceForm_<?php echo $key['service_id']; ?>").serialize();
                                    $('#btnsubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Updating Service. Hang on...</b></span>');
                                    $.ajax({
                                        type: "POST",
                                        url: "<?php echo base_url(); ?>admin/view_services/updateServiceDetails",
                                        data: new FormData(this),
                                        contentType: false,
                                        cache: false,
                                        processData: false,
                                        success: function (data)
                                        {
                                            //alert(data);
                                            $('#service_err').html(data);
                                            $('#btnsubmit').html('<span>Update Service</span>');
                                        }
                                    });
                                    return false;  //stop the actual form post !important!
                                });
                            });

                            //------------fun for cancel the request of user-------------------------//
                            function deleteServiceDetails(service_id) {
                                $.confirm({
                                    title: '<h4 class="w3-text-red">Please confirm the action!</h4><span class="w3-medium">Do you really want to Delete This Service?</span>',
                                    content: '',
                                    type: 'red',
                                    buttons: {
                                        confirm: function () {
                                            $.ajax({
                                                type: "GET",
                                                url: BASE_URL + "admin/view_services/deleteServiceDetails",
                                                data: {
                                                    service_id: service_id
                                                },
                                                cache: false,
                                                success: function (data) {
                                                    $('#err_message').html(data);
                                                }
                                            });
                                        },
                                        cancel: function () {
                                        }
                                    }
                                });
                            }
                            

                            function featuredService(service_id) {
                                $.confirm({
                                    title: '<h4 class="w3-text-green">Please confirm the action!</h4><span class="w3-medium">Do you really want to Featured This Service?</span>',
                                    content: '',
                                    type: 'green',
                                    buttons: {
                                        confirm: function () {
                                            $.ajax({
                                                type: "GET",
                                                url: BASE_URL + "admin/view_services/featuredService",
                                                data: {
                                                    service_id: service_id
                                                },
                                                cache: false,
                                                success: function (data) {
                                                    $('#err_message').html(data);
                                                }
                                            });
                                        },
                                        cancel: function () {
                                        }
                                    }
                                });
                            }
                            
                            function unFeaturedService(service_id) {
                                $.confirm({
                                    title: '<h4 class="w3-text-red">Please confirm the action!</h4><span class="w3-medium">Do you really want to UnFeatured This Service?</span>',
                                    content: '',
                                    type: 'red',
                                    buttons: {
                                        confirm: function () {
                                            $.ajax({
                                                type: "GET",
                                                url: BASE_URL + "admin/view_services/unFeaturedService",
                                                data: {
                                                    service_id: service_id
                                                },
                                                cache: false,
                                                success: function (data) {
                                                    $('#err_message').html(data);
                                                }
                                            });
                                        },
                                        cancel: function () {
                                        }
                                    }
                                });
                            }
                        </script>

                        </tr>
                        <?php
                        $count++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="8" class="w3-center">
                            <span> No User Found </span>
                        </td>              
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function readURL(input, service_id) {
        alert(service_id);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#serviceImagePreview_' + service_id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }


</script>
