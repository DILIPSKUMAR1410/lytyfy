<?php

namespace Deviab\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/borrowers")
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

        return $this->render('DeviabAppBundle:Borrower:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
	}

   /**
	* @Route("/listing")
	* @Method({"GET"})
	*/
	public function borrowerListingAction()
	{
		return $this->render('DeviabAppBundle:Listings:listings.html.twig', array());
	}

}

