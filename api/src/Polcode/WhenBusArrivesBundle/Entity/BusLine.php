<?php

namespace Polcode\WhenBusArrivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BusLine
 */
class BusLine
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $direction;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $timetables;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->timetables = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set name
     *
     * @param string $name
     * @return BusLine
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set direction
     *
     * @param string $direction
     * @return BusLine
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction
     *
     * @return string 
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Add timetables
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\Timetable $timetables
     * @return BusLine
     */
    public function addTimetable(\Polcode\WhenBusArrivesBundle\Entity\Timetable $timetables)
    {
        $this->timetables[] = $timetables;

        return $this;
    }

    /**
     * Remove timetables
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\Timetable $timetables
     */
    public function removeTimetable(\Polcode\WhenBusArrivesBundle\Entity\Timetable $timetables)
    {
        $this->timetables->removeElement($timetables);
    }

    /**
     * Get timetables
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTimetables()
    {
        return $this->timetables;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $busStops;


    /**
     * Add busStops
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\BusStop $busStops
     * @return BusLine
     */
    public function addBusStop(\Polcode\WhenBusArrivesBundle\Entity\BusStop $busStops)
    {
        $this->busStops[] = $busStops;

        return $this;
    }

    /**
     * Remove busStops
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\BusStop $busStops
     */
    public function removeBusStop(\Polcode\WhenBusArrivesBundle\Entity\BusStop $busStops)
    {
        $this->busStops->removeElement($busStops);
    }

    /**
     * Get busStops
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBusStops()
    {
        return $this->busStops;
    }
}
