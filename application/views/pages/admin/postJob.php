
<title>Career Section</title>
<!-- page content -->
<div class="right_col page_title" role="main" ng-app="addJobApp" ng-controller="jobCtrl">
    <div class="w3-col l12" id="jobErrMsg"></div>
    <div class="container page_title">
        <div class="row x_title w3-margin-top"><div class="w3-padding"><h3><i class="fa fa-briefcase"></i> Career Section</h3></div></div>
        <!--        <fieldset>-->
        <div class="row w3-padding">
            <div class="col-lg-3"></div>
            <div class="col-lg-6 w3-padding w3-margin-bottom" style="border:1px dotted">
                <form id="add_jobform" name="add_jobform" method="post" role="form">
                    <div class="w3-col l12 w3-padding-bottom w3-border-bottom">
                        <h4><i class="fa fa-plus"></i> Post Job</h4>
                    </div>
                    <div class="col-lg-12 col-xs-12 col-sm-12 w3-margin-bottom w3-margin-top">
                        <label>Job Position <b class="w3-text-red w3-medium">*</b></label>
                        <input type="text" name="job_title" ng-model="job_title" id="job_title" class="form-control" placeholder="Enter Job Title here..." value="" required>
                    </div>
                    <div class="col-lg-12 col-xs-12 col-sm-12 w3-margin-bottom">
                        <label>Job Description <b class="w3-text-red w3-medium">*</b></label>
                        <textarea class="required form-control" id="job_description" style="resize: none;" ng-model="job_description" name="job_description" rows="6" placeholder="Enter short Job description here..." required></textarea>
                    </div>
                    <div class="col-lg-12 col-xs-12 col-sm-12 w3-margin-bottom">
                        <div class="col-lg-4 col-xs-12 col-sm-12">
                            <label>No Of Vacancies <b class="w3-text-red w3-medium">*</b></label>
                            <input type="number" name="noOfVacancies" ng-model="noOfVacancies" id="noOfVacancies" class="form-control" placeholder="Enter No Of Vacancies here..." value="" required>
                        </div>
                        <div class="col-lg-4 col-xs-12 col-sm-12">
                            <label>Experience From <b class="w3-text-red w3-medium">*</b></label>
                            <select required id="experienceRequiredFrom" name="experienceRequiredFrom" class="form-control" placeholder="Select a skill..." required>
                                <option value="0">0</option>
                                <option value="0.6">0.6</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="More Than 10">More Than 10</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-xs-12 col-sm-12">
                            <label>Experience To<b class="w3-text-red w3-medium">*</b></label>
                            <select required id="experienceRequiredTo" name="experienceRequiredTo" class="form-control" placeholder="Select a skill..." required>
                                <option value="0">0</option>
                                <option value="0.6">0.6</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="More Than 10">More Than 10</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12 col-xs-12 col-sm-12 w3-margin-bottom">
                        <label for="Requirements">Requirements (optional) :</label>
                        <div class="w3-card">
                            <div class="w3-container w3-light-grey">
                                <div class="w3-row w3-margin-top">
                                    <div class="w3-col l10 s10">
                                        <input type="text" name="skill_name" ng-model="addSkillbtn" id="skill_name" class="form-control" placeholder="List out Requirements" value="">
                                    </div>
                                    <div class="w3-col l2 s2">
                                        <button class="w3-button theme_bg" type="button" ng-click="addSkill()" title="add requirements"><i class="fa fa-plus w3-hide-large w3-hide-medium"></i><span class="w3-hide-small">Add</span></button>
                                    </div>
                                </div>
                                <input type="hidden" name="skillAdded_field" value="{{skilJSON}}" ng-model="skillAdded_field" id="skillAdded_field">
                                <p class="w3-text-red w3-center">{{errortext}}</p>
                            </div>
                            <ul class="w3-ul">
                                <li ng-repeat="x in products">{{x}}<span ng-click="removeSkill($index)" style="cursor:pointer;" class="w3-right w3-margin-right">×</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="w3-center">
                        <button type="submit" title="Add Job" id="btnsubmit" class="w3-medium w3-button theme_bg"> Post Job</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3"></div>
            <div class="" ng-bind-html="message"></div>
        </div>
        <!--        </fieldset>-->
    </div>
</div>
<script src="<?php echo base_url(); ?>assets/js/module/job.js"></script>
<!-- /page content -->
