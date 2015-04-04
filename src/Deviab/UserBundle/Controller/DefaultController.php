<?php

namespace Deviab\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DeviabUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
