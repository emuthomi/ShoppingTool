<?php
class Model_User extends Model_Table
{
    public $table = 'user';
    
    function init()
    {
        parent::init();
        
        $this->addField('first_name');
        $this->addField('last_name');
        $this->addField('email')->mandatory('Email is required');
        $this->addField('password')->display('password');
        
        $this->addField('is_admin')->type('boolean');
        $this->addField('is_member')->type('boolean');
        
        $this->hasMany('Cart');
        
    }
}