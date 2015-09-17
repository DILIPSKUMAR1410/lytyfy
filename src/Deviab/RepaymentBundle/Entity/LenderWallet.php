<?php

namespace Deviab\RepaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LenderWallet
 *
 * @ORM\Table(name="lender_wallet")
 * @ORM\Entity
 */
class LenderWallet
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
     * @ORM\Column(name="credits", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $credits;

    /**
     * @var \Deviab\DatabaseBundle\Entity\LenderDetails
     *
     * @ORM\OneToOne(targetEntity="Deviab\DatabaseBundle\Entity\LenderDetails", inversedBy="credits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lender_id", referencedColumnName="id", unique=true, nullable=true)
     * })
     */
    private $lender;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * @param int $credits
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;
    }

    /**
     * @return \Deviab\DatabaseBundle\Entity\LenderDetails
     */
    public function getLender()
    {
        return $this->lender;
    }

    /**
     * @param \Deviab\DatabaseBundle\Entity\LenderDetails $lender
     */
    public function setLender($lender)
    {
        $this->lender = $lender;
    }

}
