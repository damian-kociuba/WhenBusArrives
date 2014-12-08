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
    const NEW_YEARS_EVE = 6;
    const EVE = 7;
    
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
                $type != self::EVE &&
                $type != self::NEW_YEARS_EVE
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
