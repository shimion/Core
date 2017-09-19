<?php
// @ get all data from specific query
// @ then stored on parme $this->data

class ERROR_LOGIN extends CLASS_ERROR{
	
		  public $fields = array();
		  public $info = array();
		  public $error = array();
		  public $types = array();
		  public function __construct($data) {
			  		parent::__construct($data); 
				$this->fields = $data['fields']  ;
				$this->info = $data['info']  ;
				$this->error = new WP_Error();
			
				$this->Error();
	
		  }
		  




		public function get_error(){
				$error_data = array();
				$field_name = array();
				if(empty($this->info)){
						
				}else{
						foreach($this->info as $information){
							$field_name[] = $information['name'];
								/*if( $this->check_fieldsname_available_againest_infoname($information['name'], $information['value'])){										
										$this->error->add( 'empty', 'Error Text', $information['name'] );
										
									}*/
									
									
									
									if($information['name'] == 'your_email' && empty($information['value']) ){
										 $get_error_text = $this->get_error_text($information['name']);
												$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please enter the email address'),
																						);
											//	}
										}
										
								if($information['name'] == 'your_email' && !is_email($information['value'])){
									$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Email address is invalid'),
																						);
									}
									
							
								if($information['name'] == 'your_email' && is_email($information['value'])){
									$user_check_by_email = get_user_by( 'email', $information['value']  );
									$activation_code = get_user_meta($user_check_by_email->ID, 'uae_user_activation_code', true );
									if(empty($user_check_by_email) or $user_check_by_email == false){
												$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Email address is not used here'),
																						);
										//$error_data[] = 'Email address is not used here';
										}
									if(empty($activation_code) or $activation_code !== 'active'){
												$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'User is not yet active'),
																						);
										}
									}
									
								
								
									
								
								
								if($information['name'] == 'login_password' && empty($information['value']) ){
										 //$get_error_text = $this->get_error_text($information['name']);
												$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please field is empty'),
																						);
												//}
										}
									
								
								
								
											
											
											
									
									}
									
									
										
									
									
										return $error_data;
								}
						}

		
		



		  
				
	
	
	}
