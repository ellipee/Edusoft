<?php
namespace Admin\Form;
use Doctrine\ORM\EntityManager;
use Zend\Form\Form;

class AcademicsessionForm extends Form
{
    public function __construct(EntityManager $em, $name = null)
    {
        parent::__construct('academicsession');
        $this->setAttribute('method', 'post');
        $this->setAttribute('id', 'academicsession');
        $this->setAttribute('class', 'smart-form');

       
        $this->add(array(
            'name' => 'session',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Session',
                'object_manager' => $em,
                'target_class' => 'Admin\Entity\Session',
                'property' => 'sessionName',
                'empty_option'   => 'please select session',
            ),
            'attributes' => array(
                'required' => true
            )
        ));

         $this->add(array(
            'name' => 'term',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'options' => array(
                'label' => 'Session',
                'object_manager' => $em,
                'target_class' => 'Admin\Entity\Term',
                'property' => 'termName',
                'empty_option'   => 'please choose term',
            ),
            'attributes' => array(
                'required' => true
            )
        ));

        $this->add(array(
            'name' => 'startDate',
            'attributes' => array(
                'type'  => 'Date',
                'class' => 'datepicker',
                'id'    => 'startdate',
                
            ),
            'options' => array(
                'label' => 'Start Date',
                'format' =>'d/m/Y'
            ),
        )); 

        $this->add(array(
            'name' => 'endDate',
            'attributes' => array(
                'type'  => 'Date',
                 'class' => 'datepicker',
                'id'    => 'enddate',
                
            ),
            'options' => array(
                'label' => 'End Term',
                'format' =>'d/m/Y'
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