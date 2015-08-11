<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BorrowerFamilyDetails
 *
 * @ORM\Table(name="borrower_family_details", indexes={@ORM\Index(name="fk_borrower_id_idx", columns={"borrower_id"})})
 * @ORM\Entity
 */
class BorrowerFamilyDetails
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
     * @ORM\Column(name="relation", type="string", length=45, nullable=false)
     */
    private $relation;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=10, nullable=false)
     */
    private $gender;

    /**
     * @var \Deviab\DatabaseBundle\Entity\BorrowerDetails
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borrower_id", referencedColumnName="id")
     * })
     */
    private $borrower;


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
     * Get relation
     *
     * @return string
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * Set relation
     *
     * @param string $relation
     * @return BorrowerFamilyDetails
     */
    public function setRelation($relation)
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BorrowerFamilyDetails
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * @return BorrowerFamilyDetails
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

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
     * @return BorrowerFamilyDetails
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get borrower
     *
     * @return \Deviab\DatabaseBundle\Entity\BorrowerDetails
     */
    public function getBorrower()
    {
        return $this->borrower;
    }

    /**
     * Set borrower
     *
     * @param \Deviab\DatabaseBundle\Entity\BorrowerDetails $borrower
     * @return BorrowerFamilyDetails
     */
    public function setBorrower(\Deviab\DatabaseBundle\Entity\BorrowerDetails $borrower = null)
    {
        $this->borrower = $borrower;

        return $this;
    }
}
