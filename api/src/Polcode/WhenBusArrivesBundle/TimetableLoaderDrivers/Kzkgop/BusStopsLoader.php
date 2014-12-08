<?php
namespace Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop;

use Polcode\WhenBusArrivesBundle\Entity\BusStop;
use Goutte\Client;
/**
 * Description of BusStopsLoader
 *
 * @author dkociuba
 */
class BusStopsLoader {
    /**
     * 
     * @param string $sourceUrl
     * @return BusStop[] 
     */
    public function loadAndGetBusStops($sourceUrl) {
        $client = new Client();
        $crawler = $client->request('GET', $sourceUrl);
        $busStops = array();
        $crawler->filter('table#tabelka_lista_przystankow tr td.nazwa a')->each(function ($node) use (&$busStops) {
            $busStop = new BusStop();
            $busStop->setName($node->text());
            $busUrl = 'http://rozklady.kzkgop.pl/'.$node->attr('href');
            $busStop->setUrl($busUrl);
            $busStops[] = $busStop;
        });
        
        return $busStops;
    }
    
    
}
