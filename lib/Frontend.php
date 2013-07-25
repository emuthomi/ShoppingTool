<?php
/**
 * Consult documentation on http://agiletoolkit.org/learn 
 */
class Frontend extends ApiFrontend {
    function init(){
        parent::init();
  
        $this->dbConnect();
        $this->requires('atk','4.2.0');
        $this->add('jUI');

        $this->add('Auth')->setModel('User');
        $this->auth->allowPage(array('register', 'index'));
        $this->auth->check();

        $menu =$this->add('Menu',null,'Menu');
        
        if ($this->auth->isLoggedIn)
        {
            
            $menu->addMenuItem('index','Welcome');
                
        
        $is_admin = $this->api->auth->model['is_admin'];
        if ($is_admin)
        {
            $menu->addMenuItem('admin');
        }
        
        $menu->addMenuItem('logout');
        }else
        {
            $menu->addMenuItem('index')
            ->addMenuItem('login')
            ->addMenuItem('register');
        }
        
        
        

    }
  
}
