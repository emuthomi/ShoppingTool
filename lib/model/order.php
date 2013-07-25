<?php

class Model_Order extends Model_Table
{
    public $table = 'order';
    
    function init()
    {
        parent::init();
        
        $this->addField('quantity');
        $this->addField('unit_price')->type('money');
        
        $this->hasOne('Product');
        $this->hasOne('Cart');
        
    }
}