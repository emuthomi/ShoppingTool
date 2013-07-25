<?php
class Page_Consumptions extends Page
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
            
            $crud = $this->add('CRUD');
            $crud->setModel('Model_Cart');
            
            if($crud->grid)
            {
                $crud->grid->addColumn('Button', 'payed', 'Mark as Payed');
                
                if($_GET['payed'])
                {
                    $crud->model->load($_GET['payed']);
                    $crud->model->markAsPayed();
                    
                    $crud->js(null, $crud->grid->js()->reload())
                            ->univ()->alert('Success')->execute();
                }
                
                //$crud->grid->addColumn('Button', 'detail', 'Details');
            }
            
            
        }
        
       
    }
}