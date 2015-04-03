<?php

namespace Deviab\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/borrower")
 */
class ListingController extends Controller
{

   /**
	* @Route("/search")
	* @Method({"POST"})
	*
	*/
    public function borrowerSearchAction()
    {
    	$requestParams = $this->get('request')->request->all();
    	$borrowers = $this->get('doctrine')
            ->getRepository('DeviabAppBundle:Borrower')
            ->findAll();

    	return new Response(json_encode(array('hello' => 'hi')));

	}

}

