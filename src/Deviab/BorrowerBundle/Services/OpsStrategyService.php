<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 30/08/15
 * Time: 1:50 AM
 */

namespace Deviab\BorrowerBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;
use Deviab\DatabaseBundle\Entity\LoanOperationalStrategies;


class OpsStrategyService extends BaseService
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
     * @param $loanOpsId
     * @return View
     */
    public function getLoanOpsStrategy($loanOpsId)
    {
        $loanOpsRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:LoanOperationalStrategies');
        $loanOps = $loanOpsRepositry->find($loanOpsId);
        if ($loanOps == null) {
            return View::create("loan operational strategy not found", Codes::HTTP_BAD_REQUEST);
        }
        return View::create($loanOps, Codes::HTTP_OK);
    }

    /**
     * @param LoanOperationalStrategies $loanOperationalStrategies
     * @return View
     */
    public function newLoanOpsStrategy(LoanOperationalStrategies $loanOperationalStrategies)
    {
        $loanOpsRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:LoanOperationalStrategies');
        $loanOpsStrategy = $loanOpsRepositry->findOneBy(array('principalAmount' => $loanOperationalStrategies->getPrincipalAmount(),
            'tenure' => $loanOperationalStrategies->getTenure(),
            'rateOfInterrest' => $loanOperationalStrategies->getRateOfInterrest(),
            'campaignDate' => $loanOperationalStrategies->getCampaignDate()));
        if ($loanOpsStrategy == null) {
            $this->em->persist($loanOperationalStrategies);
            $this->em->flush();
            return View::create($loanOperationalStrategies, Codes::HTTP_OK);
        }
        return View::create("Loan Operational strategy not found", Codes::HTTP_BAD_REQUEST);
    }

    /**
     * @param LoanOperationalStrategies $loanOpsId
     * @return View
     */
    public function updateLoanOpsStrategy($loanOpsId, LoanOperationalStrategies $loanOperationalStrategies)
    {
        $loanOpsRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:LoanOperationalStrategies');
        $loanOps = $loanOpsRepositry->find($loanOpsId);
        if ($loanOps == null) {
            return View::create("loan operational strategy not found", Codes::HTTP_BAD_REQUEST);
        }
        $this->em->merge($loanOperationalStrategies);
        $this->em->flush();
        return View::create($loanOperationalStrategies, Codes::HTTP_OK);
    }


}