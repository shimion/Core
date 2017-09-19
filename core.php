<?php
/*
 * Plugin Name: The Core
 * Plugin URI: http://wpthemeplace.com
 * Description: I am The Plugin Core.......
 * Version: 0.0.1
 */
$px = 'CORE';
define($px,plugin_dir_path( __FILE__ ));
define($px.'_INC',CORE.'inc/');
define($px.'_CONFIG',CORE_INC.'config/');
define($px.'_ERROR',CORE_INC.'exception/');
define($px.'_CLASS',CORE_INC.'class/');
define($px.'_FUNCTION',CORE_INC.'function/');
define($px.'_ASSETS', plugins_url().'/core/assets/') ;
include_once(CORE_INC. 'inc.php');
new Core();
class Core{
			  public $plugin_name;
			  public $data = array();
			  public $login = array();
			  public $registration = array();
			  public $is_user_logged_in;
			  public $login_reg_page;
			  public $admin_panel;
			  public $core = array();

		  public function __construct() {
			  global $WP_User, $core;
			  add_shortcode('scode', array($this, 'scode'));
			  require_once(ABSPATH . 'wp-includes/pluggable.php');
			  $this->is_user_logged_in =  is_user_logged_in();
			  $this->login_reg_page =  get_site_url().'/register-or-login-here/';
			   $this->plugin_name = 'core';
			   $this->registration = array(
									array(
										'name' => 'name',
										'title' => 'Name',
										'dafault' => '',
										'type' => 'name', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'reuqired' => true, // true/false
										//'reuqired_text' => 'Please enter the name of Sales Representative/ Dealer', // true/false
										
										'fields' =>
													array(
														array(
															'name' => 'mr',
															'title' => 'Gender',
															'dafault' => 'mrs',
															'type' => 'select', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
															'reuqired' => true, // true/false
															'fields' =>array(
																				'mr' => 'Mr',	
																				'mrs' => 'Mrs',	
																				//'mr' => 'Mr',	
																					),
																				
														),	
														array(
															'name' => 'first_name',
															'title' => 'First Name',
															'dafault' => 'First Name',
															'type' => 'text', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
															'reuqired' => true, // true/false
															
														),	
														array(
															'name' => 'last_name',
															'title' => 'Last Name',
															'dafault' => 'Last Name',
															'type' => 'text', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
															'reuqired' => true, // true/false
															
														),	
													)	
										),
									array(
										'name' => 'email',
										'title' => 'Your Email',
										'dafault' => 'Email Address',
										'type' => 'text', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'reuqired' => true, // true/false
										'reuqired_text' => 'Please enter the Email Address', // true/false
										),
								
									array(
										'name' => 'password',
										'title' => 'Password',
										'dafault' => '',
										'type' => 'password-conformation', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'reuqired' => true, // true/false
										'fields' =>
													array(
														
														array(
															'name' => 'password',
															'title' => 'Enter a Password',
															'dafault' => 'Enter a Password',
															'type' => 'password', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
															'reuqired' => true, // true/false
															'class' => 'col-sm-6', // true/false
															
														),	
														array(
															'name' => 'password_conformation',
															'title' => 'Re-enter a Password',
															'dafault' => 'Re-enter a Password',
															'type' => 'password', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
															'reuqired' => true, // true/false
															'class' => 'col-sm-6', // true/falses
															
														),	
													)	
									
									
										),
										
									/*array(
										'name' => 'submit_registration',
										'title' => 'Register',
										'dafault' => 'Register',
										'type' => 'submit', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'reuqired' => true, // true/false
										//'reuqired_text' => 'Please enter the Email Address', // true/false
										),*/
								

								
							
									);
									
									
									
									
				 $this->login = array(
									array(
										'name' => 'your_email',
										'title' => 'Enter Your Email',
										'dafault' => '',
										'type' => 'email', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'reuqired' => true, // true/false
										),
									
								
									array(
										'name' => 'login_password',
										'title' => 'Enter Your Password',
										'dafault' => '',
										'type' => 'password', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'reuqired' => true, // true/false
										),
									);
				$this->admin_panel = admin_url();
				//$this->core = (isset($core[$key])) ? $bwp_cache[$key] : '';	
				
						
									
			add_action('wp_enqueue_scripts', array($this, 'add_script'), 99);
			//add_action( 'init', array($this, 'create_post_type') );
			//add_action( 'init', array($this, 'create_taxnomy') );
		//	add_action( 'authenticate' , array($this, 'wp_authenticate_by_email'), 31, 3 );
								
			 if(!is_admin())
			wp_enqueue_script( 'fc-ajax-request', plugin_dir_url( __FILE__ ) . 'assets/js/ajax.js', array( 'jquery' ) , null);
				// declare the URL to the file that handles the AJAX request (wp-admin/admin-ajax.php)
			wp_localize_script( 'fc-ajax-request', 'MyAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

			 add_action( 'wp_ajax_nopriv_registration', array($this, 'ajax_registration') );
			add_action( 'wp_ajax_registration', array($this, 'ajax_registration') );
			 add_action( 'wp_ajax_nopriv_login', array($this, 'ajax_login') );
			//add_action( 'wp_ajax_login', array($this, 'ajax_login') );
			add_action( 'wp_authenticate', array($this, 'user_authentication') );
			add_action( 'wp_ajax_nopriv_search_to_find_user', array($this, 'ajax_live_query_user') );
			add_action( 'wp_ajax_search_to_find_user', array($this, 'ajax_live_query_user') );
			add_action( 'wp_ajax_nopriv_fileaclame', array($this, 'file_a_clame') );
			add_action( 'wp_ajax_fileaclame', array($this, 'file_a_clame') );
			
				 }
			






			public function ajax_live_query_user(){
				return Case_Claim::live_query();
				}


			public function file_a_clame(){
				return Case_Claim::ajax_file_a_clame();
				}


			
			
			
			function user_authentication( &$username)
				{
					
						global $wpdb;
					$user = get_user_by( 'email', $username );
					if($user){
				$activation_code = get_user_meta( $user->ID, 'uae_user_activation_code', true );
					if( $activation_code != 'active' )
					{
						wp_redirect($this->login_reg_page); exit();
						
					}
					
					}
					
					
				}
							
			
			
			
			
			
			
			public function scode(){
				$output = '
										<div class="textarea">
											<h1 class="pagetittle">Register or Login here</h1>
											<div class="registerorlogin_left_sec col-sm-7">';
				$output .= do_shortcode('[registration]');
				$output .= '</div>';
				$output .= '<div class="registerorlogin_right_sec col-sm-5">';
				$output .= do_shortcode('[login]');
				$output .= '</div>';
				$output .= '</div>';
				
				if( $this->is_user_logged_in){
				$output_non .= '<h2 class="pagetittle" style="    margin-bottom: 20px;">You are already a register member.</h2>';	
				$output_non .= '<p style="    text-align: center;">Please <a href="#">Click here</a> to view your admin panel</p>';	
					return $output_non;
				}else{
					return $output;
					}
				}
				 
				 
			public function ajax_registration(){
						return Registration::lets_register();
				
				}	
				
				
				
			public function ajax_login(){
						return Login::lets_login();
				
				}	
				
				
				
			public function get_info_data($data){
				
				$info = array();
				
				if(!empty($data)){
					$data = explode(",", $data);
					//$product  = $items;
					foreach($data as $item){
							if(!empty($item)){
								$item = explode(":", $item);
									$info[]  = array(
											'name' => $item[0],
											'value' => $item[1],
											
											);
							}
						
						}
				}
				
				return $info;
				
			}
		
		






//
			//register style	
			public function add_script() {
				
				 wp_enqueue_script( 'jquery-ui-slider' );
				/* load jQuery-ui datepicker */
				wp_enqueue_script( 'jquery-ui-datepicker' );
				/* load WP colorpicker */
				wp_enqueue_script( 'wp-color-picker' );

					if ( function_exists( 'wp_enqueue_media' ) ) {
					  /* WP 3.5 Media Uploader */
					  wp_enqueue_media();
					} else {
					  /* Legacy Thickbox */
					  add_thickbox();
					}



				wp_enqueue_style(
					$this->plugin_name. '-style',
					 plugins_url('/core/assets/css/style.css'), array(), null
				);
				
				
				
				wp_enqueue_style(
					$this->plugin_name. '-extra',
					 plugins_url('/core/assets/css/extra.css'), array(), null, true
				);
				
				
				
				
			wp_enqueue_script( 'jquery-ui-timepicker', plugin_dir_url( __FILE__ ) . 'assets/js/jquery-ui-timepicker.js', array( 'jquery', 'jquery-ui-slider', 'jquery-ui-datepicker' ) , '', false);
					wp_enqueue_script(
								$this->plugin_name. '-js',
								plugins_url( '/assets/js/js.js', __FILE__ ),
								array( 'jquery' ),
								null,
								true
							);

					

				
			}
			
			
			
			
			public function global_variable($key)
							{
						global $core;
						return (isset($core[$key])) ? $core[$key] : '';
							}
			
		
	 
				 
				 

}