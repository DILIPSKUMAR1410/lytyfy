<?php

namespace Deviab\TransactionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeviabLenderTransaction
 *
 * @ORM\Table(name="deviab_lender_transactions")
 * @ORM\Entity
 */
class DeviabLenderTransaction
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
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\Project", inversedBy="fromProjectLenderTransactions")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\LenderDetails", inversedBy="toLenderTransactions")
     * @ORM\JoinColumn(name="lender_id", referencedColumnName="id")
     */
    private $lender;

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
     * @return DeviabLenderTransaction
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
     * @return DeviabLenderTransaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     */
    public function setProject($project)
    {
        $this->project = $project;
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

}
