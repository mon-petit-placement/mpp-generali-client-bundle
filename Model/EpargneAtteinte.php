<?php

namespace Mpp\GeneraliClientBundle\Model;

class EpargneAtteinte
{
    /**
     * @var float|null
     */
    private $montantEpargneAtteinte;

    /**
     * @var array<Repartition>|null
     */
    private $repartition;

    /**
     * Get the value of montantEpargneAtteinte
     *
     * @return  float|null
     */ 
    public function getMontantEpargneAtteinte(): ?float
    {
        return $this->montantEpargneAtteinte;
    }

    /**
     * Set the value of montantEpargneAtteinte
     *
     * @param  float|null  $montantEpargneAtteinte
     *
     * @return  self
     */ 
    public function setMontantEpargneAtteinte(?float $montantEpargneAtteinte): self
    {
        $this->montantEpargneAtteinte = $montantEpargneAtteinte;

        return $this;
    }

    /**
     * Get the value of repartition
     *
     * @return  array<Repartition>|null
     */ 
    public function getRepartition(): ?array
    {
        return $this->repartition;
    }

    /**
     * Set the value of repartition
     *
     * @param  array<Repartition>|null  $repartition
     *
     * @return  self
     */ 
    public function setRepartition(?array $repartition): self
    {
        $this->repartition = $repartition;

        return $this;
    }
}
