<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 13/09/15
 * Time: 12:27 PM
 */

namespace Deviab\TransactionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeviabBorrowerTransaction
 *
 * @ORM\Table(name="deviab_borrower_transaction")
 * @ORM\Entity
 **/
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
     * @var \Deviab\DatabaseBundle\Entity\BorrowerDetails
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails", inversedBy="borrower")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borrower_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $borrower;
    /**
     * @var integer
     * @ORM\Column(name="requested_amount",type="integer",nullable=false,)
     */
    private $requestedAmount;
    /**
     * @var boolean
     * @ORM\Column(name="due_diligence",type="boolean",nullable=false,)
     */
    private $dueDiligence;
    /**
     * @var \Deviab\DatabaseBundle\Entity\FieldRepresentative
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\FieldRepresentative", inversedBy="fromBorrowerCollections")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fieldRepresentative_id", referencedColumnName="id")
     * })
     */
    private $fieldRepresentative;
    /**
     * @var integer
     * @ORM\Column(name="approved_amount",type="integer",nullable=false,)
     */
    private $approvedAmount;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $approvedDate;
    /**
     * @var
     * @ORM\Column(name="approved_by", type="string",nullable=true)
     */
    private $approvedBy;

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
     * @return mixed
     */
    public function getApprovedBy()
    {
        return $this->approvedBy;
    }

    /**
     * @param mixed $approvedBy
     */
    public function setApprovedBy($approvedBy)
    {
        $this->approvedBy = $approvedBy;
    }


}