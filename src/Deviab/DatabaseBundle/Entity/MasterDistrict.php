<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MasterDistrict
 *
 * @ORM\Table(name="master_district", indexes={@ORM\Index(name="fk_state_id_idx", columns={"state_id"})})
 * @ORM\Entity
 */
class MasterDistrict
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
     * @ORM\Column(name="district_name", type="string", length=45, nullable=false)
     */
    private $districtName;

    /**
     * @var \Deviab\DatabaseBundle\Entity\MasterStates
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\MasterStates")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     * })
     */
    private $state;


}
