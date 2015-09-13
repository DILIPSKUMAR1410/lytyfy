<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 13/09/15
 * Time: 2:28 AM
 */

namespace Deviab\TransactionBundle\Services;
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
    public function newTransaction(LenderDeviabTransaction $lenderDeviabTransaction)
    {
        $amountRaised = $lenderDeviabTransaction->getProject()->getAmountRaised();
        $investedAmount = $lenderDeviabTransaction->getAmount();
        $lenderDeviabTransaction->getProject()->setAmountRaised($amountRaised + $investedAmount);
        $currentCapital = $lenderDeviabTransaction->getProject()->getCapitalAmount();
        $lenderDeviabTransaction->getProject()->setCapitalAmount($currentCapital + $investedAmount);

        $this->em->persist($lenderDeviabTransaction);
        $this->em->flush();

        return View::create($lenderDeviabTransaction, Codes::HTTP_OK);
    }


}