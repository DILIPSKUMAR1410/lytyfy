<?php

namespace Deviab\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
     *@Route("/")
    *
    */
class SignupController extends Controller
{

/**
 * @Route("/Test", name="Test")
 */
 public function TestAction()
 {


	$name = "dilip";	

	return $this->render('DeviabUserBundle:Signup:index.html.twig', array('name' => $name));
 }



}

