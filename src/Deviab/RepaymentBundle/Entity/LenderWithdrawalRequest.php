<?php

namespace Deviab\RepaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * LenderWithdrawalRequest
 *
 * @ORM\Table(name="lender_withdrawal_requests")
 * @ORM\Entity
 */
class LenderWithdrawalRequest
{
    /**
     * @var integer
     *
     * @Groups({"profile"})
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @Groups({"profile"})
     * @ORM\JoinColumn(name="lender_id", referencedColumnName="id")
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\LenderDetails", inversedBy="withdrawal_requests")
     */
    private $lender;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $amount;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requested_at", type="datetime")
     */
    private $requested_at;


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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getLender()
    {
        return $this->lender;
    }

    /**
     * @param int $lender
     */
    public function setLender($lender)
    {
        $this->lender = $lender;
    }

    /**
     * Get requestedAt
     *
     * @return \DateTime
     */
    public function getRequestedAt()
    {
        return $this->requestedAt;
    }

    /**
     * Set requestedAt
     *
     * @param \DateTime $requestedAt
     */
    public function setRequestedAt($requestedAt)
    {
        $this->requestedAt = $requestedAt;
    }

}
