<?php

namespace Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop;

use Polcode\WhenBusArrivesBundle\Entity\BusStop;
use Polcode\WhenBusArrivesBundle\Entity\BusLine;
use Polcode\WhenBusArrivesBundle\Entity\Timetable;
use Polcode\WhenBusArrivesBundle\Entity\Arrival;
use Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop\TranslateToTimetableType;
use Goutte\Client;

/**
 * Description of BusLiniesLoader
 *
 * @author dkociuba
 */
class BusLiniesLoader {

    /**
     * @todo split into smaller functions
     * @param BusStop $busStop
     * @return BusLine
     * @throws \Exception
     */
    public function loadAndGetLinesWithArrivals(BusStop $busStop) {
        $client = new Client();
        $crawler = $client->request('GET', $busStop->getUrl());

        $form = $crawler->selectButton('pokaż rozkłady wybranych linii')->form();
        //var_dump($form->html());
        $timetableCrawler = $client->submit($form);

        $headers = $timetableCrawler->filter('div#rozklad_tabela div#tabliczka_topinfo');
        $contents = $timetableCrawler->filter('div#rozklad_tabela div#div_rozklad_tabliczka');

        if ($headers->count() !== $contents->count()) {
            throw new \Exception('Amount of headers and contents in timetable is diffrent');
        }

        $amountOfLines = $headers->count();

        $busLinesToReturn = array();

        for ($i = 0; $i < $amountOfLines; $i++) {
            $lineName = $headers->eq($i)->filter('a#nr_lini_rozklad')->text();
            $lineDirectionDirty = $headers->eq($i)->filter('h3')->text();
            preg_match('/^Kierunek: (.*)/D', $lineDirectionDirty, $matches);
            $lineDirection = $matches[1];

            $busLine = new BusLine();
            $busLine->setName($lineName);
            $busLine->setDirection($lineDirection);


            $timetableKinds = $contents->eq($i)->filter('th');
            $arrivalsDom = $contents->eq($i)->filter('td');

            $amountOfTimetabeKinds = $timetableKinds->count();
            for ($j = 0; $j < $amountOfTimetabeKinds; $j++) {
                $timetable = new Timetable();
                $timetable->setType(TranslateToTimetableType::fromString($timetableKinds->eq($j)->text()));
                $timetable->setBusStop($busStop);
                $timetable->setBusLine($busLine);

                $arrivalsDom->eq($j)->filter('span#blok_godzina')->each(function($node) use(&$timetable) {
                    $hours = $node->filter('b')->text();
                    $minutes = $node->filterXPath('//sup/text()')->text();
                    $time = $hours . ':' . $minutes;
                    
                    $arrival = new Arrival();
                    $arrival->setTime($time);
                    $timetable->addArrival($arrival);
                });
                $busLine->addTimetable($timetable);
            }

            $busLinesToReturn[] = $busLine;
        }

        return $busLinesToReturn;
    }

}
