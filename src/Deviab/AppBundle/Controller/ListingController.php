<?php

namespace Deviab\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use JMS\Serializer\SerializerBuilder;


/**
 * @Route("/borrowers")
 */
class ListingController extends Controller
{

   /**
	* @Route("/search")
	* @Method({"POST"})
	*
	* @return array
	*/
    public function borrowerSearchAction()
    {
    	$requestParams = $this->get('request')->request->all();
    	$borrowers = $this->get('doctrine')
            ->getRepository('DeviabAppBundle:Borrower')
            ->findAll();

        $response = new Response();

        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($borrowers, 'json');

        $response->setContent($jsonContent);
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
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

