<?php

namespace Deviab\FabricBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PortfolioController extends Controller
{
    public function indexAction()
    {
        return $this->render('FabricBundle:Portfolio:portfolio.html.twig');
    }
}
