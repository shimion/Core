<?php
// @ get all data from specific query
// @ then stored on parme $this->data

class ERROR_REG extends CLASS_ERROR{
	
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
		  



		private function error_by_type(){
			
					foreach ($this->types as $type){
								if($type == 'text'){
										
									}
						
						}
			
			}


		public function Error(){
				$get_error = $this->get_error();
				$get_error_code = $this->error->get_error_codes();
				if(!empty($get_error) && is_array($get_error)){
					foreach($get_error as $error){
							$this->error->add( $error['id'], $error['data'] );
						}
					
					
					// Send the result
					if ( !empty( $get_error_code ) ) {
								return $this->error;
							}
					
					}
			
			}


		public function get_error(){
				$error = array();
				$error_data = array();
				$error_id = array();
				$field_name = array();
				if(empty($this->info)){
						
				}else{
						foreach($this->info as $information){
							$field_name[] = $information['name'];
								/*if( $this->check_fieldsname_available_againest_infoname($information['name'], $information['value'])){										
										$this->error->add( 'empty', 'Error Text', $information['name'] );
										
									}*/
									
									
									
										if($information['value'] == null or empty($information['value']) or $information['value'] == 'null'){
											//$this->error->add( 'empty', $this->get_error_text($information['name']) );
											 $get_error_text = $this->get_error_text($information['name']);
											if(!empty($get_error_text)){
															$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', $get_error_text),
																						);
												}
											
											}else{
												
											
											// take password & password_conformation value
											if($information['name'] == 'password'){
												$pass1 = $information['value'];
												}elseif($information['name'] == 'password_conformation'){
												$pass2 = $information['value'];	
												}
											
													if(!empty($pass1) && !empty($pass2)){
													if($pass1 !== $pass2){
														$error_data[] = sprintf('%s', 'Password does not match');
														}elseif(strlen($pass1) <= 4 or strlen($pass2) <= 4 ){
															$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Password need to be at least 5 words'),
																						);
															//$error_id[] = $information['name'];
															}
														}
													}
													
									
									}
																			
									
									
										return $error_data;
								}
						}

		
		
	
	}
