<?php

namespace Polcode\WhenBusArrivesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Polcode\WhenBusArrivesBundle\Repository\BusStopRepository;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of BusStop
 *
 * @author dkociuba
 */
class BusStopController extends Controller {
    public function getAllAction(Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $busStopsRepository = $entityManager->getRepository('PolcodeWhenBusArrivesBundle:BusStop');
        $busStopList = $busStopsRepository->findAll();
        $format = $request->getRequestFormat();
        
        return $this->render('PolcodeWhenBusArrivesBundle:BusStop:busStopList.' . $format . '.twig',
                array('busStopList' => $busStopList)
                );  
    }
}