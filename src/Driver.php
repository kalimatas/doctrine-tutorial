<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="drivers")
 */
class Driver
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=255);
     */
    protected $name;

    /**
     * @OneToMany(targetEntity="DriverRide", mappedBy="driver")
     */
    protected $driverRides;

    /**
     * Driver constructor.
     */
    public function __construct()
    {
        $this->driverRides = new ArrayCollection();
    }

    function getId() { return $this->id; }
    function getName() { return $this->name; }
    function getDriverRides() { return $this->driverRides; }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $driverRides
     */
    public function setDriverRides($driverRides)
    {
        $this->driverRides = $driverRides;
    }

    /**
     * Add driverRide
     *
     * @param \DriverRide $driverRide
     *
     * @return Driver
     */
    public function addDriverRide(\DriverRide $driverRide)
    {
        $this->driverRides[] = $driverRide;

        return $this;
    }

    /**
     * Remove driverRide
     *
     * @param \DriverRide $driverRide
     */
    public function removeDriverRide(\DriverRide $driverRide)
    {
        $this->driverRides->removeElement($driverRide);
    }
}
