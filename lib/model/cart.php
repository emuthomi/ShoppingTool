<?php

class Model_Cart extends Model_Table
{
    function init()
    {
        parent::init();
        
        $this->addField('created');
        
        $this->hasOne('User');
        
        $this->hasMany('Order');
    }
}