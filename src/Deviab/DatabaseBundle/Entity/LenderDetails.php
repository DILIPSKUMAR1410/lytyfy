<?php

namespace Deviab\DatabaseBundle\Entity;

use Deviab\RepaymentBundle\Entity\LenderCurrentStatus;
use Doctrine\ORM\Mapping as ORM;

/**
 * LenderDetails
 *
 * @ORM\Table(name="lender_details")
 * @ORM\Entity
 */
class LenderDetails
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
     * @ORM\Column(name="fname", type="string", length=45, nullable=false)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="lname", type="string", length=45, nullable=false)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=10, nullable=false)
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=true)
     */
    private $dob;

    /**
     * @var string
     *
     * @ORM\Column(name="primary_mobile_number", type="string", length=45, nullable=false)
     */
    private $primaryMobileNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="profile_pic", type="string", length=255, nullable=false)
     */
    private $profilePic;

    /**
     * @var string
     *
     * @ORM\Column(name="google_id", type="string", length=45, nullable=true)
     */
    private $googleId;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_id", type="string", length=45, nullable=true)
     */
    private $facebookId;

    /**
     * @ORM\OneToOne(targetEntity="Deviab\RepaymentBundle\Entity\LenderCurrentStatus", mappedBy="lender")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="lender_currrent_status_id", referencedColumnName="id", unique=true)
     * })
     */
    private $currentStatus;

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
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return string
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param string $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param \DateTime $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return string
     */
    public function getPrimaryMobileNumber()
    {
        return $this->primaryMobileNumber;
    }

    /**
     * @param string $primaryMobileNumber
     */
    public function setPrimaryMobileNumber($primaryMobileNumber)
    {
        $this->primaryMobileNumber = $primaryMobileNumber;
    }

    /**
     * @return string
     */
    public function getProfilePic()
    {
        return $this->profilePic;
    }

    /**
     * @param string $profilePic
     */
    public function setProfilePic($profilePic)
    {
        $this->profilePic = $profilePic;
    }

    /**
     * @return string
     */
    public function getGoogleId()
    {
        return $this->googleId;
    }

    /**
     * @param string $googleId
     */
    public function setGoogleId($googleId)
    {
        $this->googleId = $googleId;
    }

    /**
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * @param string $facebookId
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;
    }

    /**
     * @return LenderCurrentStatus
     */
    public function getCurrentStatus()
    {
        return $this->currentStatus;
    }

    /**
     * @param LenderCurrentStatus $currentStatus
     */
    public function setCurrentStatus($currentStatus)
    {
        $this->currentStatus = $currentStatus;
    }


}
