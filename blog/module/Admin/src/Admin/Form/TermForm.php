<?php
namespace Admin\Form;

use Zend\Form\Form;

class TermForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('term');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-inline');
        $this->setAttribute('role', 'form-horizontal');

        $this->add(array(
            'name' => 'termName',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' =>'Term name',
                'class' =>'form-control',

            ),
            'options' => array(
                'label' => 'Term Name',
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