<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class CarsSearch
{
    /**
     * @var ArrayCollection
     */
    private $energyOption;

    /**
     * Undocumented variable
     *
     * @var ArrayCollection
     */
    private $seat;

    /**
     * Undocumented variable
     *
     * @var int
     */
    private $kilometer;

    /**
     * @return ArrayCollection
     */
    public function getEnergyOption(): ArrayCollection
    {
        return $this->energyOption;
    }
    /**
     * @param ArrayCollection $energyOption
     * @return self
     */
    public function setEnergyOption(ArrayCollection $energyOption): self
    {
        $this->energyOption = $energyOption;
        return $this;
    }

     /**
     * @return ArrayCollection
     */
    public function getSeat(): ArrayCollection
    {
        return $this->seat;
    }
    /**
     * @param ArrayCollection $seat
     * @return self
     */
    public function setSeat(ArrayCollection $seat): self
    {
        $this->seat = $seat;
        return $this;
    }

   /**
     * @return int
     */
    public function getKilometer(): int
    {
        return $this->kilometer;
    }
    /**
     * @param int $kilometer
     * @return self
     */
    public function setKilometer(int $kilometer): self
    {
        $this->kilometer = $kilometer;
        return $this;
    }

    public function __construct()
    {
        $this->energyOption = new ArrayCollection();
        $this->seat = new ArrayCollection();
    }
}
