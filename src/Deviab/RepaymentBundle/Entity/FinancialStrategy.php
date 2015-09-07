<?php

namespace Deviab\RepaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FinancialStrategy
 *
 * @ORM\Table(name="financial_strategies")
 * @ORM\Entity
 */
class FinancialStrategy
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
     * @var integer
     * @ORM\Column(name="amount", type="integer", nullable=false)
     */
    private $amount;

    /**
     * @var integer
     * @ORM\Column(name="borrower_tenure", type="integer", nullable=false)
     */
    private $borrowerTenure;

    /**
     * @var integer
     * @ORM\Column(name="lender_tenure", type="integer", nullable=false)
     */
    private $lenderTenure;


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
     * Get amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set amount
     *
     * @param int $amount
     * @return FinancialStrategy
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get borrowerTenure
     *
     * @return integer
     */
    public function getBorrowerTenure()
    {
        return $this->borrowerTenure;
    }

    /**
     * Set borrowerTenure
     *
     * @param integer $borrowerTenure
     * @return FinancialStrategy
     */
    public function setBorrowerTenure($borrowerTenure)
    {
        $this->borrowerTenure = $borrowerTenure;

        return $this;
    }

    /**
     * Get lenderTenure
     *
     * @return integer
     */
    public function getLenderTenure()
    {
        return $this->lenderTenure;
    }

    /**
     * Set lenderTenure
     *
     * @param integer $lenderTenure
     * @return FinancialStrategy
     */
    public function setLenderTenure($lenderTenure)
    {
        $this->lenderTenure = $lenderTenure;

        return $this;
    }
}
