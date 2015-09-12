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


class LenderInvestmentService extends BaseService
{
    /**
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        parent::__construct($doctrine);

        $this->doctrine = $doctrine;
    }

    public function newTransaction(LenderDeviabTransaction $lenderDeviabTransaction)
    {

            $this->em->persist($lenderDeviabTransaction);
            $this->em->flush();

            $lenderDeviabTransaction->getProject()->getAmountRaised()+$lenderDeviabTransaction->getAmount();
            return $lenderDeviabTransaction;
    }

}