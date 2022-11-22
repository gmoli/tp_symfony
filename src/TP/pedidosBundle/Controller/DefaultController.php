<?php

namespace TP\pedidosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TPpedidosBundle:Default:index.html.twig', array('name' => $name));
    }
}
