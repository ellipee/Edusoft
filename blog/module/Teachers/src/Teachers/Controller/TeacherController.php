<?php

namespace Teachers\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TeacherController extends AbstractActionController
{ 
	protected $em;
	public function dashboardAction()
	{
		
		return new ViewModel();
	}
	public function registerationAction()
	{
		return new ViewModel();
	}

	public function logoutAction()
	{
		return new ViewModel();
	}

	public function getEntityManager()
	{
		$em=$this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
		return $this->$em;
	}
}
