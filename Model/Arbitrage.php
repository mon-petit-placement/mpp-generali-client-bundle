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
     * @var array<FondsInvesti>|null
     */
    private $liseFondsInvestis;

    /**
     * @var array<FondsInvesti>|null
     */
    private $listeFondsDesinvestis;

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
     * @return array<FondsInvesti>|null
     */
    public function getLiseFondsInvestis(): ?array
    {
        return $this->liseFondsInvestis;
    }

    /**
     * Set the value of fondsInvestis.
     *
     * @param array<FondsInvesti>|null $liseFondsInvestis
     *
     * @return self
     */
    public function setLiseFondsInvestis(?array $liseFondsInvestis): self
    {
        $this->liseFondsInvestis = $liseFondsInvestis;

        return $this;
    }

    /**
     * Get the value of fondsDesinvestis.
     *
     * @return array<FondsInvesti>|null
     */
    public function getListeFondsDesinvestis(): ?array
    {
        return $this->listeFondsDesinvestis;
    }

    /**
     * Set the value of fondsDesinvestis.
     *
     * @param array<FondsInvesti>|null $listeFondsDesinvestis
     *
     * @return self
     */
    public function setListeFondsDesinvestis(?array $listeFondsDesinvestis): self
    {
        $this->listeFondsDesinvestis = $listeFondsDesinvestis;

        return $this;
    }
}
