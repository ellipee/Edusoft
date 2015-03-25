<?php
namespace Admin\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
*@ORM\Table(name="term")
*@ORM\Entity
*/
class term
{
	/**
		* @var integer
		*@ORM\Column(name="id", type="integer", nullable=false)
		*@ORM\Id
		*@ORM\GeneratedValue(strategy="IDENTITY")
		*/
	private $id;

	/**
     * @var string
     *
     * @ORM\Column(name="term_name", type="string", length=100, nullable=false)
     */
    private $termName;

    

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
     * Set termName
     *
     * @param string $termName
     * @return term
     */
    public function settermName($termName)
    {
        $this->termName = $termName;

        return $this;
    }

    /**
     * Get sessionName
     *
     * @return string 
     */
    public function gettermName()
    {
        return $this->termName;
    }

    
}