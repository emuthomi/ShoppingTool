<?php
class Model_Product extends Model_Table
{
    public $table = 'product';
    
    function init()
    {
        parent::init();
        
        $this->addField('name');
        $this->addField('member_price')->type('money');
        $this->addField('guest_price')->type('money');
        
        
        $this->hasMany('Order');
        
    }
}