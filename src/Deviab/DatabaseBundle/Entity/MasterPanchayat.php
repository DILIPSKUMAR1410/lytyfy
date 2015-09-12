<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MasterPanchayat
 *
 * @ORM\Table(name="master_panchayat", indexes={@ORM\Index(name="fk_block_id_idx", columns={"block_id"})})
 * @ORM\Entity
 */
class MasterPanchayat
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
     * @ORM\Column(name="panchayat_name", type="string", length=45, nullable=false)
     */
    private $panchayatName;

    /**
     * @var \Deviab\DatabaseBundle\Entity\MasterBlock
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\MasterBlock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="block_id", referencedColumnName="id")
     * })
     */
    private $block;


}
