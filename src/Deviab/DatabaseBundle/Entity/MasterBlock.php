<?php

namespace Deviab\DatabaseBundle\Entity;

use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\MaxDepth;
use Doctrine\ORM\Mapping as ORM;

/**
 * MasterBlock
 *
 * @ORM\Table(name="master_block", indexes={@ORM\Index(name="fk_district_id_idx", columns={"district_id"})})
 * @ORM\Entity
 */
class MasterBlock
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
     * @Groups({"borrower_portfolio","project_portfolio","search_borrowers"})
     * @ORM\Column(name="block_name", type="string", length=45, nullable=false)
     */
    private $blockName;

    /**
     * @var \Deviab\DatabaseBundle\Entity\MasterDistrict
     * @Groups({"borrower_portfolio","project_portfolio","search_borrowers"})
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\MasterDistrict")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="district_id", referencedColumnName="id")
     * })
     */
    private $district;

    /**
     * @return string
     */
    public function getBlockName()
    {
        return $this->blockName;
    }

    /**
     * @param string $blockName
     */
    public function setBlockName($blockName)
    {
        $this->blockName = $blockName;
    }

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
     * @return MasterDistrict
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param MasterDistrict $district
     */
    public function setDistrict($district)
    {
        $this->district = $district;
    }



}
