<?php

namespace Polcode\WhenBusArrivesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PolcodeWhenBusArrivesBundle:Default:index.html.twig', array('name' => $name));
    }
}
