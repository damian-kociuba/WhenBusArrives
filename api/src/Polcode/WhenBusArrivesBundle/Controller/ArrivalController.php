<?php

namespace Polcode\WhenBusArrivesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Polcode\WhenBusArrivesBundle\Repository\ArrivalRepository;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of BusStop
 *
 * @author dkociuba
 */
class ArrivalController extends Controller {
    public function getAllAction(Request $request, $busStopId) {
        $entityManager = $this->getDoctrine()->getManager();
        $arrivalRepository = $entityManager->getRepository('PolcodeWhenBusArrivesBundle:Arrival');
        $arrivals = $arrivalRepository->getByBusStopAndTimeTableType($busStopId, 1);
        $format = $request->getRequestFormat();

        return $this->render('PolcodeWhenBusArrivesBundle:Arrival:arrivalList.' . $format . '.twig',
                array('arrivalList' => $arrivals)
                );  
    }
    
    public function getNearestAction(Request $request, $busStopId) {
        $entityManager = $this->getDoctrine()->getManager();
        $arrivalRepository = $entityManager->getRepository('PolcodeWhenBusArrivesBundle:Arrival');
        $arrivals = $arrivalRepository->getNearestByBusStopAndTimeTableType($busStopId, 0,5);
        $format = $request->getRequestFormat();

        return $this->render('PolcodeWhenBusArrivesBundle:Arrival:arrivalList.' . $format . '.twig',
                array('arrivalList' => $arrivals)
                );  
    }
}

