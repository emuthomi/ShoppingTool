<?php

class page_consumptions_details extends Page
{
    function init()
    {
        parent::init();
        
        $this->api->stickyGET('id');
        
        $u = $this->add('Model_Cart')->load($_GET['id']);
        
        $this->add('CRUD')->setModel($u->ref('Order'));
    }
}