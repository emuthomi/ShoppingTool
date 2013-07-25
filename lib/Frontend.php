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
 
        
        if ($this->auth->isLoggedIn())
        {
            $menu =$this->add('Menu',null,'Menu');
            $menu->addMenuItem('index','Welcome');
        
            $is_admin = $this->api->auth->model['is_admin'];
            if ($is_admin)
            {
                $menu->addMenuItem('admin');
                $menu->addMenuItem('consumptions');
            }
            $menu->addMenuItem('logout');
        
        }else
        {
            $menu =$this->add('Menu',null,'Menu')
            ->addMenuItem('index')
            ->addMenuItem('login')
            ->addMenuItem('register');
        }
        
        $this->auth->check();
        

    }
  
}
