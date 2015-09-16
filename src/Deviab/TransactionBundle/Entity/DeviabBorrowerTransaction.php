<?php

namespace Deviab\TransactionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeviabBorrowerTransaction
 *
 * @ORM\Table(name="deviab_borrower_transaction")
 * @ORM\Entity
 */
class DeviabBorrowerTransaction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="requested_amount", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $requestedAmount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="due_diligence", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dueDiligence;

    /**
     * @var integer
     *
     * @ORM\Column(name="approved_amount", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $approvedAmount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $approvedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="approved_by", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $approvedBy;

    /**
     * @var \Deviab\DatabaseBundle\Entity\BorrowerDetails
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails", inversedBy="borrower")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borrower_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $borrower;

    /**
     * @var \Deviab\DatabaseBundle\Entity\FieldRepresentative
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\FieldRepresentative", inversedBy="fromBorrowerCollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fieldRepresentative_id", referencedColumnName="id", nullable=true)
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
     * @return int
     */
    public function getRequestedAmount()
    {
        return $this->requestedAmount;
    }

    /**
     * @param int $requestedAmount
     */
    public function setRequestedAmount($requestedAmount)
    {
        $this->requestedAmount = $requestedAmount;
    }

    /**
     * @return boolean
     */
    public function isDueDiligence()
    {
        return $this->dueDiligence;
    }

    /**
     * @param boolean $dueDiligence
     */
    public function setDueDiligence($dueDiligence)
    {
        $this->dueDiligence = $dueDiligence;
    }

    /**
     * @return int
     */
    public function getApprovedAmount()
    {
        return $this->approvedAmount;
    }

    /**
     * @param int $approvedAmount
     */
    public function setApprovedAmount($approvedAmount)
    {
        $this->approvedAmount = $approvedAmount;
    }

    /**
     * @return \DateTime
     */
    public function getApprovedDate()
    {
        return $this->approvedDate;
    }

    /**
     * @param \DateTime $approvedDate
     */
    public function setApprovedDate($approvedDate)
    {
        $this->approvedDate = $approvedDate;
    }

    /**
     * @return string
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    /**
     * @param string $approvedBy
     */
    public function setApprovedBy($approvedBy)
    {
        $this->approvedBy = $approvedBy;
    }

    /**
     * @return \Deviab\DatabaseBundle\Entity\BorrowerDetails
     */
    public function getBorrower()
    {
        return $this->borrower;
    }

    /**
     * @param \Deviab\DatabaseBundle\Entity\BorrowerDetails $borrower
     */
    public function setBorrower($borrower)
    {
        $this->borrower = $borrower;
    }

    /**
     * @return \Deviab\DatabaseBundle\Entity\FieldRepresentative
     */
    public function getFieldRepresentative()
    {
        return $this->fieldRepresentative;
    }

    /**
     * @param \Deviab\DatabaseBundle\Entity\FieldRepresentative $fieldRepresentative
     */
    public function setFieldRepresentative($fieldRepresentative)
    {
        $this->fieldRepresentative = $fieldRepresentative;
    }




}
