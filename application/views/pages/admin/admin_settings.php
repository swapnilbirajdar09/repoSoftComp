<div class="w3-col l12 w3-white w3-round w3-margin-top theme_text" style="padding: 16px">
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
                                            <input type="text" name="admin_pass" value="<?php echo $admin_details[0]['user_passwd']; ?>" placeholder="Enter Password here..." id="admin_email" class="w3-input" required>
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
            <div class="col-lg-12 w3-margin-top " >
                <div class="col-lg-12">
                    <div class="w3-col l12 w3-padding w3-white" style="border:1px dotted">
                        <h4 class="theme_text"><i class="fa fa-building"></i> Company Profile:</h4>
                        <form id="add_testimonial_Form">    
                            <input type="hidden" name="_token" id="_token" value="">          
                            <div class="w3-col l12 w3-margin-top">
                                <div class="col-lg-6 w3-margin-bottom">
                                    <label>Company Name:</label>
                                    <input type="text" name="company_name" class="w3-input" placeholder="Enter Company Name Here" required>
                                </div>
                                <div class="col-lg-6 w3-margin-bottom">
                                    <label>Company Email:</label>
                                    <input type="text" name="company_email" class="w3-input" placeholder="Enter Company Email Here" required>
                                </div>
                            </div>
                            <div class="w3-col l12">
                                <div class="col-lg-6 w3-margin-bottom">
                                    <label>Company Logo:</label>
                                    <input type="file" name="company_logo" onchange="" id="logo_image" class="w3-input" style="padding: 5px 2px 5px 5px" required>
                                    <div id="image_error" class="w3-text-red"></div>
                                </div>

                            </div>
                            <!-- ---div for office details -->
                            <div class="col-lg-12 w3-padding w3-border" id="officedetail">
                                <div class="w3-col l12 s12 m12 w3-small">
                                    <div class="w3-col l3 ">
                                        <label>Office Type:</label>
                                        <select class="w3-input w3-border control w3-text-grey" name="caste" id="mc-caste" required>
                                            <option value="0" class="w3-light-grey" selected>Select Office Type</option>
                                            <option value="Head Office">Head Office</option>                      
                                            <option value="Branch">Branch</option>  
                                        </select>
                                    </div>
                                    <div class="w3-col l3 ">
                                        <label>Phone Number :</label>
                                        <input type="number" name="company_name" class="w3-input" placeholder="Enter Company Name Here" required>
                                    </div>
                                    <div class="w3-col l3 ">
                                        <label>Office Email:</label>
                                        <input type="email" name="company_name" class="w3-input" placeholder="Enter Company Name Here" required>
                                    </div>
                                    <div class="w3-col l3 ">
                                        <label>Office Address:</label>
                                        <textarea class="w3-input" name="client_comment" placeholder="Enter Client Comments Here..." rows="4"></textarea>
                                    </div>
                                    <div class="w3-col l12" id="addedmore_Div"></div>
                                    <div class="w3-col l12 w3-margin-bottom">
                                        <a id="add_more" title="Add new Item" class="btn w3-text-red add_moreProduct w3-small w3-right w3-margin-top"><b>Add image <i class="fa fa-plus"></i></b>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- ---div for office details -->
                            <div class="col-lg-12 w3-center w3-margin-bottom" id="archSubmit">
                                <button class="btn theme_bg w3-button w3-center" id="addtestimonial" type="submit">  Submit Company Details </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>


        </div>

        <!-- company profile div end -->
    </div>
</div>
</div>
<!-- script for add more office details -->
<script>
    $(document).ready(function () {
        var max_fields = 5;
        var wrapper = $("#addedmore_Div");
        var add_button = $("#add_more");
        var x = 1;
        $(add_button).click(function (e) {
            e.preventDefault();
            if (x < max_fields) {
                x++;
                $(wrapper).append('<div class="w3-col l12 s12 m12 w3-small w3-margin-top">\n\
 <div class="w3-col l3 ">\n\
<label>Office Type:</label>\n\
<select class="w3-input w3-border control w3-text-grey" name="caste" id="mc-caste" required>\n\
<option value="0" class="w3-light-grey" selected>Select Office Type</option>\n\
<option value="Head Office">Head Office</option>\n\
<option value="Branch">Branch</option>\n\
</select>\n\
</div>\n\
                            <div class="w3-col l3 ">\n\
                          <label>Phone Number :</label>\n\
                           <input type="number" name="company_name" class="w3-input" placeholder="Enter Company Name Here" required>\n\
                           </div>\n\
                            <div class="w3-col l3 ">\n\
                          <label>Office Email:</label>\n\
                           <input type="email" name="company_name" class="w3-input" placeholder="Enter Company Name Here" required>\n\
                           </div>\n\
                            <div class="w3-col l3 ">\n\
                          <label>Office Address:</label>\n\
                           <textarea class="w3-input" name="client_comment" placeholder="Enter Client Comments Here..." rows="4"></textarea>\n\
                           </div>\n\
                       <a href="#" class="delete btn w3-text-black w3-left w3-small" title="remove image">remove <i class="fa fa-remove"></i>\n\
                       </a>\n\
                       </div>\n\
                       </div>'); //add input box
            } else {
                $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xxlarge"></i> You Reached the maximum limit of adding ' + max_fields + ' fields</label>');   //alert when added more than 4 input fields
            }
        });
        $(wrapper).on("click", ".delete", function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        })
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