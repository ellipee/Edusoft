<?php
namespace Admin\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
*@ORM\Table(name="session")
*@ORM\Entity
*/
class session
{
	/**
		* @var integer
		*@ORM\Column(name="id", type="integer", nullable=false)
		*@ORM\Id
		*@ORM\GeneratedValue(strategy="IDENTITY")
		*/
	public $id;

	/**
     * @var string
     *
     * @ORM\Column(name="session_name", type="string", length=100, nullable=false)
     */
   public $sessionName;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=false)
     */
    public $status;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set id
     *@param int $id
     * @return session
     */
    public function setId($id)
    {
        $this->id=$id;
        return $this;
    }

    /**
     * Set sessionName
     *
     * @param string $sessionName
     * @return session
     */
    public function setsessionName($sessionName)
    {
        $this->sessionName = $sessionName;

        return $this;
    }

    /**
     * Get sessionName
     *
     * @return string 
     */
    public function getsessionName()
    {
        return $this->sessionName;
    }

     /**
     * Set status
     *
     * @param integer $status
     * @return session
     */
    public function setstatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getstatus()
    {          

        if($this->status==0){
                    $this->status="Close";  }
                    else{
               $this->status="Open";
                 }   
          return $this->status;
    }

/**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy() 
    {
        return get_object_vars($this);
    }
public function exchangeArray ($data = array()) 
    {
        //$this->id = $data['id'];
        $this->sessionName = $data['sessionName'];
        $this->status = $data['status'];
    }

    public function toArray() 
    {
        return get_object_vars($this);
    }
}