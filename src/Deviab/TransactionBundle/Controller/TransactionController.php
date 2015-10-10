<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 10/10/15
 * Time: 11:16 AM
 */

namespace Deviab\TransactionBundle\Controller;

use Deviab\LoginBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;


class TransactionController extends Controller
{
    public function transactionAction()
    {
        $token = $this->get('security.context')->getToken();
        $user = $token->getUser();
        $amount = $this->getRequest()->query->get('amount');
        if ($user instanceof User) {
            $lender = $user->getLender();
            $email = $user->getEmail();
            $firstname = $lender->getFname();
            $phone = $lender->getPrimaryMobileNumber();
            $txnid = uniqid($lender->getId());
            $data = "vz70Zb|" . $txnid . "|" . $amount . "|DhamdhaPilot|" . $firstname . "|" . $email . "|||||||||||k1wOOh0b";
            $hash = hash('sha512', $data);
            $url = "https://secure.payu.in/_payment";
            $fields = array(
                'key' => "vz70Zb",
                'firstname' => $firstname,
                'email' => $email,
                'phone' => $phone,
                'productinfo' => "DhamdhaPilot",
                'txnid' => $txnid,
                'amount' => $amount,
                'surl' => "/transaction/post/succes",
                'furl' => "/transaction/post/failure ",
                'curl' => "/transaction/post/cancel",
                'hash' => $hash,
                'service_provider' => "payu_paisa"
            );
            if ($firstname && $email && $phone && $amount && $hash)
                return View::create($fields, Codes::HTTP_OK);
            else
                return View::create("insufficient data", Codes::HTTP_OK);


        }

    }
}