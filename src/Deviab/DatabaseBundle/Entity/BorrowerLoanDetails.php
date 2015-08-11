<?php

namespace Deviab\DatabaseBundle\Entity;

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
     * @Groups({"borrower_portfolio"})
     * @ORM\Column(name="user_story", type="text", nullable=true)
     */
    private $userStory;

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
     * @var \Deviab\DatabaseBundle\Entity\LoanOperationalStrategies
     * @Groups({"borrower_portfolio"})
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\LoanOperationalStrategies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operational_strategy_id", referencedColumnName="id")
     * })
     */
    private $operationalStrategy;


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
     * @return BorrowerLoanDetails
     */
    public function setBorrower(\Deviab\DatabaseBundle\Entity\BorrowerDetails $borrower = null)
    {
        $this->borrower = $borrower;

        return $this;
    }

    /**
     * Get operationalStrategy
     *
     * @return \Deviab\DatabaseBundle\Entity\LoanOperationalStrategies
     */
    public function getOperationalStrategy()
    {
        return $this->operationalStrategy;
    }

    /**
     * Set operationalStrategy
     *
     * @param \Deviab\DatabaseBundle\Entity\LoanOperationalStrategies $operationalStrategy
     * @return BorrowerLoanDetails
     */
    public function setOperationalStrategy(\Deviab\DatabaseBundle\Entity\LoanOperationalStrategies $operationalStrategy = null)
    {
        $this->operationalStrategy = $operationalStrategy;

        return $this;
    }
}
