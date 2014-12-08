<?php

namespace Polcode\WhenBusArrivesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Community
 */
class Community
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $busStops;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->busStops = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Community
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
     * Add busStops
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\busStop $busStops
     * @return Community
     */
    public function addBusStop(\Polcode\WhenBusArrivesBundle\Entity\busStop $busStops)
    {
        $this->busStops[] = $busStops;

        return $this;
    }

    /**
     * Remove busStops
     *
     * @param \Polcode\WhenBusArrivesBundle\Entity\busStop $busStops
     */
    public function removeBusStop(\Polcode\WhenBusArrivesBundle\Entity\busStop $busStops)
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
    /**
     * @var string
     */
    private $url;


    /**
     * Set url
     *
     * @param string $url
     * @return Community
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
