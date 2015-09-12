<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LoanOperationalStrategies
 *
 * @ORM\Table(name="loan_operational_strategies")
 * @ORM\Entity
 */
class LoanOperationalStrategies
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
     * @var float
     *
     * @ORM\Column(name="principal_amount", type="float", precision=10, scale=0, nullable=false)
     */
    private $principalAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="tenure", type="integer", nullable=false)
     */
    private $tenure;

    /**
     * @var float
     *
     * @ORM\Column(name="rate_of_interrest", type="float", precision=10, scale=0, nullable=false)
     */
    private $rateOfInterrest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="campaign_date", type="date", nullable=false)
     */
    private $campaignDate;


}
