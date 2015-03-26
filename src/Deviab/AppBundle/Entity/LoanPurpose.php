<?php

namespace Deviab\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LoanPurpose
 *
 * @ORM\Table(name="loan_purposes")
 * @ORM\Entity(repositoryClass="Deviab\AppBundle\Entity\LoanPurposeRepository")
 */
class LoanPurpose extends BaseEntity
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
     * @ORM\Column(name="story", type="string", length=255)
     */
    private $story;


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
     * Set story
     *
     * @param string $story
     * @return LoanPurpose
     */
    public function setStory($story)
    {
        $this->story = $story;

        return $this;
    }

    /**
     * Get story
     *
     * @return string 
     */
    public function getStory()
    {
        return $this->story;
    }
}
