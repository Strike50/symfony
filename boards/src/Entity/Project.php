<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
* Project
*
* @ORM\Table(name="project", uniqueConstraints={@ORM\UniqueConstraint(name="projectName", columns={"name"})}, indexes={@ORM\Index(name="idOwner", columns={"idOwner"})})
* @ORM\Entity
*/
class Project
{
    /**
    * @var int
    *
    * @ORM\Column(name="id", type="integer", nullable=false)
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="IDENTITY")
    */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescriptif(): string
    {
        return $this->descriptif;
    }

    /**
     * @param string $descriptif
     */
    public function setDescriptif(string $descriptif): void
    {
        $this->descriptif = $descriptif;
    }

    /**
     * @return \DateTime
     */
    public function getStartdate(): \DateTime
    {
        return $this->startdate;
    }

    /**
     * @param \DateTime $startdate
     */
    public function setStartdate(\DateTime $startdate): void
    {
        $this->startdate = $startdate;
    }

    /**
     * @return \DateTime
     */
    public function getDuedate(): \DateTime
    {
        return $this->duedate;
    }

    /**
     * @param \DateTime $duedate
     */
    public function setDuedate(\DateTime $duedate): void
    {
        $this->duedate = $duedate;
    }

    /**
     * @return \Developer
     */
    public function getOwner(): \Developer
    {
        return $this->owner;
    }

    /**
     * @param \Developer $owner
     */
    public function setOwner(\Developer $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getStories()
    {
        return $this->stories;
    }

    /**
     * @param mixed $stories
     */
    public function setStories($stories): void
    {
        $this->stories = $stories;
    }

    /**
    * @var string
    *
    * @ORM\Column(name="name", type="string", length=100, nullable=false)
    */
    private $name;

    /**
    * @var string
    *
    * @ORM\Column(name="descriptif", type="text", length=65535, nullable=false)
    */
    private $descriptif;

    /**
    * @var \DateTime
    *
    * @ORM\Column(name="startDate", type="date", nullable=false)
    */
    private $startdate;

    /**
    * @var \DateTime
    *
    * @ORM\Column(name="dueDate", type="date", nullable=false)
    */
    private $duedate;

    /**
    * @var \Developer
    *
    * @ORM\ManyToOne(targetEntity="Developer")
    * @ORM\JoinColumns({
    *   @ORM\JoinColumn(name="idOwner", referencedColumnName="id")
    * })
    */
    private $owner;

    /**
    * @ORM\OneToMany(targetEntity="App\Entity\Story", mappedBy="project")
    */
    private $stories;

    public function __construct(){
    $this->stories=new ArrayCollection();
    }
}