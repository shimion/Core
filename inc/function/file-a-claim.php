<?php
// @ I am the Literature Intregratore
new Case_Claim();
class Case_Claim extends Core{
			public $claim_data = array();
			public $type;
			public $type_name;
			public $data = array();
			public $metadata = array();
		  public function __construct() {
			  //global $core;
			  	add_action( 'init', array($this, 'claim_post_type') );
				parent::__construct(); 
				$this->type = 'claim';
				$this->type_name = 'Claim';
				//global_claim_data_backend();
				//global_claim_data();
				$this->claim_data = $this->global_variable('claim');
				$this->metadata = $this->global_variable('claim_meta');
				add_action('init',array($this, 'SET_META'), 10, 14);
				add_shortcode('file-claim', array($this, 'get_sections_case'));
				add_action('filter_fields_structure',array($this, 'wapper_fields'), 10, 14);
				add_action('filter_upload_field_structure',array($this, 'addfilter_upload_field_wapper'), 10, 14);
				add_action('filter_field_hidden',array($this, 'addfilter_hidd_field_wapper'), 10, 14);
				//print_r($this->core);
		  }

	
	
	
				public function add_meta_condition($convert){
						
						
						
						
						
						
					
					}
	
	
	
				public function SET_META(){
						
						
						$META = new Meta($this->metadata, $this->type);
						
						return $META;
					
					}
	
	
	
				public function get_id_user_and_create_if_not($data){
				
				
				$user = get_user_by( 'email', $data);
				
				if($user != false ){
					$user_id =  $user->ID;
				}else{
					$user_id = wp_insert_user( $userdata ) ;
					
					if ( ! is_wp_error( $user_id ) ) {
						
						$add_activation_code = $this->add_activation_code($user_id);
					}
					
				}
				
				
				
				
				return $user_id;
				
				
				}
		
		

	
	


			public function creat_claim($title){
				if(!empty($fields)){
					$create_record_fields = array(
						'post_type' => $this->type,
						'post_status' => 'pending',
		//              'post_category' => array(20),
						'post_title' => 'Claim against'. $title,
						
					);
					 $post = wp_insert_post($create_record_fields);
					
					
					if(!empty($post))
							return $post;
					
				}
				
				}
	
			
			
			
			
			public function  update_meta_fields($claim_id, $datas){
				
				$meta = array();
						if(!empty($datas)){
							foreach($datas as $data){
									//if($data['name'] =='first_name')
									//$meta[$data['name']] = $data['value'];
									if ( ! add_post_meta( $post, $data['name'], $data['value'], true ) ) { 
										   update_post_meta( 7, $data['name'], $data['value'] );
										}
								}
							
							}
							

					
					
					
					
				
				}
	
			
			
			
			
			
			public function ajax_file_a_clame(){
					if ( 
				! isset( $_POST['filed_ajax_fileaclame_nonce'] ) 
					|| ! wp_verify_nonce( $_POST['filed_ajax_fileaclame_nonce'], 'action_ajax_fileaclame_nonce' ) 
						) {
	
							$response = json_encode(array('loggedin'=>false, 'massage'=>__('<div class="error_warp"><p>Ops, something went wrong. Please rectify this errors</p><ul><li>WP none field does not worklingh</li></ul></div>')));
							
							
							
			// print_r($item);
			 // response output
			header( "Content-Type: application/json" );
			// echo $str->post_output();
				
			 echo $response ;
			 // IMPORTANT: don't forget to "exit"
			exit;
							
							
							
						}else{


				$userdata = array();
				$showform = true;
				$str =!empty( $_POST['str'] ) ? $_POST['str'] : null;
				if(!empty($str) or $str != null){
					$this->data['info'] = $this->get_info_data($str);
					$this->data['fields'] =$this->claim_data;
					
					}
				
				$error = new ERROR_CLAIM($this->data);
				$e_hand = $error->error_handeling();
				if(!empty($e_hand)){
				$response = json_encode( array( 'error' => true,  'massage' =>$e_hand['error_massage'], 'error_id' =>$e_hand['error_id'] ) );
					}else{
				$info = $this->data['info'];
				
				$user = get_user_by( 'email', $info[0]['value']);
				
				if($user != false ){
					$user_id =  $user->ID;
					$user_email =  $user->user_email;
					$user_type = 'exist';
				}else{
					$user_type = 'new';
					$userdata['user_email'] =  $info[0]['value'];
					$userdata['user_login'] =  $info[0]['value'];
					$userdata['first_name'] =  $info[1]['value'];
					$userdata['last_name'] =  $info[1]['value'];
					//$userdata['user_login'] =  $info[0]['value'];
					$user_id = wp_insert_user( $userdata ) ;
					$user = get_user_by( 'email', $info[0]['value']);
					$user_email =  $user->user_email;
					$activation_code = 'reported';
					add_user_meta( $user_id, 'uae_user_activation_code', $activation_code );
				}
				
				$title = $user_email;
				$create_record_fields = array(
						'post_type' => 'claim',
						'post_status' => 'pending',
		//              'post_category' => array(20),
						'post_title' => 'Claim against '. $user_email,
						
					);
					 $post = wp_insert_post($create_record_fields);		
				
				foreach($info as $data){
				if ( ! add_post_meta( $post, $data['name'], $data['value'], true ) ) { 
										   update_post_meta( $post, $data['name'], $data['value'] );
										}
				
						}
						
						
					$date = new DateTime('today');

					$date->modify('+30 day');
					
						
				
					if ( ! add_post_meta( $post,  'trail_date', $date->format('Y-m-d') , true ) ) { 
										   update_post_meta( $post, 'trail_date', $date->format('Y-m-d') );
										}
				
					if($info[0]['value']){
						$mass .= 'There has been a case filed against you. ';
						if($user_type = 'new'){
							$mass .= 'To get more details about it. You will need to register here at: http://www.freecourt.com/register-or-login-here/ using the same email address.';
								}else{
							$mass .= 'To get more details about it. Please login at http://www.freecourt.com/register-or-login-here/';
							}
						
					$mail = wp_mail($info[0]['value'], 'There has been a case filed against you', $mass);
					}
				
			if(!empty($mail) or $mail != false){
				$response = json_encode( array(  'massage' => 'Thanks for File a Claim', 'redirect' => 'http://www.freecourt.com/file-a-claim/' ) );
				}else{
				$response = json_encode( array(  'massage' => 'Thanks for File a Claim but unfortunetly we are unable to delever the mail to '.$info[0]['value'].'', 'redirect' => 'http://www.freecourt.com/file-a-claim/' ) );
				}
				}
			
			// print_r($item);
			 // response output
			header( "Content-Type: application/json" );
			// echo $str->post_output();
				
			 echo $response ;
			 // IMPORTANT: don't forget to "exit"
			exit;
		}
				
	}
			
			
			
			
			
			public function live_query(){
				if(is_email($_POST['key']))
					$user = get_user_by( 'email', $_POST['key'] );
				
				if($user != false or !empty($user)){
					$massage =  $user->first_name . ' ' . $user->last_name;
					$response = json_encode( array(  'massage' => $massage ) );
				}else{
					
					$response = json_encode( array(  'massage' => 'Nothing Found', 'error' => true, 'error_id'=> array('email_address') ) );
				}
			
			// print_r($item);
			 // response output
			header( "Content-Type: application/json" );
			// echo $str->post_output();
				
			 echo apply_filters('filter_get_user_data', $response) ;
			 // IMPORTANT: don't forget to "exit"
			exit;
					
				
				
				}
			
			
			
			public function get_help_with_tooltip($des){
				
					return sprintf('<i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="%s"></i>', $des);
				
				}
			
			
			
			public function wapper_fields($content, $title, $name, $defaul, $type, $reuqired, $class, $before_title, $after_title, $before_field, $after_field, $des, $placeholder, $data){
				
				$des = !empty($des) ? $this->get_help_with_tooltip($des) : '';
				
				
				return sprintf('<div class="%s form-group">
                                %s<label for="%s">%s</label>%s
                                 %s %s %s %s
                              </div>',$class, $before_title, $title, $title, $after_title, $before_field, $data, $des , $after_field);
				
				}
			

			public function addfilter_upload_field_wapper($content, $title, $name, $defaul, $type, $reuqired, $class, $before_title, $after_title, $before_field, $after_field, $des, $placeholder, $data){
				
				$des = sprintf('<p>%s</p>', $des);
				
				
				return sprintf('<div class="%s form-group">
                                %s<label for="%s">%s</label> %s %s
                                 %s %s %s
                              </div>',$class, $before_title, $title, $title, $des, $after_title, $before_field, $data , $after_field);
				
				}
			

			public function addfilter_hidd_field_wapper($content, $title, $name, $defaul, $type, $reuqired, $class, $before_title, $after_title, $before_field, $after_field, $des, $placeholder, $data){
				
				//$des = sprintf('<p>%s</p>', $des);
				
				
				return sprintf('<div class="%s form-group">
                                %s<label>%s</label> %s
                                 %s %s %s
                              </div>',$class, $before_title, $title, $after_title, $before_field, $data , $after_field);
				
				}
			

			private function add_fields(){
				$Cs = new Cs($this->claim_data);
				return $Cs->form();	
				
				}	
				
			public function get_sections_case(){
						$output = '';
						$output .= '<form method="post" id="fileaclame" class="allforms">';
						$output .= '<div id="display_result"></div>';
						$output .= self::add_fields();
						$output .= '<div class="form-group" style="    margin-top: 30px;    max-width: 871px;    margin: 0 auto;    padding-top: 50px;    text-align: center;    display: block;    text-align: right;
    padding-bottom: 50px;">
									<button type="button" class="form-control data_dynamic btn btn-primary btn-submit  class_video file_a_clame">File the Claim</button>
                                   
                                </div>'; 
						$output .= '<div class="loading-info wapper-style" paged="1" style="display: none;"><img src="'.CORE_ASSETS . 'images/ajax-loader.gif" /></div>'; 
						$output .= wp_nonce_field( 'action_ajax_fileaclame_nonce', 'filed_ajax_fileaclame_nonce');
						$output .= '</form>';
						
						if(!empty($output)){
								if( !$this->is_user_logged_in){
									//$output_non .= 'Please get register to file a case ';	
									//return $output_non;
									wp_redirect($this->login_reg_page); exit();
								}else{
									$output_non .= $output;
									return $output_non;
								}
								}else{
									$output_non .=  'Sorry file a case is not available at this moment.';	
									return $output_non;
							}
						
						
						
				
				}
		



			public function claim_post_type(){
				
				register_post_type($this->type,
													array(
													  'labels' => array(
														'name' => __($this->type_name.'s'),
														'singular_name' => __( $this->type_name )
													  ),
													  'public' => true,
													  'has_archive' => true,
													  'supports'           => array( 'title', 'thumbnail', 'excerpt', 'custom-fields' )
													)
												  );
				
				}
				
				
				





			


				
				
				
						

}