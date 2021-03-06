<?php

class System{
    
    private $_url;
    private $_explode;
    public $_controller;
    public $_action;
    public $_params;
    
    public function __construct() {
        $this->setUrl();
        $this->setExplode();
        $this->setController();
        $this->setAction();
        $this->setParams();
    }
    
    private function setUrl(){
        $_GET['url'] = isset($_GET['url']) ? $_GET['url'] : "index/index_action";
        $this->_url = $_GET['url'];
    }
    
    private function setExplode(){
        $this->_explode = explode('/',  $this->_url);
    }
    
    private function setController(){
        $this->_controller = $this->_explode[0]; 
        
    }
    
    private function setAction(){
        $ac = (!isset($this->_explode[1]) || $this->_explode[1] == NULL || $this->_explode[1] == "index" ? "index_action" : $this->_explode[1]);
        $this->_action = $ac;
    }
    
    private function setParams(){
        
        unset($this->_explode[0],$this->_explode[1]);
        
        if(end($this->_explode) == null){
            array_pop($this->_explode);
        }
        
        
        if(!empty($this->_explode)){
            $i=0;
            foreach ($this->_explode as $val){
                if($i % 2 == 0){
                    $ind[] = $val;
                }else{
                    $value[] = $val;
                }
                $i++;
            }
            
        }else{
            $ind[] = array();
            $value[] = array();
        }
        
        
        if(isset($ind, $value) && count($ind) == count($value) && (!empty($ind) && !empty($value))){
            $this->_params = array_combine($ind, $value);
        }else{
            $this->_params = array();
        }
    }
    
    public function getParams($name=null){
        if($name != null){
            return $this->_params[$name];
        }else{
            return $this->_params;
        }
        
    }
      
    public function run() {
        $controller_path = CONTROLLERS . ucfirst($this->_controller) . 'Controller.php';
        
        
        if(!file_exists($controller_path))
            header('Location: ' . DOMINIO . 'notfound/');
        
        require_once $controller_path;
        
        
        $app = new $this->_controller();
        
        if(!method_exists($app, $this->_action)){
            //die('Houve um erro, esta action n??o existe');
            header('Location: ' . DOMINIO . 'notfound/');
            //require_once VIEWS . 'home.phtml';
        }
        
        $action = $this->_action;
        $app->$action();
        
    }
}

//app/controllers/postController.php