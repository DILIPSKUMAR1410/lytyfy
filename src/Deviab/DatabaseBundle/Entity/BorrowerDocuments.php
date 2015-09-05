<?php

namespace Deviab\DatabaseBundle\Entity;

use Deviab\DatabaseBundle\Entity\BorrowerDetails;
use Doctrine\ORM\Mapping as ORM;

/**
 * BorrowerDocuments
 *
 * @ORM\Table(name="borrower_documents", indexes={@ORM\Index(name="fk_borrower_id_idx", columns={"borrower_id"})})
 * @ORM\Entity
 */
class BorrowerDocuments
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
     * @ORM\Column(name="doc_url", type="string", length=255, nullable=false)
     */
    private $docUrl;

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
     * Get docUrl
     *
     * @return string
     */
    public function getDocUrl()
    {
        return $this->docUrl;
    }

    /**
     * Set docUrl
     *
     * @param string $docUrl
     * @return BorrowerDocuments
     */
    public function setDocUrl($docUrl)
    {
        $this->docUrl = $docUrl;

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
     * @return BorrowerDocuments
     */
    public function setBorrower(BorrowerDetails $borrower = null)
    {
        $this->borrower = $borrower;

        return $this;
    }
}
