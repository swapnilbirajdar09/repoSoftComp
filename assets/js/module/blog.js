// ---------- Product page script file ----------------//

// function to add multiple divs for portfolio image
$(document).ready(function () {
  var max_fields = 5;
  var wrapper = $("#addedmore_imageDiv");
  var add_button = $("#add_moreimage");
  var x = 1;
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append('<div>\n\
        <div class="w3-container w3-padding-small w3-margin-top" style="border:1px dotted">\n\
        <a href="#" style="padding:1px" class="delete btn w3-text-red w3-right w3-small" title="remove image"><i class="fa fa-remove"></i>\n\
        </a>\n\
        <div class="w3-col l12 ">\n\
        <label>Image: <font color ="red"><span id ="simage_star">*</span></font></label>\n\
        <input type="file" name="blog_image[]" id="blog_image_'+x+'" class="w3-input w3-border" onchange="readURL(this,'+x+');" style="padding:5px" required>\n\
        <span class="w3-text-red w3-small" id="image_error_'+x+'"></span>\n\
        </div>\n\
        <div class="w3-col l12 w3-margin-top w3-margin-bottom">\n\
        <img src="'+BASE_URL+'assets/images/admin/default_image.jpg" width="auto" id="ImagePreview_'+x+'" height="150px" alt="Portfolio Image will be displayed here once chosen." class=" w3-centerimg img-thumbnail" style="display: none;">\n\
        </div>\n\
        </div>\n\
        </div>'); //add input box
    } 
    else 
    {
      $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xlarge"></i> You Reached the maximum limit of adding ' + max_fields + ' fields</label>');   //alert when added more than 4 input fields
    }
  });
  $(wrapper).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});

// function to add multiple divs for portfolio video
$(document).ready(function () {
  var max_fields = 5;
  var wrapper = $("#addedmore_vidDiv");
  var add_button = $("#add_morevideo");
  var x = 1;
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append('<div>\n\
        <div class="w3-container w3-padding-small w3-margin-top" style="border:1px dotted">\n\
        <a href="#" style="padding:1px" class="delete btn w3-text-red w3-right w3-small" title="remove video"><i class="fa fa-remove"></i>\n\
        </a>\n\
        <div class="w3-col l12 ">\n\
        <label>Embed Video (optional):</label>\n\
        <input type="input" name="blog_video[]" id="blog_video_'+x+'" class="w3-input w3-border" onkeyup="readVideo(this,'+x+');" placeholder="Copy & paste url link">\n\
        <span class="w3-text-red w3-small" id="video_error_'+x+'"></span>\n\
        </div>\n\
        <div class="w3-col l12 w3-margin-top">\n\
        <iframe src="" class="w3-border" style="width: 100%;height: 120px;display:none" id="portVideoPreview_'+x+'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>\n\
        </div>\n\
        </div>\n\
        </div>'); //add input box
    } else {
        $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xlarge"></i> You Reached the maximum limit of adding ' + max_fields + ' fields</label>');   //alert when added more than 4 input fields
      }
    });
  $(wrapper).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});

// function to add multiple divs for portfolio links
$(document).ready(function () {
  var max_fields = 5;
  var wrapper = $("#addedmore_linkDiv");
  var add_button = $("#add_morelink");
  var x = 1;
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append('<div>\n\
        <div class="w3-container w3-padding-small w3-margin-top" style="border:1px dotted">\n\
        <a href="#" style="padding:1px" class="delete btn w3-text-red w3-right w3-small" title="remove link"><i class="fa fa-remove"></i>\n\
        </a>\n\
        <div class="w3-col l12 w3-margin-bottom">\n\
        <label>Important links (optional):</label>\n\
        <input type="input" name="blog_link[]" id="blog_link_'+x+'" class="w3-input w3-border" placeholder="Paste important url link">\n\
        <span class="w3-text-red w3-small" id="file_error_'+x+'"></span>\n\
        </div>\n\
        </div>\n\
        </div>'); //add input box
    } else {
      $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xlarge"></i> You Reached the maximum limit of adding ' + max_fields + ' fields</label>');   //alert when added more than 4 input fields
    }
  });
  $(wrapper).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});

// ----function to preview selected image for portfolio------//
function readURL(input,id) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

    var extension = $('#blog_image_'+id).val().split('.').pop().toLowerCase();
    // image validation
    if ($.inArray(extension, ['jpeg', 'png', 'jpg']) == -1) {
      $('#ImagePreview_'+id).hide();
      $('#ImagePreview_'+id).attr('src', '');
      $('#image_error_'+id).html('<i class="fa fa-remove"></i> ERROR: Please Select Image File. (file should end with .jpg/ .png/ .jpeg extension!) ');
    } else {
      $('#ImagePreview_'+id).show();
      $('#image_error_'+id).html('');
      reader.onload = function (e) {
        $('#ImagePreview_'+id).attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
}

// ----function to read video link and set to iframe for portfolio------//
function readVideo(input,id) {
  var url=$('#blog_video_'+id).val();    
  if(url==''){
    $('#portVideoPreview_'+id).hide();
    $('#video_error_'+id).html('');
  }
  else{
    $('#video_error_'+id).html('');
    if(url.match(/(^https:\/\/)|(^www)/)){
      $('#portVideoPreview_'+id).show();
      $('#portVideoPreview_'+id).error(function() {
        console.clear();
        $('#video_error_'+id).html('<span class="w3-text-red"> ERROR: URL is invalid!</span>');
      }).attr( "src",url );
    }
    else{
      $('#portVideoPreview_'+id).hide();
      $('#video_error_'+id).html('<span class="w3-text-red"> ERROR: URL is invalid!</span>');
    }
  }
  console.clear();
}

// function to add multiple divs for portfolio image
$(document).ready(function () {
  var max_fields = 5;
  var wrapper = $("#edit_addedmore_imageDiv");
  var add_button = $("#edit_add_moreimage");
  var x = 1;
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append('<div>\n\
        <div class="w3-container w3-padding-small w3-margin-top" style="border:1px dotted">\n\
        <a href="#" style="padding:1px" class="delete btn w3-text-red w3-right w3-small" title="remove image"><i class="fa fa-remove"></i>\n\
        </a>\n\
        <div class="w3-col l12 ">\n\
        <label>Portfolio Image: <font color ="red"><span id ="simage_star">*</span></font></label>\n\
        <input type="file" name="edit_port_image[]" id="edit_port_image_'+x+'" class="w3-input w3-border" onchange="edit_readURL(this,'+x+');" style="padding:5px" required>\n\
        <span class="w3-text-red w3-small" id="edit_image_error_'+x+'"></span>\n\
        </div>\n\
        <div class="w3-col l12 w3-margin-top w3-margin-bottom">\n\
        <img src="'+BASE_URL+'assets/images/admin/default_image.jpg" width="auto" id="edit_ImagePreview_'+x+'" height="150px" alt="Portfolio Image will be displayed here once chosen." class=" w3-centerimg img-thumbnail" style="display: none;">\n\
        </div>\n\
        </div>\n\
        </div>'); //add input box
    } 
    else 
    {
      $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xlarge"></i> You Reached the maximum limit of adding ' + max_fields + ' fields</label>');   //alert when added more than 4 input fields
    }
  });
  $(wrapper).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});

// function to add multiple divs for portfolio video
$(document).ready(function () {
  var max_fields = 5;
  var wrapper = $("#edit_addedmore_vidDiv");
  var add_button = $("#edit_add_morevideo");
  var x = $('#vidCount').val();
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append('<div>\n\
        <div class="w3-container w3-padding-small w3-margin-top" style="border:1px dotted">\n\
        <a href="#" style="padding:1px" class="delete btn w3-text-red w3-right w3-small" title="remove video"><i class="fa fa-remove"></i>\n\
        </a>\n\
        <div class="w3-col l12 ">\n\
        <label>Embed Video (optional):</label>\n\
        <input type="input" name="edit_port_video[]" id="edit_port_video_'+x+'" class="w3-input w3-border" onkeyup="edit_readVideo(this,'+x+');" placeholder="Copy & paste url link">\n\
        <span class="w3-text-red w3-small" id="edit_video_error_'+x+'"></span>\n\
        </div>\n\
        <div class="w3-col l12 w3-margin-top">\n\
        <iframe src="" class="w3-border" style="width: 100%;height: 120px;display:none" id="edit_portVideoPreview_'+x+'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>\n\
        </div>\n\
        </div>\n\
        </div>'); //add input box
    } else {
        $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xlarge"></i> You Reached the maximum limit of adding ' + max_fields + ' fields</label>');   //alert when added more than 4 input fields
      }
    });
  $(wrapper).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});

// function to add multiple divs for portfolio links
$(document).ready(function () {
  var max_fields = 5;
  var wrapper = $("#edit_addedmore_linkDiv");
  var add_button = $("#edit_add_morelink");
  var x = $('#linkCount').val();
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      $(wrapper).append('<div>\n\
        <div class="w3-container w3-padding-small w3-margin-top" style="border:1px dotted">\n\
        <a href="#" style="padding:1px" class="delete btn w3-text-red w3-right w3-small" title="remove link"><i class="fa fa-remove"></i>\n\
        </a>\n\
        <div class="w3-col l12 w3-margin-bottom">\n\
        <label>Important links (optional):</label>\n\
        <input type="input" name="edit_port_link[]" id="edit_port_link_'+x+'" class="w3-input w3-border" placeholder="Paste important url link">\n\
        <span class="w3-text-red w3-small" id="edit_file_error_'+x+'"></span>\n\
        </div>\n\
        </div>\n\
        </div>'); //add input box
    } else {
      $.alert('<label class="w3-label w3-text-red"><i class="fa fa-warning w3-xlarge"></i> You Reached the maximum limit of adding ' + max_fields + ' fields</label>');   //alert when added more than 4 input fields
    }
  });
  $(wrapper).on("click", ".delete", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});

// ----function to preview selected image for portfolio------//
function edit_readURL(input,id) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    var extension = $('#edit_port_image_'+id).val().split('.').pop().toLowerCase();
    // image validation
    if ($.inArray(extension, ['jpeg', 'png', 'jpg']) == -1) {
      $('#edit_ImagePreview_'+id).hide();
      $('#edit_ImagePreview_'+id).attr('src', '');
      $('#edit_image_error_'+id).html('<i class="fa fa-remove"></i> ERROR: Please Select Image File. (file should end with .jpg/ .png/ .jpeg extension!) ');
    } else {
      $('#edit_ImagePreview_'+id).show();
      $('#edit_image_error_'+id).html('');
      reader.onload = function (e) {
        $('#edit_ImagePreview_'+id).attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
}

// ----function to read video link and set to iframe for portfolio------//
function edit_readVideo(input,id) {
  var url=$('#edit_port_video_'+id).val();    
  if(url==''){
    $('#edit_portVideoPreview_'+id).hide();
    $('#edit_video_error_'+id).html('');
  }
  else{
    $('#edit_video_error_'+id).html('');
    if(url.match(/(^https:\/\/)|(^www)/)){
      $('#edit_portVideoPreview_'+id).show();
      $('#edit_portVideoPreview_'+id).error(function() {
        console.clear();
        $('#edit_video_error_'+id).html('<span class="w3-text-red"> ERROR: URL is invalid!</span>');
      }).attr( "src",url );
      
    }
    else{
      $('#edit_portVideoPreview_'+id).hide();
      $('#edit_video_error_'+id).html('<span class="w3-text-red"> ERROR: URL is invalid!</span>');
    }
  }
  console.clear();
}

// ----function to open modal product------//
function openModal(id) {
  var modal=$('#ProdModal_'+id);
  modal.addClass('in');
}

// ----function to open modal product------//
function openHelp(modal_id) {
  var modal=$('#'+modal_id);
  modal.addClass('in');
}


// Angular js for all product view
var app = angular.module("BlogApp", ['ngSanitize']); 
app.controller("BlogCtrl", function($scope,$http,$window) {

  $scope.tags = [];

  // add tags to temp 
  $scope.addTag = function () {
    $scope.errortext = "";
    if (!$scope.addTagValue) {
      return;
    }
    if ($scope.tags.indexOf($scope.addTagValue) == -1) {
      $scope.tags.push($scope.addTagValue);
      $scope.tagsJSON = JSON.stringify($scope.tags);
      $scope.addTagValue='';
    } else {
      $scope.errortext = "<b>Warning:</b> This Tag is already included !";
    }
  };
  // remove tag from temp
  $scope.removeTag = function (x) {
    $scope.errortext = "";
    $scope.tags.splice(x, 1);
    $scope.tagsJSON = JSON.stringify($scope.tags);
  };

  // remove blog from db
  $scope.removeBlog = function (blog_id) {
    $.confirm({
      title: '<h4 class="w3-text-red">Please confirm the action!</h4><span class="w3-medium">Do you really want to delete this post?</span>',
      content: '',
      type: 'red',
      buttons: {
        confirm: function () {
         $http({
           method: 'get',
           url: BASE_URL+'admin/manage_blogs/removeBlog',
           params: {blog_id: blog_id},
         }).then(function successCallback(response) {
          $scope.delMessage = response.data;
          $window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove(); 
            });
            location.reload();
          }, 1500);
        }); 
       },
       cancel: function () {
       }
     }
   });
  }

// add new blog
$("#addBlog_form").on('submit', function(e) {
 e.preventDefault(); 
 var cat=$('#blog_category').val();
 $('#blog_message').text($('#editor-one').html());
 $('#cat_error').html('');

 if(cat==0){
  $('#blog_category').focus();
  $('#cat_error').html('<b> ERROR: Please select one Category. </b>');
  if(navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
    $("html,body").animate({scrollTop:0},"slow");
    document.scrollingElement.scrollTop;
  } else {
   $("html,body").animate({scrollTop:0},"slow");
 }
 return false;
}

dataString = $("#addBlog_form").serialize();
$.ajax({
    url: BASE_URL+"admin/manage_blogs/addBlog", // point to server-side PHP script
    data: new FormData(this),
    type: 'POST',
    contentType: false, // The content type used when sending data to the server.
    cache: false, // To unable request pages to be cached
    processData: false,
    beforeSend: function(){
      $('#btnsubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-circle-o-notch fa-spin w3-large"></i> <b>Adding Portfolio. Hold on...</b></span>');
    },
    success: function(data){
      $('#formOutput').html(data);
      $('#btnsubmit').html('<button type="submit" title="Post new Blog" id="submitForm" class="btn theme_bg">Post new Blog</button>');
    },
    error:function(data){
     $('#formOutput').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
     $('#btnsubmit').html('<button type="submit" title="Post new Blog" id="submitForm" class="btn theme_bg">Post new Blog</button>');
     window.setTimeout(function() {
       $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
       });
     }, 5000);
   }
 });
return false;  //stop the actual form post !important!
});

});


// upload image script for edit portfolio
$("#uploadImageForm").on('submit', function(e) {
 e.preventDefault(); 
 dataString = $("#uploadImageForm").serialize();
 $.ajax({
    url: BASE_URL+"admin/manage_portfolio/uploadImagePortfolio", // point to server-side PHP script
    data: new FormData(this),
    type: 'POST',
    contentType: false, // The content type used when sending data to the server.
    cache: false, // To unable request pages to be cached
    processData: false,
    beforeSend: function(){
      $('#uploadImage').html('<i class="fa fa-circle-o-notch fa-spin w3-large"></i> uploading...');
    },
    success: function(data){
      $('#edit_formOutput').html(data);
      $('#uploadImage').html('Upload Image');

      window.setTimeout(function() {
       $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
       });
       window.location.reload();
     }, 1000);
    },
    error:function(data){
     $('#edit_formOutput').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
     $('#uploadImage').html('Upload Image');
     window.setTimeout(function() {
       $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
       });
     }, 5000);
   }
 });
return false;  //stop the actual form post !important!
});


// edit portfolio form submit
$("#editPortfolio_form").on('submit', function(e) {
 e.preventDefault(); 
 dataString = $("#editPortfolio_form").serialize();
 $.ajax({
    url: BASE_URL+"admin/manage_portfolio/editPortfolio", // point to server-side PHP script
    data: new FormData(this),
    type: 'POST',
    contentType: false, // The content type used when sending data to the server.
    cache: false, // To unable request pages to be cached
    processData: false,
    beforeSend: function(){
      $('#edit_btnsubmit').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-circle-o-notch fa-spin w3-large"></i> <b>Updating Portfolio...</b></span>');
    },
    success: function(data){
      $('#edit_formOutput').html(data);
      $('#edit_btnsubmit').html('<button type="submit" title="Save and Add new Portfolio" id="edit_submitForm" class="btn theme_bg">Save Changes</button>');

      window.setTimeout(function() {
       $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
       });
       window.location.reload();
     }, 1000);
    },
    error:function(data){
     $('#edit_formOutput').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
     $('#edit_btnsubmit').html('<button type="submit" title="Save and Add new Portfolio" id="edit_submitForm" class="btn theme_bg">Save Changes</button>');
     window.setTimeout(function() {
       $(".alert").fadeTo(500, 0).slideUp(500, function(){
         $(this).remove(); 
       });
     }, 5000);
   }
 });
return false;  //stop the actual form post !important!
});

// reove image from portfolio gallery
function removeImage(key,portfolio_id) {
  $.confirm({
    title: '<h4 class="w3-text-red">Please confirm the action!</h4><span class="w3-medium">Do you really want to remove this Image?</span>',
    content: '',
    type: 'red',
    buttons: {
      confirm: function () {
        $.ajax({
          type: "GET",
          url: BASE_URL + "admin/manage_portfolio/removeImage",
          data: {
            key: key,
            portfolio_id: portfolio_id
          },
          cache: false,
          beforeSend: function(){
            $('#imgBtn_'+key).html('<i class="fa fa-circle-o-notch fa-spin w3-large"></i>');
          },
          success: function(data){
            $('#edit_formOutput').html(data);
            $('#imgBtn_'+key).html('<i class="fa fa-times"></i>');

            window.setTimeout(function() {
             $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
             });
             window.location.reload();
           }, 2000);
          },
          error:function(data){
           $('#edit_formOutput').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
           $('#imgBtn_'+key).html('<i class="fa fa-times"></i>');
           window.setTimeout(function() {
             $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(this).remove(); 
             });
           }, 5000);
         }
       });
      },
      cancel: function () {
      }
    }
  });
}