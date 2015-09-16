<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 13/09/15
 * Time: 2:28 AM
 */

namespace Deviab\RepaymentBundle\Services;


use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;


class InvestmentReturnsService extends BaseService

{
    /**
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        parent::__construct($doctrine);

        $this->doctrine = $doctrine;
    }


    public function calculateEMRByLenderId($lenderId)
    {
        $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
        $lender = $lenderRepository->find(1);
        $lenderCurrentStatus = $lender->getCurrentStatus();

        return View::create($lenderCurrentStatus, Codes::HTTP_OK);

    }


}