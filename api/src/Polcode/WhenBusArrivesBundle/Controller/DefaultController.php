<?php

namespace Polcode\WhenBusArrivesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop\TimeTableLoader;

class DefaultController extends Controller {

    public function indexAction($name) {
        $logger = $this->get('logger');
        $logger->info('I just got the logger');
        $logger->error('An error occurred');
        $em = $this->getDoctrine()->getManager();

        $loader = new TimeTableLoader(function($percent) {
            echo ($percent * 100 . '%');
        }, $logger);
        //$loader->loadToDatabase($em);
        return $this->render('PolcodeWhenBusArrivesBundle:Default:index.html.twig', array('name' => $name));
    }

}
