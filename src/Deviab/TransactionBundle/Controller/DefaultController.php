<?php

namespace Deviab\TransactionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DeviabTransactionBundle:Default:index.html.twig', array('name' => $name));
    }
}
