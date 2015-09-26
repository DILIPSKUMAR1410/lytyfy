<?php

namespace Deviab\LoginBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use Deviab\DatabaseBundle\Entity\LenderDetails;
use Deviab\RepaymentBundle\Entity\LenderCurrentStatus;


class LenderService extends Deviab\BorrowerBundle\Services\BaseService
{
    /**
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        parent::__construct($doctrine);

        $this->doctrine = $doctrine;
    }

    public function addLenderDetail($params = []) {
        $lender = new LenderDetails();
        if (isset($params['fname'])) {
            $lender->setFname($params['fname']);
        }
        if (isset($params['lname'])) {
            $lender->setLname($params['lname']);
        }
        if (isset($params['address'])) {
            $lender->setAddress($params['address']);
        }
        if (isset($params['gender'])) {
            $lender->setGender($params['gender']);
        }
        if (isset($params['dob'])) {
            $lender->setDob($params['dob']);
        }
        if (isset($params['primary_mobile_number'])) {
            $lender->setPrimaryMobileNumber($params['primary_mobile_number']);
        }
        if (isset($params['profile_pic'])) {
            $lender->setProfilePic($params['profile_pic']);
        }
        if (isset($params['google_id'])) {
            $lender->setGoogleId($params['google_id']);
        }
        if (isset($params['facebook_id'])) {
            $lender->setFacebookId($params['facebook_id']);
        }

        $lenderCurrentStatus = new LenderCurrentStatus();
        $lenderCurrentStatus->setLender($lender);

        $lenderWallet = new LenderWallet();
        $lenderWallet->setLender($lender);

        $this->em->persist($lender);
        $this->em->flush();

        return $lender;
    }
}
