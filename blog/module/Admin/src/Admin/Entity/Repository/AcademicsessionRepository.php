<?php
namespace Admin\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use Admin\Entity\Academicsession as Academicsession;


// before called Table now Repository Table Data Gateway
// In Bug Entity add  @Entity(repositoryClass="BugRepository")
// To be able to use this query logic through 
// $this->getEntityManager()->getRepository('Bug') we have to adjust the metadata slightly.
// http://stackoverflow.com/questions/10481916/the-method-name-must-start-with-either-findby-or-findoneby-uncaught-exception

class AcademicsessionRepository extends EntityRepository
{   /**
     * Method used to obtain available Session from the database
     *
     * @param int $hydrate - result hydration mode
     * @return array - available academicsession
     */

    protected $em;
   
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }


    public function getFindsession()
    { //$entityManager=$this->getEntityManager();
     $dql = "SELECT a FROM Admin\Entity\Academicsession a ";
    $query = $this->_em->createQuery($dql);
    $query->setMaxResults(30);
  $academicsessions = $query->getResult();




}
}