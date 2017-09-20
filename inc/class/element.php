<?php
     class Element {
    protected static $instance;
    public $properties;
     public $_scriptPath ;
         public $_scriptDri = array();
            public $_scriptJsDri = array();
                public $_scriptCssDri ;
                    public $_scripts ;
                        public $styles ;
                    public $template_name ;
          
    
    public static function get_instance(){
            if( is_null( self::$instance ) ){
                self::$instance = new self( $_REQUEST );
            }

            return self::$instance;
        }     
    
  public function __construct(){
      $this->_scriptPath =  CORE_TMP_PATH ;
      $this->_scriptDri =  CORE_TMP_URL;
      $this->properties = array();
      //echo $this->_scriptPath;
   }
         
  public function setScriptPath($templatename){
      
     $this->_scriptPath = $this->_scriptPath.$templatename ;
      if(file_exists($this->_scriptPath)){
          return $this->_scriptPath; 
      
      }  
      
  }
         
  
  public function setScriptPathUri($templatename){
      
     $this->_scriptDri = $this->_scriptDri.$templatename ;
      if(file_exists($this->_scriptDri)){
          return $this->_scriptDri; 
      
      }  
      
  }
         
  

         
   public function add_inline_css(){
       wp_add_inline_style('CORE-style', $this->styles);
      
   }      
    
         
         
           
  public function render($templatename){ 
      $this->template_name = $templatename;
      
      $file = $this->setScriptPath($templatename).'/design.php' ;
      echo $file;
   if(file_exists($file)){
        ob_start();
        include($file);
      
        return ob_get_clean();
            } else {
       
          return 'Nothing: ' . $file;
           
           };
   
  }
         
         
         public function Get_Data($data, $scripts_footer = array(), $styles = array()){
              $this->properties = $data;
                //$this->template_name = $templatename;
                $this->_scripts = $scripts_footer;
                
         }
         
         
          
         
         
         public function get_styles($styles){
            $this->styles = $styles;
        }            
         
         public function Styles(){
             return  sprintf('<style>%s</style>', $this->styles);
         }
         
        public function get_scripts()   {
        
       
   }       
          
         
  
} // End Class


function Element(){
    return Element::get_instance();
}