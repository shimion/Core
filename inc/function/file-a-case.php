<?php
// @ I am the Literature Intregratore
new Case_File();
class Case_File extends Core{
			public $case_data = array();
	
		  public function __construct() {
				parent::__construct(); 
				
				$this->case_data = 
						array(
									array(
										'name' => 'about',
										'title' => '<span>1</span> About the Defendant',
										'dafault' => '',
										'class' => 'left-right',
										'before_title' => '',
										'after_title' => '',
										'before_field' => '',
										'after_field' => '',

										'type' => 'section', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'fields' => 
													array(
																array(
																		'name' => 'what_kind_of_entity_is_your_case_against',
																		'title' => 'What kind of entity is your case against?',
																		'dafault' => '', 
																		'class' => 'row',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		'after_field' => '</div>',

																		'type' => 'select', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => true, // true/false
																		'des' => 'Select the name of Case against', // true/false
																		'placeholder' => '', // true/false
																		'fields' =>array(
																							'business' => 'Business',	
																							'real-estate' => 'Real Estate',	
																						
																								),
																		
																		),
														
																array(
																		'name' => 'i_am_filing_my_case_against',
																		'title' => 'I am filing my case against ',
																		'dafault' => '', 
																		'class' => 'row',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		'after_field' => '</div>',

																		'type' => 'text', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'des' => 'Add the name of the party', // true/false
																		'placeholder' => 'Add the name of the party', // true/false
																		),
														
																array(
																		'name' => 'email_address_defender',
																		'title' => 'The email address(es) for the defendant(s)',
																		'dafault' => '', 
																		'class' => 'row',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		'after_field' => '</div>',

																		'type' => 'email', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'des' => 'Add all email addresses of the defendant(s) separated by commas', // true/false
																		'placeholder' => 'Add all email addresses of the defendant(s) separated by commas', // true/false

																		),
														
																array(
																		'name' => 'relation_with_you_and_defender',
																		'title' => 'My relationship to the defendant is - I am a',
																		'dafault' => '', 
																		'class' => 'row',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		'after_field' => '</div>',

																		'type' => 'select', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => true, // true/false
																		'des' => 'Explain the relation bitween you and Defendant', // true/false
																		'placeholder' => '', // true/false
																		'fields' =>array(
																							'customer' => 'Customer',	
																							'husband' => 'Husband',	
																							'wife' => 'Wife',	
																							'friend' => 'Friend',	
																							'none' => 'None',	
																						
																								),
																		
																		),
														
														
																),
													),
									
								
								
								
								array(
										'name' => 'your-case',
										'title' => '<span>2</span> Your Case',
										'dafault' => '',
										'class' => 'up-down',
										'before_title' => '',
										'after_title' => '',
										'before_field' => '',
										'after_field' => '',

										'type' => 'section', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'fields' => 
													array(
																array(
																		'name' => 'date-time',
																		'title' => 'Date/Time of Incident',
																		'dafault' => '', 
																		'class' => 'col-sm-12',
																		'before_title' => '',
																		'after_title' => '',
																		'before_field' => '',
																		'after_field' => '',

																		'type' => 'time-date', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => true, // true/false
																		'des' => 'Select the name of Case against', // true/false
																		'placeholder' => '', // true/false
																		'fields' =>array(
																							array(
																									'name' => 'date',
																									'title' => 'Date',
																									'dafault' => '', 
																									'class' => 'div_inline_block',
																									'before_title' => '',
																									'after_title' => '',
																									'before_field' => '',
																									'after_field' => '',
							
																									'type' => 'date', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																									'des' => 'Please add the date here', // true/false
																									'placeholder' => 'mm/dd/yyyy', // true/false
																									),
																									
																									array(
																									'name' => 'time',
																									'title' => 'Time',
																									'dafault' => '', 
																									'class' => 'div_inline_block',
																									'before_title' => '',
																									'after_title' => '',
																									'before_field' => '',
																									'after_field' => '',
							
																									'type' => 'time', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																									'des' => 'Please add the time here', // true/false
																									'placeholder' => 'hh:mm:ss', // true/false
																									),
																						
																								),
																		
																		),
														
																array(
																		'name' => 'location',
																		'title' => 'Location of Incident ', //shimion
																		'dafault' => '', 
																		'class' => 'row',
																		'before_title' => '<div class="col-sm-12">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-12">',
																		'after_field' => '</div>',

																		'type' => 'text', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'des' => 'Add the location of the incident', // true/false
																		'placeholder' => 'Add the location of the incident', // true/false
																		),
														
																array(
																		'name' => 'case_summery',
																		'title' => 'Please summarize your case',
																		'dafault' => '', 
																		'class' => 'row class_info_pos_abs',
																		'before_title' => '<div class="col-sm-12">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-12">',
																		'after_field' => '</div>',

																		'type' => 'textarea', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'des' => 'Get us the details of the case', // true/false
																		'placeholder' => 'Add all the details you can. You will be able to update this later.', // true/false

																		),
														
															),
													),
													
													
													
													
										array(
										'name' => 'attached_files',
										'title' => '<label><i class="fa fa-paperclip" aria-hidden="true" style="color: #1d3185;"></i> Upload all case documents. <a id="attached_fiels" style="color: #1d3185;">Attach files</a>',
										'dafault' => '',
										'class' => 'up-down bottom-section',
										'before_title' => '',
										'after_title' => '',
										'before_field' => '',
										'after_field' => '<hr>',

										'type' => 'hidden', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										
									),			
													
													
										array(
										'name' => 'video',
										'title' => 'Video',
										'dafault' => '',
										'class' => 'up-down bottom-section',
										'before_title' => '',
										'after_title' => '',
										'before_field' => '',
										'after_field' => '<hr>',
										
										'des' => 'Submitting videos is a powerful way of making your case.  Make video\'s to support your case and upload them here.
', // true/false
										'type' => 'upload', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										
									),			
													
													
													
									
									
										
										
										
								array(
										'name' => 'causes_of_action',
										'title' => 'Causes of Action',
										'dafault' => '',
										'class' => '',
										'before_title' => '',
										'after_title' => '',
										'before_field' => '',
										'after_field' => '',
										'button_text' => 'Add Another Cause of Action',

										'type' => 'section-repetor', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'fields' => 
													array(
										
										
										
															array(
																		'name' => 'cause_of_action',
																		'title' => 'Cause of Action',
																		'dafault' => '', 
																		'class' => 'row left-right bottom-section',
																		'before_title' => '<div class="row"> <div class="col-sm-3 cause_act_bot">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-3">',
																		'after_field' => '</div>
																								<div class="col-sm-5 col-md-offset-1"><label for="Find out more about Cause of Action" style="    text-align: right;     font-size: 17px;">Find out more about Cause of Action</label></div>
																						</div>	<!--end row before_title -->
																									',

																		'type' => 'select', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => true, // true/false
																		'des' => 'Explain the relation bitween you and Defendant', // true/false
																		'placeholder' => '', // true/false
																		'fields' =>array(
																							'customer' => 'Customer',	
																							'husband' => 'Husband',	
																							'wife' => 'Wife',	
																							'friend' => 'Friend',	
																							'none' => 'None',	
																						
																								),
																		
																		),				
													
													
													array(
																		'name' => 'cause_of_action_details',
																		'title' => 'Cause of Action Details',
																		'dafault' => '', 
																		'class' => 'row bottom-section class_call_action_details',
																		'before_title' => '<div class="row"><div class="col-sm-6">',
																		'after_title' => '',
																		'before_field' => '',
																		'after_field' => '</div>
																							<div class="col-sm-5 col-md-offset-1">
																										<img src="http://www.freecourt.com/wp-content/uploads/2017/01/action-video.jpg" />
																									</div>
																								</div>	<!--end row before_title -->
																					',

																		'type' => 'textarea', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'des' => 'Add all the details you can. You will be able to update this later.', // true/false
																		'placeholder' => 'Add all the details you can. You will be able to update this later.', // true/false

																		),	
																		
																		
														),
														
													)								
													
									
																
								
								
									
									);
				
				add_shortcode('file-case', array($this, 'get_sections_case'));
				add_action('filter_fields_structure',array($this, 'wapper_fields'), 10, 14);
				add_action('filter_upload_field_structure',array($this, 'addfilter_upload_field_wapper'), 10, 14);
				add_action('filter_field_hidden',array($this, 'addfilter_hidd_field_wapper'), 10, 14);
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
				$Cs = new Cs($this->case_data);
				return $Cs->form();	
				
				}	
				
			public function get_sections_case(){
						$output = '';
						$output .= '<form method="post" id="login" class="allforms">';
						$output .= '<div id="display_result"></div>';
						$output .= self::add_fields();
						$output .= '<div class="form-group">
                                    <p type="submit" id="input_submit_login" >Login</p>
                                    <p type="submit" id="input_submit_login_reg" >Forgot Password?</p>
                                </div>'; 
						$output .= '<div class="loading-info wapper-style" paged="1" style="display: none;"><img src="'.plugin_dir_url( __FILE__ ) . 'assets/images/ajax-loader.gif" /></div>'; 
						//$output .= wp_nonce_field( 'ajax-login-nonce', 'security' );
						$output .= '</form>';
						
						if(!empty($output)){
								if( !$this->is_user_logged_in){
									$output_non .= 'Please get register to file a case ';	
									return $output_non;
								}else{
									$output_non .= $output;
									return $output_non;
								}
								}else{
									$output_non .=  'Sorry file a case is not available at this moment.';	
									return $output_non;
							}
						
						
						
				
				}
		


				
				
				
						

}