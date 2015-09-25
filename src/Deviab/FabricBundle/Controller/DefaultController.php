<?php

namespace Deviab\FabricBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Deviab\LoginBundle\Entity\User;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $token = $this->get('security.context')->getToken();
        $user = $token->getUser();
        if ($user instanceof User) {
            $username = $user->getUsername();
            $email = $user->getEmail();
            return $this->render('FabricBundle:Default:index.html.twig', array('username' => $username));
        }
        return $this->render('FabricBundle:Default:index.html.twig');
    }
}

