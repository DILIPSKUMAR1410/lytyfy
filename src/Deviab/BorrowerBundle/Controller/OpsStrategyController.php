<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 30/08/15
 * Time: 1:47 AM
 */

namespace Deviab\BorrowerBundle\Controller;

use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Deviab\DatabaseBundle\Entity\LoanOperationalStrategies;

class OpsStrategyController extends Controller
{
    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param LoanOperationalStrategies $request
     * @return mixed
     */
    public function newLoanOpsStrategyAction(LoanOperationalStrategies $request)
    {
        $opsStrategyService = $this->container->get('ops_strategy_service');
        $loanOps = $opsStrategyService->newLoanOpsStrategy($request);
        return $loanOps;
    }

    /**
     * @param $loanOpsId
     * @return mixed
     */
    public function getLoanOpsStrategyAction($loanOpsId)
    {
        $opsStrategyService = $this->container->get('ops_strategy_service');
        $loanOps = $opsStrategyService->getLoanOpsStrategy($loanOpsId);
        return $loanOps;
    }

    /**
     * @ParamConverter("request", converter="fos_rest.request_body")
     * @param $loanOpsId
     * @param LoanOperationalStrategies $request
     * @return mixed
     */
    public function updateLoanOpsStrategyAction($loanOpsId, LoanOperationalStrategies $request)
    {
        $opsStrategyService = $this->container->get('ops_strategy_service');
        $loanOps = $opsStrategyService->updateLoanOpsStrategy($loanOpsId, $request);
        return $loanOps;
    }


}