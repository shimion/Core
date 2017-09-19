<?php
// @ get all data from specific query
// @ then stored on parme $this->data

class CLASS_ERROR{
	
		  public $fields = array();
		  public $info = array();
		  public $error = array();
		  public $types = array();
		  public function __construct($data) {
			  
				$this->fields = $data['fields']  ;
				$this->info = $data['info']  ;
				$this->error = new WP_Error();
				$this->types = array(
				'text', 'textarea', 'select', 
					'redio', 'checkbox', 'submit',
						 'address', 'email', 'password', 
							 'name', 'password-conformation', 
								 'section', 'time-date', 'time',
									  'date', 'upload', 'hidden', 
										  'section-repetor');
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
				$error_data = array();
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
											
											}
												
											
								
											
											
									
									}
									
								
										
									
									
										return $error_data;
								}
						}

		
		
		public function get_error_text($name){
						if(!empty($this->fields)){
							foreach($this->fields as $field){
									
									if('name' == $field['type'] or 'password' == $field['type'] or 'password-conformation' == $field['type'] or 'section' == $field['type']){
											foreach($field['fields'] as $fld){
													if($name == $fld['name']){
														if($fld['reuqired']){
													
															$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', $get_error_text),
																						);
															}
														}
												}
												
											
												
												
												
												
												
									}else{
											if($name == $field['name']){
												if($field['reuqired']){
													
															return !empty($field['reuqired_text']) ? $field['reuqired_text'] : $field['title'] ." is required ";
															}
														}
												
									}
												
												
												
												
										}
					}
			}
		




		public function error_handeling(){
				
			if ( is_wp_error( $this->error ) ) {
				$get_error_messages = $this->error->get_error_messages();
				$get_error_codes = $this->error->get_error_codes();
					if( !empty($get_error_messages)){
						$output = '';
						$output .= '<div class="error_warp">';
						$output .= '<p>Ops, something went wrong. Please rectify this errors</p>';
						$output .= '<ul>';
						$output .= '<li>' . implode( '</li><li>', $this->error->get_error_messages() ) . '</li>';
						$output .= '</ul>';
						//return $output;
						}
					} 
					//$output .= print_r($this->error->get_error_messages()) ;
					if(!empty($get_error_messages) && !empty($get_error_codes)){
						 return array(
						 				'error_id' => $get_error_codes,
						 				'error_massage' => $output
						 					);
						}
					
					
			
			}

		
		
		
		


		  
				
	
	
	}
