
<section class="wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-8 col-xs-12 center-col offset-eight-bottom sm-offset-40px-bottom xs-offset-30px-bottom text-center">
                <div class="position-relative overflow-hidden width-100"><span class="text-small text-outside-line-full text-font-sec text-medium text-uppercase"><h4>Current Openings</h4></span></div>
                <!--                <h5 class="text-font-sec text-extra-dark-gray">We apply a detailed approach to every project to achieve the best result</h5>-->
            </div>
        </div>
        <?php
        if ($jobs != '' && $jobs != []) {
            foreach ($jobs as $key) {
                ?>
                <div class="col-md-6" style="padding: 10px;">
                    <div class="card" style="background: #f7f7f7; color: black; border: 1px solid; padding: 15px;">
                        <h5 class="card-header" style="border-bottom: 1px solid; margin-bottom: 5px;"><?php echo $key['job_name']; ?></h5>
                        <div class="card-body">
                            <p class="card-text"><i><?php echo $key['job_description']; ?></i></p>
                            <span class="card-text"><i class="fa fa-user"></i><b> Vacancies :</b> <?php echo $key['vacancies']; ?></span><br>
                            <span class="card-text"><i class=""></i><b>Experience : </b><i><?php echo $key['req_exp']; ?></i></span><br>
                            <span><b>Requirements :</b></span>
                            <ul>
                                <?php
                                if ($key['req_list'] != '') {
                                    foreach (json_decode($key['req_list'], TRUE) as $val) {
                                        ?>
                                        <li><span class=" w3-text-black"><i><?php echo $val; ?></i></span></li>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <li><span class="w3-text-black">No Requirements..</span></li>
                                <?php } ?>
                            </ul>
                            <!--                            <a href="#" class="btn btn-primary" style="margin-top: 10px;">Apply</a>-->
                            <a href="#applyfor" id="apply" class="btn btn-primary active" style="margin-top: 10px;">Apply</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            ?>
            <div class="col-md-12" style="padding: 10px;">
                <center><span class="text-small text-font-sec text-medium text-uppercase"><h5><i>No Jobs Available.</i></h5></span></center>                
            </div>
        <?php }
        ?>
    </div>
</section>

<section class="wow fadeIn no-inset-top" style=" margin-top: 10px;">
    <div class="container" id="applyfor">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 center-col text-center offset-40px-bottom xs-offset-40px-bottom">
                <div class="position-relative overflow-hidden width-100"><span class="text-small text-outside-line-full text-font-sec text-medium text-uppercase">Apply Job</span></div>
            </div>
        </div>
        <div id="career_err"></div>
        <form class="rd-mailform text-left" id="applyJobForm" name="applyJobForm" data-form-output="form-output-global" data-form-type="" method="post" enctype="multipart/form-data">
            <div class="row row-20">
                <div class="col-md-12">
                    <div class="form-wrap">
                        <label class="form-label" for="contact-name-re">Name</label>
                        <input class="form-input" id="contact-name-re" type="text" name="candidateName" data-constraints="@Required">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-wrap">
                        <label class="form-label" for="contact-phone-re">Phone</label>
                        <input class="form-input" id="contact-phone-re" type="text" name="candidate_phone" data-constraints="@Required @Numeric">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-wrap">
                        <label class="form-label" for="contact-email-re">E-Mail</label>
                        <input class="form-input" id="contact-email-re" type="email" name="candidate_email" data-constraints="@Required @Email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-wrap">
                        <select class="form-input select select-inline" data-placeholder="Select The Job From Job List" name="job_id" data-constraints="@Required" data-dropdown-class="select-inline-dropdown">
                            <option label="placeholder"></option>
                            <?php
                            if ($jobs != '' && $jobs != []) {
                                foreach ($jobs as $val) {
                                    ?>
                                    <option value="<?php echo $val['job_id']; ?>"><?php echo $val['job_name']; ?></option>
                                    <?php
                                }
                            } else {
                                ?>
                                <option value="0">No Jobs Available</option>
                            <?php }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-wrap">
                        <label class="form-label" for="contact-message-re">Message</label>
                        <textarea class="form-input" id="contact-message-re" name="message" data-constraints="@Required"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-wrap">
                        <!--                        <label class="form-label" for="contact-email-re"></label>-->
                        <input type="file" class="form-input" id="resume" name="resume" data-constraints="@Required" required/> 
<!--                        <input class="form-input" id="contact-email-re" type="email" name="email" data-constraints="@Required @Email">-->
                    </div>
                </div>
            </div>
            <div class="form-button group-sm text-center text-lg-left">
                <button class="btn btn-secondary btn-rounded btn-large offset-20px-top" id="btnsubmit" type="submit">Apply</button>
            </div>
        </form>
    </div>
</section>
<script>
    //-----------fun for apply to the job----------------------//
    $(function () {
        $("#applyJobForm").submit(function () {
            dataString = $("#applyJobForm").serialize();
            $('#btnsubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-spinner fa-spin w3-large"></i> <b>Appling Job. Hang on...</b></span>');
            $.ajax({
                type: "POST",
                url: BASE_URL + "careers/applyJob",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data)
                {
                    $('#career_err').html(data);
                    $('#btnsubmit').html('<span>Apply</span>');
                }
            });
            return false;  //stop the actual form post !important!
        });
    });
</script>
<script>
    $("#apply").click(function () {
        $('html,body').animate({
            scrollTop: $("#applyfor").offset().top},
                'slow');
    });
</script>