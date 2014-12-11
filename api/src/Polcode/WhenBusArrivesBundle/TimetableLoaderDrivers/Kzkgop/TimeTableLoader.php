<?php

namespace Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop;

use Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\ITimetableLoader;
use Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop\CommunitiesLoader;
use Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop\BusStopsLoader;
use Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop\BusLiniesLoader;

/**
 * Description of kzkgopTimeTableLoader
 *
 * @author Damian Kociuba
 */
class TimeTableLoader implements ITimetableLoader {

    private $changeProgressCallable = null;
    private $logger;

    public function __construct($changeProgress = null, $logger = null) {
        //if (is_callable($changeProgress)) {
        $this->changeProgressCallable = $changeProgress;
        //}
        if ($this->changeProgressCallable != null) {
            $this->changeProgressCallable->__invoke(0);
        }
        $this->logger = $logger;
    }

    public function loadToDatabase($em) {
        $communitiesLoader = new CommunitiesLoader();
        $communities = $communitiesLoader->loadAndGetComunnities();
//        $testCommunity = new \Polcode\WhenBusArrivesBundle\Entity\Community();
//        $testCommunity->setUrl('http://rozklady.kzkgop.pl/index.php?co=rozklady&submenu=przystanki&gmina=20');
//        $testCommunity->setName('Dąbrowa Górnicza');
//        $testCommunity2 = new \Polcode\WhenBusArrivesBundle\Entity\Community();
//        $testCommunity2->setUrl('http://rozklady.kzkgop.pl/index.php?co=rozklady&submenu=przystanki&gmina=51');
//        $testCommunity2->setName('Sławków');
//        $communities = array($testCommunity, $testCommunity2);
        $busStopsLoader = new BusStopsLoader();
        $busLineLoader = new BusLiniesLoader();

        $communitySum = count($communities);
        foreach ($communities as $communityNumber => $community) {
            try {
                $em->persist($community);
                $busStops = $busStopsLoader->loadAndGetBusStops($community);

                //$baseCommunity = $em->find('Polcode\WhenBusArrived\Community', $community->getId());
                foreach ($busStops as $oneBusStop) {
                    $community->addBusStop($oneBusStop);
                    try {
                        $lines = $busLineLoader->loadAndGetLinesWithArrivals($oneBusStop);
                    } catch (\RuntimeException $ex) {
                        if ($this->logger == null)
                            throw $ex;
                        $this->logger->error($ex->getMessage());
                        $lines = array();
                    }
                    $em->persist($oneBusStop);
                    $this->persistLinesWithArrivals($em, $lines);
                    //unset($lines);
                }

                if ($this->changeProgressCallable != null) {
                    $this->changeProgressCallable->__invoke(($communityNumber + 1) / $communitySum);
                }
                $em->flush();
                $em->clear();
            } catch (Exception $ex) {
                $this->logger->error($ex->getMessage());
            }
        }
        //$em->flush();
        //$em->clear();
    }

    private function persistLinesWithArrivals($em, $lines) {
        foreach ($lines as $oneLine) {
            $timetables = $oneLine->getTimetables();

            foreach ($timetables as $oneTimetable) {
                $arrivals = $oneTimetable->getArrivals();
                foreach ($arrivals as $oneArrivals) {
                    $em->persist($oneArrivals);
                }

                $em->persist($oneTimetable);
            }
            $em->persist($oneLine);
        }
    }

}
