<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->

    <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;" >
        <div id="err_message"></div>
        <div class="row x_title">
            <div class="col-md-6">
                <h3><i class="fa fa-users"></i> Applied Candidate List </h3>
            </div>
            <a class="btn btn-sm btn-default pull-right w3-margin-top" href="<?php echo base_url(); ?>admin/all_jobs" title="Back To All Job" style="padding: 2px 8px; vertical-align: middle;">
                <i class="w3-text-black w3-large fa fa-backward"> </i> Back To All Jobs
            </a>
        </div>

        <div class="container x_title" style=" margin-top: 5px;">

            <table id="datatable" class="table">
                <thead>
                    <tr class="theme_bg">
                        <th class="w3-center"><span>No</span></th>
                        <th class="w3-center"><span>Candidate Name</span></th>
                        <th class="w3-center"><span>Candidate Email</span></th>                        
                        <th class="w3-center"><span>Mobile</span></th>                        
                        <th class="w3-center"><span>Resume</span></th>
                        <th class="w3-center"><span>Applied Date</span></th>
                        <th class="w3-center"><span>Action</span></th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php
                    $color = '';
                    $alt = '';
                    if ($candidates != '' && $candidates != '500') {
                        $count = 1;
                        foreach ($candidates as $key) {
                            ?>
                            <tr>
                                <td class="w3-center"><?php echo $count; ?></td>
                                <td class="w3-center"> 
                                    <span class=" w3-text-black"><b><?php echo $key['candidate_name']; ?></b></span>
                                </td>
                                <td class="w3-center">
                                    <span class="w3-text-black"><b><?php echo $key['candidate_email']; ?></b></span>
                                </td>
                                <td class="w3-center w3-text-black" width="150px">
                                    <span class="w3-text-black"><b><?php echo $key['candidate_mobile']; ?></b></span>
                                </td>
                                <td class="w3-center w3-text-black">
                                    <a class="btn" target="_self" href="<?php echo base_url(); ?><?php echo $key['candidate_cv']; ?>" download="<?php echo $key['candidate_name']; ?>" style="padding:0"><span class="w3-small w3-text-grey"><i class="fa fa-download"></i><b> <?php echo $key['candidate_name']; ?></b></span></a>
<!--                                    <a class="btn w3-medium" title="Download Resume" href="<?php //echo base_url() . 'admin/all_jobs/download/' . base64_encode($key['candidate_id'] . '|' . $key['candidate_name']); ?>"><i class="fa fa-download"></i> Download</a>-->
                                </td>
                                <td class="w3-center w3-text-black">
                                    <span class="w3-text-black"><b><?php echo $key['applied_date']; ?></b></span>
                                </td>
                                <td class="w3-center" style="vertical-align: middle;">
                                    <div class="btn-group">                   
                                        <a class="btn btn-sm btn-default" onclick="deleteCandidateData(<?php echo $key['candidate_id']; ?>)" title="Delete Job" style="padding: 2px 8px;">
                                            <i class="w3-text-red w3-large fa fa-trash"></i> Delete Candidate
                                        </a>                                       
                                    </div>
                                </td>

                                <!-------script for update material-->

                            </tr>
                            <?php
                            $count++;
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8" class="w3-center">
                                <span> No Candidates Found..! </span>
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

<script type="text/javascript">
    //------------fun for cancel the request of user-------------------------//
    function deleteCandidateData(candidate_id) {
        //alert(candidate_id);
        $.confirm({
            title: '<h4 class="w3-text-red">Do you really want to Delete This Candidate?</h4>',
            content: '',
            type: 'red',
            buttons: {
                confirm: function () {
                    $.ajax({
                        type: "GET",
                        url: BASE_URL + "admin/all_jobs/deleteCandidateData",
                        data: {
                            candidate_id: candidate_id
                        },
                        cache: false,
                        success: function (data) {
                            console.log(data);
                            //alert(data);
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
