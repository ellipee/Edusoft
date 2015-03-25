<?php

namespace Admin\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;

class Sectiongrid
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * Return instance of QueryBuilder for grid
     *
     * @return QueryBuilder
     */
    public function queryGrid()
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select(array('rootAlias'))
            ->from('Admin\Entity\Section', 'rootAlias');

        return $qb;
    }
    
    /**
     * Set entity manager
     *
     * @param  EntityManager $entityManager
     * @return Sectiongrid;
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * Get entity manager
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }
}
```