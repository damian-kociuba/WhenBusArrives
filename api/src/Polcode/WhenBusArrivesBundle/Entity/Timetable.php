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
        if($type != self::WORK_DAY_TYPE || 
                $type != self::SATURDAY_TYPE ||
                $type != self::SUNDAY_TYPE) {
            throw new \InvalidArgumentException('Wrong type of timetable');
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
}
