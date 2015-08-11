<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 03/08/15
 * Time: 3:21 AM
 */

namespace Deviab\BorrowerBundle\Services;

use Deviab\DatabaseBundle\Entity\BorrowerDetails;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use JMS\Serializer\SerializationContext;


class BorrowerService extends BaseService
{
    /**
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        parent::__construct($doctrine);

    }

    /**
     * @param $borrowerId
     * @return object
     */
    public function getBorrowerById($borrowerId)
    {

        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrowerImagesRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerImages');
        $borrowerLoanDetailsRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerLoanDetails');

        $borrowerDetails = $borrowerRepositry->find($borrowerId);
        $borrowerImage = $borrowerImagesRepositry->findOneBy(array('borrower' => $borrowerDetails));
        $borrowerLoanStory = $borrowerLoanDetailsRepositry->findOneBy(array('borrower' => $borrowerDetails));
        return array('borrower' => $borrowerDetails, 'borrowerImg' => $borrowerImage, 'borrowerStory' => $borrowerLoanStory);
    }

    /**
     * @param BorrowerDetails $borrowerDetails
     * @return BorrowerDetails
     * @internal param BorrowerDetails $borrowerDetail
     */
    public function newBorrower(BorrowerDetails $borrowerDetails)
    {

        $this->em->persist($borrowerDetails);
        $this->em->flush();
        return $borrowerDetails;


    }
}
