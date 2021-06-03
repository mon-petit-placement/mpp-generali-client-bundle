<?php

namespace Mpp\GeneraliClientBundle\Model;

class Arbitrage
{
    /**
     * @var int|null
     */
    private $numOperationExterne;

    /**
     * @var bool|null
     */
    private $mandatTransmissionOrdre;

    /**
     * @var bool|null
     */
    private $mandatArbitrage;

    /**
     * @var array<FondsInvestis>|null
     */
    private $fondsInvestis;

    /**
     * @var array<FondsDesinvestis>|null
     */
    private $fondsDesinvestis;

    /**
     * Get the value of numOperationExterne.
     *
     * @return int|null
     */
    public function getNumOperationExterne(): ?int
    {
        return $this->numOperationExterne;
    }

    /**
     * Set the value of numOperationExterne.
     *
     * @param int|null $numOperationExterne
     *
     * @return self
     */
    public function setNumOperationExterne(?int $numOperationExterne): self
    {
        $this->numOperationExterne = $numOperationExterne;

        return $this;
    }

    /**
     * Get the value of mandatTransmissionOrdre.
     *
     * @return bool|null
     */
    public function getMandatTransmissionOrdre(): ?bool
    {
        return $this->mandatTransmissionOrdre;
    }

    /**
     * Set the value of mandatTransmissionOrdre.
     *
     * @param bool|null $mandatTransmissionOrdre
     *
     * @return self
     */
    public function setMandatTransmissionOrdre(?bool $mandatTransmissionOrdre): self
    {
        $this->mandatTransmissionOrdre = $mandatTransmissionOrdre;

        return $this;
    }

    /**
     * Get the value of mandatArbitrage.
     *
     * @return bool|null
     */
    public function getMandatArbitrage(): ?bool
    {
        return $this->mandatArbitrage;
    }

    /**
     * Set the value of mandatArbitrage.
     *
     * @param bool|null $mandatArbitrage
     *
     * @return self
     */
    public function setMandatArbitrage(?bool $mandatArbitrage): self
    {
        $this->mandatArbitrage = $mandatArbitrage;

        return $this;
    }

    /**
     * Get the value of fondsInvestis.
     *
     * @return array<FondsInvestis>|null
     */
    public function getFondsInvestis(): ?array
    {
        return $this->fondsInvestis;
    }

    /**
     * Set the value of fondsInvestis.
     *
     * @param array<FondsInvestis>|null $fondsInvestis
     *
     * @return self
     */
    public function setFondsInvestis(?array $fondsInvestis): self
    {
        $this->fondsInvestis = $fondsInvestis;

        return $this;
    }

    /**
     * Get the value of fondsDesinvestis.
     *
     * @return array<FondsInvestis>|null
     */
    public function getFondsDesinvestis(): ?array
    {
        return $this->fondsDesinvestis;
    }

    /**
     * Set the value of fondsDesinvestis.
     *
     * @param array<FondsInvestis>|null $fondsDesinvestis
     *
     * @return self
     */
    public function setFondsDesinvestis(?array $fondsDesinvestis): self
    {
        $this->fondsDesinvestis = $fondsDesinvestis;

        return $this;
    }
}
