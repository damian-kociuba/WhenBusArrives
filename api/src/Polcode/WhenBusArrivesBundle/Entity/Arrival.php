<?php

namespace Polcode\WhenBusArrivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arrival
 */
class Arrival
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;


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
     * Set type
     *
     * @param string $type
     * @return Arrival
     */
    public function setType($type)
    {
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
     * @var \DateTime
     */
    private $hour;

    /**
     * @var \Polcode\WhenBusArrivesBundle\Entity\Timetable
     */
    private $timetable;


    /**
     * Set hour
     *
     * @param \DateTime $hour
     * @return Arrival
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Get hour
     *
     * @return \DateTime 
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set timetable
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\Timetable $timetable
     * @return Arrival
     */
    public function setTimetable(\Polcode\WhenBusArrivesBundle\Entity\Timetable $timetable = null)
    {
        $this->timetable = $timetable;

        return $this;
    }

    /**
     * Get timetable
     *
     * @return \Polcode\WhenBusArrivesBundle\Entity\Timetable 
     */
    public function getTimetable()
    {
        return $this->timetable;
    }
    /**
     * @var \DateTime
     */
    private $time;


    /**
     * Set time
     *
     * @param \DateTime $time
     * @return Arrival
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime 
     */
    public function getTime()
    {
        return $this->time;
    }
}
