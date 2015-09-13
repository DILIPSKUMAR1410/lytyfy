<?php

namespace Deviab\DatabaseBundle\Entity;

use JMS\Serializer\Annotation\MaxDepth;
use Deviab\DatabaseBundle\Entity\MasterVillages;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;
use Deviab\TransactionBundle\Entity\DeviabLenderTransaction;
use Deviab\TransactionBundle\Entity\BorrowerDeviabTransaction;

/**
 * BorrowerDetails
 *
 * @ORM\Table(name="borrower_details", indexes={@ORM\Index(name="fk_village_id_idx", columns={"village_id"})})
 * @ORM\Entity
 */
class BorrowerDetails
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
     * @ORM\Column(name="fname", type="string", length=45, nullable=false)
     * @Groups({"borrower_portfolio","project_portfolio"})
     */
    private $fname;

    /**
     * @var string
     * @Groups({"borrower_portfolio","project_portfolio"})
     * @ORM\Column(name="lname", type="string", length=45, nullable=false)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var string
     * @Groups({"borrower_portfolio"})
     * @ORM\Column(name="tolla", type="string", length=45, nullable=false)
     */
    private $tolla;

    /**
     * @var string
     * @Groups({"borrower_portfolio"})
     * @ORM\Column(name="gender", type="string", length=10, nullable=false)
     */
    private $gender;

    /**
     * @var \DateTime
     * @Groups({"borrower_portfolio"})
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var string
     * @Groups({"borrower_portfolio"})
     * @ORM\Column(name="highest_education", type="string", length=45, nullable=true)
     */
    private $highestEducation;

    /**
     * @var string
     *
     * @ORM\Column(name="primary_mobile_number", type="string", length=45, nullable=false)
     */
    private $primaryMobileNumber;

    /**
     * @var string
     * @Groups({"borrower_portfolio"})
     * @ORM\Column(name="occupation", type="string", length=45, nullable=true)
     */
    private $occupation;

    /**
     * @var float
     * @Groups({"borrower_portfolio"})
     * @ORM\Column(name="annual_income", type="float", precision=10, scale=0, nullable=false)
     */
    private $annualIncome;

    /**
     * @Groups({"borrower_portfolio"})
     * @MaxDepth(5)
     * @var MasterVillages
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\MasterVillages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="village_id", referencedColumnName="id")
     * })
     */
    private $village;

    /**
     * @ORM\OneToMany(targetEntity="BorrowerDeviabTransaction", mappedBy="borrower")
     */
    private $fromBorrowerTransactions;

    /**
     * @ORM\OneToMany(targetEntity="DeviabBorrowerTransaction", mappedBy="borrower")
     */
    private $toBorrowerTransactions;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="borrowers")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @var \Deviab\DatabaseBundle\Entity\FieldRepresentative
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\FieldRepresentative", inversedBy="borrowers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fieldRepresentative_id", referencedColumnName="id")
     * })
     */
    private $fieldRepresentative;

    /**
     * @ORM\OneToOne(targetEntity="CurrentStatus", inversedBy="borrower")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $currentStatus;

    /**
     * @return mixed
     */
    public function getToBorrowerTransactions()
    {
        return $this->toBorrowerTransactions;
    }

    /**
     * @param mixed $toBorrowerTransactions
     */
    public function setToBorrowerTransactions($toBorrowerTransactions)
    {
        $this->toBorrowerTransactions = $toBorrowerTransactions;
    }

    /**
     * @return mixed
     */
    public function getCurrentStatus()
    {
        return $this->currentStatus;
    }

    /**
     * @param mixed $currentStatus
     */
    public function setCurrentStatus($currentStatus)
    {
        $this->currentStatus = $currentStatus;
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
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return string
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param string $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getTolla()
    {
        return $this->tolla;
    }

    /**
     * @param string $tolla
     */
    public function setTolla($tolla)
    {
        $this->tolla = $tolla;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param \DateTime $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return string
     */
    public function getHighestEducation()
    {
        return $this->highestEducation;
    }

    /**
     * @param string $highestEducation
     */
    public function setHighestEducation($highestEducation)
    {
        $this->highestEducation = $highestEducation;
    }

    /**
     * @return string
     */
    public function getPrimaryMobileNumber()
    {
        return $this->primaryMobileNumber;
    }

    /**
     * @param string $primaryMobileNumber
     */
    public function setPrimaryMobileNumber($primaryMobileNumber)
    {
        $this->primaryMobileNumber = $primaryMobileNumber;
    }

    /**
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * @param string $occupation
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;
    }

    /**
     * @return float
     */
    public function getAnnualIncome()
    {
        return $this->annualIncome;
    }

    /**
     * @param float $annualIncome
     */
    public function setAnnualIncome($annualIncome)
    {
        $this->annualIncome = $annualIncome;
    }

    /**
     * @return MasterVillages
     */
    public function getVillage()
    {
        return $this->village;
    }

    /**
     * @param MasterVillages $village
     */
    public function setVillage($village)
    {
        $this->village = $village;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }

    /**
     * @return FieldRepresentative
     */
    public function getFieldRepresentative()
    {
        return $this->fieldRepresentative;
    }

    /**
     * @param FieldRepresentative $fieldRepresentative
     */
    public function setFieldRepresentative($fieldRepresentative)
    {
        $this->fieldRepresentative = $fieldRepresentative;
    }

    /**
     * @return mixed
     */
    public function getFromBorrowerTransactions()
    {
        return $this->fromBorrowerTransactions;
    }

    /**
     * @param mixed $fromBorrowerTransactions
     */
    public function setFromBorrowerTransactions($fromBorrowerTransactions)
    {
        $this->fromBorrowerTransactions = $fromBorrowerTransactions;
    }


}
