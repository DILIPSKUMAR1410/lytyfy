<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 01/08/15
 * Time: 9:52 PM
 */

namespace Deviab\BorrowerBundle\Controller;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;

use Deviab\DatabaseBundle\Entity\BorrowerDetails;

use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class BorrowerController extends Controller

{
    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param BorrowerDetails $request
     * @return View
     */
    public function newBorrowerAction(BorrowerDetails $request)
    {
        $borrowerService = $this->container->get('borrower_service');
        $borrower = $borrowerService->newBorrower($request);
        return View::create($borrower, Codes::HTTP_CREATED);
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
        $context = SerializationContext::create()->setGroups(array('borrower_portfolio'));
        return View::create($borrower, Codes::HTTP_OK)->setSerializationContext($context);
    }
}