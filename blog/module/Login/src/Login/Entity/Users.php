<?php

namespace Login\Entity;


use Doctrine\ORM\Mapping as ORM;
// added by Stoyan
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Zend\Form\Annotation;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Login\Entity\Repository\UserRepository")
 * @Annotation\Name("users")
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ClassMethods")
 */
class Users
{
    /**
     * @var integer
     *
     * @ORM\Column(name="usr_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $usrId;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_name", type="string", length=100, nullable=false)
     */
    private $usrName;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_password", type="string", length=100, nullable=false)
     */
    private $usrPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_email", type="string", length=60, nullable=false)
     */
    private $usrEmail;

    /**
     * @var integer
     *
     * @ORM\Column(name="usrl_id", type="integer", nullable=true)
     */
    private $usrlId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ps_id", type="integer", nullable=true)
     */
    private $psId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="usr_active", type="boolean", nullable=false)
     */
    private $usrActive;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_question", type="string", length=100, nullable=true)
     */
    private $usrQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_answer", type="string", length=100, nullable=true)
     */
    private $usrAnswer;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_password_salt", type="string", length=100, nullable=true)
     */
    private $usrPasswordSalt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="usr_registration_date", type="datetime", nullable=true)
     */
    private $usrRegistrationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="usr_registration_token", type="string", length=100, nullable=true)
     */
    private $usrRegistrationToken;

    /**
     * @var boolean
     *
     * @ORM\Column(name="usr_email_confirmed", type="boolean", nullable=false)
     */
    private $usrEmailConfirmed;



    /**
     * Get usrId
     *
     * @return integer 
     */
    public function getUsrId()
    {
        return $this->usrId;
    }

    /**
     * Set usrName
     *
     * @param string $usrName
     * @return Users
     */
    public function setUsrName($usrName)
    {
        $this->usrName = $usrName;

        return $this;
    }

    /**
     * Get usrName
     *
     * @return string 
     */
    public function getUsrName()
    {
        return $this->usrName;
    }

    /**
     * Set usrPassword
     *
     * @param string $usrPassword
     * @return Users
     */
    public function setUsrPassword($usrPassword)
    {
        $this->usrPassword = $usrPassword;

        return $this;
    }

    /**
     * Get usrPassword
     *
     * @return string 
     */
    public function getUsrPassword()
    {
        return $this->usrPassword;
    }

    /**
     * Set usrEmail
     *
     * @param string $usrEmail
     * @return Users
     */
    public function setUsrEmail($usrEmail)
    {
        $this->usrEmail = $usrEmail;

        return $this;
    }

    /**
     * Get usrEmail
     *
     * @return string 
     */
    public function getUsrEmail()
    {
        return $this->usrEmail;
    }

    /**
     * Set usrlId
     *
     * @param integer $usrlId
     * @return Users
     */
    public function setUsrlId($usrlId)
    {
        $this->usrlId = $usrlId;

        return $this;
    }

    /**
     * Get usrlId
     *
     * @return integer 
     */
    public function getUsrlId()
    {
        return $this->usrlId;
    }

    /**
     * Set psId
     *
     * @param integer $psId
     * @return Users
     */
    public function setPsId($psId)
    {
        $this->psId = $psId;

        return $this;
    }

    /**
     * Get psId
     *
     * @return integer 
     */
    public function getPsId()
    {
        return $this->psId;
    }

    /**
     * Set usrActive
     *
     * @param boolean $usrActive
     * @return Users
     */
    public function setUsrActive($usrActive)
    {
        $this->usrActive = $usrActive;

        return $this;
    }

    /**
     * Get usrActive
     *
     * @return boolean 
     */
    public function getUsrActive()
    {
        return $this->usrActive;
    }

    /**
     * Set usrQuestion
     *
     * @param string $usrQuestion
     * @return Users
     */
    public function setUsrQuestion($usrQuestion)
    {
        $this->usrQuestion = $usrQuestion;

        return $this;
    }

    /**
     * Get usrQuestion
     *
     * @return string 
     */
    public function getUsrQuestion()
    {
        return $this->usrQuestion;
    }

    /**
     * Set usrAnswer
     *
     * @param string $usrAnswer
     * @return Users
     */
    public function setUsrAnswer($usrAnswer)
    {
        $this->usrAnswer = $usrAnswer;

        return $this;
    }

    /**
     * Get usrAnswer
     *
     * @return string 
     */
    public function getUsrAnswer()
    {
        return $this->usrAnswer;
    }

    /**
     * Set usrPasswordSalt
     *
     * @param string $usrPasswordSalt
     * @return Users
     */
    public function setUsrPasswordSalt($usrPasswordSalt)
    {
        $this->usrPasswordSalt = $usrPasswordSalt;

        return $this;
    }

    /**
     * Get usrPasswordSalt
     *
     * @return string 
     */
    public function getUsrPasswordSalt()
    {
        return $this->usrPasswordSalt;
    }

    /**
     * Set usrRegistrationDate
     *
     * @param \DateTime $usrRegistrationDate
     * @return Users
     */
    public function setUsrRegistrationDate($usrRegistrationDate)
    {
        $this->usrRegistrationDate = $usrRegistrationDate;

        return $this;
    }

    /**
     * Get usrRegistrationDate
     *
     * @return \DateTime 
     */
    public function getUsrRegistrationDate()
    {
        return $this->usrRegistrationDate;
    }

    /**
     * Set usrRegistrationToken
     *
     * @param string $usrRegistrationToken
     * @return Users
     */
    public function setUsrRegistrationToken($usrRegistrationToken)
    {
        $this->usrRegistrationToken = $usrRegistrationToken;

        return $this;
    }

    /**
     * Get usrRegistrationToken
     *
     * @return string 
     */
    public function getUsrRegistrationToken()
    {
        return $this->usrRegistrationToken;
    }

    /**
     * Set usrEmailConfirmed
     *
     * @param boolean $usrEmailConfirmed
     * @return Users
     */
    public function setUsrEmailConfirmed($usrEmailConfirmed)
    {
        $this->usrEmailConfirmed = $usrEmailConfirmed;

        return $this;
    }

    /**
     * Get usrEmailConfirmed
     *
     * @return boolean 
     */
    public function getUsrEmailConfirmed()
    {
        return $this->usrEmailConfirmed;
    }
}
