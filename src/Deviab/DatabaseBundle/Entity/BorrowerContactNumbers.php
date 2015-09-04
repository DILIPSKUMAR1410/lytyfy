<?php

namespace Deviab\DatabaseBundle\Entity;

use Deviab\DatabaseBundle\Entity\BorrowerDetails;
use Doctrine\ORM\Mapping as ORM;

/**
 * BorrowerContactNumbers
 *
 * @ORM\Table(name="borrower_contact_numbers", indexes={@ORM\Index(name="fk_borrower_id_idx", columns={"borrower_id"})})
 * @ORM\Entity
 */
class BorrowerContactNumbers
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
     * @ORM\Column(name="contact_number", type="string", length=20, nullable=false)
     */
    private $contactNumber;

    /**
     * @var BorrowerDetails
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borrower_id", referencedColumnName="id")
     * })
     */
    private $borrower;


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
     * Get contactNumber
     *
     * @return string
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * Set contactNumber
     *
     * @param string $contactNumber
     * @return BorrowerContactNumbers
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;

        return $this;
    }

    /**
     * Get borrower
     *
     * @return BorrowerDetails
     */
    public function getBorrower()
    {
        return $this->borrower;
    }

    /**
     * Set borrower
     *
     * @param BorrowerDetails $borrower
     * @return BorrowerContactNumbers
     */
    public function setBorrower(BorrowerDetails $borrower = null)
    {
        $this->borrower = $borrower;

        return $this;
    }
}
