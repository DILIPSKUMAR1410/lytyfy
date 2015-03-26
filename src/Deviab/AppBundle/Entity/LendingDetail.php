<?php

namespace Deviab\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LendingDetail
 *
 * @ORM\Table(name="lending_details")
 * @ORM\Entity(repositoryClass="Deviab\AppBundle\Entity\LendingDetailRepository")
 */
class LendingDetail extends BaseEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="invested", type="integer")
     */
    private $invested;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_invested", type="date")
     */
    private $dateInvested;

    /**
     * @var integer
     *
     * @ORM\Column(name="transaction_id", type="integer")
     */
    private $transactionId;


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
     * Set invested
     *
     * @param integer $invested
     * @return LendingDetail
     */
    public function setInvested($invested)
    {
        $this->invested = $invested;

        return $this;
    }

    /**
     * Get invested
     *
     * @return integer 
     */
    public function getInvested()
    {
        return $this->invested;
    }

    /**
     * Set dateInvested
     *
     * @param \DateTime $dateInvested
     * @return LendingDetail
     */
    public function setDateInvested($dateInvested)
    {
        $this->dateInvested = $dateInvested;

        return $this;
    }

    /**
     * Get dateInvested
     *
     * @return \DateTime 
     */
    public function getDateInvested()
    {
        return $this->dateInvested;
    }

    /**
     * Set transactionId
     *
     * @param integer $transactionId
     * @return LendingDetail
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * Get transactionId
     *
     * @return integer 
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }
}
