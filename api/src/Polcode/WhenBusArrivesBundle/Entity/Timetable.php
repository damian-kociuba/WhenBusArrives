<?php

namespace Polcode\WhenBusArrivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timetable
 */
class Timetable
{
    const WORK_DAY_TYPE = 0;
    const SATURDAY_TYPE = 1;
    const SUNDAY_TYPE = 2;
    const SCHOOL_WORK_DAY_TYPE = 3;
    const HOLIDAYS_WORK_DAY_TYPE = 4;
    const FREE_DAY_TYPE = 5;
    const NEW_YEARS_EVE_TYPE = 6;
    const EVE_TYPE = 7;
    const ALL_SAINTS_DAY_TYPE = 8;
    const SUNDAY_AND_HOLY_DAYS_TYPE = 9;
    const SCHOOL_WORK_DAY_WITH_WINDER_HOLIDAYS_DAY_TYPE = 10;
    const WORK_DAY_IN_SUMMER_HOLIDAYS_TYPE = 11;
    const DECEMBER_25_AND_EASTER_SUNDAY_TYPE = 12;
    const CHRISTMAS_DWO_DAYS_AND_NEW_YEAR_DAY_AND_EASTER_TWO_DAYS_TYPE = 13;
    const DECEMBER_25_AND_EASTER_SUNDAY_AND_NEW_YEAR_TYPE = 14;
    const FREE_DAYS_IN_SHOPPING_CENTERS_TYPE = 15;
    const SUNDAYS_AND_HOLY_DAYS_WITHOUT_FREE_DAYS_IN_SHOPPING_CENTERS_TYPE = 16;
    const FREE_DAYS_WITHOUT_FREE_DAYS_IN_SHOPPING_CENTERS_TYPE = 17;
    const EVERY_DAY_TYPE = 18;
    const SATURDAYS_EXCEPT_SUMMER_HOLIDAYS_TYPE = 19;
    const SATURDAYS_IN_SUMMER_HOLIDAYS_TYPE = 20;
    const SUNDAY_AND_HOLY_DAYS_EXCEPT_SUMMER_HOLIDAYS_TYPE = 21;
    const SUNDAY_AND_HOLY_DAYS_IN_SUMMER_HOLIDAYS_TYPE = 22;
    const SUNDAY_SPECIAL_TYPE = 23;
    const TIME_CHANGE_DAY_TYPE = 24;
    const NIGHT_BETWEEN_FRIDAY_AND_SATURDAY_TYPE = 25;
    const NIGHT_BETWEEN_SATURDAY_AND_SUNDAY_OR_SUNDAY_MONDAY_TYPE = 26;
    const SUNDAYS_IN_SUMMER_HOLIDAYS_TYPE = 27;
    const NIGHT_BETWEEN_SATURDAY_AND_SUNDAY_TYPE = 28;
    const MONDAY_TYPE = 29;
    const TUESDAY_TYPE = 30;
    const WEDNESDAY_TYPE = 31;
    const THURSDAY_TYPE = 32;
    const FRIDAY_TYPE = 33;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \Polcode\WhenBusArrivesBundle\Entity\BusStop
     */
    private $busStops;


    /**
     * Set type
     *
     * @param string $type
     * @return Timetable
     */
    public function setType($type)
    {
        if($type != self::WORK_DAY_TYPE && 
                $type != self::SATURDAY_TYPE &&
                $type != self::SUNDAY_TYPE &&
                $type != self::SCHOOL_WORK_DAY_TYPE &&
                $type != self::HOLIDAYS_WORK_DAY_TYPE &&
                $type != self::FREE_DAY_TYPE &&
                $type != self::EVE_TYPE &&
                $type != self::NEW_YEARS_EVE_TYPE &&
                $type != self::ALL_SAINTS_DAY_TYPE &&
                $type != self::SUNDAY_AND_HOLY_DAYS_TYPE &&
                $type != self::SCHOOL_WORK_DAY_WITH_WINDER_HOLIDAYS_DAY_TYPE &&
                $type != self::WORK_DAY_IN_SUMMER_HOLIDAYS_TYPE &&
                $type != self::DECEMBER_25_AND_EASTER_SUNDAY_TYPE &&
                $type != self::CHRISTMAS_DWO_DAYS_AND_NEW_YEAR_DAY_AND_EASTER_TWO_DAYS_TYPE &&
                $type != self::DECEMBER_25_AND_EASTER_SUNDAY_AND_NEW_YEAR_TYPE &&
                $type != self::FREE_DAYS_IN_SHOPPING_CENTERS_TYPE &&
                $type != self::SUNDAYS_AND_HOLY_DAYS_WITHOUT_FREE_DAYS_IN_SHOPPING_CENTERS_TYPE &&
                $type != self::FREE_DAYS_WITHOUT_FREE_DAYS_IN_SHOPPING_CENTERS_TYPE &&
                $type != self::EVERY_DAY_TYPE &&
                $type != self::SATURDAYS_EXCEPT_SUMMER_HOLIDAYS_TYPE &&
                $type != self::SATURDAYS_IN_SUMMER_HOLIDAYS_TYPE &&
                $type != self::SUNDAY_AND_HOLY_DAYS_EXCEPT_SUMMER_HOLIDAYS_TYPE &&
                $type != self::SUNDAY_AND_HOLY_DAYS_IN_SUMMER_HOLIDAYS_TYPE &&
                $type != self::SUNDAY_SPECIAL_TYPE &&
                $type != self::TIME_CHANGE_DAY_TYPE &&
                $type != self::NIGHT_BETWEEN_FRIDAY_AND_SATURDAY_TYPE &&
                $type != self::NIGHT_BETWEEN_SATURDAY_AND_SUNDAY_OR_SUNDAY_MONDAY_TYPE &&
                $type != self::SUNDAYS_IN_SUMMER_HOLIDAYS_TYPE &&
                $type != self::NIGHT_BETWEEN_SATURDAY_AND_SUNDAY_TYPE &&
                $type != self::MONDAY_TYPE &&
                $type != self::TUESDAY_TYPE &&
                $type != self::WEDNESDAY_TYPE &&
                $type != self::THURSDAY_TYPE &&
                $type != self::FRIDAY_TYPE 
                ) {
            throw new \InvalidArgumentException('Wrong type of timetable: ' . $type);
        }
        
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set busStops
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\BusStop $busStops
     * @return Timetable
     */
    public function setBusStops(\Polcode\WhenBusArrivesBundle\Entity\BusStop $busStops = null)
    {
        $this->busStops = $busStops;

        return $this;
    }

    /**
     * Get busStops
     *
     * @return \Polcode\WhenBusArrivesBundle\Entity\BusStop 
     */
    public function getBusStops()
    {
        return $this->busStops;
    }
    /**
     * @var integer
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var \Polcode\WhenBusArrivesBundle\Entity\BusLine
     */
    private $busLines;


    /**
     * Set busLines
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\BusLine $busLines
     * @return Timetable
     */
    public function setBusLines(\Polcode\WhenBusArrivesBundle\Entity\BusLine $busLines = null)
    {
        $this->busLines = $busLines;

        return $this;
    }

    /**
     * Get busLines
     *
     * @return \Polcode\WhenBusArrivesBundle\Entity\BusLine 
     */
    public function getBusLines()
    {
        return $this->busLines;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $arrivals;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->arrivals = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add arrivals
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\Arrival $arrivals
     * @return Timetable
     */
    public function addArrival(\Polcode\WhenBusArrivesBundle\Entity\Arrival $arrivals)
    {
        $this->arrivals[] = $arrivals;

        return $this;
    }

    /**
     * Remove arrivals
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\Arrival $arrivals
     */
    public function removeArrival(\Polcode\WhenBusArrivesBundle\Entity\Arrival $arrivals)
    {
        $this->arrivals->removeElement($arrivals);
    }

    /**
     * Get arrivals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArrivals()
    {
        return $this->arrivals;
    }
    /**
     * @var \Polcode\WhenBusArrivesBundle\Entity\BusLine
     */
    private $busLine;

    /**
     * @var \Polcode\WhenBusArrivesBundle\Entity\BusStop
     */
    private $busStop;


    /**
     * Set busLine
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\BusLine $busLine
     * @return Timetable
     */
    public function setBusLine(\Polcode\WhenBusArrivesBundle\Entity\BusLine $busLine = null)
    {
        $this->busLine = $busLine;

        return $this;
    }

    /**
     * Get busLine
     *
     * @return \Polcode\WhenBusArrivesBundle\Entity\BusLine 
     */
    public function getBusLine()
    {
        return $this->busLine;
    }

    /**
     * Set busStop
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\BusStop $busStop
     * @return Timetable
     */
    public function setBusStop(\Polcode\WhenBusArrivesBundle\Entity\BusStop $busStop = null)
    {
        $this->busStop = $busStop;

        return $this;
    }

    /**
     * Get busStop
     *
     * @return \Polcode\WhenBusArrivesBundle\Entity\BusStop 
     */
    public function getBusStop()
    {
        return $this->busStop;
    }
}
