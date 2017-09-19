
 jQuery(document).ready(function($) {



var loading  = false; //prevents multiple loads

//load_contents(track_page); //initial content load

$(window).scroll(function() { //detect page scroll
	if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled to bottom of the page
		//load_contents(); //load content	
	}
});		
//Ajax load function
function load_contents(){
    if(loading == false){
		loading = true;  //set loading flag on
		$('.loading-info').show(); //show loading animation 
		$('.not_found').remove(); //show loading animation 
		var paged =  $('.loading-info').attr("paged"); //show loading animation 
		if(paged == null)
		paged = 1;
		else
		paged = paged;
		
		$.post(  MyAjax.ajaxurl, {'paged': paged, action : 'check-and-call-post'}, function(data){
			loading = false; //set loading flag off once the content is loaded
				$('.not_found').show(); //show loading animation 
			$('.loading-info').hide(); //hide loading animation once data is received
				$("tbody").append(data.result); //append data into #results element
				$('.loading-info').attr("paged", data.paged);
			
		}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
			alert(thrownError); //alert with HTTP error
		})
	}
}



function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};


        $('#input_defendants_email_address').keyup(function(){
            var searchField = $('#input_defendants_email_address').val();
			//$('.ajax_email_search').append('')
           // var regex = new RegExp(searchField, "i");
		   $("#show_user_info").hide(); //append data into #results element
		   
           
            var count = searchField.length;
			if(count >= 3){
				$('.wcro-item ').remove();
				if( !isValidEmailAddress( searchField ) ) {
					return false
					$('.ajax_email_search').hide();		
				}else{
				$('.ajax_email_search').show();		
				}
				//alert("this is three");
				//$('.loading-info').attr("paged", "1");
		/*var paged =  $('.loading-info').attr("paged"); //show loading animation 
		if(paged == null)
		paged = 0;
		else
		paged = paged;*/
		
		
		var fastlast = '<div class="row" style="padding:5px 0;"><div class="col-sm-6"><input name="first_name" class="data_dynamic " placeholder="First Name" id="id_first_name" /></div><div  class="col-sm-6"><input name="last_name" id="id_last_name" class="data_dynamic" placeholder="Last Name" /></div></div>';
		
		
            $.post(MyAjax.ajaxurl, {'key': searchField, action : 'search_to_find_user'}, function(data) {
             
			
			 
              loading = false; //set loading flag off once the content is loaded
			//if(data.result.trim().length == 0){
				if(data == null){
				//notify user if nothing to load
				//$('tbody').html("");
				$('.ajax_email_search').hide();
				
				return;
				
			}
			$('.ajax_email_search').hide(); //hide loading animation once data is received
			 if(data.massage == 'Nothing Found'){
				 $('#fr_lr').html(fastlast);//append data into #results element
			 }else{
				$('#show_user_info').html(data.massage);//append data into #results element	 
				 $('#fr_lr').html("");//append data into #results element
			}
			
			
			
			 //$("#show_user_info").show();
			//$('.loading-info').attr("paged", data.paged);
			//alert(data.result);
			
		}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
			alert(thrownError); //alert with HTTP error
		})
		}
    });







	
});

jQuery(document).ready(function($) {

 function data_dynamic($id){
	 var str = '';
	 	$( $id+" .data_dynamic" ).each(function( index) {
			
			var name = $(this).attr('name');
			if(name){
				name = name;
				}else{
				name = null;	
				}
			
			var value = $(this).attr('value');
			if(value){
				var value = value;
				}else{
				var value = null;	
				}
			
			
					str += name +':'+ value +',';
					
		})
		
		return str;
	 
	 }


function error_handle($arr, $area){
		
		$.each($arr, function (index, value) {
			  console.log(value);
			  var id = '#input_'+value;
			 var id = $area+' '+id;
  			$(id).parents( '.form-group' ).addClass( 'has-error' );
			$(id).addClass( 'outline ' );
  // Will stop running after "three"
		});
	
	}


$("#registration").on("click", "#input_submit_registration", function(e) {
				$( '.form-group' ).removeClass( 'has-error' );
				$( '.form-control' ).removeClass( 'outline' );
			  $('#registration .loading-info').show();
			var string = data_dynamic('#registration');
			var nonce_data = $('#filed_ajax_registration_nonce').val();
			var st_items = '';
			$.post(MyAjax.ajaxurl, {str: string, filed_ajax_registration_nonce: nonce_data,  action : 'registration'}, function(data) {
            $('#registration #display_result').html(data.massage);
			// alert(data.massage);
			 if(data.error == true)
			 	error_handle(data.error_id, '#registration');
			 if(data.success == true)
			 	$('#registration #form_field_wapper').hide();
				
			  $('#registration .loading-info').hide();
			
			 
			
			

		}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
			alert(thrownError); //alert with HTTP error
		})
		
		
	});

	

	$("#login").on("click", "#input_submit_login", function(e) {
				$( '.form-group' ).removeClass( 'has-error' );
				$( '.form-control' ).removeClass( 'outline' );
			  $('#login .loading-info').show();
			var string = data_dynamic('#login');
			var nonce_data = $('#filed_ajax_login_nonce').val();
			var st_items = '';
			$.post(MyAjax.ajaxurl, {str: string, filed_ajax_login_nonce: nonce_data,  action : 'login'}, function(data) {
            $('#login #display_result').html(data.massage);
			// alert(data.massage);
			 if(data.error == true)
			 	error_handle(data.error_id, '#login');
			 if(data.success == true)
			 	$('#login').css('display', 'none');
			  $('#login .loading-info').hide();
			 if (data.loggedin == true){
                    document.location.href = data.redirect;
                }
			 
			
			

		}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
			alert(thrownError); //alert with HTTP error
		})
		
		
	});

	
	$("#fileaclame").on("click", ".file_a_clame", function(e) {
				$( '.form-group' ).removeClass( 'has-error' );
				$( '.form-control' ).removeClass( 'outline' );

			  $('#fileaclame .loading-info').show();
			var string = data_dynamic('#fileaclame');
			var nonce_data = $('#filed_ajax_fileaclame_nonce').val();
			var st_items = '';
			$.post(MyAjax.ajaxurl, {str: string, filed_ajax_fileaclame_nonce: nonce_data,  action : 'fileaclame'}, function(data) {
            $('#fileaclame #display_result').html(data.massage);
			// alert(data.massage);
			  if(data.error == true)
			 	error_handle(data.error_id, '#fileaclame');
			 if(data.success == true)
			 	$('#fileaclame').css('display', 'none');
			  $('#fileaclame .loading-info').hide();
			 if (data.redirect){
                    document.location.href = data.redirect;
                }
			 
			
			

		}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
			alert(thrownError); //alert with HTTP error
		})
		
		
	});

	
});
	