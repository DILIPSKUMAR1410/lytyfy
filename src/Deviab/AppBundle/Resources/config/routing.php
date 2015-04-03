 <?php

 use Symfony\Component\Routing\RouteCollection;
 use Symfony\Component\Routing\Route;

 $collection = new RouteCollection();

 $collection->add('deviab_app_homepage', new Route('/', array(
     '_controller' => 'DeviabAppBundle:Default:index',
 )));

 return $collection;