<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="projects", indexes={@ORM\Index(name="fk_district_id_idx", columns={"district_id"})})
 * @ORM\Entity
 */
class Project
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="p_name", type="string", length=45, nullable=false)
     */
    private $pName;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount_raised", type="integer", nullable=false)
     */
    private $amountRaised;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails", mappedBy="projects")
     */
    private $borrowers;

    /**
     * @var \Deviab\DatabaseBundle\Entity\Masterdistrict
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\Masterdistrict")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="district_id", referencedColumnName="id")
     * })
     */
    private $district;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->borrowers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPName()
    {
        return $this->pName;
    }

    /**
     * @param string $pName
     */
    public function setPName($pName)
    {
        $this->pName = $pName;
    }

    /**
     * @return int
     */
    public function getAmountRaised()
    {
        return $this->amountRaised;
    }

    /**
     * @param int $amountRaised
     */
    public function setAmountRaised($amountRaised)
    {
        $this->amountRaised = $amountRaised;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBorrowers()
    {
        return $this->borrowers;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $borrowers
     */
    public function setBorrowers($borrowers)
    {
        $this->borrowers = $borrowers;
    }

    /**
     * @return Masterdistrict
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param Masterdistrict $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }



}
