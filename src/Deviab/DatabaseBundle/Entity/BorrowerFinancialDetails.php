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
     * Get bankId
     *
     * @return integer
     */
    public function getBankId()
    {
        return $this->bankId;
    }

    /**
     * Set bankId
     *
     * @param integer $bankId
     * @return BorrowerFinancialDetails
     */
    public function setBankId($bankId)
    {
        $this->bankId = $bankId;

        return $this;
    }

    /**
     * Get accountName
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * Set accountName
     *
     * @param string $accountName
     * @return BorrowerFinancialDetails
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;

        return $this;
    }

    /**
     * Get accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Set accountNumber
     *
     * @param string $accountNumber
     * @return BorrowerFinancialDetails
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * Get borrowerFinancialDetailscol
     *
     * @return string
     */
    public function getBorrowerFinancialDetailscol()
    {
        return $this->borrowerFinancialDetailscol;
    }

    /**
     * Set borrowerFinancialDetailscol
     *
     * @param string $borrowerFinancialDetailscol
     * @return BorrowerFinancialDetails
     */
    public function setBorrowerFinancialDetailscol($borrowerFinancialDetailscol)
    {
        $this->borrowerFinancialDetailscol = $borrowerFinancialDetailscol;

        return $this;
    }

    /**
     * Get borrower
     *
     * @return \Deviab\DatabaseBundle\Entity\BorrowerDetails
     */
    public function getBorrower()
    {
        return $this->borrower;
    }

    /**
     * Set borrower
     *
     * @param \Deviab\DatabaseBundle\Entity\BorrowerDetails $borrower
     * @return BorrowerFinancialDetails
     */
    public function setBorrower(\Deviab\DatabaseBundle\Entity\BorrowerDetails $borrower = null)
    {
        $this->borrower = $borrower;

        return $this;
    }
}
