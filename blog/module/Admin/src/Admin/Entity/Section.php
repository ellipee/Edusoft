<?php

/**
 * Section entity.
 * 
 * This section entity is connect with the section table.
 * it contains id, name, description, and subjects,
 * The subject property is a collection that allows us to relate subjects with every section.
 * 
 */

namespace Admin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="section")
 */
class Section
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
    * @var string
    * @ORM\Column(type="string", length=100, unique=false)
     */
    protected $name;
    
     /**
    * @var string
    * @ORM\Column(type="string", length=100,)
     */
    protected $description;


    /**
     * @ORM\OneToMany(targetEntity="Admin\Entity\Subject", mappedBy="Section", cascade={"persist"})
     */
    protected $subjects;


    /**
     * Never forget to initialize all your collections !
     */
    public function __construct()
    {
        $this->subjects = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

     /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

      /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param Collection $subjects
     */
    public function addSubjects(Collection $subjects)
    {
        foreach ($subjects as $subject) {
            $subject->setSection($this);
            $this->subjects->add($subject);
        }
    }

    /**
     * @param Collection $subjects
     */
    public function removeSubjects(Collection $subjects)
    {
        foreach ($subjects as $subject) {
            $subject->setSection(null);
            $this->subjects->removeElement($subject);
        }
    }

    /**
     * @return Collection
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

     public function getArrayCopy() 
    {
        return get_object_vars($this);
    }
}


