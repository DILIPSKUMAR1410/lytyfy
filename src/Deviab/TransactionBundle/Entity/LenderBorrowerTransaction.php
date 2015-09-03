<?php

namespace Deviab\TransactionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LenderDeviabTransaction
 *
 * @ORM\Table(name="lender_deviab_transactions")
 * @ORM\Entity
 */
class LenderDeviabTransaction
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\LenderDetails", inversedBy="lenderDeviabTransactions")
     * @ORM\JoinColumn(name="lender_id", referencedColumnName="id")
     */
    private $lender;

    /**
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails", inversedBy="toDeviabTransactions")
     * @ORM\JoinColumn(name="borrower_id", referencedColumnName="id")
     */
    private $borrower;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime")
     */
    private $timestamp;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;


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
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return LenderDeviabTransaction
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return LenderDeviabTransaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
