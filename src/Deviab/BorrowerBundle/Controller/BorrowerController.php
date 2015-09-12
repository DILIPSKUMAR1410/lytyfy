<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 01/08/15
 * Time: 9:52 PM
 */

namespace Deviab\BorrowerBundle\Controller;

use Deviab\DatabaseBundle\Entity\BorrowerContactNumbers;
use Deviab\DatabaseBundle\Entity\BorrowerFamilyDetails;
use Deviab\DatabaseBundle\Entity\BorrowerFinancialDetails;
use Deviab\DatabaseBundle\Entity\BorrowerLoanDetails;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;

use Deviab\DatabaseBundle\Entity\BorrowerDetails;

use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Symfony\Component\HttpFoundation\Request;


class BorrowerController extends Controller

{
    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param BorrowerContactNumbers|BorrowerDetails $request
     * @return View
     */
    public function newBorrowerAction(BorrowerDetails $request)
    {
        $borrowerService = $this->container->get('borrower_service');
        $borrower = $borrowerService->newBorrower($request);
        return View::create($borrower, Codes::HTTP_OK);
    }

    /**
     * @param $borrowerId
     * @return View
     */
    public
    function getBorrowerAction($borrowerId)
    {
        $borrowerService = $this->container->get('borrower_service');
        $borrower = $borrowerService->getBorrowerById($borrowerId);
        $context = SerializationContext::create()->setGroups(array('borrower_portfolio'))
            ->enableMaxDepthChecks();
        return View::create($borrower, Codes::HTTP_OK)->setSerializationContext($context);

    }

    /**
     * @param Request $request
     * @return View
     * @internal param $searchCriteria
     */
    public
    function searchBorrowersAction(Request $request)
    {
        $limit = $request->get('limit');
        $offset = $request->get('offset');
        $request->query->remove('limit');
        $request->query->remove('offset');
        $searchCriteria = $request->query->all();
        $borrowerService = $this->container->get('borrower_service');
        $borrowers = $borrowerService->searchBorrowers($searchCriteria, $limit, $offset);
        $context = SerializationContext::create()->setGroups(array('search_borrowers'))
            ->enableMaxDepthChecks();
        return View::create($borrowers, Codes::HTTP_OK);
    }

    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param BorrowerFamilyDetails|BorrowerDetails $request
     * @return View
     */
    public function addRelativeAction($borrowerId, BorrowerFamilyDetails $request)
    {
        $borrowerService = $this->container->get('borrower_service');
        $familyDetails = $borrowerService->addBorrowerFamilyDetails($borrowerId, $request);
        return View::create($familyDetails, Codes::HTTP_OK);

    }

    /**
     * @param $borrowerId
     * @return View
     */
    public function getRelativesAction($borrowerId)
    {
        $borrowerService = $this->container->get('borrower_service');
        $borrowerRelative = $borrowerService->getBorrowerFamilyDetails($borrowerId);
        return View::create($borrowerRelative, Codes::HTTP_OK);
    }

    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param $borrowerId
     * @param BorrowerDetails $request
     * @return View
     */
    public function updateBorrowerAction($borrowerId, BorrowerDetails $request)
    {
        $borrowerService = $this->container->get('borrower_service');
        $updatedBorrower = $borrowerService->updateBorrower($borrowerId, $request);
        return View::create($updatedBorrower, Codes::HTTP_OK);

    }

    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param $borrowerId
     * @param BorrowerFamilyDetails $request
     * @return View
     */
    public function updateRelativeAction($borrowerId, BorrowerFamilyDetails $request)
    {
        $borrowerService = $this->container->get('borrower_service');
        $updatedRelative = $borrowerService->updateBorrowerFamilyDetails($borrowerId, $request);
        return View::create($updatedRelative, Codes::HTTP_OK);

    }

    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param $borrowerId
     * @param BorrowerFinancialDetails $request
     * @return View
     */
    public function addBorrowerFinancialDetailsAction($borrowerId, BorrowerFinancialDetails $request)
    {
        $borrowerService = $this->container->get('borrower_service');
        $borrowerFinancialDetails = $borrowerService->addBorrowerFinancialDetails($borrowerId, $request);
        return View::create($borrowerFinancialDetails, Codes::HTTP_OK);
    }

    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param $borrowerId
     * @param BorrowerFinancialDetails $request
     * @return View
     */
    public function updateBorrowerFinancialDetailsAction($borrowerId, BorrowerFinancialDetails $request)
    {
        $borrowerService = $this->container->get('borrower_service');
        $updatedBorrowerFinancialDetails = $borrowerService->updateBorrowerFinancialDetails($borrowerId, $request);
        return View::create($updatedBorrowerFinancialDetails, Codes::HTTP_OK);
    }

    /**
     * @param $borrowerId
     * @return View
     */
    public function getBorrowerFinancialDetailsAction($borrowerId)
    {
        $borrowerService = $this->container->get('borrower_service');
        $borrowerFinancialDetails = $borrowerService->getBorrowerFinancialDetails($borrowerId);
        return View::create($borrowerFinancialDetails, Codes::HTTP_OK);
    }

    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param $borrowerId
     * @param BorrowerLoanDetails $request
     * @return View
     */
    public function addBorrowerLoanDetailsAction($borrowerId, BorrowerLoanDetails $request)
    {
        $borrowerService = $this->container->get('borrower_service');
        $borrowerLoanDetails = $borrowerService->addBorrowerLoanDetails($borrowerId, $request);
        return View::create($borrowerLoanDetails, Codes::HTTP_OK);
    }

    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param $borrowerId
     * @param BorrowerLoanDetails $request
     * @return View
     */
    public function updateBorrowerLoanDetailsAction($borrowerId, BorrowerLoanDetails $request)
    {
        $borrowerService = $this->container->get('borrower_service');
        $updatedBorrowerLoanDetails = $borrowerService->updateBorrowerLoanDetails($borrowerId, $request);
        return View::create($updatedBorrowerLoanDetails, Codes::HTTP_OK);
    }

    /**
     * @param $borrowerId
     * @return View
     * @internal param $request
     */
    public function getBorrowerLoanDetailsAction($borrowerId)
    {
        $borrowerService = $this->container->get('borrower_service');
        $borrowerLoanDetails = $borrowerService->getBorrowerLoanDetails($borrowerId);
        return View::create($borrowerLoanDetails, Codes::HTTP_OK);
    }

    /**
     * @param $projectId
     * @return View
     */
    public function getBorrowersByProjectAction($projectId)
    {
        $borrowerService = $this->container->get('borrower_service');
        $borrower = $borrowerService->getBorrowersByProject($projectId);
        $context = SerializationContext::create()->setGroups(array("project_portfolio"))
            ->enableMaxDepthChecks();
        return View::create($borrower, Codes::HTTP_OK)->setSerializationContext($context);

    }

}