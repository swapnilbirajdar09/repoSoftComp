
<title>SoftComp | Porfolio Section</title>
<!-- page content -->
<div class="right_col" role="main" ng-app="portfolioApp" ng-cloak ng-controller="PortfolioCtrl">

	<div class="row" >
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="page_title">

				<div class="row x_title">
					<div class="col-md-6">
						<h4><i class="fa fa-plus"></i> Add new Portfolio </h4>
					</div>
				</div>
        <!-- <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
      </div> -->
      <div class="alert alert-fixed"></div>
      <div class="row w3-padding w3-white theme_text">
      	<form id="addPortfolio_form" name="addPortfolio_form" enctype="multipart/form-data">
      		<div class="w3-col l12 s12 m12 w3-margin-top">
      			<div class="col-lg-1"></div>
      			<div class="col-lg-9">
              <div class="w3-col l12 w3-padding-small">
                  <div class="col-md-6 col-xs-12 s12 m12 w3-small w3-padding-bottom">
                    <label> Client's Name: <span>(optional)</span></label><br>
                    <input type="text" name="client_name" id="client_name" value="" placeholder="Add Client's Name" class="w3-input w3-border w3-margin-bottom">                    
                  </div>
              </div>
      				<div class="w3-col l12 w3-padding-small">
      						<div class="col-md-6 col-xs-12 w3-small w3-padding-bottom">
      							<label> Portfolio Name: <font color ="red"><span id ="pname_star">*</span></font></label><br>
      							<input type="text" name="portfolio_name" id="portfolio_name" value="" placeholder="Add Portfolio Name" class="w3-input w3-border w3-margin-bottom" required>
      						</div>
                  <div class="col-md-6 col-xs-12 w3-small w3-padding-bottom">
                    <label> Portfolio Category: <font color ="red"><span id ="pcat_star">*</span></font></label><br>
                    <select class="w3-input w3-border w3-margin-bottom" name="portfolio_category" id="portfolio_category">
                      <option value="0" class="w3-light-grey">Choose product category</option>
                      <?php foreach ($categories as $cat){ ?>
                      <option value="<?php echo $cat['cat_id']; ?>"><?php echo strtoupper($cat['cat_name']); ?></option>
                      <?php } ?>
                    </select>
                    <span class="w3-text-red w3-small" id="cat_error"></span>
                  </div>
      						<div class="col-md-12 col-xs-12 w3-small w3-padding-bottom">
      							<label> Portfolio Description: <font color ="red"><span id ="pdescription_star">*</span></font></label><br>
      							<textarea class="w3-input w3-border w3-margin-bottom" name="portfolio_description" id="portfolio_description" rows="6" placeholder="Add a short description about this project...." required></textarea>
      					</div>
      				</div>
      				<!-- ---div for images -->
      				<div class="col-md-12 w3-padding-tiny">
      					<div class="col-md-4 w3-small w3-padding-small w3-margin-bottom">
      						<div class="col-md-12 w3-padding-small" style="border:1px dotted">
      							<div class="w3-col l12 ">
      								<label>Portfolio Image: <font color ="red"><span id ="simage_star">*</span></font></label>
      								<input type="file" name="port_image[]" id="port_image_1" class="w3-input w3-border" onchange="readURL(this,1);" style="padding:5px" required>
      								<span class="w3-text-red w3-small" id="image_error_1"></span>
      							</div>
      							<div class="w3-col l12 w3-margin-bottom">
      								<img src="<?php echo base_url(); ?>assets/images/admin/default_image.jpg" width="auto" id="ImagePreview_1" height="150px" alt="Portfolio Image will be displayed here once chosen." class=" w3-centerimg img-thumbnail w3-margin-top" style="display: none;">
      							</div>
      						</div>
      						<div class="w3-col l12" id="addedmore_imageDiv"></div>
      						<div class="w3-col l12 w3-margin-bottom">
      							<a id="add_moreimage" title="Add new Item" class="btn w3-text-red add_moreProduct w3-small w3-right" style="padding-right: 0"><b>Add image <i class="fa fa-plus"></i></b>
      							</a>
      						</div>
      					</div>

      					<!-- video div -->
      					<div class="col-md-4 w3-small w3-padding-small w3-margin-bottom">
      						<div class="col-md-12 col-xs-12 w3-padding-small" style="border:1px dotted">
      							<div class="w3-col l12 ">
      								<label>Embed Video (optional):</label>
      								<a data-toggle="modal" title="Help for video links" data-target="#embedVidModal" onclick="openHelp('embedVidModal')" style="padding: 0;margin: 0" class="btn w3-large w3-text-yellow fa fa-question-circle "></a>
      								<input type="input" name="port_video[]" id="port_video_1" class="w3-input w3-border" onkeyup="readVideo(this,1);" placeholder="Copy & paste url link">
      								<span class="w3-text-red w3-small" id="video_error_1"></span>
      							</div>
      							<div class="w3-col l12 w3-margin-top">
                            	<iframe src="" class="w3-border" style="width: 100%;height: 120px;display:none" id="portVideoPreview_1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="w3-col l12" id="addedmore_vidDiv"></div>
                        <div class="w3-col l12 w3-margin-bottom">
                        	<a id="add_morevideo" title="Add new Item" class="btn w3-text-red add_moreProduct w3-small w3-right" style="padding-right: 0"><b>Add Video <i class="fa fa-plus"></i></b>
                        	</a>
                        </div>
                    </div>

                    <!-- Brochures div -->
                    <div class="col-md-4 w3-small w3-padding-small w3-margin-bottom">
                    	<div class="col-md-12 col-xs-12 w3-padding-small" style="border:1px dotted">
                    		<div class="w3-col l12 w3-margin-bottom">
                    			<label>Important links (optional):</label>
                          <input type="input" name="port_link[]" id="port_link_1" class="w3-input w3-border" placeholder="Paste important links">
                    			<span class="w3-text-red w3-small" id="file_error_1"></span>
                    		</div>
                    	</div>
                    	<div class="w3-col l12" id="addedmore_linkDiv"></div>
                    	<div class="w3-col l12 w3-margin-bottom">
                    		<a id="add_morelink" title="Add new Item" class="btn w3-text-red add_moreProduct w3-small w3-right" style="padding-right: 0"><b>Add More <i class="fa fa-plus"></i></b>
                    		</a>
                    	</div>
                    </div>

                </div>
                <!-- ---div for images -->
            </div>
            <div class="col-lg-2"></div>
        </div>                   
        <div class="w3-col l12 w3-center" id="btnsubmit">
        	<button type="submit" title="Save and Add new Portfolio" id="submitForm" class="btn theme_bg">Save new Portfolio</button>
        </div>
    </form>
    <div id="formOutput" class="w3-margin"></div>
    <div ng-bind-html="delMessage" class="w3-margin"></div>
    <!-- Modal embed video help -->
    <div class="modal fade bs-example-modal-md" id="embedVidModal" role="dialog" aria-hidden="true">
    	<div class="modal-dialog modal-md">
    		<div class="modal-content">

    			<div class="modal-header">
    				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
    				</button>
    				<h4 class="modal-title w3-center theme_text" id="Edit Product title"> <b>Embed Video (HELP) </b></h4>
    			</div>
    			<div class="modal-body">
    				<p>Following are the instructions to embed video in a portfolio. </p>
    				<ul>
    					<li>Copy and Paste the remote url link in given input field.</li>
    					<li>As you paste the url link, if the url link is valid, you may see video controls and poster below input field.</li>
    					<li>Examples:
    						<ol>
    							<li>"https://<b><u>player.vimeo.com</u></b>/video/197879767" <i class="fa fa-check w3-large w3-text-green"></i></li>
    							<li>"https://vimeo.com/197879767" <i class="fa fa-remove w3-large w3-text-red"></i></li>
    							<li>"https://www.youtube.com/<b><u>embed</u></b>/OdCqB-uouHA" <i class="fa fa-check w3-large w3-text-green"></i></li>
    							<li>"https://www.youtube.com/watch?v=OdCqB-uouHA" <i class="fa fa-remove w3-large w3-text-red"></i></li>
    						</ol>
    					</li>
    					
    				</ul>
    			</div>
    		</div>
    	</div>
    </div>
    <!-- end help modal -->
</div>

</div>
</div>

</div>
<br />

<!-- all product list -->
<div class="row" >
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="page_title">

      <div class="row x_title">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> All Portfolios </h4>
        </div>

      </div>
      <div class="container">
        
        <div class="w3-col l12 w3-padding w3-small" id="allPortfolioDiv">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr >
                <th class="text-center">Status</th>
                <th class="text-center">Name</th>
                <th class="text-center">Category</th>
                <th class="text-center">Client's Name</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if($all_portfolios){
              foreach($all_portfolios as $port){
                ?>
              <tr class="w3-center">
                <td>
                  <?php 
                  if($port['is_featured']=='1'){
                    echo '<label class="w3-padding-small badge">Featured</label>';
                  }
                  else{
                    echo '---';
                  }
                  ?>
                </td>
                <td><?php echo $port['portfolio_name']; ?></td>
                <td><?php echo $port['cat_name']; ?></td>
                <td><?php echo $port['client_name']; ?></td>
                <td class="w3-center" style="vertical-align: middle;">
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-default w3-small dropdown-toggle" type="button" style="padding: 2px 6px">Action <span class="caret"></span>
                  </button>
                  <ul role="menu" class="dropdown-menu pull-right">
                    <li><a title="edit portfolio" href="<?php echo base_url(); ?>admin/manage_portfolio/portfolio/<?php echo base64_encode($port['portfolio_id']); ?>">Edit Portfolio</a>
                    </li>
                    <li><a ng-click="removePortfolio(<?php echo $port['portfolio_id']; ?>)" title="delete portfolio">Delete Portfolio</a>
                    </li>
                    <?php if($port['is_featured']=='1') 
                    { ?>
                      <li><a ng-click="unmarkPortfolio(<?php echo $port['portfolio_id']; ?>)" title="Unmark as Featured Portfolio">Unmark as Featured</a></li>
                    <?php } else
                    { ?>
                      <li><a ng-click="markPortfolio(<?php echo $port['portfolio_id']; ?>)" title="Mark as Featured Portfolio">Mark as Featured</a></li>
                    <?php } ?>                    
                  </ul>
                </div>
              </td>
              </tr>
            <?php
            } 
          }
            else{
            ?>
            <tr>
              <td colspan="5" class="w3-center theme_text"><b>No Portfolio Available</b></td>
            </tr>
            <?php } ?>                       
          </tbody>

        </table>

      </div>

    </div>
  </div>
</div>

</div>
<br />
</div>

<script src="<?php echo base_url();?>assets/js/module/portfolio.js"></script>
<!-- /page content -->

