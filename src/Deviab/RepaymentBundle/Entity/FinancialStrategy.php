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
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="borrower_tenure", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $borrowerTenure;

    /**
     * @var integer
     *
     * @ORM\Column(name="lender_tenure", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $lenderTenure;


}
