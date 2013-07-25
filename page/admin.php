<?php
class Page_Admin extends Page
{
    function init()
    {
        parent::init();
        
        $is_admin = $this->api->auth->model['is_admin'];
        
        if (!$is_admin)
        {
            $this->api->redirect('index');
        }else
        {
            $tabs = $this->add('Tabs');
        
            $tab = $tabs->addTab('User Admin');
            $tab->add('CRUD')->setModel('User');
        
            $tab = $tabs->addTab('Product Admin');
            $tab->add('CRUD')->setModel('Product');
        }
        
       
    }
}