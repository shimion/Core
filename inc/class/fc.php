<?php
// note data_dynamic is html class that will use to transfar value of form using azax.js
/*array(
		array(
			'name' => '',
			'title' => 'text',
			'dafault' => '',
			'type' => '', // 'text', 'textarea', 'select', 'redio', 'checkbox', 'submit'
			'option' => 
					array(
						'one' =>'One',
						'two' =>'Two',
								), // use onlt for 'select', 'redio', 'checkbox'
			'reuqired' => false, // true/false
			),
		array()
	
			);*/


class FC {
		  public $data = array();
		  public $types = array();
		  
		  
		  
		  public function __construct($data) {
			  
			  	$this->data = $data;
				$this->types = array('text', 'textarea', 'select', 'redio', 'checkbox', 'submit', 'address', 'email', 'password', 'name', 'password-conformation', 'section', 'time-date', 'time', 'date', 'upload', 'hidden', 'section-repetor');
				// if both logged in and not logged in users can send this AJAX request,
				// add both of these actions, otherwise add only the appropriate one
				// embed the javascript file that makes the AJAX request
				

		  }
		  
		  
		  
		  
		  public function form(){
			//print_r($this->data);
			 
			  return $this->form_control();
			  
			  }
		  
		  
		  public function form_control(){
				  $output = '';
						
						if(!empty($this->data)){
								foreach ($this->data as $data){
										if(in_array($data['type'], $this->types)){
											
											if($data['type'] === 'text'){
													$output .= sprintf('<div class="form-group form_%s">%s</div>', $data['name'], $this->fc_text($data));
												}elseif($data['type'] === 'textarea'){
													$output .= sprintf('<div class="form-group form_%s">%s</div>', $data['name'], $this->fc_textarea($data));
												}elseif($data['type'] === 'address'){
													$output .= sprintf('<div class="form-group form_%s">%s</div>', $data['name'], $this->fc_address($data));
												}elseif($data['type'] === 'name'){
													$output .= $this->fc_name($data);
												}elseif($data['type'] === 'password'){
													$output .= sprintf('<div class="form-group form_%s">%s</div>', $data['name'], $this->fc_password($data));
												}elseif($data['type'] === 'email'){
													$output .= sprintf('<div class="form-group form_%s">%s</div>', $data['name'], $this->fc_email($data));
												}elseif($data['type'] === 'password-conformation'){
													$output .= sprintf('<div class="form-group form_%s">%s</div>', $data['name'], $this->fc_password_with_conformation($data));
												}elseif($data['type'] === 'submit'){
													$output .= sprintf('<div class="form-group form_%s">%s</div>', $data['name'], $this->fc_submit($data));

												}	
												
												//$output .= sprintf('<div class="form-group form_%s">%s</div>', $data['name'], $fields);											
											
											}
											
									}
							
							}
					
					$result .= sprintf('<div class="form-wapper-cf">%s</div>', $output) ;	
				  
				  
					return $result;
				  
				  
				  }
			  
			  
			  
		  public function name_form_control($datas){
				  $output = '';
						$datas = !empty($datas) ? $datas : $this->data;
						if(!empty($datas)){
								foreach ($datas as $data){
										if(in_array($data['type'], $this->types)){
											
											if($data['type'] === 'text'){
													$output .= sprintf('<div class="form-group form_%s">%s</div>', $data['name'], $this->fc_text($data));
											//	}elseif($data['type'] === 'textarea'){
												//	$output .= $this->fc_textarea($data);
												//}elseif($data['type'] === 'address'){
												//	$output .= $this->fc_address($data);
												//}elseif($data['type'] === 'name'){
												//	$output .= $this->fc_name($data);
												//}elseif($data['type'] === 'password'){
												//	$output .= $this->fc_password($data);
												}elseif($data['type'] === 'select'){
													$output .= sprintf('<div class="form-group form_%s">%s</div>', $data['name'], $this->fc_select($data));
												}
											
											
											}
											
									}
							
							}
					
				if($wapper == true)	{
					$result .= sprintf('<div class="form-wapper-cf">%s</div>', $output) ;	
				}else{
					$result .= sprintf('%s', $output) ;	
				}
				 // $output .= '';
				  
				  
					return $result;
				  
				  
				  }
			  
			  
			  
		  public function password_with_conformation_form_control($datas){
				  $output = '';
						$datas = !empty($datas) ? $datas : $this->data;
						if(!empty($datas)){
								foreach ($datas as $data){
										if(in_array($data['type'], $this->types)){
											
											if($data['type'] === 'password'){
													$output .= sprintf('<div class="form-group form_%s %s">%s</div>', $data['name'], $data['class'], $this->fc_password($data));
												}
											
											
											}
											
									}
							
							}
					
				
					$result .= sprintf('<div class="row">%s</div>', $output) ;	
				 // $output .= '';
				  
				  
					return $result;
				  
				  
				  }
			  
			  
			  
			  private function get_select_fields($fields, $selected){
				  	$fields = !empty($fields) ? $fields : array();
					$selected = !empty($selected) ? $selected : null;
				  		$default = !empty($data['default']) ? sprintf('value="%s"', $data['default']) : sprintf('value="%s"', null);
					$output = '';
					foreach ($fields as $key=> $field){
							$selected = ($selected === $key or $selected === $field) ?  'selected' : null;
								$output .= sprintf('<option value="%s" %s>%s</option>', $key, $selected, $field);
							
						}
						
						if(!empty($output))
						
						return $output;
				  
				  
				  }
			  
			 public function fc_text($data){
				  		$reuqired = ($data['reuqired'] === true) ? 'required' : '';
				  		$default = !empty($data['default']) ? $data['default'] : null;
				  		$reuqired_sign = ($data['reuqired'] === true) ? '<span class="sign_req">*</span>' : '';
						$title = !empty($data['title']) ? sprintf('<div class="%s">%s %s</div>', 'fc_title', $data['title'], $reuqired_sign) : '';
				  		return sprintf('<input placeholder="%s" name="%s" id="input_%s" type="text" value="%s" class="form-control data_dynamic  class_%s %s" >',$data['title'], $data['name'], $data['name'], $default, $data['name'], $reuqired);
				  }
			  
	
			 private function fc_email($data){
				  		$reuqired = ($data['reuqired'] === true) ? 'required' : '';
				  		$default = !empty($data['default']) ? sprintf('value="%s"', $data['default']) : sprintf('value="%s"', null);
				  		$reuqired_sign = ($data['reuqired'] === true) ? '<span class="sign_req">*</span>' : '';
						$title = !empty($data['title']) ? sprintf('<div class="%s">%s %s</div>', 'fc_title', $data['title'], $reuqired_sign) : '';
				  		return sprintf('<input placeholder="%s"  name="%s" id="input_%s" type="email" %s class="form-control data_dynamic  class_%s %s">',$data['title'], $data['name'], $data['name'], $default, $data['name'], $reuqired);
				  }
			  
	
			 public function fc_select($data){
				  		$reuqired = ($data['reuqired'] === true) ? 'required' : '';
				  		$default = !empty($data['default']) ? sprintf('value="%s"', $data['default']) : sprintf('value="%s"', null);
						$fields = $this->get_select_fields($data['fields'], $data['default']);
				  		$reuqired_sign = ($data['reuqired'] === true) ? '<span class="sign_req">*</span>' : '';
						$title = !empty($data['title']) ? sprintf('<div class="%s">%s %s</div>', 'fc_title', $data['title'], $reuqired_sign) : '';
				  		return sprintf('<select placeholder="%s" name="%s" id="input_%s" %s class="form-control data_dynamic  class_%s %s">%s</select></label>',$data['title'], $data['name'], $data['name'], $default, $data['name'],  $reuqired, $fields);
				  }
			  
	
			 private function fc_textarea($data){
				  		$reuqired = ($data['reuqired'] === true) ? 'required' : '';
				  		$default = !empty($data['default']) ? sprintf('value="%s"', $data['default']) : sprintf('value="%s"', null);
				  		$reuqired_sign = ($data['reuqired'] === true) ? '<span class="sign_req">*</span>' : '';
						$title = !empty($data['title']) ? sprintf('<div class="%s">%s %s</div>', 'fc_title', $data['title'], $reuqired_sign) : '';
				  		return sprintf('<textarea name="%s" id="input_%s" class="form-control data_dynamic  class_%s %s">%s</textarea>',$data['title'], $data['name'], $data['name'], $data['name'], $reuqired,  $default);
				  }
				  
				  
			  
	
	  
				  
			  
			  
	
			 private function fc_redio(){
				  
				  
				  }
			  
			 private function fc_checkbox(){
				  
				  
				  }
			  
			 private function fc_date(){
				  
				  
				  }
			  
	
			 private function fc_password($data){
				  		$reuqired = ($data['reuqired'] === true) ? 'required' : '';
				  		$default = !empty($data['default']) ? sprintf('value="%s"', $data['default']) : sprintf('value="%s"', null);
				  		$reuqired_sign = ($data['reuqired'] === true) ? '<span class="sign_req">*</span>' : '';
						$title = !empty($data['title']) ? sprintf('<div class="%s">%s %s</div>', 'fc_title', $data['title'], $reuqired_sign) : '';
				  		return sprintf('<input placeholder="%s" name="%s" id="input_%s" type="password" %s class="form-control data_dynamic  class_%s %s">',$data['title'], $data['name'], $data['name'], $default, $data['name'], $reuqired);
				  }
			  
	
			 private function fc_password_with_conformation($data){
						$reuqired = ($data['reuqired'] === true) ? 'required' : '';
				  		$fields = !empty($data['fields']) ? $data['fields'] : null;
						
						$output = $this->password_with_conformation_form_control($fields);
						
						
						if(!empty($output))
						
						return $output;
				  }
			  
	
			 private function fc_name($data){ // Name is a field that has default three fields gender/firstname/lastname
						  $reuqired = ($data['reuqired'] === true) ? 'required' : '';
				  		$fields = !empty($data['fields']) ? $data['fields'] : null;
						
						$output = $this->name_form_control($fields);
						
						
						if(!empty($output))
						
						return $output;
						
				  
				  }
			  
	
	
			private function fc_address($data){
				  		$reuqired = ($data['reuqired'] === true) ? 'required' : '';
				  		$default = !empty($data['default']) ? sprintf('value="%s"', $data['default']) : '';
				  		$reuqired_sign = ($data['reuqired'] === true) ? '<span class="sign_req">*</span>' : '';
						$title = !empty($data['title']) ? sprintf('<div class="%s">%s %s</div>', 'fc_title', $data['title'], $reuqired_sign) : '';
						$fields .= sprintf('<input name="%s_strre_address" id="input_%s_strre_address" type="text" placeholder="%s" class="form-control data_dynamic  class_%s_strre_address %s" />', $data['name'], $data['name'], 'Street Address', $data['name'], $reuqired);
						$fields .= sprintf('<input name="%s_strre_address2" id="input_%s_strre_address2" type="text" placeholder="%s" class="form-control data_dynamic  class_%s_strre_address2" />', $data['name'], $data['name'], 'Address Line 2', $data['name']);
						$city = sprintf('<input name="%s_city" id="input_%s_city" type="text" placeholder="%s" class="form-control data_dynamic  class_%s_city" />', $data['name'], $data['name'], 'City', $data['name']);
						$state = sprintf('<input name="%s_state" id="input_%s_state" type="text" placeholder="%s" class="form-control data_dynamic  class_%s_state" />', $data['name'], $data['name'], 'State', $data['name']);
						$fields .= sprintf('<div class="two-in-one">%s %s</div>', $city , $state);
						$zip = sprintf('<input name="%s_zip" id="input_%s_zip" type="text" placeholder="%s" class="form-control data_dynamic  class_%s_zip" />', $data['name'], $data['name'], 'Zip', $data['name']);
						$county = sprintf('<input name="%s_county" id="input_%s_county" type="text" placeholder="%s" class="form-control data_dynamic  class_%s_county" />', $data['name'], $data['name'], 'Country', $data['name']);
						$fields .= sprintf('<div class="two-in-one">%s %s</div>', $zip , $county);
				  		$output = sprintf('<label class="lab_%s">%s%s</label>',$data['name'], $title, $fields);
						
						
						return $output;
				  }
			  
	
			 private function fc_submit($data){
				
				  		$default = !empty($data['default']) ? $data['default'] : $data['title'];
						$title = !empty($data['title']) ? sprintf('<div class="%s">%s %s</div>', 'fc_title', $data['title'], $reuqired_sign) : '';
				  		return sprintf('<input name="%s" id="input_%s" type="submit" value="%s" class="form-control data_dynamic  class_%s">',$data['name'], $data['name'], $default, $data['name']);
				  
				  }
			  
	
	
	}
