<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MasterVillages
 *
 * @ORM\Table(name="master_villages", indexes={@ORM\Index(name="fk_panchayat_id_idx", columns={"panchayat_id"})})
 * @ORM\Entity
 */
class MasterVillages
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
     * @ORM\Column(name="village_name", type="string", length=45, nullable=true)
     */
    private $villageName;

    /**
     * @var \Deviab\DatabaseBundle\Entity\MasterPanchayat
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\MasterPanchayat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="panchayat_id", referencedColumnName="id")
     * })
     */
    private $panchayat;

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
    public function getVillageName()
    {
        return $this->villageName;
    }

    /**
     * @param string $villageName
     */
    public function setVillageName($villageName)
    {
        $this->villageName = $villageName;
    }

    /**
     * @return MasterPanchayat
     */
    public function getPanchayat()
    {
        return $this->panchayat;
    }

    /**
     * @param MasterPanchayat $panchayat
     */
    public function setPanchayat($panchayat)
    {
        $this->panchayat = $panchayat;
    }


}
