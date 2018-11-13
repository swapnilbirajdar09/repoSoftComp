var loc = window.location.hostname;
var loca = encodeURIComponent(loc);
var m ='';
$('#checked').remove();
$.ajax({url: 'https://activeitzone.com/check/index.php/home/check_m/'+loca, success: function(result){	
	$('#checked').remove();
    if(result !== ''){
    	if(result !== 'nice'){
	    	if(result == 'bad'){
				var al = 'Domain not registered with Active Matrimonial CMS! Please Activate from Admin Panel (Activate)';
				var bvh = '<center><h1>The Software is Unactivated! Please <a href="http://activeitzone.com/check/">Activate</a>.</h1></center>';
				
				/*
				if($('.container').length){
					//$('.container').html(vbh);
					alert(al);
					$('img').attr('src','');
					if($('.navbar').length){
						$('.navbar').html(bvh);
					}
					if($('.shadow').length){
						$('.shadow').css('background','red');
					} if($('.filter-results').length){
						$('.filter-results').closest('.col-md-9').html('<h1>No Products!</h1>');
					}
					$('.thumb-product-img').css('background','red');
					alert(al);
					setInterval(function(){alert(al)}, 15000);
				}
				*/

				if($('.container').length){
					alert(al);
					//if($('.navbar').length){
					$('html').html(bvh);
					//}
					setInterval(function(){alert(al)}, 15000);
					//$('body').html('<h1>THIEF</h1>');
				}

				/*
				if($('#content-container').length){
					$('#content-container').html(vbh);
				
					alert(al);

				}
				*/
				m = 'p';
			}
		}
	}
	if(m == 'p'){
		
		//
		var locd = window.location.href;
		locd = encodeURIComponent(locd);
		$.ajax({url: 'https://activeitzone.com/check/index.php/home/unauth?url='+locd, success: function(result){  }});
	}
}});
