<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 17/09/15
 * Time: 4:47 PM
 */

namespace Deviab\TransactionBundle\Services;

use Deviab\TransactionBundle\Entity\DeviabBorrowerTransaction;
use Deviab\TransactionBundle\Entity\LenderDeviabTransaction;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;
use Deviab\BorrowerBundle\Services\BaseService;

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

    public function getLenderInvestment($lenderId)
    {
        $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
        $lender = $lenderRepository->find($lenderId);
        if ($lender != null) {
            $expectedMonthlyReturn = $lender->getCurrentStatus()->getExpectedMonthlyReturn();
            $lenderWalletBalance = $lender->getWallet()->getCredits();
            $lenderInvestments = $lender->getFromLenderTransactions();
            $lenderReturns = $lender->getToLenderTransactions();

            $totalInvestment = 0;
            foreach ($lenderInvestments as $transaction) {
                $totalInvestment = $totalInvestment + $transaction->getAmount();
            }
            $totalReturns = 0;
            foreach ($lenderReturns as $return) {
                $totalReturns = $totalReturns + $return->getAmount();
            }
            $response = array('lenderWalletBalance' => $lenderWalletBalance, 'totalInvestment' => $totalInvestment, 'totalReturns' => $totalReturns, 'expectedMonthlyReturn' => $expectedMonthlyReturn);
            return View::create($response, Codes::HTTP_OK);
        }
        return View::create("lender not found", Codes::HTTP_BAD_REQUEST);
    }

    /**
     * Lot to work on the logic and post parameter coming from pay u
     * @param LenderDeviabTransaction $lenderDeviabTransaction
     * @return View
     */
    public function capturePayUTransaction(LenderDeviabTransaction $lenderDeviabTransaction)
    {
        if ($lenderDeviabTransaction != null) {

            $lenderId = $lenderDeviabTransaction->getUdf1();
            $projectId = $lenderDeviabTransaction->getUdf2();
            $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
            $lender = $lenderRepository->find($lenderId);
            $projectRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:project');
            $project = $projectRepository->find($projectId);
            $lenderDeviabTransaction->setLender($lender);
            $lenderDeviabTransaction->setProject($project);
            $lenderDeviabTransaction->getProject()->creditCapitalRaised($lenderDeviabTransaction->getAmount());
            $lenderDeviabTransaction->getLender()->getCurrentStatus()->creditPrincipalLeft($lenderDeviabTransaction->getAmount());
            $il = $lenderDeviabTransaction->getAmount() * 0.6 / 100;
            $lenderDeviabTransaction->getLender()->getCurrentStatus()->creditInterrestLeft($il);
            $EMR = $this->getEMR($lenderDeviabTransaction->getLender()->getCurrentStatus());
            $lenderDeviabTransaction->getLender()->getCurrentStatus()->setExpectedMonthlyReturn($EMR);
            $this->em->merge($lenderDeviabTransaction->getProject());
            $this->em->merge($lenderDeviabTransaction->getLender()->getCurrentStatus());
            $this->em->persist($lenderDeviabTransaction);
            $this->em->flush();
            return View::create("Transaction captured", Codes::HTTP_OK);
        }
        return View::create("something went wrong dude", Codes::HTTP_BAD_REQUEST);
    }

    public function getEMR($EntitycurrentStatus)
    {
        $pl = $EntitycurrentStatus->getPricipalLeft();
        $il = $EntitycurrentStatus->getInterestLeft();
        $tl = $EntitycurrentStatus->getTenureLeft();
        $EMR = $pl / $tl + ($pl * 2 / 100) + $il;
        return $EMR;
    }

    /**
     * @param $lenderId
     * @return View
     */
    public function getWalletSummary($lenderId)
    {
        $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
        $lender = $lenderRepository->find($lenderId);
        if ($lender != null) {
            $dlt = $lender->getToLenderTransactions();
            $ldt = $lender->getFromLenderTransactions();
            $response = array('dlt' => $dlt, 'ldt' => $ldt);
            return View::create($response, Codes::HTTP_OK);
        }
        return View::create("Transaction not found", Codes::HTTP_BAD_REQUEST);


    }


}