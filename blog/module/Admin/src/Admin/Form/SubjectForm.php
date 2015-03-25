<?php
namespace Admin\Form;

use Zend\Form\Form;

class SectionForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('subject');
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
                'placeholder' =>'Enter subject name',
                'class' =>'form-control',
            ),
            'options' => array(
                'label' => 'Subject name',
            ),
            'label_attributes' => array(
                'class' => 'input', 
                ),
        ));


        $this->add(array(
            'name' => 'code',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' =>'Enter subject code',
                'class' =>'form-control',
            ),
            'options' => array(
                'label' => 'Code',
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