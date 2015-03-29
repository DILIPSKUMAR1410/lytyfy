<?php

namespace Deviab\AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * BorrowerFinancialDetail
 *
 * @ORM\Table(name="borrower_financial_details")
 * @ORM\Entity(repositoryClass="Deviab\AppBundle\Entity\BorrowerFinancialDetailRepository")
 */
class BorrowerFinancialDetail extends BaseEntity
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
     *
     * @var Borrower
     * 
     * @ORM\OneToOne(targetEntity="Borrower",inversedBy="id")
     * @ORM\Column(name="borrower_id", type="integer")
     *
     */
    private $borrower;

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
     * @var string
     *
     * @ORM\Column(name="story", type="text")
     */
    private $story;

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
     * @return BorrowerFinancialDetail
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
     * @return BorrowerFinancialDetail
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
     * @return BorrowerFinancialDetail
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
     * @return BorrowerFinancialDetail
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
     * @return BorrowerFinancialDetail
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

    /**
     * Set story
     *
     * @param string $story
     * @return BorrowerFinancialDetail
     */
    public function setStory($story)
    {
        $this->story = $story;

        return $this;
    }

    /**
     * Get story
     *
     * @return string 
     */
    public function getStory()
    {
        return $this->story;
    }
}
