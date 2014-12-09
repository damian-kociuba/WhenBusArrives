<?php
namespace Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop;

use Polcode\WhenBusArrivesBundle\Entity\BusStop;
use Polcode\WhenBusArrivesBundle\Entity\Community;

use Goutte\Client;
/**
 * Description of BusStopsLoader
 *
 * @author dkociuba
 */
class BusStopsLoader {
    /**
     * 
     * @param Community $community
     * @return array
     */
    public function loadAndGetBusStops(Community $community) {
        $client = new Client();
        $crawler = $client->request('GET', $community->getUrl());
        $busStops = array();
        $crawler->filter('table#tabelka_lista_przystankow tr td.nazwa a')->each(function ($node) use (&$busStops, $community) {
            $busStop = new BusStop();
            $busStop->setName($node->text());
            $busUrl = 'http://rozklady.kzkgop.pl/'.$node->attr('href');
            $busStop->setUrl($busUrl);
            $busStop->setCommunity($community);
            $busStops[] = $busStop;
        });
        
        return $busStops;
    }
    
    
}
