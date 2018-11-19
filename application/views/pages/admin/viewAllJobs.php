<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->

    <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;" >
        <div id="err_message"></div>
        <div class="row x_title">
            <div class="w3-padding">
                <h3><i class="fa fa-briefcase"></i> All Jobs</h3>
            </div>
        </div>
        <div class="container x_title" style=" margin-top: 5px;">

            <table id="datatable" class="table">
                <thead>
                    <tr class="theme_bg w3-small">
                        <th class="w3-center"><span>Sr No</span></th>
                        <th class="w3-center"><span>Job Name</span></th>
                        <th class="w3-center"><span>Job Description</span></th>                        
                        <th class="w3-center"><span>Requirements</span></th>                        
                        
                        <th class="w3-center"><span>Req.Experience</span></th>
                        <th class="w3-center"><span>Added Date</span></th>
                        <th class="w3-center"><span>Action</span></th>
                    </tr>
                </thead>
                <tbody>                    
                    <?php
                    $color = '';
                    $alt = '';
                    if ($jobs != '' && $jobs != '500') {
                        $count = 1;
                        foreach ($jobs as $key) {
                            ?>
                    <tr class="w3-small">
                                <td class="w3-center"><?php echo $count; ?></td>
                                <td class="w3-center"> 
                                    <p class=" w3-text"><b><?php echo $key['job_name']; ?><br><span class="w3-small">(Positions&nbsp;:&nbsp;<?php echo $key['vacancies'] ?>)</span></b></p>
                                </td>
                                <td class="w3-center">
                                    <p class=" w3-text"><b><?php echo $key['job_description']; ?></b></p>
                                </td>
                                <td class="w3-text" width="180px" style="vertical-align: middle;">
                                    <ul>
                                        <?php
                                        if ($key['req_list'] != '') {
                                            foreach (json_decode($key['req_list'],TRUE) as $val) {
                                                ?>
                                        <li><p class=" w3-text"><b><?php echo $val; ?></b></p></li>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                        <li><span class="w3-text">No Requirements..</span></li>
                                        <?php } ?>
                                    </ul>
                                </td>
                                
                                <td class="w3-center w3-text"><b><?php echo $key['req_exp']; ?></b></td>
                                <td class="w3-center w3-text"><b><?php echo $key['added_date']; ?></b></td>
                                <td class="w3-center" >
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-default" href="<?php echo base_url().'admin/all_jobs/view_applied_candidate_list/'. base64_encode($key['job_id']);?>" title="View Applied Candidates" style=" margin-bottom: 5px; padding: 2px 8px;">
                                            <i class="w3-text-green w3-large fa fa-user"></i> Applied Candidates
                                        </a><br>                   
                                        <a class="btn btn-sm btn-default" onclick="deleteJobDetails(<?php echo $key['job_id']; ?>)" title="Delete Job" style="padding: 2px 8px;">
                                            <i class="w3-text-red w3-large fa fa-close"></i> Delete Job
                                        </a>                                       
                                    </div>
                                </td>
                                
                                <!-------script for update material-->
                        <script type="text/javascript">                         
                            //------------fun for cancel the request of user-------------------------//
                            function deleteJobDetails(job_id) {
                                $.confirm({
                                    title: '<h4 class="w3-text-red">Do you really want to Delete This Job?</h4>',
                                    content: '<span class="w3-text-grey">Deleting This <b>Job</b> Post Will Also Remove All Its <b>Applied Candidates.</b></span>',
                                    type: 'red',
                                    buttons: {
                                        confirm: function () {
                                            $.ajax({
                                                type: "GET",
                                                url: BASE_URL + "admin/all_jobs/deleteJobDetails",
                                                data: {
                                                    job_id: job_id
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
                            <span> No Jobs Found..! </span>
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

