<?php

namespace Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop;

use Polcode\WhenBusArrivesBundle\Entity\Community;
use Goutte\Client;

/**
 * Description of CommunitiesLoader
 *
 * @author dkociuba
 */
class CommunitiesLoader {

    /**
     * @return Community[]
     */
    public function loadAndGetComunnities() {
        $client = new Client();
        $crawler = $client->request('GET', 'http://rozklady.kzkgop.pl/index.php?co=rozklady&submenu=przystanki');
        $communities = array();
        $crawler->filter('table.tabelka_gmin tr td:first-child a')->each(function ($node) use (&$communities) {
            $community = new Community();
            $community->setName($node->text());
            $community->setUrl($node->attr('href'));
            $communities[] = $community;
        });
        
        return $communities;
    }

}
