
<title>SoftComp | Porfolio Details</title>
<!-- page content -->
<div class="right_col" role="main">

	<div class="row" >
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="page_title">

				<div class="row x_title">
					<div class="col-md-6">
						<h4><i class="fa fa-edit"></i> Edit Portfolio - <?php echo $portfolioDetail[0]['portfolio_name']; ?> </h4>
					</div>
          <a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url(); ?>admin/manage_portfolio#allPortfolioDiv" ><i class="fa fa-chevron-left"></i> Back to All Portfolio</a>
        </div>
        <!-- <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div> -->
        <div class="alert alert-fixed"></div>
        <div class="row w3-padding w3-white theme_text">
          <form id="editPortfolio_form" name="editPortfolio_form" enctype="multipart/form-data">
            <div class="w3-col l12 s12 m12 w3-margin-top">
             <div class="col-lg-1"></div>
             <div class="col-lg-9">
              <div class="w3-col l12 w3-padding-small">
                <div class="col-md-6 col-xs-12 s12 m12 w3-small w3-padding-bottom">
                  <label> Client's Name: <span>(optional)</span></label><br>
                  <input type="text" name="edit_client_name" id="edit_client_name" value="<?php echo $portfolioDetail[0]['client_name']; ?>" placeholder="Add Client's Name" class="w3-input w3-border w3-margin-bottom">                    
                </div>
              </div>
              <div class="w3-col l12 w3-padding-small">
                <div class="col-md-6 col-xs-12 w3-small w3-padding-bottom">
                 <label> Portfolio Name: <font color ="red"><span id ="pname_star">*</span></font></label><br>
                 <input type="text" name="edit_portfolio_name" id="edit_portfolio_name" value="<?php echo $portfolioDetail[0]['portfolio_name']; ?>" placeholder="Add Portfolio Name" class="w3-input w3-border w3-margin-bottom" required>
               </div>
               <div class="col-md-6 col-xs-12 w3-small w3-padding-bottom">
                <label> Portfolio Category: <font color ="red"><span id ="pcat_star">*</span></font></label><br>
                <select class="w3-input w3-border w3-margin-bottom" name="edit_portfolio_category" id="edit_portfolio_category">
                  <option value="0" class="w3-light-grey">Choose product category</option>
                  <?php foreach ($categories as $cat){ ?>
                    <option value="<?php echo $cat['cat_id']; ?>" <?php if($portfolioDetail[0]['portfolio_category']==$cat['cat_id']){echo 'selected';} ?>><?php echo strtoupper($cat['cat_name']); ?></option>
                  <?php } ?>
                </select>
                <span class="w3-text-red w3-small" id="cat_error"></span>
              </div>
              <div class="col-md-12 col-xs-12 w3-small w3-padding-bottom">
               <label> Portfolio Description: <font color ="red"><span id ="pdescription_star">*</span></font></label><br>
               <textarea class="w3-input w3-border w3-margin-bottom" name="edit_portfolio_description" id="edit_portfolio_description" rows="6" placeholder="Add a short description about this project...." required><?php echo $portfolioDetail[0]['portfolio_description']; ?></textarea>
             </div>
           </div>
           <!-- ---div for images -->
           <div class="col-md-12 w3-padding-tiny">
             <!-- video div -->
             <div class="col-md-6 w3-small w3-padding-small w3-margin-bottom">
              <?php 
              if($portfolioDetail[0]['portfolio_videos']!='' && $portfolioDetail[0]['portfolio_videos']!='[""]'){
                $vidArr=json_decode($portfolioDetail[0]['portfolio_videos']);
                ?>
                <div class="col-md-12 col-xs-12 w3-padding-small" style="border:1px dotted">
                  <div class="w3-col l12 ">
                    <label>Embed Video (optional):</label>
                    <a data-toggle="modal" title="Help for video links" data-target="#edit_embedVidModal" onclick="openHelp('edit_embedVidModal')" style="padding: 0;margin: 0" class="btn w3-large w3-text-yellow fa fa-question-circle "></a>
                    <input type="input" name="edit_port_video[]" id="edit_port_video_1" class="w3-input w3-border" onkeyup="edit_readVideo(this,1);" value="<?php echo $vidArr[0]; ?>" placeholder="Copy & paste url link">
                    <span class="w3-text-red w3-small" id="edit_video_error_1"></span>
                  </div>
                  <div class="w3-col l12 w3-margin-top">
                    <iframe src="<?php echo $vidArr[0]; ?>" class="w3-border" style="width: 100%;height: 120px;" id="edit_portVideoPreview_1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                  </div>
                </div>
                <div class="w3-col l12" id="edit_addedmore_vidDiv">
                <?php 
                $vidCount=1;
                for ($i=1; $i < count($vidArr); $i++) { 
                  $vidCount=$i+1;
                  ?>
                  <div>
                  <div class="col-md-12 col-xs-12 w3-padding-small" style="border:1px dotted">
                    <a style="padding:1px" class="delete btn w3-text-red w3-right w3-small" title="remove link"><i class="fa fa-remove"></i></a>
                    <div class="w3-col l12 ">
                      <label>Embed Video (optional):</label>
                      <a data-toggle="modal" title="Help for video links" data-target="#edit_embedVidModal" onclick="openHelp('edit_embedVidModal')" style="padding: 0;margin: 0" class="btn w3-large w3-text-yellow fa fa-question-circle "></a>
                      <input type="input" name="edit_port_video[]" id="edit_port_video_<?php echo $vidCount; ?>" class="w3-input w3-border" onkeyup="edit_readVideo(this,'<?php echo $vidCount; ?>');" value="<?php echo $vidArr[$i]; ?>" placeholder="Copy & paste url link">
                      <span class="w3-text-red w3-small" id="edit_video_error_<?php echo $vidCount; ?>"></span>
                    </div>
                    <div class="w3-col l12 w3-margin-top">
                      <iframe src="<?php echo $vidArr[$i]; ?>" class="w3-border" style="width: 100%;height: 120px;" id="edit_portVideoPreview_<?php echo $vidCount; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
                  <?php 
                }
                ?>
              </div>
                <input type="hidden" id="vidCount" value="<?php echo count($vidArr)+1; ?>">
                <?php
              }
              else{
                ?>
                <div class="col-md-12 col-xs-12 w3-padding-small" style="border:1px dotted">
                 <div class="w3-col l12 ">
                  <label>Embed Video (optional):</label>
                  <a data-toggle="modal" title="Help for video links" data-target="#edit_embedVidModal" onclick="openHelp('edit_embedVidModal')" style="padding: 0;margin: 0" class="btn w3-large w3-text-yellow fa fa-question-circle "></a>
                  <input type="input" name="edit_port_video[]" id="edit_port_video_1" class="w3-input w3-border" onkeyup="edit_readVideo(this,1);" placeholder="Copy & paste url link">
                  <span class="w3-text-red w3-small" id="edit_video_error_1"></span>
                </div>
                <div class="w3-col l12 w3-margin-top">
                  <iframe src="" class="w3-border" style="width: 100%;height: 120px;display:none" id="edit_portVideoPreview_1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
              </div>
              <input type="hidden" id="vidCount" value="1">
              <div class="w3-col l12" id="edit_addedmore_vidDiv"></div>
              <?php 
            }
            ?>

            <div class="w3-col l12 w3-margin-bottom">
             <a id="edit_add_morevideo" title="Add new video" class="btn w3-text-red add_moreProduct w3-small w3-right" style="padding-right: 0"><b>Add Video <i class="fa fa-plus"></i></b>
             </a>
           </div>
         </div>

         <!-- Brochures div -->
         <div class="col-md-6 w3-small w3-padding-small w3-margin-bottom">
          <?php 
          if($portfolioDetail[0]['portfolio_link']!='' && $portfolioDetail[0]['portfolio_link']!='[""]'){
            $linkArr=json_decode($portfolioDetail[0]['portfolio_link']);
            ?>
            <div class="col-md-12 col-xs-12 w3-padding-small" style="border:1px dotted">
              <div class="w3-col l12 w3-margin-bottom">
               <label>Important links (optional):</label>
               <input type="input" value="<?php echo $linkArr[0]; ?>" name="edit_port_link[]" id="edit_port_link_1" class="w3-input w3-border" placeholder="Paste important links">
               <span class="w3-text-red w3-small" id="edit_file_error_1"></span>
             </div>
           </div>
           <div class="w3-col l12" id="edit_addedmore_linkDiv">
           <?php 
           $linkCount=1;
           for ($i=1; $i < count($linkArr); $i++) { 
            $linkCount=$i+1;
            ?>
            <div>
              <div class="col-md-12 col-xs-12 w3-padding-small w3-margin-bottom" style="border:1px dotted">
                <a style="padding:1px" class="delete btn w3-text-red w3-right w3-small" title="remove link"><i class="fa fa-remove"></i></a>
                <div class="w3-col l12 w3-margin-bottom">
                 <label>Important links (optional):</label>
                 <input type="input" value="<?php echo $linkArr[$i]; ?>" name="edit_port_link[]" id="edit_port_link_<?php echo $linkCount; ?>" class="w3-input w3-border" placeholder="Paste important links">
                 <span class="w3-text-red w3-small" id="edit_file_error_<?php echo $linkCount; ?>"></span>
               </div>
             </div>
           </div>
           <?php 
         }
         ?>
       </div>
         <input type="hidden" id="linkCount" value="<?php echo count($linkArr)+1; ?>">
         <?php
       }
       else{
        ?>
        <div class="col-md-12 col-xs-12 w3-padding-small" style="border:1px dotted">
          <div class="w3-col l12 w3-margin-bottom">
           <label>Important links (optional):</label>
           <input type="input" name="edit_port_link[]" id="edit_port_link_1" class="w3-input w3-border" placeholder="Paste important links">
           <span class="w3-text-red w3-small" id="edit_file_error_1"></span>
         </div>
       </div>
       <input type="hidden" id="linkCount" value="1">
       <div class="w3-col l12" id="edit_addedmore_linkDiv"></div>
       <?php 
     }
     ?>

     <div class="w3-col l12 w3-margin-bottom">
      <a id="edit_add_morelink" title="Add new links" class="btn w3-text-red add_moreProduct w3-small w3-right" style="padding-right: 0"><b>Add More <i class="fa fa-plus"></i></b>
      </a>
    </div>
  </div>
</div>
</div>
<div class="col-lg-2"></div>
</div>            
<input type="hidden" name="portfolio_id" id="portfolio_id" value="<?php echo $portfolioDetail[0]['portfolio_id']; ?>">       
<div class="w3-col l12 w3-center" id="edit_btnsubmit">
 <button type="submit" title="Save and Add new Portfolio" id="edit_submitForm" class="btn theme_bg">Save Changes</button>
</div>
</form>
<div id="edit_formOutput" class="w3-margin"></div>
<div ng-bind-html="edit_delMessage" class="w3-margin"></div>
<!-- Modal embed video help -->
<div class="modal fade bs-example-modal-md" id="edit_embedVidModal" role="dialog" aria-hidden="true">
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

<!-- Galeery section -->
<div class="row" >
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="page_title">

      <div class="row x_title">
        <div class="col-md-6">
          <h4><i class="fa fa-list"></i> <?php echo $portfolioDetail[0]['portfolio_name']; ?> Gallery </h4>
        </div>
      </div>
      <div class="container">        
        <div class="w3-col l12 w3-padding w3-small" id="portfolioGallery">
          <?php 
          $imageArr=json_decode($portfolioDetail[0]['portfolio_images'],TRUE);
          foreach ($imageArr as $key=>$value) {
            ?>
            <div class="col-md-3 col-xs-12 w3-margin-bottom">            
              <div class="w3-col l12 w3-card-2 w3-opacity w3-hover-opacity-off" style="height: 200px;background-image: url('<?php echo base_url(); ?><?php echo $value; ?>');background-repeat: no-repeat;background-position: center;background-size: contain;">
                <div class="w3-col l2 s2 theme_bg" style="height: 40px;z-index: 1;position: absolute;border-bottom-right-radius:100%;">
                  <a onclick="removeImage(<?php echo $key; ?>,<?php echo $portfolioDetail[0]['portfolio_id']; ?>)" class="w3-large w3-text-lightgrey btn" id="imgBtn_<?php echo $key; ?>" style="padding:0 0 0 8px" title="delete image"><i class="fa fa-times"></i></a>
                </div>
              </div>            
            </div>
            <?php 
          }
          ?>

          <!-- upload image -->
          <!-- <div class="col-md-12 col-xs-12 w3-padding-tiny">  -->
            <div class="col-md-6 w3-small w3-padding-small w3-margin-bottom">
             <div class="col-md-12 col-xs-12 w3-padding-small" style="border:1px dotted">
              <div class="w3-col l6 w3-margin-bottom">
                <form id="uploadImageForm" enctype="multipart/form-data">
                  <input type="hidden" name="img_portfolio_name" value="<?php echo $portfolioDetail[0]['portfolio_name']; ?>">
                  <input type="hidden" name="img_portfolio_id" value="<?php echo $portfolioDetail[0]['portfolio_id']; ?>">
                  <input type="hidden" name="img_portfolio_cat" value="<?php echo $portfolioDetail[0]['portfolio_category']; ?>">
                  <input type="hidden" name="img_portfolio_count" value="<?php echo count(json_decode($portfolioDetail[0]['portfolio_images'])); ?>">
                 <label>Portfolio Image: <font color ="red"><span id ="simage_star">*</span></font></label>
                 <input type="file" name="edit_port_image" id="edit_port_image_1" class="w3-input w3-border" onchange="edit_readURL(this,1);" style="padding:5px" required>
                 <span class="w3-text-red w3-small" id="edit_image_error_1"></span>
                 <div class="w3-col l12 w3-margin-top">
                   <button type="submit" title="upload image" id="uploadImage" class="btn theme_bg">Upload Image</button>
                 </div>
               </form>
             </div>
             <div class="col-md-6 w3-margin-bottom">
              <img src="<?php echo base_url(); ?>assets/images/admin/default_image.jpg" width="auto" id="edit_ImagePreview_1" height="150px" alt="Portfolio Image will be displayed here once chosen." class="img img-thumbnail w3-margin-top">
            </div>
          </div>
        </div>
        <!-- </div> -->
      </div>
    </div>
  </div>
</div>
</div>
<br />
</div>

<script src="<?php echo base_url();?>assets/js/module/portfolio.js"></script>
<!-- /page content -->

