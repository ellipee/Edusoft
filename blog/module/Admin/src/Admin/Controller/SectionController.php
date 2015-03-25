<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Admin\Entity\Section; 
use Admin\Form\SectionForm;       
use Admin\Form\SectionFilter;

use Admin\Entity\Classes; 
use Admin\Form\ClassesForm;       
use Admin\Form\ClassesFilter;

use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;



class SectionController extends AbstractActionController 
{
    protected $em;
   
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }

   public function indexAction()
   {  
          $em = $this->getEntityManager();
         //Classes and Section Forms
           $formclasses = new ClassesForm($em);
           $formsection = new SectionForm();       

          //List of Classes and Section
          $classes=$em->getRepository('Admin\Entity\Classes')->findAll();
          $sections=$em->getRepository('Admin\Entity\Section')->findAll();
           
           //Return Variables to view model   
           return new ViewModel(array (
            'classes' => $classes,
            'sections'=>$sections,
            'formclasses' =>$formclasses,
            'formsection'=>$formsection
            ));

      }

    public function addsectionAction()
    {
     $entityManager = $this->getEntityManager();
     $formsection = new SectionForm();
     $formsection->setHydrator (new DoctrineEntity($entityManager,'Admin\Entity\Section'));
     $section = new section();

     $formsection->bind($section);      
      $request = $this->getRequest();

        $request = $this->getRequest();
         if ($request->isPost()) {
            $formsection->setInputFilter(new SectionFilter($this->getServiceLocator()));
            $formsection->setData($request->getPost());

            if ($formsection->isValid()) {
              $entityManager->persist($section);
              $entityManager->flush();

                // Redirect to List of section
                return $this->redirect()->toRoute('admin/default', array('controller'=>'section', 'action'=>'index'));
            }
        }
        
    }

    public function addclassesAction()
    {    
     $entityManager = $this->getEntityManager();
     $formclasses = new ClassesForm($entityManager);
     $formclasses->setHydrator (new DoctrineEntity($entityManager,'Admin\Entity\Classes'));
    
     $classes = new Classes();

     $formclasses->bind($classes);      
      $request = $this->getRequest();

        $request = $this->getRequest();
         if ($request->isPost()) {
            $formclasses->setInputFilter(new ClassesFilter($this->getServiceLocator()));
            $formclasses->setData($request->getPost());

            if ($formclasses->isValid()) {
               $entityManager->persist($classes);
               $entityManager->flush();

                // Redirect to list of classes
                return $this->redirect()->toRoute('admin/default', array('controller'=>'section', 'action'=>'index'));
            }
        }
          return new ViewModel(array (
            'formclasses' =>$formclasses,
            ));
    }

     public function deletesectionAction()
    {   $id = $this->params()->fromRoute('id');
        if (!$id) return $this->redirect()->toRoute('admin/default', array('controller' => 'section', 'action' => 'index'));
        
        $entityManager = $this->getEntityManager();
            try {
          $repository = $entityManager->getRepository('Admin\Entity\Section');
          $section = $repository->find($id);
          $entityManager->remove($section);
          $entityManager->flush();
          $this->flashMessenger()->addSuccessMessage('Section Delete Successfully!');
        //   $this->flashMessenger()->addSuccessMessage('Post Saved');
            }
            catch (\Exception $ex) {
          $this->redirect()->toRoute('admin/default', array('controller' => 'section', 'action' => 'index'));  
            }
    
         return $this->redirect()->toRoute('admin/default', array('controller' => 'section', 'action' => 'index')); 
   }

    public function deleteclassesAction()
    {   $id = $this->params()->fromRoute('id');
        if (!$id) return $this->redirect()->toRoute('admin/default', array('controller' => 'section', 'action' => 'index'));
        
        $entityManager = $this->getEntityManager();
            try {
          $repository = $entityManager->getRepository('Admin\Entity\Classes');
          $classes = $repository->find($id);
          $entityManager->remove($classes);
          $entityManager->flush();
          $this->flashMessenger()->addSuccessMessage('Class Delete Successfully!');
        //   $this->flashMessenger()->addSuccessMessage('Post Saved');
            }
            catch (\Exception $ex) {
          $this->redirect()->toRoute('admin/default', array('controller' => 'section', 'action' => 'index'));  
            }
    
         return $this->redirect()->toRoute('admin/default', array('controller' => 'section', 'action' => 'index')); 
   }

}