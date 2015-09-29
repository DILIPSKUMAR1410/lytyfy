<?php

namespace Deviab\TransactionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

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
     * @Groups({"profile"})
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\LenderDetails", inversedBy="fromlenderTransactions")
     * @ORM\JoinColumn(name="lender_id", referencedColumnName="id")
     */
    private $lender;

    /**
     * @Groups({"profile"})
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\Project", inversedBy="toProjectLenderTransactions")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @var \DateTime
     *
     * @Groups({"profile"})
     * @ORM\Column(name="timestamp", type="datetime")
     */
    private $timestamp;

    /**
     * @var float
     *
     * @Groups({"profile"})
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
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
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
     * Get amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
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
     * @return mixed
     */
    public function getLender()
    {
        return $this->lender;
    }

    /**
     * @param mixed $lender
     */
    public function setLender($lender)
    {
        $this->lender = $lender;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }


}
