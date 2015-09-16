<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 13/09/15
 * Time: 6:57 PM
 */

namespace Deviab\TransactionBundle\Controller;
;

use Deviab\TransactionBundle\Entity\LenderDeviabTransaction;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class TransactionController extends Controller
{
    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param LenderDeviabTransaction $request
     * @return mixed
     */
    public function captureTransactionAction($projectId, LenderDeviabTransaction $request)
    {
        $investmentService = $this->container->get('investment_service');
        $response = $investmentService->captureTransaction($projectId, $request);
        return $response;

    }
}