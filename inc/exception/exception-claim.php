<?php
// @ get all data from specific query
// @ then stored on parme $this->data

class ERROR_CLAIM extends CLASS_ERROR{
	
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
										
										defendants_email_address:null,date:null,time:null,location:null,cause_of_action1:1,cause_of_action_details1:null,cause_of_action2:1,cause_of_action_details2:null,cause_of_action3:1,cause_of_action_details3:null,desired_damages:null,null:null,
										
										
									}*/
									
									
									
										/*if($information['value'] == null or empty($information['value']) or $information['value'] == 'null'){
											 $get_error_text = $this->get_error_text($information['name']);
											
												$error_data[] = $get_error_text;
											
											
											}*/
												
											
								if($information['name'] =='defendants_email_address'){
									if($information['value'] == 'null' or empty($information['value'])){
									//$error_data[] = 'Defendant\'s E-Mail Address';
																					$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Defendant\'s E-Mail Address'),
																						);

									}else{
									if(!is_email($information['value']))
									$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Email address is not valid'),
																						);
									}
									
									
									}else{
										
								}
											
											
								if($information['name'] =='date'){
									if($information['value'] == 'null' or empty($information['value']))
									$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please enter the date'),
																						);
									
									}
											
											
								if($information['name'] =='first_name'){
									if($information['value'] == 'null' or empty($information['value']))
									$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please enter the first name'),
																						);
									
									
									}
											
											
								if($information['name'] =='last_name'){
									if($information['value'] == 'null' or empty($information['value']))
									//$error_data[] = 'Please enter the last name';
									$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please enter the last name'),
																						);
									
									}
											
											
								if($information['name'] =='time'){
									if($information['value'] == 'null' or empty($information['value']))
								//	$error_data[] = 'Please enter the time';
									$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please enter the time'),
																						);
									}
											
											
								if($information['name'] =='location'){
									if($information['value'] == 'null' or empty($information['value']))
														$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please enter the Location'),
																						);
									
									}
											
											
								if($information['name'] =='cause_of_action1'){
									if($information['value'] == 'null' or empty($information['value']))
														$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please enter  Cause of Action 1'),
																						);
									
									}
											
											
								if($information['name'] =='cause_of_action_details1'){
									if($information['value'] == 'null' or empty($information['value']))
														$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Cause of Action Details 1'),
																						);
									
									}
											
											
								/*if($information['name'] =='cause_of_action2'){
									if($information['value'] == 'null' or empty($information['value']))
														$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please enter  Cause of Action 2'),
																						);
									
									
									}
											
											
								if($information['name'] =='cause_of_action_details2'){
									if($information['value'] == 'null' or empty($information['value']))
														$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Cause of Action Details 2'),
																						);
									
									
									}
											
											
								if($information['name'] =='cause_of_action3'){
									if($information['value'] == 'null' or empty($information['value']))
														$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please enter  Cause of Action 3'),
																						);
									
									
									}
											
											
								if($information['name'] =='cause_of_action_details3'){
									if($information['value'] == 'null' or empty($information['value']))
														$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Cause of Action Details 3'),
																						);
									
									}
										*/	
											
											
											
								if($information['name'] =='desired_damages'){
									if($information['value'] == 'null' or empty($information['value']))
														$error_data[] = array(
																					'id' => $information['name'],
																					'data' => sprintf('%s', 'Please enter the Desired Damages'),
																						);
									
									}
											
											
									
									}
									
								
										
									
									
										return $error_data;
								}
						}

		
		
		
	
	
	
		


		  
				
	
	
	}
