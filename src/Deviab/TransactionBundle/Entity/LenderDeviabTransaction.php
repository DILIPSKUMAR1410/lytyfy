<?php

namespace Deviab\TransactionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LenderDeviabTransaction
 *
 * @ORM\Table(name="lender_deviab_transactions")
 * @ORM\Entity
 */
class LenderDeviabTransaction
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
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $timestamp;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float", precision=0, scale=0, nullable=false, unique=false)
     */
    private $amount;

    /**
     * @var \Deviab\DatabaseBundle\Entity\LenderDetails
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\LenderDetails", inversedBy="fromlenderTransactions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lender_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $lender;

    /**
     * @var \Deviab\DatabaseBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\Project", inversedBy="toProjectLenderTransactions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $project;


}
