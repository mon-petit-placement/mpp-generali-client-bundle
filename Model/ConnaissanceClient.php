<?php

namespace Mpp\GeneraliClientBundle\Model;

class ConnaissanceClient
{
    /**
     * @var Contractant|null
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
     * @var array<RepartitionPatrimoine>
     */
    private $repartitionPatrimoine;

    /**
     * @var array<OriginePatrimoine>
     */
    private $originesPatrimoine;

    /**
     * @var OriginePaiement
     */
    private $originePaiement;

    /**
     * Get the value of contractant.
     *
     * @return Contractant|null
     */
    public function getContractant(): ?Contractant
    {
        return $this->contractant;
    }

    /**
     * Set the value of contractant.
     *
     * @param Contractant|null $contractant
     *
     * @return self
     */
    public function setContractant(?Contractant $contractant): self
    {
        $this->contractant = $contractant;

        return $this;
    }

    /**
     * Get the value of revenusAnnuelsNetFoyer.
     *
     * @return RevenusAnnuelsNetFoyer|null
     */
    public function getRevenusAnnuelsNetFoyer(): ?revenusAnnuelsNetFoyer
    {
        return $this->revenusAnnuelsNetFoyer;
    }

    /**
     * Set the value of revenusAnnuelsNetFoyer.
     *
     * @param RevenusAnnuelsNetFoyer|null $revenusAnnuelsNetFoyer
     *
     * @return self
     */
    public function setRevenusAnnuelsNetFoyer(?RevenusAnnuelsNetFoyer $revenusAnnuelsNetFoyer): self
    {
        $this->revenusAnnuelsNetFoyer = $revenusAnnuelsNetFoyer;

        return $this;
    }

    /**
     * Get the value of estimationPatrimoineFoyer.
     *
     * @return EstimationPatrimoineFoyer|null
     */
    public function getEstimationPatrimoineFoyer(): ?EstimationPatrimoineFoyer
    {
        return $this->estimationPatrimoineFoyer;
    }

    /**
     * Set the value of estimationPatrimoineFoyer.
     *
     * @param EstimationPatrimoineFoyer|null $estimationPatrimoineFoyer
     *
     * @return self
     */
    public function setEstimationPatrimoineFoyer(?EstimationPatrimoineFoyer $estimationPatrimoineFoyer): self
    {
        $this->estimationPatrimoineFoyer = $estimationPatrimoineFoyer;

        return $this;
    }

    /**
     * Get the value of objectifsVersement.
     *
     * @return array<ObjectifVersement>|null
     */
    public function getObjectifsVersement(): ?array
    {
        return $this->objectifsVersement;
    }

    /**
     * Set the value of objectifsVersement.
     *
     * @param array<ObjectifVersement>|null $objectifsVersement
     *
     * @return self
     */
    public function setObjectifsVersement(?array $objectifsVersement): self
    {
        $this->objectifsVersement = $objectifsVersement;

        return $this;
    }

    /**
     * Get the value of repartitionPatrimoine.
     *
     * @return array<RepartitionPatrimoine>|null
     */
    public function getRepartitionPatrimoine(): ?array
    {
        return $this->repartitionPatrimoine;
    }

    /**
     * Set the value of repartitionPatrimoine.
     *
     * @param array<RepartitionPatrimoine>|null $repartitionPatrimoine
     *
     * @return self
     */
    public function setRepartitionPatrimoine(?array $repartitionPatrimoine): self
    {
        $this->repartitionPatrimoine = $repartitionPatrimoine;

        return $this;
    }

    /**
     * Get the value of originesPatrimoine.
     *
     * @return array<OriginePatrimoine>|null
     */
    public function getOriginesPatrimoine(): ?array
    {
        return $this->originesPatrimoine;
    }

    /**
     * Set the value of originesPatrimoine.
     *
     * @param array<OriginePatrimoine>|null $originesPatrimoine
     *
     * @return self
     */
    public function setOriginesPatrimoine(?array $originesPatrimoine): self
    {
        $this->originesPatrimoine = $originesPatrimoine;

        return $this;
    }

    /**
     * Get the value of originePaiement.
     *
     * @return OriginePaiement|null
     */
    public function getOriginePaiement(): ?OriginePaiement
    {
        return $this->originePaiement;
    }

    /**
     * Set the value of originePaiement.
     *
     * @param OriginePaiement $originePaiement
     *
     * @return self
     */
    public function setOriginePaiement(?OriginePaiement $originePaiement): self
    {
        $this->originePaiement = $originePaiement;

        return $this;
    }
}
