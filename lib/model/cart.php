<?php

class Model_Cart extends Model_Table
{
    public $table = 'cart';
    
    function init()
    {
        parent::init();
        

        
        $this->addField('created')->type('date')->defaultValue('now');
        $this->addField('is_payed')->type('boolean');
        
        /*
        $this->addExpression('total')->set(function($m){
            $or = $m->add('Model_Order');
            return $or
                    ->dsql()
                    ->where($m->dsql()->fx('FIND_IN_SET', array($or->getElement('cart_id'),$m->getElement('id'))))
                    ->fieldQuery('sum(unit_price)');
        });
         * */

        
        $this->hasOne('User', null, 'email');
        
        $this->hasMany('Order');
        $this->addExpression('totalToPay')->set($this->refSQL('Order')->sum('subtotal'));
    }
    
    function markAsPayed()
    {
        $this['is_payed'] = TRUE;
        $this->save();
    }
}