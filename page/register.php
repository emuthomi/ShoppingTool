<?php
class Page_Register extends Page
{
    function init()
    {
        parent::init();
        
        $form = $this->add('Form');
        $form->setModel('User', array('first_name', 'last_name', 'email', 'password'));
        
        $form->addSubmit('Register');
        
        if($form->isSubmitted())
        {
            $form->update();
            $form->js()->univ()->successMessage('Account created!')->execute();
        }
    }
}