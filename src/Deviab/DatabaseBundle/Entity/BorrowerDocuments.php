<?php

namespace Deviab\DatabaseBundle\Entity;

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
     * @var \Deviab\DatabaseBundle\Entity\BorrowerDetails
     *
     * @ORM\ManyToOne(targetEntity="Deviab\DatabaseBundle\Entity\BorrowerDetails")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="borrower_id", referencedColumnName="id")
     * })
     */
    private $borrower;

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
    public function getDocUrl()
    {
        return $this->docUrl;
    }

    /**
     * @param string $docUrl
     */
    public function setDocUrl($docUrl)
    {
        $this->docUrl = $docUrl;
    }

    /**
     * @return BorrowerDetails
     */
    public function getBorrower()
    {
        return $this->borrower;
    }

    /**
     * @param BorrowerDetails $borrower
     */
    public function setBorrower($borrower)
    {
        $this->borrower = $borrower;
    }



}
