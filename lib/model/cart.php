<?php

class Model_Cart extends Model_Table
{
    public $table = 'cart';
    
    function init()
    {
        parent::init();
        
        $this->addField('created')->type('date')->defaultValue('now');
        $this->addField('is_payed')->type('boolean');
        
        $this->hasOne('User', null, 'email');
        
        $this->hasMany('Order');
    }
    
    function markAsPayed()
    {
        $this['is_payed'] = TRUE;
        $this->save();
    }
}