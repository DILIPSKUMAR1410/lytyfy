<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Deviab\DatabaseBundle\Entity\BorrowerDetails;

/**
 * Project
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity
 */
class Project
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
     * @ORM\OneToMany(targetEntity="BorrowerDetails", mappedBy="project")
     */
    private $borrowers;

    public function __construct()
    {
        $this->borrowers = new ArrayCollection();
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
    *
    * Get Borrowers
    *
    * @return ArrayCollection
    */
    public function getBorrowers()
    {
        return $this->borrowers;
    }

    /**
    * Add Borrower
    *
    * @param BorrowerDetails $borrower
    */
    public function addBorrower(BorrowerDetails $borrower)
    {
        $this->borrowers[] = $borrower;
    }


    /**
     * Remove Borrower
     *
     * @param BorrowerDetails $borrower
     */
    public function removeBorrower(BorrowerDetails $borrower)
    {
        $this->borrowers->removeElement($borrower);
    }




}