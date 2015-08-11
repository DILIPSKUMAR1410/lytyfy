<?php

namespace Deviab\BorrowerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DeviabBorrowerBundle:Default:index.html.twig', array('name' => $name));
    }
}
