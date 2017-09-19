<?php
			$core['claim'] = array(
						
									array(
										'name' => 'basic_information',
										'title' => '<i class="fa fa-paperclip" aria-hidden="true" style="color: #1d3185;"></i> File a Claim',
										'dafault' => '',
										//'class' => 'left-right class_basic_data',
										'class' => 'left-right ',
										'before_title' => '',
										'after_title' => '',
										'before_field' => '',
										'after_field' => '',
										//'reuqired' => true,
										'type' => 'section', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'fields' => 
													array(
																array(
																		'name' => 'defendants_email_address',
																		'title' => 'Defendant\'s E-Mail Address',
																		'dafault' => '', 
																		'class' => 'row ',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6 form-group form-group">',
																		'after_field' => '<div id="fr_lr"></div><span id="show_user_info" style="display: inline;color: #dc0707;"></span><div class="ajax_email_search wapper-style" paged="1" style="display: none;"><img src="'. CORE_ASSETS . 'images/ajax-loader.gif" /></div></div>',

																		'type' => 'email', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => true, // true/false
																		'reuqired_text' => 'Please provide the defendant\'s E-Mail Address', // true/false
																		'des' => '', // true/false
																		'placeholder' => 'johndoe@gmail.com', // true/false
																		
																		),
														
																array(
																		'name' => 'date-time',
																		'title' => 'Date/Time of Incident',
																		'dafault' => '', 
																		'class' => 'row form-group',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6 form-group">',
																		'after_field' => '</div>',

																		'type' => 'time-date', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		//'reuqired' => true, // true/false
																		'des' => '', // true/false
																		'placeholder' => '', // true/false
																		),
														
																array(
																		'name' => 'location',
																		'title' => 'Location of Incident ', //shimion
																		'dafault' => '', 
																		'class' => 'row',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6 form-group">',
																		'after_field' => '</div>',

																		'type' => 'textarea', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'des' => '', // true/false
																		'placeholder' => 'Add the location of the incident', // true/false
																		),
															),
											),					
						
						
						
									array(
										'name' => 'claim_1',
										'title' => '<span>1</span> Cause of Action Details',
										'dafault' => '',
										'class' => 'left-right coa',
										'before_title' => '',
										'after_title' => '',
										'before_field' => '',
										'after_field' => '',

										'type' => 'section', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'fields' => 
													array(
																
														
																
														
																
														
																array(
																		'name' => 'cause_of_action1',
																		'title' => 'Cause of Action',
																		'dafault' => '', 
																		'class' => 'row ',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		'after_field' => '<div class="boilerplate_example"></div></div>',

																		'type' => 'select', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => true, // true/false
																		'des' => '', // true/false
																		//'placeholder' => 'Here are the details of the first cause of action', // true/false
																		'placeholder' => '', // true/false
																		'fields' =>array(
																							'0' => 'Select Cause of Action',	
																							'1' => 'Example Cose of Action 1',	
																							'2' => 'Example Cose of Action 2',
																							'3' => 'Example Cose of Action 3',
																							'4' => 'Example Cose of Action 4',	
																								),
																		
																		
																		),
																		
																array(
																		'name' => 'cause_of_action_details1',
																		'title' => 'Cause of Action Details',
																		'dafault' => '', 
																		'class' => 'row cose_of_action_detail',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		'after_field' => '</div>',

																		'type' => 'textarea', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => true, // true/false
																		'des' => '', // true/false
																		'placeholder' => 'Here are the details of the first cause of action', // true/false
																		
																		),
																		
																),		
													),
													
													
													
													
													
													
													
													
									array(
										'name' => 'claim_2',
										'title' => '<span>2</span> Cause of Action Details',
										'dafault' => '',
										'class' => 'left-right coa',
										'before_title' => '',
										'after_title' => '',
										'before_field' => '',
										'after_field' => '',

										'type' => 'section', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'fields' => 
													array(
																
														
																
														
																
														
																array(
																		'name' => 'cause_of_action2',
																		'title' => 'Cause of Action',
																		'dafault' => '', 
																		'class' => 'row coa',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		'after_field' => '<div class="boilerplate_example"></div></div>',

																		'type' => 'select', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => true, // true/false
																		'des' => '', // true/false
																		//'placeholder' => 'Here are the details of the first cause of action', // true/false
																		'placeholder' => '', // true/false
																		'fields' =>array(
																							'0' => 'Select Cause of Action',	
																							'1' => 'Example Cose of Action 1',	
																							'2' => 'Example Cose of Action 2',
																							'3' => 'Example Cose of Action 3',
																							'4' => 'Example Cose of Action 4',	
																						
																								),
																		
																		
																		),
																		
																array(
																		'name' => 'cause_of_action_details2',
																		'title' => 'Cause of Action Details',
																		'dafault' => '', 
																		'class' => 'row cose_of_action_detail',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		'after_field' => '</div>',

																		'type' => 'textarea', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => true, // true/false
																		'des' => '', // true/false
																		'placeholder' => 'Here are the details of the second cause of action', // true/false
																		
																		),
																		
																),		
													),													
													
													
													
													
									
								
									array(
										'name' => 'claim_3',
										'title' => '<span>3</span> Cause of Action Details',
										'dafault' => '',
										'class' => 'left-right coa',
										'before_title' => '',
										'after_title' => '',
										'before_field' => '',
										'after_field' => '',

										'type' => 'section', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
										'fields' => 
													array(
																
														
																
														
																
														
																array(
																		'name' => 'cause_of_action3',
																		'title' => 'Cause of Action',
																		'dafault' => '', 
																		'class' => 'row coa',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		'after_field' => '<div class="boilerplate_example"></div></div>',

																		'type' => 'select', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => true, // true/false
																		'reuqired_text' => 'It is required', // true/false
																		'des' => '', // true/false
																		//'placeholder' => 'Here are the details of the first cause of action', // true/false
																		'placeholder' => '', // true/false
																		'fields' =>array(
																							'0' => 'Select Cause of Action',	
																							'1' => 'Example Cose of Action 1',	
																							'2' => 'Example Cose of Action 2',
																							'3' => 'Example Cose of Action 3',
																							'4' => 'Example Cose of Action 4',	
																						
																								),
																		
																		
																		),
																		
																array(
																		'name' => 'cause_of_action_details3',
																		'title' => 'Cause of Action Details',
																		'dafault' => '', 
																		'class' => 'row cose_of_action_detail',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		'after_field' => '</div>',

																		'type' => 'textarea', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																		'reuqired' => false, // true/false
																		'des' => '', // true/false
																		'placeholder' => 'Here are the details of the third cause of action', // true/false
																		
																		),
																		
																),		
													),													
													
													
															array(
																'name' => 'desired_damages',
																'title' => 'Desired Damages',
																'dafault' => '',
																'class' => 'left-right bottom-section',
																		'before_title' => '<div class="col-sm-6">',
																		'after_title' => '</div>',
																		'before_field' => '<div class="col-sm-6">',
																		//'after_field' => '</div>',
																
																'des' => '', // true/false
																'type' => 'text', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
																'placeholder' => '', // true/false
															),													
													
									
								
								
								
								
														
													
									
																
								
								
									
									);
									
									
