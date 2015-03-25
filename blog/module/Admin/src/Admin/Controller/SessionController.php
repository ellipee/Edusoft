<?php
namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Admin\Entity\Session; 
use Admin\Form\SessionForm;       
use Admin\Form\SessionFilter;

use Admin\Entity\Term; 
use Admin\Form\TermForm;       
use Admin\Form\TermFilter;

use Admin\Entity\Academicsession; 
use Admin\Form\AcademicsessionForm;       
use Admin\Form\AcademicsessionFilter;

use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;

 
class SessionController extends AbstractActionController
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
       
         //list of sessions
           $formterm = new TermForm();
           $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
           $formacademicsession = new AcademicsessionForm($entityManager);
           $form = new SessionForm();


                     
           // return $this->redirect()->toRoute('admin/default', array('controller'=>'session', 'action'=>'index'));
         

         $em = $this->getEntityManager();
          $terms=$em->getRepository('Admin\Entity\Term')->findAll();
          $sessions=$em->getRepository('Admin\Entity\Session')->findAll();
         // $academicsession=$em->getRepository('Admin\Entity\Academicsession')->findAll();
     
    

       
           return new ViewModel(array (
            'sessions' => $sessions,
            'terms'=>$terms,
            //'academicsession' => $academicsession,
            'form' =>$form,
            'formterm'=>$formterm,
            //'formacademicsession' =>$formacademicsession,
            ));

      }

    public function addsessionAction()
    {
    $entityManager = $this->getEntityManager();
     $form = new SessionForm();
     $form->setHydrator (new DoctrineEntity($entityManager,'Admin\Entity\Session'));
     $session = new session();

     $form->bind($session);      
      
        $request = $this->getRequest();
         if ($request->isPost()) {
            $form->setInputFilter(new SessionFilter($this->getServiceLocator()));
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $entityManager->persist($session);
                $entityManager->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin/default', array('controller'=>'session', 'action'=>'index'));
            }
        }
        
    }

    public function addtermAction()
    {
    $entityManager = $this->getEntityManager();
     $formterm = new TermForm();
     $formterm->setHydrator (new DoctrineEntity($entityManager,'Admin\Entity\Term'));
     $term = new term();

     $formterm->bind($term);      
      $request = $this->getRequest();

        $request = $this->getRequest();
         if ($request->isPost()) {
            $formterm->setInputFilter(new TermFilter($this->getServiceLocator()));
            $formterm->setData($request->getPost());

            if ($formterm->isValid()) {
              $entityManager->persist($term);
             
                $entityManager->persist($term);
                $entityManager->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin/default', array('controller'=>'session', 'action'=>'index'));
            }
        }
        
    }

     public function deletetermAction()
   {$id = $this->params()->fromRoute('id');
    if (!$id) return $this->redirect()->toRoute('admin/default', array('controller' => 'session', 'action' => 'index'));
    
    $entityManager = $this->getEntityManager();
    
        try {
      $repository = $entityManager->getRepository('Admin\Entity\Term');
      $term = $repository->find($id);
      $entityManager->remove($term);
      $entityManager->flush();
      $this->flashMessenger()->addSuccessMessage('Term Delete Successfully!');
    //   $this->flashMessenger()->addSuccessMessage('Post Saved');
        }
        catch (\Exception $ex) {
      $this->redirect()->toRoute('admin/default', array('controller' => 'session', 'action' => 'index'));  
        }
    
    return $this->redirect()->toRoute('admin/default', array('controller' => 'session', 'action' => 'index')); 
   }

       public function deleteAction()
   {$id = $this->params()->fromRoute('id');
    if (!$id) return $this->redirect()->toRoute('admin/default', array('controller' => 'session', 'action' => 'index'));
    
    $entityManager = $this->getEntityManager();
    
        try {
      $repository = $entityManager->getRepository('Admin\Entity\Session');
      $session = $repository->find($id);
      $entityManager->remove($session);
      $entityManager->flush();
      $this->flashMessenger()->addSuccessMessage('Session Delete Successfully!');
    //   $this->flashMessenger()->addSuccessMessage('Post Saved');
        }
        catch (\Exception $ex) {
      $this->redirect()->toRoute('admin/default', array('controller' => 'session', 'action' => 'index'));  
        }
    
    return $this->redirect()->toRoute('admin/default', array('controller' => 'session', 'action' => 'index')); 
   }

     public function createAction()
   {
    return new ViewModel();
   }

   
}