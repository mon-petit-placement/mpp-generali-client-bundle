<?php

namespace Mpp\GeneraliClientBundle\Model;

class RachatPartiel
{
    /**
     * @var float|null
     */
    private $montant;

    /**
     * @var bool|null
     */
    private $rp72;

    /**
     * @var int|null
     */
    private $numOperationExterne;

    /**
     * @var string|null
     */
    private $codeOptionFiscale;

    /**
     * @var string|null
     */
    private $codeMotif;

    /**
     * @var string|null
     */
    private $libMotif;

    /**
     * @var bool|null
     */
    private $repartitionProportionnelle;

    /**
     * @var array<Repartition>|null
     */
    private $repartition;

    /**
     * @var ModeReglement|null
     */
    private $modeReglement;

    /**
     * Get the value of montant.
     *
     * @return float|null
     */
    public function getMontant(): ?float
    {
        return $this->montant;
    }

    /**
     * Set the value of montant.
     *
     * @param float|null $montant
     *
     * @return self
     */
    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get the value of rp72.
     *
     * @return bool|null
     */
    public function getRp72(): ?bool
    {
        return $this->rp72;
    }

    /**
     * Set the value of rp72.
     *
     * @param bool|null $rp72
     *
     * @return self
     */
    public function setRp72(?bool $rp72): self
    {
        $this->rp72 = $rp72;

        return $this;
    }

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
     * Get the value of codeOptionFiscale.
     *
     * @return string|null
     */
    public function getCodeOptionFiscale(): ?string
    {
        return $this->codeOptionFiscale;
    }

    /**
     * Set the value of codeOptionFiscale.
     *
     * @param string|null $codeOptionFiscale
     *
     * @return self
     */
    public function setCodeOptionFiscale(?string $codeOptionFiscale): self
    {
        $this->codeOptionFiscale = $codeOptionFiscale;

        return $this;
    }

    /**
     * Get the value of codeMotif.
     *
     * @return string|null
     */
    public function getCodeMotif(): ?string
    {
        return $this->codeMotif;
    }

    /**
     * Set the value of codeMotif.
     *
     * @param string|null $codeMotif
     *
     * @return self
     */
    public function setCodeMotif(?string $codeMotif): self
    {
        $this->codeMotif = $codeMotif;

        return $this;
    }

    /**
     * Get the value of libMotif.
     *
     * @return string|null
     */
    public function getLibMotif(): ?string
    {
        return $this->libMotif;
    }

    /**
     * Set the value of libMotif.
     *
     * @param string|null $libMotif
     *
     * @return self
     */
    public function setLibMotif(?string $libMotif): self
    {
        $this->libMotif = $libMotif;

        return $this;
    }

    /**
     * Get the value of repartitionProportionnelle.
     *
     * @return bool|null
     */
    public function getRepartitionProportionnelle(): ?bool
    {
        return $this->repartitionProportionnelle;
    }

    /**
     * Set the value of repartitionProportionnelle.
     *
     * @param bool|null $repartitionProportionnelle
     *
     * @return self
     */
    public function setRepartitionProportionnelle(?bool $repartitionProportionnelle): self
    {
        $this->repartitionProportionnelle = $repartitionProportionnelle;

        return $this;
    }

    /**
     * Get the value of modeReglement.
     *
     * @return ModeReglement|null
     */
    public function getModeReglement(): ?ModeReglement
    {
        return $this->modeReglement;
    }

    /**
     * Set the value of modeReglement.
     *
     * @param ModeReglement|null $modeReglement
     *
     * @return self
     */
    public function setModeReglement(?ModeReglement $modeReglement): self
    {
        $this->modeReglement = $modeReglement;

        return $this;
    }

    /**
     * @return Repartition[]|null
     */
    public function getRepartition(): ?array
    {
        return $this->repartition;
    }

    /**
     * @param Repartition[]|null $repartition
     *
     * @return RachatPartiel
     */
    public function setRepartition(?array $repartition): RachatPartiel
    {
        $this->repartition = $repartition;

        return $this;
    }
}
