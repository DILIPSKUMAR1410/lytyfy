<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 19/09/15
 * Time: 9:56 AM
 */

namespace Deviab\BorrowerBundle\Services;

use Deviab\TransactionBundle\Entity\LenderDeviabTransaction;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;

class ProjectService extends BaseService
{
    /**
     * @param Doctrine $doctrine
     */
    public function __construct( Doctrine $doctrine )
    {
        parent::__construct($doctrine);

        $this->doctrine = $doctrine;
    }

    /**
     * @param $projectId
     * @return View
     */
    public function getProjectStatus( $projectId )
    {
        $projectRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:Project');
        $project = $projectRepository->find($projectId);
        if ($project == null)
            return View::create("project not found", Codes::HTTP_BAD_REQUEST);
        $quantum = $project->getCapitalAmount();
        $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
        $lenders = $lenderRepository->findAll();
        $names = [];
        foreach ($lenders as $lender)
            array_push($names, $lender->getFname());
        $response = array('quantum' => $quantum, 'lenders' => $names);
        return View::create($response, Codes::HTTP_OK);
    }


    /**
     * @param $projectId
     * @return View
     */
    public function getFeaturedProject( $projectId )
    {
        $projectRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:Project');
        $project = $projectRepository->find($projectId);
        if ($project == null)
            return View::create("project not found", Codes::HTTP_BAD_REQUEST);
        $quantum = $project->getCapitalAmount();
        $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
        $backers = count($lenderRepository->findAll());
        $response = array('quantum' => $quantum, 'backers' => $backers);
        return View::create($response, Codes::HTTP_OK);
    }

    public function capturePayUTransaction( Request $request )
    {
        if ($request != null) {
//            $request = $request->getContent();
//            $request = json_decode($request, true);
//            $lenderId = $request['udf1'];
//            $projectId = $request["udf2"];
//            $amount = $request["amount"];
//            $status = $request["status"];
//            $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
//            $lender = $lenderRepository->find($lenderId);
//            $projectRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:project');
//            $project = $projectRepository->find($projectId);
//            $lenderDeviabTransaction = new LenderDeviabTransaction();
//            $lenderDeviabTransaction->setLender($lender);
//            $lenderDeviabTransaction->setStatus($status);
//            if ($status = "failed") ;
//            $lenderDeviabTransaction->setErrorMessage($request["error_message"]);
//            $lenderDeviabTransaction->setProject($project);
//            $lenderDeviabTransaction->setAmount($amount);
//            $lenderDeviabTransaction->setTimestamp(new \DateTime());
//            $lenderDeviabTransaction->setCustomerEmail($request["customerEmail"]);
//            $lenderDeviabTransaction->setCustomerName($request["customerName"]);
//            $lenderDeviabTransaction->setMerchantTransactionId($request["merchantTransactionId"]);
//            $lenderDeviabTransaction->setPaymentId($request["paymentId"]);
//            $lenderDeviabTransaction->setCustomerPhone($request["customerPhone"]);
//            $project->creditCapitalAmount($amount);
//            $lender->getCurrentStatus()->creditPrincipalLeft($amount);
//            $il = $amount * 0.6 / 100;
//            $lender->getCurrentStatus()->creditInterrestLeft($il);
//            $EMR = $this->getEMR($lender->getCurrentStatus());
//            $lender->getCurrentStatus()->setExpectedMonthlyReturn($EMR);
//            $this->em->merge($project);
//            $this->em->merge($lender->getCurrentStatus());
//            $this->em->persist($lenderDeviabTransaction);
//            $this->em->flush();
            return View::create("Transaction captured", Codes::HTTP_OK);
        }
        return View::create("something went wrong dude", Codes::HTTP_BAD_REQUEST);
    }

    public function getEMR( $EntitycurrentStatus )
    {
        $pl = $EntitycurrentStatus->getPricipalLeft();
        $il = $EntitycurrentStatus->getInterestLeft();
        $tl = $EntitycurrentStatus->getTenureLeft();
        $EMR = $pl / $tl + $il;
        return $EMR;
    }

}