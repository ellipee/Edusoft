<?php

namespace Login\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person")
 * @ORM\Entity
 */
class Person
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
     * @var string
     *
     * @ORM\Column(name="fname", type="string", length=45, nullable=false)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="lname", type="string", length=45, nullable=false)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="mname", type="string", length=45, nullable=true)
     */
    private $mname;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=6, nullable=false)
     */
    private $sex;

    /**
     * @var integer
     *
     * @ORM\Column(name="mobile", type="integer", nullable=true)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=250, nullable=true)
     */
    private $address;

    /**
     * @var integer
     *
     * @ORM\Column(name="state_code", type="integer", nullable=true)
     */
    private $stateCode;

    /**
     * @var integer
     *
     * @ORM\Column(name="lga_code", type="integer", nullable=true)
     */
    private $lgaCode;

    /**
     * @var string
     *
     * @ORM\Column(name="nok_rel", type="string", length=45, nullable=true)
     */
    private $nokRel;

    /**
     * @var string
     *
     * @ORM\Column(name="nok_name", type="string", length=45, nullable=true)
     */
    private $nokName;

    /**
     * @var integer
     *
     * @ORM\Column(name="nok_mobile", type="integer", nullable=true)
     */
    private $nokMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", length=65535, nullable=true)
     */
    private $image;



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
     * Set fname
     *
     * @param string $fname
     * @return Person
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

        return $this;
    }

    /**
     * Get fname
     *
     * @return string 
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set lname
     *
     * @param string $lname
     * @return Person
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

        return $this;
    }

    /**
     * Get lname
     *
     * @return string 
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * Set mname
     *
     * @param string $mname
     * @return Person
     */
    public function setMname($mname)
    {
        $this->mname = $mname;

        return $this;
    }

    /**
     * Get mname
     *
     * @return string 
     */
    public function getMname()
    {
        return $this->mname;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return Person
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set mobile
     *
     * @param integer $mobile
     * @return Person
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return integer 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Person
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set stateCode
     *
     * @param integer $stateCode
     * @return Person
     */
    public function setStateCode($stateCode)
    {
        $this->stateCode = $stateCode;

        return $this;
    }

    /**
     * Get stateCode
     *
     * @return integer 
     */
    public function getStateCode()
    {
        return $this->stateCode;
    }

    /**
     * Set lgaCode
     *
     * @param integer $lgaCode
     * @return Person
     */
    public function setLgaCode($lgaCode)
    {
        $this->lgaCode = $lgaCode;

        return $this;
    }

    /**
     * Get lgaCode
     *
     * @return integer 
     */
    public function getLgaCode()
    {
        return $this->lgaCode;
    }

    /**
     * Set nokRel
     *
     * @param string $nokRel
     * @return Person
     */
    public function setNokRel($nokRel)
    {
        $this->nokRel = $nokRel;

        return $this;
    }

    /**
     * Get nokRel
     *
     * @return string 
     */
    public function getNokRel()
    {
        return $this->nokRel;
    }

    /**
     * Set nokName
     *
     * @param string $nokName
     * @return Person
     */
    public function setNokName($nokName)
    {
        $this->nokName = $nokName;

        return $this;
    }

    /**
     * Get nokName
     *
     * @return string 
     */
    public function getNokName()
    {
        return $this->nokName;
    }

    /**
     * Set nokMobile
     *
     * @param integer $nokMobile
     * @return Person
     */
    public function setNokMobile($nokMobile)
    {
        $this->nokMobile = $nokMobile;

        return $this;
    }

    /**
     * Get nokMobile
     *
     * @return integer 
     */
    public function getNokMobile()
    {
        return $this->nokMobile;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Person
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
}
