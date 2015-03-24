<?php

namespace Deviab\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Borrower_Fin_Detail
 *
 * @ORM\Table(name="Borrower_Fin_Details")
 * @ORM\Entity(repositoryClass="Deviab\AppBundle\Entity\Borrower_Fin_DetailRepository")
 */
class Borrower_Fin_Detail extends BaseEntity
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
     * @ORM\Column(name="amount_needed", type="integer")
     */
    private $amountNeeded;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount_raised", type="integer")
     */
    private $amountRaised;

    /**
     * @var integer
     *
     * @ORM\Column(name="tenure", type="integer")
     */
    private $tenure;

    /**
     * @var integer
     *
     * @ORM\Column(name="interest", type="integer")
     */
    private $interest;

    /**
     * @var integer
     *
     * @ORM\Column(name="emi", type="integer")
     */
    private $emi;


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
     * Set amountNeeded
     *
     * @param integer $amountNeeded
     * @return Borrower_Fin_Detail
     */
    public function setAmountNeeded($amountNeeded)
    {
        $this->amountNeeded = $amountNeeded;

        return $this;
    }

    /**
     * Get amountNeeded
     *
     * @return integer 
     */
    public function getAmountNeeded()
    {
        return $this->amountNeeded;
    }

    /**
     * Set amountRaised
     *
     * @param integer $amountRaised
     * @return Borrower_Fin_Detail
     */
    public function setAmountRaised($amountRaised)
    {
        $this->amountRaised = $amountRaised;

        return $this;
    }

    /**
     * Get amountRaised
     *
     * @return integer 
     */
    public function getAmountRaised()
    {
        return $this->amountRaised;
    }

    /**
     * Set tenure
     *
     * @param integer $tenure
     * @return Borrower_Fin_Detail
     */
    public function setTenure($tenure)
    {
        $this->tenure = $tenure;

        return $this;
    }

    /**
     * Get tenure
     *
     * @return integer 
     */
    public function getTenure()
    {
        return $this->tenure;
    }

    /**
     * Set interest
     *
     * @param integer $interest
     * @return Borrower_Fin_Detail
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;

        return $this;
    }

    /**
     * Get interest
     *
     * @return integer 
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * Set emi
     *
     * @param integer $emi
     * @return Borrower_Fin_Detail
     */
    public function setEmi($emi)
    {
        $this->emi = $emi;

        return $this;
    }

    /**
     * Get emi
     *
     * @return integer 
     */
    public function getEmi()
    {
        return $this->emi;
    }
}
