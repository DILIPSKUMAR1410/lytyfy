<?php

namespace Deviab\DatabaseBundle\Entity;

use Deviab\DatabaseBundle\Entity\BorrowerDetails;
use Deviab\DatabaseBundle\Entity\LoanOperationalStrategies;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;


/**
 * BorrowerLoanDetails
 *
 * @ORM\Table(name="borrower_loan_details", indexes={@ORM\Index(name="fk_borrower_id_idx", columns={"borrower_id"}), @ORM\Index(name="fk_operational_id_idx", columns={"operational_strategy_id"})})
 * @ORM\Entity
 */
class BorrowerLoanDetails
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
     * @var string
     * `
     * @ORM\Column(name="user_story", type="text", nullable=true)
     */
    private $userStory;

    /**
     * @var BorrowerDetails
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borrower_id", referencedColumnName="id")
     * })
     */
    private $borrower;

    /**
     * @var LoanOperationalStrategies
     * @Groups({"borrower_portfolio"})
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\LoanOperationalStrategies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operational_strategy_id", referencedColumnName="id")
     * })
     */
    private $operationalStrategy;

    /**
     * @ORM\Column(name="amount_raised", type="double", nullable=true)
     * @Groups({"borrower_portfolio"})
     */
    private $amountRaised;

    /**
     * @ORM\Column(name="dmi", type="double", nullable=true)
     * @Groups({"borrower_portfolio"})
     */
    private $dmi;

    /**
     * @return mixed
     */
    public function getDmi()
    {
        return $this->dmi;
    }

    /**
     * @param mixed $dmi
     */
    public function setDmi($dmi)
    {
        $this->dmi = $dmi;
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get userStory
     *
     * @return string
     */
    public function getUserStory()
    {
        return $this->userStory;
    }

    /**
     * Set userStory
     *
     * @param string $userStory
     * @return BorrowerLoanDetails
     */
    public function setUserStory($userStory)
    {
        $this->userStory = $userStory;

        return $this;
    }

    /**
     * Get borrower
     *
     * @return BorrowerDetails
     */
    public function getBorrower()
    {
        return $this->borrower;
    }

    /**
     * Set borrower
     *
     * @param BorrowerDetails $borrower
     * @return BorrowerLoanDetails
     */
    public function setBorrower(BorrowerDetails $borrower = null)
    {
        $this->borrower = $borrower;

        return $this;
    }

    /**
     * Get operationalStrategy
     *
     * @return LoanOperationalStrategies
     */
    public function getOperationalStrategy()
    {
        return $this->operationalStrategy;
    }

    /**
     * Set operationalStrategy
     *
     * @param LoanOperationalStrategies $operationalStrategy
     * @return BorrowerLoanDetails
     */
    public function setOperationalStrategy(LoanOperationalStrategies $operationalStrategy = null)
    {
        $this->operationalStrategy = $operationalStrategy;

        return $this;
    }
}
