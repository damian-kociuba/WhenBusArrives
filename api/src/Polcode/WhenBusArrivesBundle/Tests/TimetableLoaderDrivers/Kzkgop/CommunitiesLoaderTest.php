<?php

namespace Polcode\WhenBusArrivesBundle\Tests\TimetableLoaderDrivers\Kzkgop;

use Polcode\WhenBusArrivesBundle\TimetableLoaderDrivers\Kzkgop\CommunitiesLoader;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2014-12-08 at 11:06:04.
 */
class CommunitiesLoaderTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var CommunitiesLoader
     */
    protected $object;

    /**
     *
     * @var Community[]
     */
    private $communitiesList;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() {
        $this->object = new CommunitiesLoader;
        $this->communitiesList = $this->object->loadAndGetComunnities();
    }

    public function testIfCommunitiesListIsArray() {
        $this->assertTrue(is_array($this->communitiesList));
    }

    public function testIfCommunitiesListConsistCommunities() {
        $consistedCommunitiesNames = array('Będzin', 'Katowice', 'Orzesze', 'Zbrosławice');

        $foundCommunity = array_fill(0, count($consistedCommunitiesNames), false);
        
        foreach ($this->communitiesList as $oneCommunity) {
            foreach ($consistedCommunitiesNames as $searchedIndex => $oneConsistedCommunity) {
                if ($oneCommunity->getName() === $oneConsistedCommunity) {
                    $foundCommunity[$searchedIndex] = true;
                }
            }
        }

        foreach ($foundCommunity as $index => $value) {
            $this->assertTrue($value, 'Not found community: ' . $consistedCommunitiesNames[$index]);
        }
    }

}
