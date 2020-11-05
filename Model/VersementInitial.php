<?php

namespace Mpp\GeneraliClientBundle\Model;

class VersementInitial
{
    /**
     * @var float|null
     */
    private $montant;

    /**
     * @var array<FondsInvesti>|null
     */
    private $repartition;

    /**
     * Get the value of montant
     *
     * @return  float|null
     */ 
    public function getMontant(): ?float
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @param  float|null  $montant
     *
     * @return  self
     */ 
    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get the value of repartition
     *
     * @return  array<FondsInvesti>|null
     */ 
    public function getRepartition(): ?array
    {
        return $this->repartition;
    }

    /**
     * Set the value of repartition
     *
     * @param  array<FondsInvesti>|null  $repartition
     *
     * @return  self
     */ 
    public function setRepartition(?array $repartition): self
    {
        $this->repartition = $repartition;

        return $this;
    }
}
