<?php

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

/**
 * @Entity
 * @Table(name="driver_rides")
 */
class DriverRide
{
    /**
     * @Id
     * @ManyToOne(targetEntity="Driver", inversedBy="driverRides")
     * @JoinColumn(name="driver_id", referencedColumnName="id")
     */
    protected $driver;

    /**
     * @Id
     * @ManyToOne(targetEntity="Car", inversedBy="carRides")
     * @JoinColumn(name="car", referencedColumnName="brand")
     */
    protected $car;

    /**
     * DriverRide constructor.
     */
    public function __construct()
    {

    }

    function getDriver() { return $this->driver; }
    function getCar() { return $this->car; }

    /**
     * @param mixed $driver
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
    }

    /**
     * @param mixed $car
     */
    public function setCar($car)
    {
        $this->car = $car;
    }
}
