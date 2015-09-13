<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 13/09/15
 * Time: 6:57 PM
 */

namespace Deviab\TransactionBundle;

use Deviab\TransactionBundle\Entity\LenderDeviabTransaction;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class TransactionController extends Controller
{
    public function newTransactionAction(LenderDeviabTransaction $request)
    {

        $investmentService = $this->container->get('investment_service');
        $response = $investmentService->newTransaction($request);
        return $response;

    }
}