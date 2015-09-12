<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     *
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
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\LoanOperationalStrategies")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operational_strategy_id", referencedColumnName="id")
     * })
     */
    private $operationalStrategy;


}
