<?php

use Doctrine\ORM\Mapping\Cache;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;

/**
 * @Entity(repositoryClass="CityRepository")
 * @Table("cities")
 * @Cache(usage="NONSTRICT_READ_WRITE", region="city_region")
 */
class City
{
    /**
     * @Id()
     * @GeneratedValue()
     * @Column(type="integer")
     *
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string", nullable=false)
     * @var string
     */
    protected $name;

    /**
     * @OneToMany(targetEntity="User", mappedBy="city")
     * @var User[]
     */
    protected $users;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \User $user
     *
     * @return City
     */
    public function addUser(\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \User $user
     */
    public function removeUser(\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
