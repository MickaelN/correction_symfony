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

    public function __construct()
    {
        $this->energyOption = new ArrayCollection();
    }
}
