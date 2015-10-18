<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 10/10/15
 * Time: 11:16 AM
 */

namespace Deviab\TransactionBundle\Controller;

use Deviab\LoginBundle\Entity\User;
use Deviab\TransactionBundle\Entity\LenderDeviabTransaction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;


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
            $txnid = uniqid($user->getEmail());
            $lenderId = $lender->getId();
            $projectId = 1;
            $data = "vz70Zb" . "|" . $txnid . "|" . $amount . "|" . "DhamdhaPilot" . "|" . $firstname . "|" . $email . "|" . $lenderId . "|" . $projectId . "|||||||||" . "k1wOOh0b";
            $hash = hash('sha512', $data);
            $host = $this->get('router')->getContext()->getHost();

            $url = "https://secure.payu.in/_payment";
            $fields = array(
                'key' => "vz70Zb",
                'firstname' => $firstname,
                'email' => $email,
                'phone' => $phone,
                'productinfo' => "DhamdhaPilot",
                'txnid' => $txnid,
                'amount' => $amount,
                'udf1' => $lenderId,
                'udf2' => $projectId,
                'surl' => $host . "/transaction/post/succes",
                'furl' => $host . "/transaction/post/failure ",
                'curl' => $host . "/transaction/post/cancel",
                'hash' => $hash,
                'service_provider' => "payu_paisa"
            );
            if (!$amount) {
                $err = 'Amount Required';
            } else if (!$firstname) {
                $err = 'FirstName Required';
            } else if (!$email) {
                $err = 'Email Required';
            } else if (!$phone) {
                $err = 'Phone Required';
            } else {
                return View::create($fields, Codes::HTTP_OK);
            }

            return View::create(array('error' => $err), Codes::HTTP_BAD_REQUEST);


        }

    }


    public function payuSuccessWebhookAction(Request $request)
    {
        $investmentService = $this->container->get('investment_service');
        $response = $investmentService->capturePayUTransaction($request);
        return $response;
    }
}