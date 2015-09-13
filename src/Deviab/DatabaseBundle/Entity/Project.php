<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

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
     * @Groups({"borrower_portfolio","project_portfolio","search_borrowers"})
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
     * @var integer
     *
     * @ORM\Column(name="capital_amount", type="integer", nullable=false)
     */
    private $capitalAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="returned_amount", type="integer", nullable=false)
     */
    private $returnedAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails", mappedBy="project")
     */
    private $borrowers;

    /**
     * @var \Deviab\DatabaseBundle\Entity\MasterDistrict
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\MasterDistrict")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="district_id", referencedColumnName="id")
     * })
     */
    private $district;

    /**
     * @ORM\OneToMany(targetEntity="BorrowerDeviabTransaction", mappedBy="borrower")
     */
    private $toProjectBorrowerTransactions;

    /**
     * @ORM\OneToMany(targetEntity="DeviabLenderTransaction", mappedBy="borrower")
     */
    private $fromProjectTransactions;

    /**
     * @ORM\OneToMany(targetEntity="LenderDeviabTransaction", mappedBy="borrower")
     */
    private $toProjectDeviabTransactions;

    /**
     * @ORM\OneToMany(targetEntity="CurrentStatus", mappedBy="project")
     */
    private $projectBorrowerCurrentStatus;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->borrowers = new ArrayCollection();
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
     * @return int
     */
    public function getCapitalAmount()
    {
        return $this->capitalAmount;
    }

    /**
     * @param int $capitalAmount
     */
    public function setCapitalAmount($capitalAmount)
    {
        $this->capitalAmount = $capitalAmount;
    }

    /**
     * @return int
     */
    public function getReturnedAmount()
    {
        return $this->returnedAmount;
    }

    /**
     * @param int $returnedAmount
     */
    public function setReturnedAmount($returnedAmount)
    {
        $this->returnedAmount = $returnedAmount;
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
     * @return MasterDistrict
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param MasterDistrict $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }

    /**
     * @return mixed
     */
    public function getToProjectBorrowerTransactions()
    {
        return $this->toProjectBorrowerTransactions;
    }

    /**
     * @param mixed $toProjectBorrowerTransactions
     */
    public function setToProjectBorrowerTransactions($toProjectBorrowerTransactions)
    {
        $this->toProjectBorrowerTransactions = $toProjectBorrowerTransactions;
    }

    /**
     * @return mixed
     */
    public function getFromProjectTransactions()
    {
        return $this->fromProjectTransactions;
    }

    /**
     * @param mixed $fromProjectTransactions
     */
    public function setFromProjectTransactions($fromProjectTransactions)
    {
        $this->fromProjectTransactions = $fromProjectTransactions;
    }

    /**
     * @return mixed
     */
    public function getToProjectDeviabTransactions()
    {
        return $this->toProjectDeviabTransactions;
    }

    /**
     * @param mixed $toProjectDeviabTransactions
     */
    public function setToProjectDeviabTransactions($toProjectDeviabTransactions)
    {
        $this->toProjectDeviabTransactions = $toProjectDeviabTransactions;
    }

    /**
     * @return mixed
     */
    public function getProjectBorrowerCurrentStatus()
    {
        return $this->projectBorrowerCurrentStatus;
    }

    /**
     * @param mixed $projectBorrowerCurrentStatus
     */
    public function setProjectBorrowerCurrentStatus($projectBorrowerCurrentStatus)
    {
        $this->projectBorrowerCurrentStatus = $projectBorrowerCurrentStatus;
    }


}
