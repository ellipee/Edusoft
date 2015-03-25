<?php
namespace Admin\Form;

use Zend\Form\Form;

class SectionForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('section');
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
            'name' => 'name',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' =>'Enter section name',
                'class' =>'form-control',
            ),
            'options' => array(
                'label' => 'Name',
            ),
            'label_attributes' => array(
                'class' => 'input', 
                ),
        ));

         $this->add(array(
            'name' => 'description',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' =>'Describe this section',
                'class' =>'form-control',
            ),
            'options' => array(
                'label' => 'Description',
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