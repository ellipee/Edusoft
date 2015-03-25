<?php

namespace Admin\Entity;


use Doctrine\ORM\Mapping as ORM;
// added by Stoyan
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Zend\Form\Annotation;

/**
 *@ORM\Entity
 * @ORM\Entity(repositoryClass="Admin\Entity\Repository\AcademicsessionRepository")
 * @ORM\Table(name="academicsession")
 * @Annotation\Name("academicsession")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ClassMethods")
 */
class Academicsession
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
    *@var integer $session
    *@ORM\ManyToOne(targetEntity="Admin\Entity\Session")
    *@ORM\JoinColumn(name="session", referencedColumnName="id")
    **/
    private $session;

    /**
    *@var integer $term
    *@ORM\ManyToOne(targetEntity="Admin\Entity\Term")
    *@ORM\JoinColumn(name="term", referencedColumnName="id")
    **/
    private $term;


    /**
     * @ORM\Column(name="start_date", type="date", nullable=false)
     * 
     * @var \date
     */
    private $startDate;

    /**
     * @ORM\Column(name="end_date", type="date", nullable=false)
     * 
     * @var \date
     */
    private $endDate;

/**
    * Get id
    *
    * @return integer
    */
    public function getId()
    {
        return $this->id;
    }

    /**
    * Set session
    *
    * @param Session $session
    * @return Academicsession
    */
    public function setSession(Session $session)
    {
        $this->session = $session;

        return $this;
    }
      /**
    *@return Session
    **/
    public function getSession()
    {
    	return $this->session;
    }

 
    /**
    * Set term
    *
    * @param Term $term
    * @return Academicsession
    */
    public function setTerm(Term $term)
    {
        $this->term = $term;

        return $this;
    }

    /**
    *@return Term
    **/
    public function getTerm()
    {
    	return $this->term;
    }

     /**
     *@param string $startDate
    *@return Academicsession
    **/
    public function SetStartDate($startDate)
    {
    	 $this->startDate = $startDate;
    	 return $this;
    }

     /**
     * Get startDate
     *
     * @return string
     */
    public function getStartDate()
    {
         $startDate = $this->startDate->format('d/m/Y');
        return $startDate;
        //return $this->startDate;
    }

     
    /**
     *@param string $endDate
    *@return Academicsession
    **/
    public function SetEndDate($endDate)
    {
    	 $this->endDate = $endDate;
    	 return $this;
    }

    /**
     * Get endDate
     *
     * @return string
     */
    public function getEndDate()
    {   
        $endDate = $this->endDate->format('d/m/Y');
        return $endDate;

       // return $this->startDate;
       //  
      
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {   
        $obj_vars = get_object_vars($this);
        $obj_vars['startDate'] = $obj_vars['startDate']->format('d/m/y');
        $obj_vars['endDate'] = $obj_vars['endDate']->format('d/m/y');
        return $obj_vars;
       // return get_object_vars($this);
    }
public function exchangeArray ($data = array()) 
    {
        //$this->id = $data['id'];
        $this->session = $data['session'];
        $this->term = $data['term'];
        $this->startDate = $data['startDate']->format('d/m/y');
        $this->endDate = $data['endDate']->format('d/m/y');
    }
}
