<?php

namespace Deviab\RepaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BorrowerCurrentStatus
 *
 * @ORM\Table(name="borrower_current_status")
 * @ORM\Entity
 */
class BorrowerCurrentStatus
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
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $timestamp;

    /**
     * @var integer
     * @ORM\Column(name="pricipal_left",type="integer",nullable=false,)
     */
    private $pricipalLeft;

    /**
     * @var integer
     * @ORM\Column(name="tenure_left",type="integer",nullable=false,)
     */
    private $tenureLeft;

    /**
     * @var integer
     * @ORM\Column(name="interest_left",type="integer",nullable=false,)
     */
    private $interestLeft;

    /**
     * @var integer
     * @ORM\Column(name="expected_monthly_return",type="integer",nullable=false,)
     */
    private $expectedMonthlyReturn;

    /**
     * @var \Deviab\DatabaseBundle\Entity\BorrowerDetails
     *
     * @ORM\OneToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails", inversedBy="currentStatuses")
     * @ORM\JoinColumn(name="borrower_id", referencedColumnName="id")
     *
     */
    private $borrower;

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
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTime $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getPricipalLeft()
    {
        return $this->pricipalLeft;
    }

    /**
     * @param int $pricipalLeft
     */
    public function setPricipalLeft($pricipalLeft)
    {
        $this->pricipalLeft = $pricipalLeft;
    }

    /**
     * @return int
     */
    public function getTenureLeft()
    {
        return $this->tenureLeft;
    }

    /**
     * @param int $tenureLeft
     */
    public function setTenureLeft($tenureLeft)
    {
        $this->tenureLeft = $tenureLeft;
    }

    /**
     * @return int
     */
    public function getInterestLeft()
    {
        return $this->interestLeft;
    }

    /**
     * @param int $interestLeft
     */
    public function setInterestLeft($interestLeft)
    {
        $this->interestLeft = $interestLeft;
    }

    /**
     * @return int
     */
    public function getExpectedMonthlyReturn()
    {
        return $this->expectedMonthlyReturn;
    }

    /**
     * @param int $expectedMonthlyReturn
     */
    public function setExpectedMonthlyReturn($expectedMonthlyReturn)
    {
        $this->expectedMonthlyReturn = $expectedMonthlyReturn;
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

    public function creditPrincipalLeft($amount)
    {
        $this->pricipalLeft += $amount;
    }

    public function debitPrincipalLeft($amount)
    {
        $this->pricipalLeft -= $amount;
    }

    public function creditInterrestLeft($amount)
    {
        $this->interestLeft += $amount;
    }

    public function debitInterrestLeft($amount)
    {
        $this->interestLeft -= $amount;
    }

    public function decrementTenure()
    {
        $this->tenureLeft -= 1;
    }


}