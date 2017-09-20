<?php
// @ get all data from specific query
// @ then stored on parme $this->data

class Search extends Core{
	
		  private $customQuery = array();
		  public $data = array();
		  public $exceptions = array();
		  
		  public function __construct() {
				parent::__construct(); 
				
	
		  }
		  







		
			public function live_query(){
				$key = !empty($_POST['key']) ? $_POST['key'] : null;
			 // get the submitted parameters
			 $this->paged = !empty($_POST['paged']) ? $_POST['paged']: 2;
			$str = new GS(array('paged'=> $paged, 's' =>  $key));
				 // generate the response
				$this->posts_per_page = $str->posts_per_page;
				
				$this->total_posts = $str->total_posts;
				
				
				 $this->max_num_pages = $str->max_num_pages;
				 if(empty( $this->total_posts)){
					 $this->paged = 0;
					}else{
					if( $this->max_num_pages == 1){
						 $this->paged = 0;
							}else{	
								$this->paged = $this->paged + 1;	
									}
				}
				 
				//$this->paged = (!empty($this->total_posts) or $this->total_posts != 0 or $this->total_posts != null ) ? $total_pagination : 0;
			 

			if($this->paged >= 2)	 {
							$response = json_encode( array( 'paged' =>$this->paged , 'result' => $str->post_output(), 'max_num_pages' =>$str->customQuery) );
						}else{
							$response = json_encode( array( 'paged' =>$this->paged , 'result' => 'sorry not available' , 'max_num_pages' =>$str->customQuery) );
							}
							
							
							$response = json_encode( array( 'paged' =>$this->paged , 'result' => $str->post_output(), 'max_num_pages' =>$str->customQuery) );
			 
			 // response output
			header( "Content-Type: application/json" );
			// echo $str->post_output();
			 echo $response;
			 // IMPORTANT: don't forget to "exit"
			exit;
		
		}


			public function add_filter_query_array($arr, $key){
					
					$arr['s']  = $key;
				}
		  
				
	
	
	}
	
	
	if(!is_admin())
	$value = new Search();
