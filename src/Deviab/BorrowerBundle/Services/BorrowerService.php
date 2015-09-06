<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 03/08/15
 * Time: 3:21 AM
 */

namespace Deviab\BorrowerBundle\Services;

use Deviab\DatabaseBundle\Entity\BorrowerContactNumbers;
use Deviab\DatabaseBundle\Entity\BorrowerDetails;
use Deviab\DatabaseBundle\Entity\BorrowerFamilyDetails;
use Deviab\DatabaseBundle\Entity\BorrowerFinancialDetails;
use Deviab\DatabaseBundle\Entity\BorrowerLoanDetails;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;


class BorrowerService extends BaseService
{
    /**
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        parent::__construct($doctrine);

        $this->doctrine = $doctrine;
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

        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower == null)
            return "borrower not found";
        $borrowerImage = $borrowerImagesRepositry->findOneBy(array('borrower' => $borrower));
        if ($borrowerImage == null)
            $borrowerImage = "image not found";
        $borrowerLoanStory = $borrowerLoanDetailsRepositry->findOneBy(array('borrower' => $borrower));
        if ($borrowerLoanStory == null)
            $borrowerLoanStory = "loan story not found";

        return array('borrower' => $borrower, 'borrowerImg' => $borrowerImage, 'borrowerStory' => $borrowerLoanStory);
    }

    /**
     * @param BorrowerDetails $borrowerDetails
     * @return BorrowerDetails
     * @internal param BorrowerContactNumbers $borrowerContactNumbers
     * @internal param BorrowerDetails $borrowerDetails
     * @internal param BorrowerDetails $borrowerDetail
     */
    public function newBorrower(BorrowerDetails $borrowerDetails)
    {
        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->findOneBy(array('primaryMobileNumber' => $borrowerDetails->getPrimaryMobileNumber()));
        if ($borrower == null) {
            $this->em->persist($borrowerDetails);
            $this->em->flush();
            return $borrowerDetails;
        } else
            return "borrower is already registered";
    }

    /**
     * @param $borrowerId
     * @param BorrowerDetails $borrowerDetails
     * @return string
     */
    public function updateBorrower($borrowerId, BorrowerDetails $borrowerDetails)
    {
        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower == null)
            return "Borrower not found";
        $this->em->merge($borrowerDetails);
        $this->em->flush();
        return $borrowerDetails;
    }

    /**
     * @param $searchCriteria
     * @return string
     */
    public function searchBorrowers($searchCriteria, $limit, $offset)
    {

        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrowers = $borrowerRepositry->findBy($searchCriteria, null, $limit, $offset);
        if ($borrowers != null)
            return $borrowers;
        else return "no borrowers matcing your search criteria";

    }

    /**
     * @param BorrowerFamilyDetails $borrowerFamilyDetails
     * @return mixed
     */
    public function addBorrowerFamilyDetails($borrowerId, BorrowerFamilyDetails $borrowerFamilyDetails)
    {
        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower != null) {
            $borrowerFamilyRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerFamilyDetails');
            $borrowerRelative = $borrowerFamilyRepositry->findOneBy(array('relation' => $borrowerFamilyDetails->getRelation(),
                'name' => $borrowerFamilyDetails->getName(),
                'dob' => $borrowerFamilyDetails->getDob(),
                'gender' => $borrowerFamilyDetails->getGender(),
                'borrower' => $borrowerFamilyDetails->getBorrower()));
            if ($borrowerRelative != null)
                return "This Relative detail already exists";
            else
                $this->em->persist($borrowerFamilyDetails);
            $this->em->flush();
            return $borrowerFamilyDetails;
        } else {
            return "borrower is not registered ";
        }
    }

    /**
     * @param BorrowerFamilyDetails $borrowerFamilyDetails
     * @param $borrowerId
     * @return BorrowerFamilyDetails|string
     */
    public function updateBorrowerFamilyDetails($borrowerId, BorrowerFamilyDetails $borrowerFamilyDetails)
    {
        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower != null) {
            $borrowerFamilyRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerFamilyDetails');
            $borrowerRelative = $borrowerFamilyRepositry->find($borrowerFamilyDetails->getId());
            if ($borrowerRelative != null) {
                if ($borrower == $borrowerFamilyDetails->getBorrower()) {
                    $this->em->merge($borrowerFamilyDetails);
                    $this->em->flush();
                    return $borrowerFamilyDetails;
                } else
                    return "borrower not matching with relative";
            } else
                return "This relative not found";
        } else {
            return "borrower is not registered";
        }
    }

    /**
     * @param $borrowerId
     * @return object
     */
    public function getBorrowerFamilyDetails($borrowerId)
    {
        $borrowerFamilyRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerFamilyDetails');
        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower != null) {
            $borrowerFamilyDetails = $borrowerFamilyRepositry->findOneBy(array('borrower' => $borrower));
            if ($borrowerFamilyDetails != null)
                return $borrowerFamilyDetails;
            else
                return "no relatives found !!";
        } else
            return "borrower not found";

    }

    /**
     * @param $borrowerId
     * @param BorrowerFinancialDetails $borrowerFinancialDetails
     * @return object|string
     */
    public function addBorrowerFinancialDetails($borrowerId, BorrowerFinancialDetails $borrowerFinancialDetails)
    {
        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower != null) {

            $borrowerFinancialRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerFinancialDetails');
            $borrowerFinancialresult = $borrowerFinancialRepositry->findOneBy(array('borrower' => $borrowerFinancialDetails->getBorrower()));

            if ($borrowerFinancialresult != null)
                return "This financial detail already exists";
            else
                $this->em->persist($borrowerFinancialresult);
            $this->em->flush();
            return $borrowerFinancialresult;
        } else {
            return "borrower is not registered ";
        }
    }

    public function updateBorrowerFinancialDetails($borrowerId, BorrowerFinancialDetails $borrowerFinancialDetails)
    {
        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower != null) {
            $borrowerFinancialRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerFinancialDetails');
            $borrowerFinancialResult = $borrowerFinancialRepositry->find($borrowerFinancialDetails->getId());
            if ($borrowerFinancialResult != null) {
                if ($borrower == $borrowerFinancialDetails->getBorrower()) {
                    $this->em->merge($borrowerFinancialDetails);
                    $this->em->flush();
                    return $borrowerFinancialDetails;
                } else
                    return "Borrower Not Matching with Financial Details Borrower ";
            } else
                return "This Financial Details not found";
        } else {
            return "borrower is not registered";
        }
    }

    public function getBorrowerFinancialDetails($borrowerId)
    {

        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower != null) {
            $borrowerFinancialRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerFinancialDetails');
            $borrowerFinancialresult = $borrowerFinancialRepositry->findOneBy(array('borrower' => $borrower));
            if ($borrowerFinancialresult != null)
                return $borrowerFinancialresult;
            else
                return "No Financial Details of this borrower exists";
        } else
            return "borrower not found";

    }

    public function addBorrowerLoanDetails($borrowerId, BorrowerLoanDetails $borrowerLoanDetails)
    {
        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower != null) {

            $borrowerLoanRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerLoanDetails');
            $borrowerLoanResult = $borrowerLoanRepositry->findOneBy(array('borrower' => $borrowerLoanDetails->getBorrower()));

            if ($borrowerLoanResult != null)
                return "This financial detail already exists";
            else
                $this->em->persist($borrowerLoanResult);
            $this->em->flush();
            return $borrowerLoanResult;
        } else {
            return "borrower is not registered ";
        }
    }

    public function updateBorrowerLoanDetails($borrowerId, BorrowerLoanDetails $borrowerLoanDetails)
    {
        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower != null) {
            $borrowerLoanRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerLoanDetails');
            $borrowerLoanResult = $borrowerLoanRepositry->find($borrowerLoanDetails->getId());
            if ($borrowerLoanResult != null) {
                if ($borrower == $borrowerLoanDetails->getBorrower()) {
                    $this->em->merge($borrowerLoanDetails);
                    $this->em->flush();
                    return $borrowerLoanDetails;
                } else
                    return "Borrower Not Matching with Loan Details Borrower ";
            } else
                return "This Loan Details not found";
        } else {
            return "borrower is not registered";
        }
    }

    public function getBorrowerLoanDetails($borrowerId)
    {

        $borrowerRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerDetails');
        $borrower = $borrowerRepositry->find($borrowerId);
        if ($borrower != null) {
            $borrowerLoanRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerFinancialDetails');
            $borrowerLoanresult = $borrowerLoanRepositry->findOneBy(array('borrower' => $borrower));
            if ($borrowerLoanresult != null)
                return $borrowerLoanresult;
            else
                return "No Loan Details of this borrower exists";
        } else
            return "borrower not found";

    }

    /**
     * @param $projectId
     * @return object
     * @internal param $borrowerId
     */
    public function getBorrowersByProject($projectId)
    {

        $projectRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:ProjectDetails');
        $borrowerImagesRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerImages');
        $borrowerLoanDetailsRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:BorrowerLoanDetails');

        $borrower = $projectRepositry->find($projectId);
        if ($borrower == null)
            return "borrower not found";
        $borrowerImage = $borrowerImagesRepositry->findOneBy(array('borrower' => $borrower));
        if ($borrowerImage == null)
            $borrowerImage = "image not found";
        $borrowerLoanStory = $borrowerLoanDetailsRepositry->findOneBy(array('borrower' => $borrower));
        if ($borrowerLoanStory == null)
            $borrowerLoanStory = "loan story not found";

        return array('borrower' => $borrower, 'borrowerImg' => $borrowerImage, 'borrowerStory' => $borrowerLoanStory);
    }

}
