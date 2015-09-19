<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 19/09/15
 * Time: 1:08 AM
 */

namespace Deviab\RepaymentBundle\Services;

use Deviab\TransactionBundle\Entity\BorrowerDeviabTransaction;
use Deviab\TransactionBundle\Entity\DeviabBorrowerTransaction;
use Deviab\TransactionBundle\Entity\DeviabLenderTransaction;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;
use Deviab\BorrowerBundle\Services\BaseService;

class RepaymentService extends BaseService
{
    /**
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        parent::__construct($doctrine);

        $this->doctrine = $doctrine;
    }

    public function borrowerRepayment(BorrowerDeviabTransaction $borrowerDeviabTransaction)
    {
        if ($borrowerDeviabTransaction != null) {
            $borrowerDeviabTransaction->getBorrower()->getProject()->creditCapitalRaised($borrowerDeviabTransaction->getAmount());
            $borrowerDeviabTransaction->getBorrower()->getCurrentStatus()->decrementTenure();
            $amountRecieved = $borrowerDeviabTransaction->getAmount();
            $pl = $borrowerDeviabTransaction->getBorrower()->getCurrentStatus()->getPricipalLeft();
            $il = $borrowerDeviabTransaction->getBorrower()->getCurrentStatus()->getInterestLeft();
            if ($amountRecieved <= $il) {
                $il = $il - $amountRecieved;
                $borrowerDeviabTransaction->getBorrower()->getCurrentStatus()->setInterestLeft($il);
            } else {
                $borrowerDeviabTransaction->getBorrower()->getCurrentStatus()->setInterestLeft(0);
                $pl = $pl - $amountRecieved + $il;
                $borrowerDeviabTransaction->getBorrower()->getCurrentStatus()->setPricipalLeft($pl);
            }

            $EMR = $this->getEMR($borrowerDeviabTransaction->getBorrower()->getCurrentStatus());
            $borrowerDeviabTransaction->getBorrower()->getCurrentStatus()->setExpectedMonthlyReturn($EMR);
            $this->em->merge($borrowerDeviabTransaction->getBorrower()->getCurrentStatus());
            $this->em->persist($borrowerDeviabTransaction);
            $this->em->flush();
            return View::create("Repayment received and Borrower Current Status updated", Codes::HTTP_OK);
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

    public function lenderRepayment($projectId)
    {

        $projectRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:Project');
        $project = $projectRepository->find($projectId);
        if ($project == null)
            return View::create("project not found", Codes::HTTP_BAD_REQUEST);
        $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
        $lenders = $lenderRepository->findAll();
        $TMR = $project->getCapitalAmount();
        $totalEMR = 0;
        foreach ($lenders as $lender) {
            $totalEMR += $lender->getCurrentStatus()->getExpectedMonthlyReturn();
        }
        foreach ($lenders as $lender) {
            $EMR = $lender->getCurrentStatus()->getExpectedMonthlyReturn();
            $AMR = $EMR * $TMR / $totalEMR;
            $project->debitCapitalRaised($AMR);
            $this->em->merge($project);
            $lender->getWallet()->credit($AMR);
            $this->em->merge($lender->getWallet());
            $pl = $lender->getCurrentStatus()->getPricipalLeft();
            $il = $lender->getCurrentStatus()->getInterestLeft();
            if ($AMR <= $il) {
                $il = $il - $AMR;
                $lender->getCurrentStatus()->setInterestLeft($il);
            } else {
                $lender->getCurrentStatus()->setInterestLeft(0);
                $pl = $pl - $AMR + $il;
                $lender->getCurrentStatus()->setPricipalLeft($pl);
            }
            $EMR = $this->getEMR($lender->getCurrentStatus());
            $lender->getCurrentStatus()->setExpectedMonthlyReturn($EMR);
            $this->em->merge($lender->getCurrentStatus());
            $this->em->merge($lender);
        }
        $this->em->flush();
        return View::create("Repaid AMR  and Lender Current Status updated", Codes::HTTP_OK);

    }


}