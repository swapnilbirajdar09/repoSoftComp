// ---------- Blog page script file ----------------//


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
        <input type="input" name="edit_blog_video[]" id="edit_blog_video_'+x+'" class="w3-input w3-border" onkeyup="edit_readVideo(this,'+x+');" placeholder="Copy & paste url link">\n\
        <span class="w3-text-red w3-small" id="edit_video_error_'+x+'"></span>\n\
        </div>\n\
        <div class="w3-col l12 w3-margin-top">\n\
        <iframe src="" class="w3-border" style="width: 100%;height: 120px;display:none" id="edit_blogVideoPreview_'+x+'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>\n\
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
        <input type="input" name="edit_blog_link[]" id="edit_blog_link_'+x+'" class="w3-input w3-border" placeholder="Paste important url link">\n\
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

    var extension = $('#edit_blog_image_'+id).val().split('.').pop().toLowerCase();
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
  var url=$('#edit_blog_video_'+id).val();    
  if(url==''){
    $('#edit_blogVideoPreview_'+id).hide();
    $('#edit_video_error_'+id).html('');
  }
  else{
    $('#edit_video_error_'+id).html('');
    if(url.match(/(^https:\/\/)|(^www)/)){
      $('#edit_blogVideoPreview_'+id).show();
      $('#edit_blogVideoPreview_'+id).error(function() {
        console.clear();
        $('#edit_video_error_'+id).html('<span class="w3-text-red"> ERROR: URL is invalid!</span>');
      }).attr( "src",url );
      
    }
    else{
      $('#edit_blogVideoPreview_'+id).hide();
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

// upload image script for edit portfolio
$("#uploadImageForm").on('submit', function(e) {
 e.preventDefault(); 
 dataString = $("#uploadImageForm").serialize();
 $.ajax({
    url: BASE_URL+"admin/manage_blogs/uploadImageBlog", // point to server-side PHP script
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
$("#editBlog_form").on('submit', function(e) {
 e.preventDefault(); 
 var cat=$('#edit_blog_category').val();
 $('#blog_message').text($('#editor-one').html());
 $('#cat_error').html('');

 if(cat==0){
  $('#edit_blog_category').focus();
  $('#cat_error').html('<b> ERROR: Please select one Category. </b>');
  if(navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {           
    $("html,body").animate({scrollTop:0},"slow");
    document.scrollingElement.scrollTop;
  } else {
   $("html,body").animate({scrollTop:0},"slow");
 }
 return false;
}

 dataString = $("#editBlog_form").serialize();
 $.ajax({
    url: BASE_URL+"admin/manage_blogs/editBlog", // point to server-side PHP script
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

// edit portfolio form submit
$("#addTagForm").on('submit', function(e) {
 e.preventDefault(); 
 dataString = $("#addTagForm").serialize();
 $.ajax({
    url: BASE_URL+"admin/manage_blogs/addTag", // point to server-side PHP script
    data: new FormData(this),
    type: 'POST',
    contentType: false, // The content type used when sending data to the server.
    cache: false, // To unable request pages to be cached
    processData: false,
    beforeSend: function(){
      $('#editTagBtn').html('<span class="w3-card w3-padding-small w3-margin-bottom w3-round"><i class="fa fa-circle-o-notch fa-spin w3-large"></i> <b>adding...</b></span>');
    },
    success: function(data){
      $('#edit_formOutput').html(data);
      $('#editTagBtn').html('<button class="w3-button theme_bg" type="submit" title="add tag"><i class="fa fa-plus"></i><span class="w3-hide-small"> Add Tag</span></button>'); 
    },
    error:function(data){
     $('#edit_formOutput').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
     $('#editTagBtn').html('<button class="w3-button theme_bg" type="submit" title="add tag"><i class="fa fa-plus"></i><span class="w3-hide-small"> Add Tag</span></button>');
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
function removeImage(key,blog_id) {
  $.confirm({
    title: '<h4 class="w3-text-red">Please confirm the action!</h4><span class="w3-medium">Do you really want to remove this Image?</span>',
    content: '',
    type: 'red',
    buttons: {
      confirm: function () {
        $.ajax({
          type: "GET",
          url: BASE_URL + "admin/manage_blogs/removeImage",
          data: {
            key: key,
            blog_id: blog_id
          },
          cache: false,
          beforeSend: function(){
            $('#imgBtn_'+key).html('<i class="fa fa-circle-o-notch fa-spin w3-large"></i>');
          },
          success: function(data){
            $('#edit_formOutput').html(data);
            $('#imgBtn_'+key).html('<i class="fa fa-times"></i>');
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

// reove remove tag
function removeTag(key,blog_id) {
  $.confirm({
    title: '<h4 class="w3-text-red">Please confirm the action!</h4><span class="w3-medium">Do you really want to remove this tag?</span>',
    content: '',
    type: 'red',
    buttons: {
      confirm: function () {
        $.ajax({
          type: "GET",
          url: BASE_URL + "admin/manage_blogs/removeTag",
          data: {
            key: key,
            blog_id: blog_id
          },
          cache: false,
          beforeSend: function(){
            $('#tagBtn_'+key).html('<i class="fa fa-circle-o-notch fa-spin"></i>');
          },
          success: function(data){
            $('#edit_formOutput').html(data);
            $('#tagBtn_'+key).html('<i class="fa fa-times-circle"></i>');
          },
          error:function(data){
           $('#edit_formOutput').html('<div class="alert alert-warning alert-dismissible fade in alert-fixed w3-round"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Failure!</strong> Something went wrong. Please refresh the page and try once again.</div>');
           $('#tagBtn_'+key).html('<i class="fa fa-times-circle"></i>');
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
