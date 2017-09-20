<?php
// @ I am the Literature Intregratore
new Login();
class Login extends Core{
			public $data = array();
	
		  public function __construct() {
				parent::__construct(); 
				
				add_shortcode('login', array($this, 'get_sections_login'));
				//add_action( 'template_redirect', array($this, 'wpse8170_activate_user') );
		  }



			private function add_fields(){
				$fc = new FC($this->login);
				return $fc->form();	
				
				}	
		
			
			public function get_sections_login(){
						$output = '
                    	<div class="registerorlogin_sidebar">
                    		<h3>Already a member? Please log in below.</h3>
                            <a class="btn facebook_button"></a>
                            <a class="btn twitter_button"></a>
                            <a class="btn google_button"></a>
                            <img class="sidebar_borbott" src="/wp-content/uploads/2017/01/REGISTER-or-border.png" />
							<h3 style="    text-align: center;    margin-top: 10px;    margin-bottom: 10px;">Login to Your FreeCourt account.</h3>
                        </div>';
						
						$output .= ' <div class="registerorlogin_sideba2">';
						$output .= '<form method="post" id="login" class="allforms">';
						$output .= '<div id="display_result"></div>';
						$output .= self::add_fields();
						$output .= '<div class="form-group">
                                    <p type="submit" id="input_submit_login" >Login</p>
                                    <p type="submit" id="input_submit_login_reg" >Forgot Password?</p>
                                </div>'; 
						$output .= '<div class="loading-info wapper-style" paged="1" style="display: none;"><img src="'.CORE_ASSETS . 'images/ajax-loader.gif" /></div>'; 
						$output .= wp_nonce_field( 'action_ajax_login_nonce', 'filed_ajax_login_nonce');
						$output .= '</form>';
						$output .= '
								</div>
							
						';
						
						if(!empty($output)){
								if( $this->is_user_logged_in){
									$output_non .= 'You are already a register member';	
									return $output_non;
								}else{
									$output_non .= $output;
									return $output_non;
								}
								}else{
									$output_non .=  'Sorry Registration is not available at this moment.';	
									return $output_non;
							}
						
						
						
				
				}
		



			public function log_and_red($datas){
				
				$result = array();
				$userdata = array();
				$creds = array();
				
						$creds['user_login'] = 'alen@gmail.com';
						$creds['user_pass'] = '123';
						$creds['remember'] = true;
						//$user = wp_signon( $creds, false );
						
				
				return $creds;
				
				
				}
		
		

		
			public function lets_login(){
				if ( 
				! isset( $_POST['filed_ajax_login_nonce'] ) 
					|| ! wp_verify_nonce( $_POST['filed_ajax_login_nonce'], 'action_ajax_login_nonce' ) 
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
	
				$creds = array();
				$showform = true;
				$str =!empty( $_POST['str'] ) ? $_POST['str'] : null;
				if(!empty($str) or $str != null){
					$this->data['info'] = $this->get_info_data($str);
					$this->data['fields'] = $this->login;
					}
					
					$error = new ERROR_LOGIN($this->data);
				$e_hand = $error->error_handeling();
				if(!empty($e_hand)){
				$response = json_encode( array( 'error' => true,  'massage' =>$e_hand['error_massage'], 'error_id' =>$e_hand['error_id'] ) );
					}else{
					
					if(!empty($this->data['info'])){
						foreach($this->data['info'] as $data){
								if($data['name'] == 'your_email'){
									$creds['user_login'] = $data['value'];
									}
								if($data['name'] == 'login_password'){
									$creds['user_password'] = $data['value'];
									}
							}
						
						}
					
							
					//$creds['user_login'] = 'alen@gmail.com';
					//	$creds['user_pass'] = '123';
						$creds['remember'] = true;
						$user = wp_signon( $creds, false );
						if ( is_wp_error($user) )
							$response = json_encode(array('loggedin'=>false,  'massage'=>__('<div class="error_warp"><p>Ops, something went wrong. Please rectify this errors</p><ul><li>Wrong username or password.</li></ul></div>')));
							else
							$response = json_encode(array('loggedin'=>true, 'success'=> true, 'redirect'=>$this->admin_panel,  'massage'=>__('Login successful, redirecting...')));
					
					}
				
				//$result = $this->log_and_red($this->data['info']);
				//$response = json_encode( $res );
				
			
			// print_r($item);
			 // response output
			header( "Content-Type: application/json" );
			// echo $str->post_output();
				
			 echo $response ;
			 // IMPORTANT: don't forget to "exit"
			exit;
				
			}
		}
			
			
		
		public function wpse8170_activate_user() {
					if ( is_page() && get_the_ID() == 2 ) {
						$user_id = filter_input( INPUT_GET, 'user', FILTER_VALIDATE_INT, array( 'options' => array( 'min_range' => 1 ) ) );
						if ( $user_id ) {
							// get user meta activation hash field
							$code = get_user_meta( $user_id, 'has_to_be_activated', true );
							if ( $code == filter_input( INPUT_GET, 'key' ) ) {
								delete_user_meta( $user_id, 'has_to_be_activated' );
								wp_mail('shimionson@gmail.com', 'Activate', 'Account is activate', 'From: Free Court <wordpress@freecourt.com>');
							}
						}
					}
				}
				
				

}