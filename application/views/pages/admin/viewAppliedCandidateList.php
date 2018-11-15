<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->

    <div class="container page_title" style="margin-top: 0px;margin-bottom: 0px;" >
        <div id="err_message"></div>
        <div class="row x_title">
            <div class="w3-padding">
                <h3><i class="fa fa-users"></i> Applied Candidate List</h3>
            </div>
        </div>
        <div class="container x_title" style=" margin-top: 5px;">

            <table id="datatable" class="table">
                <thead>
                    <tr class="theme_bg">
                        <th class="w3-center"><span>Sr No</span></th>
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
                                <td class="w3-text-black" width="150px">
                                    <span class="w3-text-black"><b><?php echo $key['candidate_mobile']; ?></b></span>
                                </td>
                                <td class="w3-center w3-text-black">
                                    <a class="btn w3-medium" title="Download Resume" href="<?php echo base_url().'admin/view_applied_candidate_list/download/'.base64_encode($key['candidate_id'].'|'.$key['candidate_name']);?>"><i class="fa fa-download"></i> Download</a>
                                </td>
                                <td class="w3-text-black">
                                    <span class="w3-text-black"><b><?php echo $key['applied_date']; ?></b></span>
                                </td>
                                <td class="w3-center" style="vertical-align: middle;">
                                    <div class="btn-group">
        <!--                                        <a class="btn btn-sm btn-default" href="<?php echo base_url() . 'admin/view_applied_candidate_list/' . base64_encode($key['candidate_id']); ?>" title="View Applied Candidates" style=" margin-bottom: 5px; padding: 2px 8px;">
                                                <i class="w3-text-green w3-large fa fa-user"></i> Applied Candidates
                                            </a><br>                   -->
                                        <a class="btn btn-sm btn-default" onclick="deleteCandidateData(<?php echo $key['candidate_id']; ?>)" title="Delete Job" style="padding: 2px 8px;">
                                            <i class="w3-text-red w3-large fa fa-trash"></i> Delete Candidate
                                        </a>                                       
                                    </div>
                                </td>

                                <!-------script for update material-->
                        <script type="text/javascript">
                            //------------fun for cancel the request of user-------------------------//
                            function deleteCandidateData(candidate_id) {
                                alert(candidate_id);
                                $.confirm({
                                    title: '<h4 class="w3-text-red">Do you really want to Delete This Candidate?</h4>',
                                    content: '',
                                    type: 'red',
                                    buttons: {
                                        confirm: function () {
                                            $.ajax({
                                                type: "GET",
                                                url: BASE_URL + "admin/view_applied_candidate_list/deleteCandidateData",
                                                data: {
                                                    candidate_id: candidate_id
                                                },
                                                cache: false,
                                                success: function (data) {
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

                        </tr>
                        <?php
                        $count++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7" class="w3-center">
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

