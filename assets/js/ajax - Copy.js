
 jQuery(document).ready(function($) {



var loading  = false; //prevents multiple loads

//load_contents(track_page); //initial content load

$(window).scroll(function() { //detect page scroll
	if($(window).scrollTop() + $(window).height() >= $(document).height()) { //if user scrolled to bottom of the page
		load_contents(); //load content	
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






        $('#search').keyup(function(){
            var searchField = $('#search').val();
			
           // var regex = new RegExp(searchField, "i");
		   
           
            var count = searchField.length;
			if(count >= 3){
				$('.wcro-item ').remove();
				//alert("this is three");
				$('.loading-info').attr("paged", "1");
		var paged =  $('.loading-info').attr("paged"); //show loading animation 
		if(paged == null)
		paged = 0;
		else
		paged = paged;
            $.post(MyAjax.ajaxurl, {'key': searchField, 'paged': paged, action : 'search_all_posts'}, function(data) {
             
              loading = false; //set loading flag off once the content is loaded
			//if(data.result.trim().length == 0){
				if(data == null){
				//notify user if nothing to load
				//$('tbody').html("");
				$('.loading-info').hide();

				return;
			}
			$('.loading-info').hide(); //hide loading animation once data is received
			$("tbody").append(data.result); //append data into #results element
			$('.loading-info').attr("paged", data.paged);
			//alert(data.result);
		}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
			alert(thrownError); //alert with HTTP error
		})
		}
    });







	
});

jQuery(document).ready(function($) {

$("#lfform").on("click", ".lets_submit_order", function(e) {
			var name = $("#input_dealer").attr('value');
			var date = $("#input_date-required").attr('value');
			var order = $("#input_reason-order").attr('value');
			var address_strre_address = $("#input_shiping-address_strre_address").attr('value');
			var address_strre_address2 = $("#input_shiping-address_strre_address2").attr('value');
			var address_city = $("#input_shiping-address_city").attr('value');
			var address_state = $("#input_shiping-address_state").attr('value');
			var address_zip = $("#input_shiping-address_zip").attr('value');
			var address_county = $("#input_shiping-address_county").attr('value');
			var items = []; 
			var st_items = '';
			$( ".data_add" ).each(function( index) {
			 // $(this).child
			
			 var item_data = $(this).attr('data_add');
			// alert(item);
			 var id = $(this).attr('product_id');
			 var qty = $(this).attr('data-quantity');
			 var img = $(this).find('img').attr('src');
			 var title = $(this).find('.wp_desc h3').attr('title');
			// alert(qty);
			 if(item_data == 'true'){
				 st_items += id +':'+ qty +':'+ encodeURIComponent(img) + ':'+ title +',';
				  tmp = {
							'id': id,
							'qty': qty
						};
				 	//items[index] = [id, qty];
				 	//items[index]= {'id', qty];
				 	//items[index]['qty']= qty;
				 	//items['qty'] = qty;
					items.push(tmp);
				 }
			});		
				//var stringify = JSON.stringify(items);
			//alert(stringify);
			$.post(MyAjax.ajaxurl, {'item': st_items, 'name' : name, 'date' : date, 'order' : order, 'address_strre_address' : address_strre_address, 'address_strre_address2' : address_strre_address2, 'address_city' : address_city, 'address_state' : address_state, 'address_zip' : address_zip, 'address_county' : address_county,  action : 'pass_form_value'}, function(data) {
            $('.nhb-main-wrapper #display_table').html(data.mail);
			 alert(data.mail);
			
			

		}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
			alert(thrownError); //alert with HTTP error
		})
		
		
	});

	
});
	