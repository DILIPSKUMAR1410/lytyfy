<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BorrowerDetails
 *
 * @ORM\Table(name="borrower_details", indexes={@ORM\Index(name="fk_village_id_idx", columns={"village_id"}), @ORM\Index(name="fk_project_id_idx", columns={"project_id"})})
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
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="tolla", type="string", length=45, nullable=false)
     */
    private $tolla;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=10, nullable=false)
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var string
     *
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
     *
     * @ORM\Column(name="occupation", type="string", length=45, nullable=true)
     */
    private $occupation;

    /**
     * @var float
     *
     * @ORM\Column(name="annual_income", type="float", precision=10, scale=0, nullable=false)
     */
    private $annualIncome;

    /**
     * @var \Deviab\DatabaseBundle\Entity\MasterVillages
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\MasterVillages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="village_id", referencedColumnName="id")
     * })
     */
    private $village;

    /**
     * @var \Deviab\DatabaseBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\Project", inversedBy="borrowers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     * })
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



}
