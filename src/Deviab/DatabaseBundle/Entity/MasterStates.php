<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MasterStates
 *
 * @ORM\Table(name="master_states")
 * @ORM\Entity
 */
class MasterStates
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
     * @ORM\Column(name="state_name", type="string", length=45, nullable=false)
     */
    private $stateName;


}
