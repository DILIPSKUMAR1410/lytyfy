<?php

namespace Deviab\DatabaseBundle\Entity;

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


}
