<?php

namespace Deviab\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lender
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Deviab\AppBundle\Entity\LenderRepository")
 */
class Lender
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
     * @var integer
     *
     * @ORM\Column(name="invested", type="integer")
     */
    private $invested;


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
     * Set dateInvested
     *
     * @param \DateTime $dateInvested
     * @return Lender
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
     * @return Lender
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

    /**
     * Set invested
     *
     * @param integer $invested
     * @return Lender
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
}
