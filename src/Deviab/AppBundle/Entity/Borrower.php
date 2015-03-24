<?php

namespace Deviab\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Borrower
 *
 * @ORM\Table(name="Borrowers")
 * @ORM\Entity(repositoryClass="Deviab\AppBundle\Entity\BorrowerRepository")
 */
class Borrower extends BaseEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="locality", type="string", length=255)
     */
    private $locality;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="borrower_img", type="string", length=255)
     */
    private $borrowerImg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="borrower_dob", type="date")
     */
    private $borrowerDob;


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
     * Set name
     *
     * @param string $name
     * @return Borrower
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Borrower
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Borrower
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Borrower
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Borrower
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set locality
     *
     * @param string $locality
     * @return Borrower
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality
     *
     * @return string 
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Borrower
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set borrowerImg
     *
     * @param string $borrowerImg
     * @return Borrower
     */
    public function setBorrowerImg($borrowerImg)
    {
        $this->borrowerImg = $borrowerImg;

        return $this;
    }

    /**
     * Get borrowerImg
     *
     * @return string 
     */
    public function getBorrowerImg()
    {
        return $this->borrowerImg;
    }

    /**
     * Set borrowerDob
     *
     * @param \DateTime $borrowerDob
     * @return Borrower
     */
    public function setBorrowerDob($borrowerDob)
    {
        $this->borrowerDob = $borrowerDob;

        return $this;
    }

    /**
     * Get borrowerDob
     *
     * @return \DateTime 
     */
    public function getBorrowerDob()
    {
        return $this->borrowerDob;
    }
}
