<?php

namespace Deviab\DatabaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BorrowerDetails
 *
 * @ORM\Table(name="borrower_details", indexes={@ORM\Index(name="fk_village_id_idx", columns={"village_id"}), @ORM\Index(name="fk_project_id_idx", columns={"project_id"})})
 * @ORM\Entity
 */
class BorrowerDetails
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
     * @ORM\Column(name="fname", type="string", length=45, nullable=false)
     */
    private $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="lname", type="string", length=45, nullable=false)
     */
    private $lname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=45, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="tolla", type="string", length=45, nullable=false)
     */
    private $tolla;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=10, nullable=false)
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var string
     *
     * @ORM\Column(name="highest_education", type="string", length=45, nullable=true)
     */
    private $highestEducation;

    /**
     * @var string
     *
     * @ORM\Column(name="primary_mobile_number", type="string", length=45, nullable=false)
     */
    private $primaryMobileNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="occupation", type="string", length=45, nullable=true)
     */
    private $occupation;

    /**
     * @var float
     *
     * @ORM\Column(name="annual_income", type="float", precision=10, scale=0, nullable=false)
     */
    private $annualIncome;

    /**
     * @var \Deviab\DatabaseBundle\Entity\MasterVillages
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\MasterVillages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="village_id", referencedColumnName="id")
     * })
     */
    private $village;

    /**
     * @var \Deviab\DatabaseBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\Project", inversedBy="borrowers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     * })
     */
    private $project;

    /**
     * @var \Deviab\DatabaseBundle\Entity\FieldRepresentative
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\FieldRepresentative", inversedBy="borrowers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fieldRepresentative_id", referencedColumnName="id")
     * })
     */
    private $fieldRepresentative;



}
