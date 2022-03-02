<?php

namespace App\Entity;

use App\Repository\EnergyOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnergyOptionRepository::class)
 */
class EnergyOption
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Cars::class, inversedBy="energyOptions")
     */
    private $car;

    public function __construct()
    {
        $this->car = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Cars>
     */
    public function getCar(): Collection
    {
        return $this->car;
    }

    public function addCar(Cars $car): self
    {
        if (!$this->car->contains($car)) {
            $this->car[] = $car;
        }

        return $this;
    }

    public function removeCar(Cars $car): self
    {
        $this->car->removeElement($car);

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
