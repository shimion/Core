<?php
// @ get all data from specific query
// @ then stored on parme $this->data

class Mail{
	
		  private $customQuery = array();
		  public $info = array();
		  public $product = array();
		  public $email;
		  public $subject;
		  public $massage;
		  public $exceptions = array();
		  public $headers = array();
		  public $user_id;
		  public $activation_link;
		  public $fields = array();
		  public function __construct($data) {
				//parent::__construct($data); 
				$this->fields = $data['fields'];
				$this->info = $data['info'];
				$this->user_id = $data['user_id'];
				$this->product = $data['product'];
				$this->activation_link = $data['activation_link'];
				$this->email = 'shimionson@gmail.com';
				$this->subject = 'Buy Product';
				$this->massage = apply_filters('submit_massage',  $this->massage() , $this->product, $this->basic_info());
				$this->headers[] = 'From: Free Court <wordpress@freecourt.com>';
		  		add_shortcode('massage', array($this, 'shortcode'));
				
		  }
		  

		public function shortcode(){
			
			return $this->massage;
			
			}
			
		public function result(){
			
				if($this->send() == true){
					return sprintf('%s', 'Thanks for submitting the mail');
					}else{
					return sprintf('%s', 'Sorry unable to send the mail. Please try again after sometime.');
				}
				
			}	
			

		public function send(){
					add_filter( 'wp_mail_content_type', array($this, 'set_html_mail_content_type' ));
					$mail = wp_mail($this->email, $this->subject, $this->massage, $this->headers);
					remove_filter( 'wp_mail_content_type', array($this,  'set_html_mail_content_type') );
					return $mail;
			}
		
		
		
		public function set_html_mail_content_type(){
				return 'text/html';
			}
			
			
			
		public function get_field_label_by_name_field($name){
			
				if(!empty($name)){
					foreach ($this->fields as $field){
							if($field['type'] == 'address'){
									if($field['name'].'_strre_address' == $name){
										return 'Address';
										}elseif($field['name'].'_strre_address2' == $name){
										return 'Address2';
										}elseif($field['name'].'_city' == $name){
										return 'City';
										}elseif($field['name'].'_state' == $name){
										return 'State';
										}elseif($field['name'].'_zip' == $name){
										return 'Zip';
										}elseif($field['name'].'_state' == $name){
										return 'State';
										}elseif($field['name'].'_country' == $name){
										return 'Country';
										}
								}elseif($field['name'] == $name){
										return $field['title'];
								}
						}	
					}
			
			}	



		public function basic_info(){
					$output = '';
					if(!empty($this->info)){
							$output .= '<table>';
							
						foreach ($this->info as $info){
							$field_lable = $this->get_field_label_by_name_field($info['name']);
									$output .= sprintf('<tr><td><span style="font-weight: bold;    margin-right: 20px;">%s</span></td><td>%s</td></tr>',!empty($field_lable) ? $field_lable.':':null, $info['value']);
									//$output .= sprintf('<p>%s</p>',$info['value']);
								
							}
							
							$output .= '</table>';
							
						}
						
						
						return $output;
			
				}
				
				
				
		
		
		public function new_user_mail( ) {
			$user = new WP_User($this->user_id);
			  $message  = sprintf(__('New user registration on your blog %s:'), get_option('blogname')) . "<br>";
	  			$email = '';
	  		if(!empty($this->info)){
						foreach ($this->info as $info){
							
							if($info['name'] == 'email'){
								$message .= sprintf(__('E-mail: %s'), stripslashes($info['value'])) . "<br>";
								$email =  stripslashes($info['value']);
								}
							if($info['name'] == 'password'){
								$message .= sprintf(__('Password: %s'), stripslashes($info['value'])) . "<br>";
								}
							
						}
						
			}
	  
	  
	  						if(!empty($this->activation_link))
								$message .= sprintf(__('Here is your activation link: %s'), $this->activation_link) . "<br>";
	  					add_filter( 'wp_mail_content_type', array($this, 'set_html_mail_content_type' ));
					$out = wp_mail($email, sprintf(__('[%s] Your username and password'), get_option('blogname')), $message, $this->headers);
					remove_filter( 'wp_mail_content_type', array($this,  'set_html_mail_content_type') );
					return $mail;

			
  
  			return $out;
    }
	
	
	
				
		


		public function massage(){
						$html = '';
						$html  .= $this->basic_info();
						/*$html .= '<table>';
						$html .= '<thead>';
						$html .= '<tr>';
						
						$html .= sprintf('<th  style=" width:%s; max-width: 150px;"><span>%s</span></th>','30%', 'Image');
						$html .= sprintf('<th style=" width:s%; max-width: 150px;"><span>%s</span></th>','50%', 'Title');
						$html .= sprintf('<th style=" width:s%; max-width: 150px;"><span>%s</span></th>','10%', 'Quantity');*/
						
							$i = 0;
						if(!empty($this->product)):
								$html .= sprintf('<h2 style="font-size: 15px;vertical-align: top;">%s</h2>', 'All Literature Products:');
								$html .= '<table style="margin-top:10px;">';
								$html .= '<tr>';
								foreach($this->product as $product){
								$i++;
								$html .= '<td style="width: 100px;vertical-align: top;">';
								$html .= sprintf('<img src="%s" style=" width:%s; max-width: 100px;  text-aligh:left;" />', $product['img'], '100%');
								$html .= '</td>';
								$html .= '<td style=" width: 111px;max-width:200px;vertical-align:top;">';
								$html .= sprintf('<h2 style="font-size: 12px;vertical-align: top;">%s</h2>', $product['title']);
								$html .= sprintf('<h5 style="padding: 0;margin: 0;">Quantity: %s</h5>', $product['qty']);
								$html .= '</td>';
								if( $i%3 == 0 ){
								
								$html .= '</tr><tr>';
								}
								
									
									}
									
									$html .= '</tr>';
									$html .= '</table>';
					
					endif;
						
						
						/*$html .= sprintf('<th  width="%s"><span>%s</span></th>','30%', 'Image');
						$html .= sprintf('<th width="%s"><span>%s</span></th>','50%', 'Title');
						$html .= sprintf('<th width="%s"><span>%s</span></th>','10%', 'Quantity');
						
						$html .= '</tr>';
						$html .= '<tfoot>';
						$html .= '</table>';*/
						
						return $html; 
					
			
			}

		
	
	
	}
	