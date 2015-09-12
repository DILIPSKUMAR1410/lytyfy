<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BorrowerFinancialDetails
 *
 * @ORM\Table(name="borrower_financial_details", indexes={@ORM\Index(name="borrower_id_idx", columns={"borrower_id"})})
 * @ORM\Entity
 */
class BorrowerFinancialDetails
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
     *
     * @ORM\Column(name="bank_id", type="integer", nullable=false)
     */
    private $bankId;

    /**
     * @var string
     *
     * @ORM\Column(name="account_name", type="string", length=45, nullable=false)
     */
    private $accountName;

    /**
     * @var string
     *
     * @ORM\Column(name="account_number", type="string", length=45, nullable=false)
     */
    private $accountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="borrower_financial_detailscol", type="string", length=45, nullable=true)
     */
    private $borrowerFinancialDetailscol;

    /**
     * @var \Deviab\DatabaseBundle\Entity\BorrowerDetails
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borrower_id", referencedColumnName="id")
     * })
     */
    private $borrower;


}
