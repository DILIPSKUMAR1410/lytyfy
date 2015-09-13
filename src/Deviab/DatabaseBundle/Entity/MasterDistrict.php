<?php

namespace Deviab\DatabaseBundle\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\MaxDepth;
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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDistrictName()
    {
        return $this->districtName;
    }

    /**
     * @param string $districtName
     */
    public function setDistrictName($districtName)
    {
        $this->districtName = $districtName;
    }

    /**
     * @return MasterStates
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param MasterStates $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }



}
