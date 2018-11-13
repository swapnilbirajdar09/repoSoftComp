<title>Parinaay Matrimony | Dashboard</title>
<!-- page content -->
<div class="right_col" role="main" id="dashApp" ng-app="dashApp" ng-controller="DashController">
  <div class="">
    <div class="row top_tiles">
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-users"></i></div>
          <div class="count">{{totalmem}}</div>
          <h3>Total Members</h3>
          <p><a href="" class="w3-small" style="padding: 0"><i class="fa fa-chevron-right"></i> view members list</a></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-mars"></i></div>
          <div class="count">{{malemem}}</div>
          <h3>Male(s) </h3>
          <p><a href="" class="w3-small" style="padding: 0"><i class="fa fa-chevron-right"></i> view male members list</a></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-venus"></i></div>
          <div class="count">{{femalemem}}</div>
          <h3>Female(s) </h3>
          <p><a href="" class="w3-small" style="padding: 0"><i class="fa fa-chevron-right"></i> view female members list</a></p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-inr"></i></div>
          <div class="count">{{totrevenue}}</div>
          <h3>Total Revenue</h3>
          <p><i class="fa fa-refresh"></i> updating continously</p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Membership Packages <small>Membership package details and pricing</small></h2>

            <!-- add new package modal -->
            <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" onclick="openModal()" data-target="#addPackageModal" type="button"><i class="fa fa-plus"></i> Add New</button>
            <div class="modal fade" id="addPackageModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="modalTitle"><i class="fa fa-plus"></i> Add New Package</h4>
                  </div>
                  <div class="modal-body">
                    <form id="addNewPackageForm">
                      <label>Package Title:</label>
                      <input type="text" name="pkg_name" class="form-control" placeholder="Eg.(Default, Basic, Premium, Gold, etc.)"><br>
                      <label>Set Price (<i class="fa fa-inr"></i>):</label>
                      <p class="w3-small w3-text-grey"><b>Note: set value = 0, if package is free.</b></p>
                      <input type="number" name="pkg_price" class="form-control" min="0" value="0" placeholder="Eg.(0/-, 1000/-, 1500/-, 5000/-, etc.)"><br>
                      <label>Package Validity (<i class="fa fa-list-ol"></i>):</label>
                      <input type="number" name="pkg_validity" class="form-control" min="1" placeholder="Eg.(1, 3, 6, 12, etc.)"><br>
                      <label>Package Period:</label>
                      <select class="form-control" id="pkg_period" name="pkg_period">
                        <option value="0" class="w3-light-grey" selected>select package period</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Yearly">Yearly</option>
                      </select>
                      <p class="w3-text-red" id="perioderror"></p><br>
                      <label>Package Benefits:</label>                            
                      <p class="w3-small w3-text-grey"><b>Note: Enter benefit below and click on "<i class="fa fa-plus"></i>  Add" button.</b></p>
                      <div class="input-group">
                        <input type="hidden" name="benefitAddedField" value="{{benefitAddedField}}" ng-model="benefitAddedField" id="benefitAddedField">
                        <input type="text" name="pkg_benefits" ng-model="addBenefit" class="form-control" placeholder="Eg.(Access to all profiles, Contact access limits to 5 profiles, etc.)">
                        <span class="input-group-btn">
                          <button type="button" class="btn btn-default" ng-click="addBenefitFunc()"><i class="fa fa-plus"></i> Add</button>
                        </span>
                      </div>
                      <p class="w3-text-red" id="errortext">{{errortext}}</p>
                      <ul class="w3-ul w3-border">
                        <li ng-repeat="x in benefits">{{x}}<span ng-click="removeBenefit($index)" style="cursor:pointer;" class="w3-right w3-margin-right">×</span></li>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-default">Reset</button>
                      <button type="submit" id="addPackageBtn" class="btn btn-primary">Add New Package</button>
                    </div>
                  </form>
                  <p id="pkg_form_message" class="w3-padding"></p>
                </div>
              </div>
            </div>
            <!-- add new package modal ends -->

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">

              <div class="col-md-12" id="allPackages">
                <div class="w3-col 12" ng-bind-html="delPkgMessage"></div>
                <!-- price element -->
                <div class="col-md-3 col-sm-6 col-xs-12" ng-if="packages != 'false'" ng-repeat="pkg in packages">
                  <div class="pricing">
                    <a ng-click="removePackage(pkg.package_id)" class="btn w3-circle w3-white pkgDelete_btn" title="Delete package"><i class="fa fa-times"></i></a>
                    <div class="title">
                      <h2>{{pkg.package_title}}</h2>
                      <h1><i class="fa fa-inr"></i> {{pkg.package_price}}</h1>
                      <span>{{pkg.package_validity}} {{pkg.package_period}}</span>
                    </div>
                    <div class="x_content">
                      <div class="">
                        <div class="pricing_features">
                          <ul class="list-unstyled text-left">
                            <li ng-repeat="bene in pkg.package_benefits | orderBy: $index"><i class="fa fa-check text-success"></i> {{bene}}</li>
                          </ul>
                        </div>
                      </div>
                      <div class="pricing_footer">
                        <?php $id="{{pkg.package_id}}"; ?>
                        <a href="<?php echo base_url(); ?>admin/dashboard/editpackage/<?php echo $id; ?>?packagedetails=true&redirect=1" class="btn btn-success btn-block" role="button"><i class="fa fa-edit"></i> Edit Package</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 w3-padding" ng-if="packages=='false'">
                  <center>
                    <h3><i class="fa fa-warning"></i> No Packages Available</h3>
                  </center>
                </div>
                <!-- price element -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<script src="<?php echo base_url(); ?>assets/js/module/dashboard.js"></script>
