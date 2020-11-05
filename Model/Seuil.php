<?php

namespace Mpp\GeneraliClientBundle\Model;

class Seuil
{
    /**
     * @var float|null
     */
    private $montantMin;

    /**
     * @var float|null
     */
    private $minParSupport;

    /**
     * @var SeuilParPeriodicite|null
     */
    private $seuilsParPeriodicite;

    /**
     * Get the value of montantMin
     *
     * @return  float|null
     */ 
    public function getMontantMin(): ?float
    {
        return $this->montantMin;
    }

    /**
     * Set the value of montantMin
     *
     * @param  float|null  $montantMin
     *
     * @return  self
     */ 
    public function setMontantMin(?float $montantMin): self
    {
        $this->montantMin = $montantMin;

        return $this;
    }

    /**
     * Get the value of minParSupport
     *
     * @return  float|null
     */ 
    public function getMinParSupport(): ?float
    {
        return $this->minParSupport;
    }

    /**
     * Set the value of minParSupport
     *
     * @param  float|null  $minParSupport
     *
     * @return  self
     */ 
    public function setMinParSupport(?float $minParSupport): self
    {
        $this->minParSupport = $minParSupport;

        return $this;
    }

    /**
     * Get the value of seuilsParPeriodicite
     *
     * @return  SeuilParPeriodicite|null
     */ 
    public function getSeuilsParPeriodicite(): ?SeuilParPeriodicite
    {
        return $this->seuilsParPeriodicite;
    }

    /**
     * Set the value of seuilsParPeriodicite
     *
     * @param  SeuilParPeriodicite|null  $seuilsParPeriodicite
     *
     * @return  self
     */ 
    public function setSeuilsParPeriodicite(?SeuilParPeriodicite $seuilsParPeriodicite): self
    {
        $this->seuilsParPeriodicite = $seuilsParPeriodicite;

        return $this;
    }
}
