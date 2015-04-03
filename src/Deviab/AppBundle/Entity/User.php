<?php

namespace Deviab\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Deviab\AppBundle\Entity\UserRepository")
 */
class User extends BaseEntity
{
    /**
     * @var integer
     * @ORM\OneToOne(targetEntity="Login",mappedBy="user")
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     * @ORM\OneToOne(targetEntity="LendingDetail",mappedBy="lender")
     */
    protected $lendDetails;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_dob", type="date")
     */
    private $userDob;

    /**
     * @var string
     *
     * @ORM\Column(name="user_img", type="string", length=255)
     */
    private $userImg;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
    *
    */
    public function __construct()
    {
        $this->lendDetails = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return User
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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set userDob
     *
     * @param \DateTime $userDob
     * @return User
     */
    public function setUserDob($userDob)
    {
        $this->userDob = $userDob;

        return $this;
    }

    /**
     * Get userDob
     *
     * @return \DateTime 
     */
    public function getUserDob()
    {
        return $this->userDob;
    }

    /**
     * Set userImg
     *
     * @param string $userImg
     * @return User
     */
    public function setUserImg($userImg)
    {
        $this->userImg = $userImg;

        return $this;
    }

    /**
     * Get userImg
     *
     * @return string 
     */
    public function getUserImg()
    {
        return $this->userImg;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
}
