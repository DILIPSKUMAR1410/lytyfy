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
            $lenderDeviabTransaction->getProject()->creditCapitalRaised($lenderDeviabTransaction->getAmount());
            $lenderDeviabTransaction->getLender()->getCurrentStatus()->creditPrincipalLeft($lenderDeviabTransaction->getAmount());
            $il = $lenderDeviabTransaction->getAmount() * 0.6 / 100;
            $lenderDeviabTransaction->getLender()->getCurrentStatus()->creditInterrestLeft($il);
            $EMR = $this->getEMR($lenderDeviabTransaction->getLender()->getCurrentStatus());
            $lenderDeviabTransaction->getLender()->getCurrentStatus()->setExpectedMonthlyReturn($EMR);
            $this->em->persist($lenderDeviabTransaction->getProject());
            $this->em->persist($lenderDeviabTransaction->getLender()->getCurrentStatus());
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

}