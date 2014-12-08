<?php

namespace Polcode\WhenBusArrivesBundle\Tests\TimetableLoaderDrivers\Kzkgop;

use Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop\BusStopsLoader;
/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-12-08 at 11:03:15.
 */
class BusStopsLoaderTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var BusStopsLoader
     */
    protected $object;

    /**
     *
     * @var BusStop[] 
     */
    private $busStops;
    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new BusStopsLoader;
        $this->busStops = $this->object->loadAndGetBusStops('http://rozklady.kzkgop.pl/index.php?co=rozklady&submenu=przystanki&gmina=2');
    }

    public function testIfBusStopListIsArray() {
        $this->assertTrue(is_array($this->busStops));
    }
    
    public function testIfBusStopListConsistBusStops() {
        
        $consistedBusStopNames = array('Bieruń Dom Kultury', 'Bieruń Wawelska', 'Bieruń Poczta');
        
        $foundBusStops = array_fill(0, count($consistedBusStopNames), false);

        foreach ($this->busStops as $oneBusStop) {
            foreach ($consistedBusStopNames as $searchedIndex => $oneConsistedBusStop) {
                if ($oneBusStop->getName() === $oneConsistedBusStop) {
                    $foundBusStops[$searchedIndex] = true;
                }
            }
        }

        foreach ($foundBusStops as $index => $value) {
            $this->assertTrue($value, 'Not found community: ' . $consistedBusStopNames[$index]);
        }
    }

}