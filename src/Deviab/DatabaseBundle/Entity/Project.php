<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="projects", indexes={@ORM\Index(name="fk_district_id_idx", columns={"district_id"})})
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
     * @var string
     *
     * @ORM\Column(name="p_name", type="string", length=45, nullable=false)
     */
    private $pName;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount_raised", type="integer", nullable=false)
     */
    private $amountRaised;

    /**
     * @var integer
     *
     * @ORM\Column(name="capital_amount", type="integer", nullable=false)
     */
    private $capitalAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="returned_amount", type="integer", nullable=false)
     */
    private $returnedAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails", mappedBy="project")
     */
    private $borrowers;

    /**
     * @var \Deviab\DatabaseBundle\Entity\MasterDistrict
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\MasterDistrict")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="district_id", referencedColumnName="id")
     * })
     */
    private $district;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->borrowers = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
