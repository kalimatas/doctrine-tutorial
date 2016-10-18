<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\PreUpdate;

/**
 * @Entity(repositoryClass="UserRepository") @Table(name="users")
 * @HasLifecycleCallbacks()
 */
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     *
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="reporter")
     * @var Bug[]
     */
    protected $reportedBugs;

    /**
     * @OneToMany(targetEntity="Bug", mappedBy="engineer")
     * @var Bug[]
     */
    protected $assignedBugs;

    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function addReportedBug($bug)
    {
        $this->reportedBugs[] = $bug;
    }

    public function assignedToBug($bug)
    {
        $this->assignedBugs[] = $bug;
    }

    /**
     * Remove reportedBug
     *
     * @param \Bug $reportedBug
     */
    public function removeReportedBug(\Bug $reportedBug)
    {
        $this->reportedBugs->removeElement($reportedBug);
    }

    /**
     * Get reportedBugs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReportedBugs()
    {
        return $this->reportedBugs;
    }

    /**
     * Add assignedBug
     *
     * @param \Bug $assignedBug
     *
     * @return User
     */
    public function addAssignedBug(\Bug $assignedBug)
    {
        $this->assignedBugs[] = $assignedBug;

        return $this;
    }

    /**
     * Remove assignedBug
     *
     * @param \Bug $assignedBug
     */
    public function removeAssignedBug(\Bug $assignedBug)
    {
        $this->assignedBugs->removeElement($assignedBug);
    }

    /**
     * Get assignedBugs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssignedBugs()
    {
        return $this->assignedBugs;
    }

    /**
     * @PreUpdate()
     */
    public function doOnPreUpdate()
    {
        $a = $this;
        echo 'in doOnPreUpdate' . PHP_EOL;
    }
}
