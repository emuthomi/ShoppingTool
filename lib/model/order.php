<?php

class Model_Order extends Model_Table
{
    function init()
    {
        parent::init();
        
        $this->addField('quantity');
        $this->addField('unit_price');
        
        $this->hasMany('Product');
        $this->hasMany('Cart');
        
    }
}