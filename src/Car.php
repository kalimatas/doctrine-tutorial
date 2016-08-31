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
 * @Table(name="cars")
 */
class Car
{
    /**
     * @Id
     * @Column(type="string", length=25)
     * @GeneratedValue(strategy="NONE")
     */
    protected $brand;

    /**
     * @Column(type="string", length=255);
     */
    protected $model;

    /**
     * @OneToMany(targetEntity="DriverRide", mappedBy="car")
     */
    protected $carRides;

    /**
     * Car constructor.
     */
    public function __construct()
    {
        $this->carRides = new ArrayCollection();
    }

    public function getBrand() { return $this->brand; }
    public function getModel() { return $this->model; }
    public function getCarRides() { return $this->carRides; }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @param mixed $carRides
     */
    public function setCarRides($carRides)
    {
        $this->carRides = $carRides;
    }

    /**
     * Add carRide
     *
     * @param \DriverRide $carRide
     *
     * @return Car
     */
    public function addCarRide(\DriverRide $carRide)
    {
        $this->carRides[] = $carRide;

        return $this;
    }

    /**
     * Remove carRide
     *
     * @param \DriverRide $carRide
     */
    public function removeCarRide(\DriverRide $carRide)
    {
        $this->carRides->removeElement($carRide);
    }
}
