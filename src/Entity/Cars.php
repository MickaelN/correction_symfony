<?php

namespace App\Entity;

use App\Repository\CarsRepository;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarsRepository::class)
 */
class Cars
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
    private $brand;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $engine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\ManyToMany(targetEntity=EnergyOption::class, mappedBy="car")
     */
    private $energyOptions;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometers;

    /**
     * @ORM\ManyToOne(targetEntity=Seats::class, inversedBy="cars",cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $seats;

    public function __construct()
    {
        $this->energyOptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getEngine(): ?string
    {
        return $this->engine;
    }

    public function setEngine(string $engine): self
    {
        $this->engine = $engine;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getSlug():string{
        $slug = new Slugify();
        return $slug->slugify($this->brand . ' ' . $this->model);
    }

    /**
     * @return Collection<int, EnergyOption>
     */
    public function getEnergyOptions(): Collection
    {
        return $this->energyOptions;
    }

    public function addEnergyOption(EnergyOption $energyOption): self
    {
        if (!$this->energyOptions->contains($energyOption)) {
            $this->energyOptions[] = $energyOption;
            $energyOption->addCar($this);
        }

        return $this;
    }

    public function removeEnergyOption(EnergyOption $energyOption): self
    {
        if ($this->energyOptions->removeElement($energyOption)) {
            $energyOption->removeCar($this);
        }

        return $this;
    }
    
    public function __toString()
    {
        return $this->brand . '/' . $this->model;
    }

    public function getKilometers(): ?int
    {
        return $this->kilometers;
    }

    public function setKilometers(int $kilometers): self
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    public function getSeats(): ?Seats
    {
        return $this->seats;
    }

    public function setSeats(?Seats $seats): self
    {
        $this->seats = $seats;

        return $this;
    }
}
