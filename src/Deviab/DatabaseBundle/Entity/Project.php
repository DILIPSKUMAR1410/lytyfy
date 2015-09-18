<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Deviab\DatabaseBundle\Entity\BorrowerDetails;

/**
 * Project
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity
 */
class Project
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="BorrowerDeviabTransaction", mappedBy="borrower")
     */
    private $toProjectBorrowerTransactions;

    /**
     * @ORM\OneToMany(targetEntity="DeviabLenderTransaction", mappedBy="borrower")
     */
    private $fromProjectTransactions;

    /**
     * @ORM\OneToMany(targetEntity="LenderDeviabTransaction", mappedBy="lender")
     */
    private $toProjectDeviabTransactions;

    /**
     * @ORM\OneToMany(targetEntity="BorrowerDetails", mappedBy="project")
     */
    private $borrowers;

    /**
     * @ORM\Column(name="amount_raised", type="float")
     */
    private $amountRaised;
    /**
     * @ORM\Column(name="capital_amount", type="float")
     */
    private $capitalAmount;

    public function __construct()
    {
        $this->borrowers = new ArrayCollection();
        $this->toProjectBorrowerTransactions = new ArrayCollection();
        $this->fromProjectTransactions = new ArrayCollection();
        $this->toProjectDeviabTransactions = new ArrayCollection();
    }
    
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
    *
    * Get Borrowers
    *
    * @return ArrayCollection
    */
    public function getBorrowers()
    {
        return $this->borrowers;
    }

    /**
    * Add Borrower
    *
    * @param BorrowerDetails $borrower
    */
    public function addBorrower(BorrowerDetails $borrower)
    {
        $this->borrowers[] = $borrower;
    }


    /**
     * Remove Borrower
     *
     * @param BorrowerDetails $borrower
     */
    public function removeBorrower(BorrowerDetails $borrower)
    {
        $this->borrowers->removeElement($borrower);
    }

    /**
     * @return mixed
     */
    public function getToProjectBorrowerTransactions()
    {
        return $this->toProjectBorrowerTransactions;
    }

    /**
     * @param mixed $toProjectBorrowerTransactions
     */
    public function setToProjectBorrowerTransactions($toProjectBorrowerTransactions)
    {
        $this->toProjectBorrowerTransactions = $toProjectBorrowerTransactions;
    }

    /**
     * @return mixed
     */
    public function getFromProjectTransactions()
    {
        return $this->fromProjectTransactions;
    }

    /**
     * @param mixed $fromProjectTransactions
     */
    public function setFromProjectTransactions($fromProjectTransactions)
    {
        $this->fromProjectTransactions = $fromProjectTransactions;
    }

    /**
     * @return mixed
     */
    public function getToProjectDeviabTransactions()
    {
        return $this->toProjectDeviabTransactions;
    }

    /**
     * @param mixed $toProjectDeviabTransactions
     */
    public function setToProjectDeviabTransactions($toProjectDeviabTransactions)
    {
        $this->toProjectDeviabTransactions = $toProjectDeviabTransactions;
    }

    /**
     * @return mixed
     */
    public function getAmountRaised()
    {
        return $this->amountRaised;
    }

    /**
     * @param mixed $amountRaised
     */
    public function setAmountRaised($amountRaised)
    {
        $this->amountRaised = $amountRaised;
    }

    /**
     * @return mixed
     */
    public function getCapitalAmount()
    {
        return $this->capitalAmount;
    }

    /**
     * @param mixed $capitalAmount
     */
    public function setCapitalAmount($capitalAmount)
    {
        $this->capitalAmount = $capitalAmount;
    }

    public function creditAmountRaised($amount)
    {
        $this->amountRaised += $amount;
    }

    public function creditCapitalRaised($amount)
    {
        $this->capitalAmount += $amount;
    }

    public function debitCapitalRaised($amount)
    {
        $this->capitalAmount -= $amount;
    }

}