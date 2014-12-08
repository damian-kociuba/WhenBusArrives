<?php

namespace Polcode\WhenBusArrivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BusStop
 */
class BusStop
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
    private $community;

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
     * @return BusStop
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
     * Set community
     *
     * @param string $community
     * @return BusStop
     */
    public function setCommunity($community)
    {
        $this->community = $community;

        return $this;
    }

    /**
     * Get community
     *
     * @return string 
     */
    public function getCommunity()
    {
        return $this->community;
    }

    /**
     * Add timetables
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\Timetable $timetables
     * @return BusStop
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
    private $busLines;


    /**
     * Add busLines
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\BusLine $busLines
     * @return BusStop
     */
    public function addBusLine(\Polcode\WhenBusArrivesBundle\Entity\BusLine $busLines)
    {
        $this->busLines[] = $busLines;

        return $this;
    }

    /**
     * Remove busLines
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\BusLine $busLines
     */
    public function removeBusLine(\Polcode\WhenBusArrivesBundle\Entity\BusLine $busLines)
    {
        $this->busLines->removeElement($busLines);
    }

    /**
     * Get busLines
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBusLines()
    {
        return $this->busLines;
    }
    /**
     * @var string
     */
    private $url;


    /**
     * Set url
     *
     * @param string $url
     * @return BusStop
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
}
