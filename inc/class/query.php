<?php
// @ get all data from specific query
// @ then stored on parme $this->data

class Query{
	
		  public $customQuery = array();
		  public $data = array();
		  public $quantity;
		  public $posts_per_page;
		  public $paged;
		  public $total_posts;
		  public $max_num_pages;
		  public $post_type;
		  public $taxonomy;
		  public $s;
		  public function __construct($arg = array()) {
				$this->quantity = 10;
				$this->posts_per_page = isset($arg['posts_per_page']) ? $arg['posts_per_page'] : 5;
				$this->paged = isset($arg['paged']) ? $arg['paged'] :2;
				$this->post_type =  isset($arg['post_type']) ? $arg['post_type'] : 'literature';
				$this->taxonomy =  isset($arg['taxonomy']) ? $arg['taxonomy'] : 'literature';
				$this->total_posts = wp_count_posts($this->post_type);
				//print();
				$this->s = !empty($arg['s']) ? $arg['s'] : null;
				$this->customQuery = self::get_query_result();
				//$this->max_num_pages = $this->customQuery->max_num_pages;
				$this->max_num_pages = ceil($this->total_posts->publish/$this->posts_per_page);
				if($this->paged <= $this->max_num_pages){
				$this->data = $this->generate_frontend_object();
				//print_r($this->data);
				}
				
				
	
		  }
		  
		  
		  private function get_query_result(){
				
				
				/*$args = array(
							'post_type' =>$this->plugin_name,
							'tax_query' => array(
								array(
									'taxonomy' => $this->plugin_name,
								),
							),
						);*/
						
					$args = array();	
					if(!empty($this->post_type))				
					$args['post_type'] = $this->post_type;					
					if(empty($this->paged) )	{
						
						}else{			
					$args['paged'] = $this->paged;	
						}
					if(!empty($this->posts_per_page))				
					$args['posts_per_page'] = $this->posts_per_page;	
					$args['s'] = $this->s;					
					$args['tax_query']['taxonomy'] = $this->taxonomy;
					$args = apply_filters('filter_query_array', $args, $args);					
					$query = new WP_Query( $args );
					wp_reset_query();
					return $query->posts;
					
			
			}
			
			
			
			
			public function generate_frontend_object(){
					$post_data = array();
					if(!empty($this->customQuery)){
						foreach($this->customQuery as $query){
								setup_postdata( $query );
								if ( has_post_thumbnail( $query->ID ) ) {
									$src =  wp_get_attachment_image_src( get_post_thumbnail_id($query->ID), apply_filters('get_loop_image_size', 'thumbnail_size') );
									$link = get_permalink($query->ID);
									$url = $src[0];
									$src =  apply_filters('get_loop_image', $url );
									 }
									 
									  $post_data[$query->ID]['image'] = $src;
									  $post_data[$query->ID]['title'] = $query->post_title;
									  $post_data[$query->ID]['link'] = get_permalink($query->ID);
									  $post_data[$query->ID]['content'] = $query->post_content;
									  $post_data[$query->ID]['excerpt'] = $query->post_excerpt;
									 
									 
									 
							}
						
						}
						
						return $post_data;
				
				
				
				}



		  
		  
		  
				
	
	
	}
