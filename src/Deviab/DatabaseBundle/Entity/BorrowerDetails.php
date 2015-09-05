<?php

namespace Deviab\DatabaseBundle\Entity;

use Deviab\DatabaseBundle\Entity\MasterVillages;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;
use Deviab\TransactionBundle\Entity\LenderBorrowerTransaction;
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
     * @Groups({"borrower_portfolio"})
     */
    private $fname;

    /**
     * @var string
     * @Groups({"borrower_portfolio"})
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
     * @var MasterVillages
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\MasterVillages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="village_id", referencedColumnName="id")
     * })
     */
    private $village;

    /**
     * @ORM\OneToMany(targetEntity="DeviabLenderTransaction", mappedBy="borrower")
     */
    private $deviabBorrowerTransactions;

    /**
     * @ORM\OneToMany(targetEntity="LenderDeviabTransaction", mappedBy="borrower")
     */
    private $toDeviabTransactions;

    /**
     * @ORM\OneToMany(targetEntity="BorrowerDeviabTransaction", mappedBy="borrower")
     */
    private $borrowerLenderTransactions;

    /**
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="borrowers")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

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
     * Get fname
     *
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * Set fname
     *
     * @param string $fname
     * @return BorrowerDetails
     */
    public function setFname($fname)
    {
        $this->fname = $fname;

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
     * Set lname
     *
     * @param string $lname
     * @return BorrowerDetails
     */
    public function setLname($lname)
    {
        $this->lname = $lname;

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
     * Set address
     *
     * @param string $address
     * @return BorrowerDetails
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get tolla
     *
     * @return string
     */
    public function getTolla()
    {
        return $this->tolla;
    }

    /**
     * Set tolla
     *
     * @param string $tolla
     * @return BorrowerDetails
     */
    public function setTolla($tolla)
    {
        $this->tolla = $tolla;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return BorrowerDetails
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     * @return BorrowerDetails
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get highestEducation
     *
     * @return string
     */
    public function getHighestEducation()
    {
        return $this->highestEducation;
    }

    /**
     * Set highestEducation
     *
     * @param string $highestEducation
     * @return BorrowerDetails
     */
    public function setHighestEducation($highestEducation)
    {
        $this->highestEducation = $highestEducation;

        return $this;
    }

    /**
     * Get primaryMobileNumber
     *
     * @return string
     */
    public function getPrimaryMobileNumber()
    {
        return $this->primaryMobileNumber;
    }

    /**
     * Set primaryMobileNumber
     *
     * @param string $primaryMobileNumber
     * @return BorrowerDetails
     */
    public function setPrimaryMobileNumber($primaryMobileNumber)
    {
        $this->primaryMobileNumber = $primaryMobileNumber;

        return $this;
    }

    /**
     * Get occupation
     *
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }

    /**
     * Set occupation
     *
     * @param string $occupation
     * @return BorrowerDetails
     */
    public function setOccupation($occupation)
    {
        $this->occupation = $occupation;

        return $this;
    }

    /**
     * Get annualIncome
     *
     * @return float
     */
    public function getAnnualIncome()
    {
        return $this->annualIncome;
    }

    /**
     * Set annualIncome
     *
     * @param float $annualIncome
     * @return BorrowerDetails
     */
    public function setAnnualIncome($annualIncome)
    {
        $this->annualIncome = $annualIncome;

        return $this;
    }

    /**
     * Get village
     *
     * @return MasterVillages
     */
    public function getVillage()
    {
        return $this->village;
    }

    /**
     * Set village
     *
     * @param MasterVillages $village
     * @return BorrowerDetails
     */
    public function setVillage(MasterVillages $village = null)
    {
        $this->village = $village;

        return $this;
    }
}
