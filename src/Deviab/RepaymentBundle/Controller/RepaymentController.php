<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 19/09/15
 * Time: 3:02 AM
 */

namespace Deviab\RepaymentBundle\Controller;

use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class RepaymentController extends Controller
{
    public function repayLenderAction($amount)
    {
        $repaymentService = $this->container->get('repayment_service');
        $response = $repaymentService->lenderRepayment($amount);
        return $response;
    }
}