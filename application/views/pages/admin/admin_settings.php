	  
<title>Softcomp | Settings</title>
<!-- page content -->
<!--  -->
<div class="right_col" role="main" >
    <div class="w3-row">
        <div id="msgdiv"></div>
        <!-- admin setting  -->
        <div class="col-lg-12">
            <div class="col-lg-12">
                <div class="w3-col l12 w3-white w3-padding" style="border:1px dotted">
                    <h4 class="theme_text"><i class="fa fa-cog"></i> Settings:</h4>
                    <input type="hidden" name="_token" id="_token" value="">          
                    <div class="w3-col l12 w3-margin-top">
                        <div class="col-lg-6 w3-padding-small ">

                            <div class="w3-col l12 w3-small w3-round w3-margin-bottom  w3-padding-small">
                                <label><i class="fa fa-users"></i> Update Username</label><br>
                                <form id="updateUname">
                                    <div class="w3-col l8 w3-padding-right w3-margin-bottom">
                                        <input type="text" name="admin_uname" value="<?php echo $admin_details[0]['user_name']; ?>" placeholder="Enter Username Here..." id="admin_uname" class="w3-input" required>
                                    </div>
                                    <div class="w3-col l4">
                                        <button type="submit" class="w3-button btn theme_bg">Update Username</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 w3-margin-bottom">

                            <div class="w3-col l12 w3-round w3-margin-bottom w3-padding-small">
                                <label><i class="fa fa-lock"></i> Update Password</label><br>

                                <form id="updatePass">
                                    <div class="w3-col l8 w3-padding-right w3-margin-bottom">
                                        <input type="text" name="admin_pass" value="<?php echo base64_decode($admin_details[0]['user_passwd']); ?>" placeholder="Enter Password here..." id="admin_email" class="w3-input" required>
                                    </div>
                                    <div class="w3-col l4">
                                        <button type="submit" class="w3-button btn theme_bg">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="w3-col l12">
                        <div class="col-lg-6 w3-margin-bottom">
                            <div class="w3-col l12 w3-small w3-round w3-margin-bottom  w3-padding-small">
                                <label><i class="fa fa-envelope"></i>Update Email-ID</label><br>
                                <form id="updateEmail">
                                    <div class="w3-col l8 w3-padding-right w3-margin-bottom">
                                        <input type="email" name="admin_email" value="<?php echo $admin_details[0]['user_email']; ?>" placeholder="Enter Email-ID here..." id="admin_email" class="w3-input" required>
                                    </div>
                                    <div class="w3-col l4">
                                        <button type="submit" class="btn theme_bg w3-button ">Update Email-ID</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- company profile div -->

        <?php
        //print_r($company_details);
        //print_r(json_decode($company_details[0]['office_details'],true)); 
        ?>
        <div class="col-lg-12 w3-margin-top " >
            <div class="col-lg-12">
                <div class="w3-col l12 w3-padding w3-white" style="border:1px dotted">
                    <h4 class="theme_text"><i class="fa fa-building"></i> Company Profile:</h4>
                    <form id="add_company_profile">    
                        <input type="hidden" name="_token" id="_token" value="">          
                        <div class="w3-col l12 w3-margin-top">
                            <div class="col-lg-6 w3-margin-bottom">
                                <label>Company Name:</label>
                                <input type="text" name="company_name" value="<?php echo $company_details[0]['company_name']; ?>" class="w3-input" placeholder="Enter Company Name Here" required>
                            </div>
                            <div class="col-lg-6 w3-margin-bottom">
                                <label>Company Email:</label>
                                <input type="email" name="company_email" value="<?php echo $company_details[0]['company_email']; ?>"  class="w3-input" placeholder="Enter Company Email Here" required>
                            </div>
                        </div>
                        <div class="w3-col l12">
                            <div class="col-lg-3 w3-margin-bottom">
                                <label>Company Logo:</label>
                                <input type="file" name="company_logo" onchange="" id="logo_image" class="w3-input" style="padding: 5px 2px 5px 5px" required>
                                <div id="image_error" class="w3-text-red"></div>

                            </div>
                            <div class=" col-lg-6 col-sm-6 col-xs-6 w3-margin-bottom" style="background-image: url(<?php echo base_url() . $company_details[0]['company_logo']; ?>); height: 80px;background-position:left;background-size: contain;background-repeat: no-repeat;">
                                <div class="w3-col l3 theme_bg" style="z-index: 1;position: absolute;border-bottom-right-radius:50%;">
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 w3-center w3-margin-bottom w3-padding-top" id="archSubmit">
                            <button class="btn theme_bg w3-button w3-center" id="addcompanydetails" type="submit">  Submit Company Details </button>
                        </div>

                    </form>
                </div>
                <!-- ---div for office details -->
                <div class="col-lg-12 w3-margin-top w3-border w3-white" style="border:1px dotted" id="officedetail">
                    <h4 class="theme_text"><i class="fa fa-address-book"></i> Office Details:</h4>
                    <form id="add_company_address">    
                        <div class="w3-col l12 s12 m12 w3-small">
                            <div class="col-md-3 ">
                                <label>Office Type:</label>
                                <select class="w3-input w3-border control w3-text-grey" name="office_type" id="mc-caste" required>
                                    <option value="0" class="w3-light-grey" selected>Select Office Type</option>
                                    <option value="Head Office">Head Office</option>                      
                                    <option value="Branch">Branch</option>  
                                </select>
                            </div>
                            <div class="col-md-3 ">
                                <label>Phone Number :</label>
                                <input type="number" name="office_number" class="w3-input" placeholder="Enter office number here" required>
                            </div>
                            <div class="col-md-3">
                                <label>Office Email:</label>
                                <input type="email" name="office_email" class="w3-input" placeholder="Enter Office Email Here" required>
                            </div>
                            <div class="col-md-3 ">
                                <label>Office Address:</label>
                                <textarea class="w3-input" name="office_address" placeholder="Enter Office Address Here..." rows="4" required></textarea>
                            </div>
                            <div class="w3-col l12" id="addedmore_Div"></div>

                            <div class="col-lg-12 w3-center w3-margin-bottom w3-padding-top" id="archSubmit">
                                <button class="btn theme_bg w3-button w3-center" id="addofficedetails" type="submit">  Submit office Details </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ---div for office details -->

                <!-- ---div for show office details -->
                <div class="w3-col l12 w3-margin-top">
                    <hr>
                    <label class="theme_text"><i class="fa fa-database"></i> Office Details:</label>
                    <form id="archListForm">
                        <table id="datatable" class="table table-striped table-bordered">

                            <thead>
                                <tr>
                                    <th class="w3-center">Sr no</th>
                                    <th class="w3-center">Office Type</th>
                                    <th class="w3-center">Office Number</th>
                                    <th class="w3-center">Office Email</th>
                                    <th class="w3-center">Office Address</th>
                                    <th class="w3-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $office = '';
                                foreach ($company_details as $value) {
                                    // print_r(json_decode($value['office_details'],true));die();
                                    $office = json_decode($value['office_details'], TRUE);
                                    //print_r($office);die();
                                    if ($office != '') {
                                        $j = 1;
                                        for ($i = 0; $i < count($office); $i++) {
                                            ?>
                                            <tr><td class="text-center"> 
                                                    <?php echo $j; ?>
                                                </td>
                                                <td class="text-center"> 
                                                    <?php echo $office[$i]['office_type']; ?>
                                                </td>
                                                <td class="text-center"> 
                                                    <?php echo $office[$i]['office_number']; ?>
                                                </td>
                                                <td class="text-center"> 
                                                    <?php echo $office[$i]['office_email']; ?>
                                                </td>
                                                <td class="text-center"> 
                                                    <?php echo $office[$i]['office_address']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a onclick="deleteofficeDetails(<?php echo $i; ?>)" id="deltest" class=" w3-large w3-text-red btn" style="padding: 5px;" title="Delete Post"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                            $j++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="8" class="w3-center">
                                                <span> No Testimonial Found </span>
                                            </td>              
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>


                        </table>

                        <span id="ArchMailErrMsg"></span>
                    </form>

                </div>
                <!-- ---div for show office details -->
            </div>
        </div>


    </div>

    <!-- company profile div end -->
</div>


<script>
    //--------------fun for remove office details-------------------------------//
    function deleteofficeDetails(i) {
        //	alert(i);
        $.confirm({
            title: '<h4 class="w3-text-red"><i class="fa fa-warning"></i> Are you sure you want to delete this Office Details.!</h4>',
            content: '',
            type: 'red',
            buttons: {
                confirm: function () {
                    $.ajax({
                        url: "<?php echo base_url(); ?>admin/admin_setting/remove_officedetails",
                        type: "POST",
                        data: {
                            key: i
                        },
                        cache: false,
                        success: function (data) {
                            // alert(data);
                            // $.alert(data);
                            $('#msgdiv').html(data);
                            //location.reload();
                        }
                    });
                },
                cancel: function () {
                }
            }
        });
    }
</script>
<!-- add company profile -->
<script>
    $(function () {
        $("#add_company_profile").submit(function () {
            dataString = $("#add_company_profile").serialize();
            // alert(dataString);
            $('#addcompanydetails').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Company Profile Add. Please wait...</b></span>');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/admin_setting/add_companyProfile",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    // alert(data);
                    // $.alert(data);
                    $('#msgdiv').html(data);
                    //location.reload();
                }
            });
            return false;  //stop the actual form post !important!

        });
    });

</script>

<!-- add office address -->
<script>
    $(function () {
        $("#add_company_address").submit(function () {
            dataString = $("#add_company_address").serialize();
            //  alert(dataString);
            $('#addofficedetails').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Company Profile Add. Please wait...</b></span>');
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/admin_setting/add_officeaddress",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    //  alert(data);
                    // $.alert(data);
                    $('#msgdiv').html(data);
                    //location.reload();
                }
            });
            return false;  //stop the actual form post !important!

        });
    });

</script>

<!--  script to update email id   -->
<script>
    $(function () {
        $("#updateEmail").submit(function () {
            dataString = $("#updateEmail").serialize();
            //alert(dataString);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/admin_setting/updateEmail",
                data: dataString,
                return: false, //stop the actual form post !important!

                success: function (data)
                {
                    //alert(data);
                    $('#msgdiv').html(data);
                }

            });

            return false;  //stop the actual form post !important!

        });
    });
</script>
<!-- script ends here -->

<!--  script to update email id   -->
<script>
    $(function () {
        $("#updateUname").submit(function () {
            dataString = $("#updateUname").serialize();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/admin_setting/updateUname",
                data: dataString,
                return: false, //stop the actual form post !important!

                success: function (data)
                {
                    $('#msgdiv').html(data);
                }

            });

            return false;  //stop the actual form post !important!

        });
    });
</script>
<!-- script ends here -->
<!--  script to update email id   -->
<script>
    $(function () {
        $("#updatePass").submit(function () {
            dataString = $("#updatePass").serialize();

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>admin/admin_setting/updatePass",
                data: dataString,
                return: false, //stop the actual form post !important!

                success: function (data)
                {
                    $('#msgdiv').html(data);
                }

            });

            return false;  //stop the actual form post !important!

        });
    });
</script>
<!-- script ends here -->