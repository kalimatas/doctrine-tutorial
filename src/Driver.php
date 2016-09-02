<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
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
     * @ManyToMany(targetEntity="Car")
     * @JoinTable(
     *     name="driver_rides",
     *     joinColumns={@JoinColumn(name="driver_id", referencedColumnName="id")},
     *     inverseJoinColumns={@JoinColumn(name="car", referencedColumnName="brand")}
     * )
     */
    protected $cars;

    /**
     * Driver constructor.
     */
    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }

    function getId() { return $this->id; }
    function getName() { return $this->name; }
    function getCars() { return $this->cars; }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $cars
     */
    public function setCars($cars)
    {
        $this->cars = $cars;
    }

    /**
     * Add driverRide
     *
     * @param \Car $car
     *
     * @return Driver
     */
    public function addCar(\Car $car)
    {
        $this->cars[] = $car;

        return $this;
    }

    /**
     * Remove car
     *
     * @param \Car $car
     */
    public function removeCar(\Car $car)
    {
        $this->cars->removeElement($car);
    }
}
