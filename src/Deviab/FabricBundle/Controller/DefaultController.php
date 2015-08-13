<?php

namespace Deviab\FabricBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FabricBundle:Default:index.html.twig', array('name' => $name));
    }
}
