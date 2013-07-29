<?php

class Model_Order extends Model_Table
{
    public $table = 'order';
    
    function init()
    {
        parent::init();
        
        $this->hasOne('Product', null, 'name');
        $this->addField('unit_price')->type('money');
        $this->addField('quantity');
        
        $this->addExpression('subtotal')->set(function($m,$q){
            return $q->expr('[f1] * [f2]')
                    ->setCustom('f1', $m->getElement('unit_price'))
                    ->setCustom('f2', $m->getElement('quantity'));
        });
        
        
        
        $this->hasOne('Cart');
        
    }
}