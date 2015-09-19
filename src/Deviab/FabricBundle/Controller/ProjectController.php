<?php

namespace Deviab\FabricBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectController extends Controller
{
    public function projectAction()
    {
        return $this->render('FabricBundle:Project:project.html.twig');
    }
}
