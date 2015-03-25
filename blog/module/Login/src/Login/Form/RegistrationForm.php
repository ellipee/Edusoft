<?php
namespace Login\Form;

use Zend\Form\Form;

class RegistrationForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('registration');
        $this->setAttribute('method', 'post');
        $this->setAttribute('id', 'smart-form-register');
        $this->setAttribute('class', 'smart-form client-form');

        $this->add(array(
            'name' => 'usrName',
            'attributes' => array(
                'type'  => 'text',
                'placeholder' =>'Username',
            ),
            'options' => array(
                'label' => 'Username',
            ),
            'label_attributes' => array(
                'class' => 'input', 
                ),
        ));
		
        $this->add(array(
            'name' => 'usrEmail',
            'attributes' => array(
                'type'  => 'email',
                'placeholder' =>'Email address',
            ),
            'options' => array(
                'label' => 'E-mail',
            ),
            'label_attributes' => array(
                'class' => 'input', 
                ),
        ));	
		
        $this->add(array(
            'name' => 'usrPassword',
            'attributes' => array(
                'type'  => 'password',
                'placeholder' => 'Password',
            ),
            'options' => array(
                'label' => 'Password',
            ),
            'label_attributes' => array(
                'class' => 'input', 
                ),
        ));
		
        $this->add(array(
            'name' => 'usrPasswordConfirm',
            'attributes' => array(
                'type'  => 'password',
                'placeholder' => 'Confirm password',
            ),
            'options' => array(
                'label' => 'Confirm Password',
            ),
            'label_attributes' => array(
                'class' => 'input', 
                ),
        ));	

		$this->add(array(
			'type' => 'Zend\Form\Element\Captcha',
			'name' => 'captcha',
			'options' => array(
				'label' => 'Please verify you are human',
				'captcha' => new \Zend\Captcha\Figlet(),
			),
		));
		
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'class' => 'btn btn-primary',
            ),
        )); 
    }
}