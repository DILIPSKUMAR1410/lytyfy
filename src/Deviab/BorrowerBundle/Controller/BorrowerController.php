<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 01/08/15
 * Time: 9:52 PM
 */

namespace Deviab\BorrowerBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;



class BorrowerController extends Controller

{
    /**
     * @return JsonResponse
     */

    public function getBorrowersAction(){
    $borrowers =$this->getDoctrine()->getRepository('DeviabDatabaseBundle:BorrowerDetails')
            ->find(1);
       return new JsonResponse($borrowers);
    }

}