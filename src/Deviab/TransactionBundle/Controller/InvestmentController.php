<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 17/09/15
 * Time: 5:44 PM
 */

namespace Deviab\TransactionBundle\Controller;

use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class InvestmentController extends Controller
{
    public function getLenderInvestmentAction($lenderId)
    {
        $investmentService = $this->container->get('investment_service');
        $investmentDetails = $investmentService->getLenderInvestment($lenderId);
        return $investmentDetails;
    }
}