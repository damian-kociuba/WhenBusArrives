<?php
namespace Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop;

use Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\ITimetableLoader;
/**
 * Description of kzkgopTimeTableLoader
 *
 * @author Damian Kociuba
 */
class TimeTableLoader implements ITimetableLoader {
    public function loadToDatabase($doctrine) {
        $crawler = new \Symfony\Component\BrowserKit\Request('http://www.onet.pl', 'GET');
        var_dump($crawler->getContent());
    }
}
