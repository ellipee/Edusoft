<?php
namespace Admin\Form;

use Zend\Form\Form;

class SessionForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('session');
        $this->setAttribute('method', 'post');
        $this->setAttribute('id', 'smart-form-register');
        $this->setAttribute('class', 'form-inline');
        $this->setAttribute('role', 'form-horizontal');

        $this->add(array(
            'name'=>'id',
            'attributes'=>array(
                'type'=>'hidden',)
            ,
            ));

        $this->add(array(
            'name' => 'sessionName',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' =>'Enter session name',
                'class' =>'form-control',
            ),
            'options' => array(
                'label' => 'Session Name',
            ),
            'label_attributes' => array(
                'class' => 'input', 
                ),
        ));
        
        $this->add(array(
            'name' => 'status',
            'type' => 'Zend\Form\Element\Select',
            'attributes' => array(
                'class'=>'form-control',
                'id' =>'st',),
            'options' => array(
                'label' => 'Session Status',
                'empty_option' => 'Select status',
                'value_options' => array(
                    '0' => 'Close',
                    '1' => 'Open',
                ),
            ),
             'label_attributes' => array(
                'class' => 'input', 
                ),

        ));
           
        
        
            
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Add',
                'class' => 'btn btn-primary',
            ),
        )); 
    }
}