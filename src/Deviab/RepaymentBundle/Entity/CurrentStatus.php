<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 13/09/15
 * Time: 12:53 PM
 */

namespace Deviab\TransactionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CurrentStatus
 *
 * @ORM\Table(name="current_status")
 * @ORM\Entity
 */
class CurrentStatus
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
     * @var integer
     * @ORM\Column(name="pricipal_left",type="integer",nullable=false,)
     */
    private $pricipalLeft;

    /**
     * @var integer
     * @ORM\Column(name="tenure_left",type="integer",nullable=false,)
     */
    private $tenureLeft;

    /**
     * @var integer
     * @ORM\Column(name="interest_left",type="integer",nullable=false,)
     */
    private $interestLeft;

    /**
     * @var \Deviab\DatabaseBundle\Entity\BorrowerDetails
     *
     * @ORM\OneToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails", inversedBy="currentStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borrower_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $borrower;

    /**
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\Project", inversedBy="projectBorrowerCurrentStatus")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

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
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTime $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return int
     */
    public function getPricipalLeft()
    {
        return $this->pricipalLeft;
    }

    /**
     * @param int $pricipalLeft
     */
    public function setPricipalLeft($pricipalLeft)
    {
        $this->pricipalLeft = $pricipalLeft;
    }

    /**
     * @return int
     */
    public function getTenureLeft()
    {
        return $this->tenureLeft;
    }

    /**
     * @param int $tenureLeft
     */
    public function setTenureLeft($tenureLeft)
    {
        $this->tenureLeft = $tenureLeft;
    }

    /**
     * @return int
     */
    public function getInterestLeft()
    {
        return $this->interestLeft;
    }

    /**
     * @param int $interestLeft
     */
    public function setInterestLeft($interestLeft)
    {
        $this->interestLeft = $interestLeft;
    }

    /**
     * @return \Deviab\DatabaseBundle\Entity\BorrowerDetails
     */
    public function getBorrower()
    {
        return $this->borrower;
    }

    /**
     * @param \Deviab\DatabaseBundle\Entity\BorrowerDetails $borrower
     */
    public function setBorrower($borrower)
    {
        $this->borrower = $borrower;
    }

    /**
     * @return mixed
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param mixed $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }


}