<?php

namespace Mpp\GeneraliClientBundle\Model;

class ConnaissanceClient
{
    /**
     * @var Souscripteur|null
     */
    private $contractant;

    /**
     * @var RevenusAnnuelsNetFoyer|null
     */
    private $revenusAnnuelsNetFoyer;

    /**
     * @var EstimationPatrimoineFoyer|null
     */
    private $estimationPatrimoineFoyer;

    /**
     * @var array<ObjectifVersement>|null
     */
    private $objectifsVersement;

    /**
     * Get the value of contractant
     *
     * @return  Souscripteur|null
     */ 
    public function getContractant(): ?Souscripteur
    {
        return $this->contractant;
    }

    /**
     * Set the value of contractant
     *
     * @param  Souscripteur|null  $contractant
     *
     * @return  self
     */ 
    public function setContractant(?Souscripteur $contractant): self
    {
        $this->contractant = $contractant;

        return $this;
    }

    /**
     * Get the value of revenusAnnuelsNetFoyer
     *
     * @return  RevenusAnnuelsNetFoyer|null
     */ 
    public function getRevenusAnnuelsNetFoyer(): ?revenusAnnuelsNetFoyer
    {
        return $this->revenusAnnuelsNetFoyer;
    }

    /**
     * Set the value of revenusAnnuelsNetFoyer
     *
     * @param  RevenusAnnuelsNetFoyer|null  $revenusAnnuelsNetFoyer
     *
     * @return  self
     */ 
    public function setRevenusAnnuelsNetFoyer(?RevenusAnnuelsNetFoyer $revenusAnnuelsNetFoyer): self
    {
        $this->revenusAnnuelsNetFoyer = $revenusAnnuelsNetFoyer;

        return $this;
    }

    /**
     * Get the value of estimationPatrimoineFoyer
     *
     * @return  EstimationPatrimoineFoyer|null
     */ 
    public function getEstimationPatrimoineFoyer(): ?EstimationPatrimoineFoyer
    {
        return $this->estimationPatrimoineFoyer;
    }

    /**
     * Set the value of estimationPatrimoineFoyer
     *
     * @param  EstimationPatrimoineFoyer|null  $estimationPatrimoineFoyer
     *
     * @return  self
     */ 
    public function setEstimationPatrimoineFoyer(?EstimationPatrimoineFoyer $estimationPatrimoineFoyer): self
    {
        $this->estimationPatrimoineFoyer = $estimationPatrimoineFoyer;

        return $this;
    }

    /**
     * Get the value of objectifsVersement
     *
     * @return  array<ObjectifVersement>|null
     */ 
    public function getObjectifsVersement(): array
    {
        return $this->objectifsVersement;
    }

    /**
     * Set the value of objectifsVersement
     *
     * @param  array<ObjectifVersement>|null  $objectifsVersement
     *
     * @return  self
     */ 
    public function setObjectifsVersement(?array $objectifsVersement): self
    {
        $this->objectifsVersement = $objectifsVersement;

        return $this;
    }
}
