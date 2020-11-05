<?php

namespace Mpp\GeneraliClientBundle\Model;

class VersementsLibresProgrammes
{
    /**
     * @var array<FondsInvesti>|null
     */
    private $repartition;

    /**
     * @var VlpMontant|null
     */
    private $vlpMontant;

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

    /**
     * Get the value of vlpMontant
     *
     * @return  VlpMontant|null
     */ 
    public function getVlpMontant(): ?VlpMontant
    {
        return $this->vlpMontant;
    }

    /**
     * Set the value of vlpMontant
     *
     * @param  VlpMontant|null  $vlpMontant
     *
     * @return  self
     */ 
    public function setVlpMontant(?VlpMontant $vlpMontant): self
    {
        $this->vlpMontant = $vlpMontant;

        return $this;
    }
}
