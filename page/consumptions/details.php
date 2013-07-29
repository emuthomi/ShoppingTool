<?php

class page_consumptions_details extends Page
{
    function init()
    {
        parent::init();
        
        $this->api->stickyGET('id');
        
        $u = $this->add('Model_Cart')->load($_GET['id']);
        
        $crud = $this->add('CRUD');
        $crud->setModel($u->ref('Order'));
        
        $form = $crud->form;
        
        if($form)
        {
            $product_field = $form->getElement('product_id');
            $price_field = $form->getElement('unit_price');

            
            if($_GET['product_id'])
            {
               /*
                $price = $this->api->db->dsql()
                    ->table('product')
                    ->field('member_price')
                    ->where('id',$_GET['product_id'])
                    ->do_getOne();
                $price_field->set($price);
                * 
                */
                
                $q=$this->api->db->dsql();
                $q->table('order')->join('cart');
                $q->join('user.id','cart.user_id');
                $q->where('cart_id', $_GET['id']);
                $q->field('is_member');
                //$q->getOne();

                //$q->debug();
                $member = $q->get();
                
                //print_r($member);

                if ($member[0]['is_member'] == 1)
                {
                    $s = $this->api->db->dsql();
                    $s->table('product');
                    $s->field('member_price');
                    $s->where('id', $_GET['product_id']);
                    $s->debug();
                    $price = $s->get();
                    $price_field->set($price[0]['member_price']);
                    
                    print_r($price);
                }else{
                    $s = $this->api->db->dsql();
                    $s->table('product');
                    $s->field('guest_price');
                    $s->where('id', $_GET['product_id']);
                    $s->debug();
                    $price = $s->get();
                    $price_field->set($price[0]['guest_price']);
                    
                    print_r($price);
                }
                
        echo ($this->api->url());
                
            }
                
                
           
            
            $product_field->js('change', 
                    $form->js()->atk4_form('reloadField', 'unit_price',
                            array($this->api->url(), 'product_id' => $product_field->js()->val())));

            /*
            $product_field->js('change', 
                    $this->api->url($this->api->url(),array('prod' => $product_field->js()->val())));
                            
             * 
             */

            if($form->isSubmitted())
            {
                $this->js()->univ()->alert('testing');
            }
        }
    }
}