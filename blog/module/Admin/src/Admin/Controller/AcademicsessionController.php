<?php
namespace Admin\Controller;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use Zend\Paginator\Paginator;
use Zend\Form\Form;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Admin\Entity\Academicsession; 
use Admin\Form\AcademicsessionForm;       
use Admin\Form\AcademicsessionFilter;

use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Admin\Hydrator\DateHydrator;

class AcademicsessionController extends AbstractActionController
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
       
           $entityManager =$this->getEntityManager();
           $formacademicsession = new AcademicsessionForm($entityManager);
          // $academicsessions = $entityManager->getRepository('Admin\Entity\Academicsession')->findBy(array(), array('session' => 'ASC'));
      $query = $this
                ->getEntityManager()
                ->getRepository('Admin\Entity\Academicsession')
                ->createQueryBuilder('a');
        $searchTerm = '';
        if ($this->getRequest()->isPost()) {
            $searchTerm = $this->params()->fromPost('searchTerm');
            $query
                    ->where('a.session LIKE :search1')
                    ->orWhere('a.term LIKE :search2')
                    ->orWhere('a.startDate LIKE :search3')
                    ->orWhere('a.endDate LIKE :search4')
                    ->setParameter('search1', "%{$searchTerm}%")
                    ->setParameter('search2', "%{$searchTerm}%")
                    ->setParameter('search3', "%{$searchTerm}%")
                    ->setParameter('search4', "%{$searchTerm}%")
            ;
        }
        $academicsessions = new Paginator(
                new DoctrinePaginator(new ORMPaginator($query))
        );
        $academicsessions
                ->setCurrentPageNumber($this->params()->fromQuery('page', 1))
                ->setItemCountPerPage(10);
        return array(
            'academicsessions' => $academicsessions,
            'searchTerm' => $searchTerm,
             'formacademicsession' =>$formacademicsession,
        );
    }
     //  return new ViewModel(array (
       //     'academicsessions' => $academicsessions,
         //   'formacademicsession' =>$formacademicsession,
           // ));

      

  public function addacademicsessionAction()
    { 
          $entityManager = $this->getEntityManager();
           $formacademicsession = new AcademicsessionForm($entityManager);
           $formacademicsession->setHydrator (new DateHydrator($entityManager,'Admin\Entity\Academicsession'));
           $academicsession = new Academicsession();

           $formacademicsession->bind($academicsession);      
            $request = $this->getRequest();

              $request = $this->getRequest();
               if ($request->isPost()) {
                  $formacademicsession->setInputFilter(new AcademicsessionFilter($this->getServiceLocator()));
                  $formacademicsession->setData($request->getPost());

                  if ($formacademicsession->isValid()) {
                    $entityManager->persist($academicsession);
                    $entityManager->flush();

                      // Redirect to List of section
                      return $this->redirect()->toRoute('admin/default', array('controller'=>'academicsession', 'action'=>'index'));
                  }
              }
          return new ViewModel(array (
            'formacademicsession' =>$formacademicsession,
            ));
    }

   public function deletetermAction()
   {$id = $this->params()->fromRoute('id');
    if (!$id) return $this->redirect()->toRoute('admin/default', array('controller' => 'academicsession', 'action' => 'index'));
    
    $entityManager = $this->getEntityManager();
    
        try {
      $repository = $entityManager->getRepository('Admin\Entity\Academicsession');
      $academicsession = $repository->find($id);
      $entityManager->remove($academicsession);
      $entityManager->flush();
      $this->flashMessenger()->addSuccessMessage('Academic Session Delete Successfully!');
    //   $this->flashMessenger()->addSuccessMessage('Post Saved');
        }
        catch (\Exception $ex) {
      $this->redirect()->toRoute('admin/default', array('controller' => 'academicsession', 'action' => 'index'));  
        }
    
    return $this->redirect()->toRoute('admin/default', array('controller' => 'academicsession', 'action' => 'index')); 
   }

     public function editAction()
    {  $entityManager = $this->getEntityManager();
       $viewmodel = new ViewModel();
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('admin/default', array('controller'=>'academicsession','action' => 'index'));
        }

        $academicsession = $entityManager->find('Admin\Entity\academicsession', $id);
        if (!$academicsession) {
             return $this->redirect()->toRoute('admin/default', array('controller'=>'academicsession', 'action'=>'index')); 
           
        }

        $formacademicsession = new AcademicsessionForm($entityManager);
        $formacademicsession->setHydrator (new DateHydrator($entityManager,'Admin\Entity\Academicsession'));
        $formacademicsession->bind($academicsession);
        $formacademicsession->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
         //disable layout if request by Ajax
        $viewmodel->setTerminal($request->isXmlHttpRequest());
        
        $is_xmlhttprequest = 1;
        if ( ! $request->isXmlHttpRequest()){
            //if NOT using Ajax
            $is_xmlhttprequest = 0;

        if ($request->isPost()) {
           // $formacademicsession->setInputFilter(new SessionFilter($this->getServiceLocator()));
            $formacademicsession->setData($request->getPost());

           if ($formacademicsession->isValid()) {
              
              //  $entityManager->persist($academicsession);
                $entityManager->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('admin/default', array('controller'=>'academicsession', 'action'=>'index')); 
           }
        }

       } 
          $viewmodel->setVariables(array(
                    'formacademicsession' => $formacademicsession,
                    'id' =>$id,
                    'is_xmlhttprequest' => $is_xmlhttprequest //need for check this form is in modal dialog or not in view
        ));
        
        return $viewmodel;
    }

        
}