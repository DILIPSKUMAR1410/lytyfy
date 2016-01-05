<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 17/09/15
 * Time: 4:47 PM
 */

namespace Deviab\TransactionBundle\Services;

use Deviab\TransactionBundle\Entity\DeviabBorrowerTransaction;
use Deviab\TransactionBundle\Entity\DeviabLenderTransaction;
use Deviab\TransactionBundle\Entity\LenderDeviabTransaction;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Doctrine\ORM\Query\ResultSetMapping;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;
use Deviab\BorrowerBundle\Services\BaseService;
use Symfony\Component\HttpFoundation\Request;

class InvestmentService extends BaseService
{
    /**
     * @param Doctrine $doctrine
     */
    public function __construct( Doctrine $doctrine )
    {
        parent::__construct($doctrine);

        $this->doctrine = $doctrine;
    }

    public function getLenderInvestment( $lenderId )
    {
        $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
        $lender = $lenderRepository->find($lenderId);
        if ($lender != null) {
            $expectedMonthlyReturn = $lender->getCurrentStatus()->getExpectedMonthlyReturn();
            $lenderWalletBalance = $lender->getWallet()->getCredits();
            $lenderInvestments = $lender->getFromLenderTransactions();
            $lenderReturns = $lender->getToLenderTransactions();
            $principalRepayment = 4500;
            $interestRepayment = 2500;
            $amountWithdrawn = 1300;
            $totalInvestment = 0;
            foreach ($lenderInvestments as $transaction) {
                $totalInvestment = $totalInvestment + $transaction->getAmount();
            }
            $totalReturns = 0;
            foreach ($lenderReturns as $return) {
                $totalReturns = $totalReturns + $return->getAmount();
            }
            $response = array('lenderWalletBalance' => $lenderWalletBalance, 'totalInvestment' => $totalInvestment, 'totalReturns' => $totalReturns, 'expectedMonthlyReturn' => $expectedMonthlyReturn, 'principalRepayment' => $principalRepayment, 'interestRepayment' => $interestRepayment, 'amountWithdrawn' => $amountWithdrawn);
            return View::create($response, Codes::HTTP_OK);
        }
        return View::create("lender not found", Codes::HTTP_BAD_REQUEST);
    }

    public function capturePayUTransaction( Request $request )
    {
        if ($request != null) {

            $lenderId = $request->get("udf1");
            $projectId = $request->get("udf2");
            $amount = $request->get("amount");
            $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
            $lender = $lenderRepository->find($lenderId);
            $projectRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:project');
            $project = $projectRepository->find($projectId);
            $lenderDeviabTransaction = new LenderDeviabTransaction();
            $lenderDeviabTransaction->setLender($lender);
            $lenderDeviabTransaction->setProject($project);
            $lenderDeviabTransaction->setAmount($amount);
            $lenderDeviabTransaction->setTimestamp(new \DateTime($request->get("timestamp")));
            $lenderDeviabTransaction->setCustomerEmail($request->get("customerEmail"));
            $lenderDeviabTransaction->setCustomerName($request->get("customerName"));
            $lenderDeviabTransaction->setMerchantTransactionId($request->get("merchantTransactionId"));
            $lenderDeviabTransaction->setPaymentId($request->get("paymentId"));
            $lenderDeviabTransaction->setCustomerPhone($request->get("customerPhone"));
            $project->creditCapitalAmount($amount);
            $lender->getCurrentStatus()->creditPrincipalLeft($amount);
            $il = $amount * 0.6 / 100;
            $lender->getCurrentStatus()->creditInterrestLeft($il);
            $EMR = $this->getEMR($lender->getCurrentStatus());
            $lender->getCurrentStatus()->setExpectedMonthlyReturn($EMR);
            $this->em->merge($project);
            $this->em->merge($lender->getCurrentStatus());
            $this->em->persist($lenderDeviabTransaction);
            $this->em->flush();
            return View::create("Transaction captured", Codes::HTTP_OK);
        }
        return View::create("something went wrong dude", Codes::HTTP_BAD_REQUEST);
    }

    public function getEMR( $EntitycurrentStatus )
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
    public function getWalletSummary( $lenderId )
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

    public function walletWithdrawl( User $user )
    {
        $lender = $user->getlender();
        $transaction = new DeviabLenderTransaction();
        $transaction->setLender($lender);

        $dateTime = date("Y-m-d H:i:s");
        $transaction->setTimestamp($dateTime);
        $txnid = uniqid($user->getEmail());
        $lenderId = $lender->getId();
        $balance = $lender->getWallet()->getCredits();
        $status = "under process";
        $remarks = "credited in your account";
        if ($balance >= 2000) {
            $rsm = new ResultSetMapping();

            $query = $this->em->createNativeQuery('INSERT INTO deviab_lender_transactions SET lender_id = ? ,transactionId = ?,project_id = ?,status = ?,remarks = ?', $rsm);
            $query->setParameter(1, $lenderId);
            $query->setParameter(2, $txnid);
            $query->setParameter(3, $balance);
            $query->setParameter(4, 1);
            $query->setParameter(5, $status);
            $query->setParameter(6, $remarks);
            $query->setParameter(7, $dateTime);

            $result = $query->_doExecute();
            $update_query = $this->em->createNativeQuery('UPDATE lender_wallet SET credits = ? where lender_id = ?', $rsm);
            $update_query->setParameter(1, 0);
            $update_query->setParameter(2, $lenderId);

            $update_result = $update_query->_doExecute();

            return View::create("ok", Codes::HTTP_OK);
        } else {
            return View::create("you don't have enough money in your wallet", Codes::HTTP_BAD_REQUEST);
        }
    }

}


