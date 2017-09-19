<?php
// @ I am the Literature Intregratore

class Meta{
			public $data = array();
			public $type;
		  public function __construct($data, $posttype) {
			  	add_action( 'admin_init', array($this, 'init') );
				$this->type = $posttype;
				$this->data = $data;
				//add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );	
			//	if ( is_admin() ) {
					//	add_action( 'add_meta_boxes', array( $this, 'scpt_shortcode_metabox') );
				//	}
					
		  }

	
	
	
	
	
	
	public function option_tree_converter(){
				$convert = array();
				foreach($this->data as $metas){
						if(!empty($metas)){
								if($metas['type'] == 'section' or $metas['type'] == 'time-date')		{
													$convert[] = array(
																'label'       => __($metas['title'], 'SimThemes' ),
																'id'          => $metas['name'],
																'desc'        => __( $metas['des'], 'SimThemes' ),
																'std'         => $metas['default'],
																'type'        => $this->replace_type($metas['type']),
													);
													
													
																
										foreach($metas['fields'] as $meta){
												$convert[] = array(
																'label'       => __($meta['title'], 'SimThemes' ),
																'id'          => $meta['name'],
																'desc'        => __( $meta['des'], 'SimThemes' ),
																'std'         => $meta['default'],
																'type'        => $this->replace_type($meta['type']),
																'section'     => 'option_types', //not the same section that is on $this->claim_data data
																'rows'        => '',
																'post_type'   => '',
																'taxonomy'    => '',
																'min_max_step'=> '',
																'class'       => '',
																'condition'   => '',
																'operator'    => 'and',
																'choices'     => $this->choice_output($meta['type'], $meta['fields'])
															
															);
					
														}
											
											
											}else{
												
												
												
														$convert[] = array(
																'label'       => __($metas['title'], 'SimThemes' ),
																'id'          => $metas['name'],
																'desc'        => __( $metas['des'], 'SimThemes' ),
																'std'         => $metas['default'],
																'type'        => $this->replace_type($metas['type']),
																'section'     => 'option_types', //not the same section that is on $this->claim_data data
																'rows'        => '',
																'post_type'   => '',
																'taxonomy'    => '',
																'min_max_step'=> '',
																'class'       => '',
																'condition'   => '',
																'operator'    => 'and',
																'choices'     => $this->choice_output($metas['type'], $metas['fields'])
															
															);
	
												
												
												
											
											
							}
							
							
							
							
							
			
						}
						
				}
		
		
					return apply_filters('apply_meta_condition', $convert);
		
		
		}
	
	
	

	public function init(){
			$options = array();
			
			 $options = array(
    'id'          => 'file_a_case',
    'title'       => __( 'Additional Information', 'SimThemes' ),
    'desc'        => '',
    'pages'       => array( $this->type ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'    =>  $this->option_tree_converter(),
	
   );
     
			
			
			//$options['fields'] = $this->option_tree_converter();
			//print_r($options);
	if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $options );

		
		}

	
	
	public function replace_type($type){
			if($type == 'section'){
				$output = 'tab';
				}elseif($type == 'text' or $type == 'email'){
					$output = 'text';
					}elseif($type == 'textarea'){
						$output = 'textarea';
						}elseif($type == 'select'){
							$output = 'select';
							}elseif($type == 'date'){
								$output = 'date_picker';
								}elseif($type == 'time-date'){
									$output = 'date-time-picker';
					
				}else{
					
				$output = $type;	
				}
				
				return $output;
				
				
				
		}
		
		
	public function choice_output($type, $fields){
			$output = array();
		if(!empty($fields)){
			foreach($fields as $key=>$field){
			$output[] = array(
								'value'       => $key,
								'label'       => __( $field, 'simthemes' ),
								'src'         => ''
								);
			
			}
		}
		
		return $output;
			
		
		}	


	
	
}