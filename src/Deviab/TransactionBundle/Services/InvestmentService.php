<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 13/09/15
 * Time: 2:28 AM
 */

namespace Deviab\TransactionBundle\Services;

use Deviab\DatabaseBundle\Entity\LenderDetails;
use Deviab\TransactionBundle\Entity\LenderDeviabTransaction;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;
use Deviab\DatabaseBundle\Entity\Project;


class InvestmentService extends BaseService
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
     * @param LenderDeviabTransaction $lenderDeviabTransaction
     * @return LenderDeviabTransaction
     */
    public function captureTransaction($projectId, LenderDeviabTransaction $lenderDeviabTransaction)
    {

        $investedAmount = $lenderDeviabTransaction->getAmount();
        $projectRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:Project');
        $project = $projectRepository->find($projectId);
        $amountRaised = $project->getAmountRaised();
        $currentCapital = $project->getCapitalAmount();

        $project->setAmountRaised($amountRaised + $investedAmount);
        $project->setCapitalAmount($currentCapital + $investedAmount);

        $this->em->persist($project);
        $this->em->persist($lenderDeviabTransaction);
        $this->em->flush();
        $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
        $lender = $lenderRepository->find(1);
        $lenderCurrentStatus = $lender->getCurrentStatus();

        return View::create($lenderCurrentStatus, Codes::HTTP_OK);
    }


}