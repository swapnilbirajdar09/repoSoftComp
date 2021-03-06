
<title>SoftComp | Blogs Section</title>
<style type="text/css">
span.tag{
  padding: 5px 9px;
  background: #1ABB9C;
  color: #F1F6F7;
  margin-right: 5px;
  font-weight: 500;
  margin-bottom: 5px;
  font-family: helvetica;
}
</style>
<!-- page content -->
<div class="right_col" role="main" ng-app="BlogApp" ng-cloak ng-controller="BlogCtrl">

	<div class="row" >
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="page_title">

				<div class="row x_title">
					<div class="col-md-6">
						<h4><i class="fa fa-plus"></i> Post Blog </h4>
					</div>
				</div>
        <!-- <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div> -->
        <div class="alert alert-fixed"></div>
        <div class="row w3-padding w3-white theme_text">
         <form id="addBlog_form" name="addBlog_form" enctype="multipart/form-data">
          <div class="w3-col l12 s12 m12 w3-margin-top">
           <div class="col-lg-1"></div>
           <div class="col-lg-9">
            <div class="w3-col l12 w3-padding-small">
              <div class="col-md-6 col-xs-12 s12 m12 w3-small w3-padding-bottom">
                <label> Blog Category: <font color ="red"><span id ="pcat_star">*</span></font></label><br>
                <select class="w3-input w3-border w3-margin-bottom" name="blog_category" id="blog_category">
                  <option value="0" class="w3-light-grey">Choose category</option>
                  <?php foreach ($categories as $cat){ ?>
                    <option value="<?php echo $cat['cat_id']; ?>"><?php echo strtoupper($cat['cat_name']); ?></option>
                  <?php } ?>
                </select>
                <span class="w3-text-red w3-small" id="cat_error"></span>                   
              </div>
            </div>
            <div class="w3-col l12 w3-padding-small">
              <div class="col-md-12 col-xs-12 w3-small w3-padding-bottom">
               <label> Blog Title: <font color ="red"><span id ="pname_star">*</span></font></label><br>
               <input type="text" name="blog_title" id="blog_title" value="" placeholder="Add Blog Title" class="w3-input w3-border w3-margin-bottom" required>
             </div>
             <div class="col-md-12 col-xs-12 w3-small w3-padding-bottom">
              <label> Blog Description: <font color ="red"><span id ="pdescription_star">*</span></font></label><br>
              <div id="alerts"></div>
              <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>
                      <a data-edit="fontSize 5">
                        <p style="font-size:17px">Huge</p>
                      </a>
                    </li>
                    <li>
                      <a data-edit="fontSize 3">
                        <p style="font-size:14px">Normal</p>
                      </a>
                    </li>
                    <li>
                      <a data-edit="fontSize 1">
                        <p style="font-size:11px">Small</p>
                      </a>
                    </li>
                  </ul>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                  <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                  <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                  <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                  <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                  <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                  <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                  <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                  <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                  <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                </div>

                <div class="btn-group">
                  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                  <div class="dropdown-menu input-append">
                    <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                    <button class="btn" type="button">Add</button>
                  </div>
                  <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                </div>
                <div class="btn-group">
                  <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                  <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                </div>
              </div>
              <div id="editor-one" class="editor-wrapper"></div>
              <textarea name="blog_message" id="blog_message" style="display:none;"></textarea>
            </div>
            <div class="col-md-12 col-xs-12 w3-small w3-padding-bottom">
              <br>
              <label> Tags (optional):</label><br>
              <div class="w3-col l6">
                <div class="w3-col l10 s10">
                  <input list="TagList" type="text" name="tag_name" ng-model="addTagValue" id="tag_name" class="form-control" placeholder="technology, social, news, blog, etc." value="">
                  <datalist id="TagList">
                    <?php foreach($allTags as $row) { ?>
                      <option data-value="<?php echo $row['tag_value']; ?>" value="<?php echo $row['tag_value']; ?>"><?php echo $row['tag_value']; ?></option>                  
                    <?php } ?>
                  </datalist>
                </div>
                <div class="w3-col l2 s2">
                  <button class="w3-button theme_bg" type="button" ng-click="addTag()" title="add tag"><i class="fa fa-plus"></i><span class="w3-hide-small"> Add Tag</span></button>
                </div>
                <div class="w3-col l12"><p class="w3-text-red">{{errortext}}</p></div>
                <input type="hidden" name="tagAdded_field" value="{{tagsJSON}}" id="tagAdded_field">
                
              </div>
              <div class="w3-col l12 w3-padding w3-round w3-margin-top w3-border" style="background-color: #F7F7F7">
                <label>Added Tags: </label><br>
                <span ng-repeat="t in tags" class="w3-round theme_bg" style="display: inline-block;padding: 5px 8px;margin-right: 5px;margin-bottom: 5px">{{t|uppercase}}&nbsp;&nbsp;<a ng-click="removeTag($index)" style="cursor:pointer;" class="fa fa-times-circle"></a></span>
              </div>
            </div>      						
          </div>

          <!-- ---div for images -->
          <div class="col-md-12 w3-padding-tiny">
           <div class="ln_solid"></div>
           <div class="col-md-4 w3-small w3-padding-small w3-margin-bottom">
            <div class="col-md-12 w3-padding-small" style="border:1px dotted">
             <div class="w3-col l12 ">
              <label>Image: <font color ="red"><span id ="simage_star">*</span></font></label>
              <input type="file" name="blog_image[]" id="blog_image_1" class="w3-input w3-border" onchange="readURL(this,1);" style="padding:5px" required>
              <span class="w3-text-red w3-small" id="image_error_1"></span>
            </div>
            <div class="w3-col l12 w3-margin-bottom">
              <img src="<?php echo base_url(); ?>assets/images/admin/default_image.jpg" width="auto" id="ImagePreview_1" height="150px" alt="Image will be displayed here once chosen." class=" w3-centerimg img-thumbnail w3-margin-top" style="display: none;">
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
          <input type="input" name="blog_video[]" id="blog_video_1" class="w3-input w3-border" onkeyup="readVideo(this,1);" placeholder="Copy & paste url link">
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
       <input type="input" name="blog_link[]" id="blog_link_1" class="w3-input w3-border" placeholder="Paste important links">
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
 <button type="submit" title="Post new Blog" id="submitForm" class="btn theme_bg">Post new Blog</button>
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
          <h4><i class="fa fa-list"></i> Posted Blogs </h4>
        </div>

      </div>
      <div class="container">

        <div class="w3-col l12 w3-padding w3-small" id="allPortfolioDiv">
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr >
                <th class="text-center">Category</th>
                <th class="text-center">Title</th>
                <th class="text-center">Tags Included</th>
                <th class="text-center">Posted on</th>
                <th class="text-center"></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              if($all_blogs){
                foreach($all_blogs as $blog){
                  ?>
                  <tr class="w3-center">
                    <td>
                      <?php echo $blog['cat_name']; ?>
                    </td>
                    <td><?php echo $blog['blog_title']; ?></td>
                    <td>
                      <?php 
                      if($blog['blog_tags']!='' && $blog['blog_tags']!='[]'){
                        foreach (json_decode($blog['blog_tags'],TRUE) as $key) {
                          echo '<span class="badge" style="padding:2px 6px;display:inline-block;margin-right:5px;margin-bottom:5px">'.$key.'</span>';
                        }                        
                      }
                      ?>
                    </td>
                    <td><?php echo date("d M Y", strtotime($blog['posted_date'])); ?></td>
                    <td class="w3-center" style="vertical-align: middle;">
                      <div class="btn-group">
                        <button data-toggle="dropdown" class="btn btn-default w3-small dropdown-toggle" type="button" style="padding: 2px 6px">Action <span class="caret"></span>
                        </button>
                        <ul role="menu" class="dropdown-menu pull-right">
                          <li><a title="edit blog" href="<?php echo base_url(); ?>admin/manage_blogs/blog/<?php echo base64_encode($blog['blog_id']); ?>">Edit Portfolio</a>
                          </li>
                          <li><a ng-click="removeBlog(<?php echo $blog['blog_id']; ?>)" title="delete blog">Delete Portfolio</a>
                          </li>                    
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
                  <td colspan="5" class="w3-center theme_text"><b>No Blog Available</b></td>
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

<script src="<?php echo base_url();?>assets/js/module/blog.js"></script>
<!-- /page content -->

