<?php

namespace Deviab\DatabaseBundle\Entity;

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
     * @var \Deviab\DatabaseBundle\Entity\BorrowerDetails
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borrower_id", referencedColumnName="id")
     * })
     */
    private $borrower;


}
