<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ClassController extends AbstractActionController
{
   public function indexAction()
   {
   	return new ViewModel();
   }

   public function addAction()
   {
   	return new ViewModel();
   }

   public function deleteAction()
   {
   	return new ViewModel();
   }
}