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


        $this->add('Menu',null,'Menu')
            ->addMenuItem('index','Welcome')
            ->addMenuItem('logout')
            ;
    }
  
}
