<?php

namespace Deviab\LoginBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\NotBlank(groups={"Registration", "Profile"})
     */
    // protected $username;

    /**
     * @Assert\NotBlank(groups={"Registration", "Profile"})
     */
    protected $email;

    /**
     * @Assert\NotBlank(groups={"Registration", "Profile"})
     */
    protected $password;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}