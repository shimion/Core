<?php
// @ I am the Literature Intregratore
new Registration();
class Registration extends Core{
			public $data = array();
	
		  public function __construct() {
				parent::__construct(); 
				
				add_shortcode('registration', array($this, 'get_sections'));
		  }



			private function add_basic_fields(){
				$fc = new FC($this->registration);
				return $fc->form();	
				
				}	
		
			
			public function get_sections(){
						$output = '';
						$show_result = false;
						global $status, $er;
						
						if($status == true){
						$output .= '<h3>Your account is active</h3>';
						$style = 'style="display: none;"';
						}elseif($er == true){
						$output .= '<h3>The activation link is not working anymore</h3>';
						}
						$output .= '<form method="post" id="registration" class="allforms registerorlogin_form" '.$style.'>';
						$output .= '<div id="display_result"></div>';
						$output .= '<div id="form_field_wapper">';
						$output .= '<h3>Register for FreeCourt</h3>';
						$output .= self::add_basic_fields();
						$output .= '<div class="form-group form_submit_registration"><p id="input_submit_registration"  class="form-control data_dynamic  class_submit_registration">Register</p></div>'; 
						$output .= '<div class="loading-info wapper-style" paged="1" style="display: none;"><img src="'.CORE_ASSETS . '/images/ajax-loader.gif" /></div>'; 
						$output .= '</div>';
						$output .= wp_nonce_field( 'action_ajax_registration_nonce', 'filed_ajax_registration_nonce');
						$output .= '</form>';
						
						if(!empty($output)){
								if( $this->is_user_logged_in){
								$output_non .= 'You are already a register member';	
								//$output_non .= '</div>';
								return $output_non;
								}else
								$output_non .= $output;
								//$output_non .= '</div>';	
								return $output_non;
							}else{
							$output_non .=  'Sorry Registration is not available at this moment.';	
							//$output_non .= '</div>';	
							return $output_non;
						}
						
						
						
				
				}
		
		
		
		
			public function create_user($datas){
				$userdata = array();
				if(!empty($datas)){
					foreach($datas as $data){
							//if($data['name'] =='first_name')
							$userdata[$data['name']] = $data['value'];
						}
					
					}
						$userdata['user_login'] = $userdata['email'];
						$userdata['user_pass'] = $userdata['password'];
						$userdata['user_email'] = $userdata['email'];
				
				$user_check_by_email = get_user_by( 'email', $userdata['user_email'] );
				$user_check_by_login = get_user_by( 'login', $userdata['user_login'] );
				if($user_check_by_email != false or $user_check_by_login != false){
					
				$activation_code = get_user_meta( $user_check_by_email->ID, 'uae_user_activation_code', true );
					if($activation_code == 'reported'){
								//$result = $user_check_by_email->ID;
								$userdata['ID'] = $user_check_by_email->ID;
								$result = wp_update_user($userdata);
							}else{
							$result = false;
						}
					
					
				}else{
					$user_id = wp_insert_user( $userdata ) ;
					
					if ( ! is_wp_error( $user_id ) ) {
						$result = $user_id;
						$add_activation_code = $this->add_activation_code($user_id);
					}
					
				}
				
				
				
				
				return $result;
				
				
				}
		
		
			public function lets_register(){
								if ( 
				! isset( $_POST['filed_ajax_registration_nonce'] ) 
					|| ! wp_verify_nonce( $_POST['filed_ajax_registration_nonce'], 'action_ajax_registration_nonce' ) 
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

				$success = false;
				$str =!empty( $_POST['str'] ) ? $_POST['str'] : null;
				if(!empty($str) or $str != null){
					$this->data['info'] = $this->get_info_data($str);
					$this->data['fields'] =$this->registration;
					
					}
				
				$error = new ERROR_REG($this->data);
				$e_hand = $error->error_handeling();
				if(!empty($e_hand)){
				$response = json_encode( array( 'error' => true,  'massage' =>$e_hand['error_massage'], 'error_id' =>$e_hand['error_id'] ) );
					}else{
				//$mail = new Mail($this->data);
				
				$result = $this->create_user($this->data['info']);
				
				
				if($result != false){
				$this->data['user_id'] = $result;	
				//http://wordpress.stackexchange.com/questions/117522/send-user-activation-email-when-programmatically-creating-user
				//$user = new WP_User($user_id);
				
				$activation_code = get_user_meta($result, 'uae_user_activation_code', true );
				$activation_link = $this->login_reg_page .'?user_id='.urlencode( $result ).'&uae-key='.urlencode( $activation_code )."\r\n"; 
				//$activation_link = add_query_arg( array( 'key' => $code, 'user' => $result ), get_permalink(137 ));
				$this->data['activation_link'] = $activation_link;	
				
				$mail = new Mail($this->data);
				$mailresult = $mail->new_user_mail();
				$massage .= '<h1 style="color: #1d9046;">Thanks For your registration</h1>';
				$massage .= '<p>Please check your email and activate your account</p>';
				$success = true;
				//$massage .= '<p>Mail Sent</p>';
				}elseif($result == false){
				$massage = '<div class="error_warp"><p>Ops, something went wrong. Please rectify this errors</p><ul><li>Email Address is already registered</li></ul></div>';
				}
				$response = json_encode( array(  'massage' =>$massage, 'success'=> $success ) );
				}
			
			// print_r($item);
			 // response output
			header( "Content-Type: application/json" );
			// echo $str->post_output();
				
			 echo apply_filters('submit_form_filter', $response) ;
			 // IMPORTANT: don't forget to "exit"
			exit;
			}
		}
			
			
	
	
			/** 
	 *	Add Activation Code
	 *
	 *	Generates the random activation code and adds it to the user_meta during user registration.
	 *
	 *	@author		Nate Jacobs
	 *	@since		0.1
	 *
	 *	@param		int	$user_id
	 */
	public function add_activation_code( $user_id )
		{
		// generate activation code
		$activation_code = wp_generate_password( 10 );
		
		// add to the user meta
		add_user_meta( $user_id, 'uae_user_activation_code', $activation_code );
	}
			
				
				

}