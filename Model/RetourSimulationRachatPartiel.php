<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourSimulationRachatPartiel
{
    /**
     * @var string|null
     */
    private $typeSimulation;

    /**
     * @var bool|null
     */
    private $montantTronque;

    /**
     * @var float|null
     */
    private $montantNet;

    /**
     * @var float|null
     */
    private $montantBrut;

    /**
     * @var float|null
     */
    private $montantAbattement;

    /**
     * @var float|null
     */
    private $montantPlusValueImposable;

    /**
     * @var float|null
     */
    private $montantRetenuPfl;

    /**
     * @var float|null
     */
    private $montantRetenuPrelevementsSociaux;

    /**
     * @var float|null
     */
    private $montanRemboursementPrelevementsSociaux;

    /**
     * @var float|null
     */
    private $tauxPlf;

    /**
     * @var float|null
     */
    private $tauxPfo;

    /**
     * @var float|null
     */
    private $montantPlusValueImposableC3;

    /**
     * @var float|null
     */
    private $montantPlusValueExonere;

    /**
     * @var float|null
     */
    private $montantRetenuPfo;

    /**
     * @var int|null
     */
    private $dureeFiscalite;

    /**
     * @var bool|null
     */
    private $presenceC1;

    /**
     * @var bool|null
     */
    private $presenceC2;

    /**
     * @var bool|null
     */
    private $presenceC3;

    /**
     * @var bool|null
     */
    private $exonerationC3;

    /**
     * Get the value of typeSimulation.
     *
     * @return string|null
     */
    public function getTypeSimulation(): ?string
    {
        return $this->typeSimulation;
    }

    /**
     * Set the value of typeSimulation.
     *
     * @param string|null $typeSimulation
     *
     * @return self
     */
    public function setTypeSimulation(?string $typeSimulation): self
    {
        $this->typeSimulation = $typeSimulation;

        return $this;
    }

    /**
     * Get the value of montantTronque.
     *
     * @return bool|null
     */
    public function getMontantTronque(): ?bool
    {
        return $this->montantTronque;
    }

    /**
     * Set the value of montantTronque.
     *
     * @param bool|null $montantTronque
     *
     * @return self
     */
    public function setMontantTronque(?bool $montantTronque): self
    {
        $this->montantTronque = $montantTronque;

        return $this;
    }

    /**
     * Get the value of montantNet.
     *
     * @return float|null
     */
    public function getMontantNet(): ?float
    {
        return $this->montantNet;
    }

    /**
     * Set the value of montantNet.
     *
     * @param float|null $montantNet
     *
     * @return self
     */
    public function setMontantNet(?float $montantNet): self
    {
        $this->montantNet = $montantNet;

        return $this;
    }

    /**
     * Get the value of montantBrut.
     *
     * @return float|null
     */
    public function getMontantBrut(): ?float
    {
        return $this->montantBrut;
    }

    /**
     * Set the value of montantBrut.
     *
     * @param float|null $montantBrut
     *
     * @return self
     */
    public function setMontantBrut(?float $montantBrut): self
    {
        $this->montantBrut = $montantBrut;

        return $this;
    }

    /**
     * Get the value of montantAbattement.
     *
     * @return float|null
     */
    public function getMontantAbattement(): ?float
    {
        return $this->montantAbattement;
    }

    /**
     * Set the value of montantAbattement.
     *
     * @param float|null $montantAbattement
     *
     * @return self
     */
    public function setMontantAbattement(?float $montantAbattement): self
    {
        $this->montantAbattement = $montantAbattement;

        return $this;
    }

    /**
     * Get the value of montantPlusValueImposable.
     *
     * @return float|null
     */
    public function getMontantPlusValueImposable(): ?float
    {
        return $this->montantPlusValueImposable;
    }

    /**
     * Set the value of montantPlusValueImposable.
     *
     * @param float|null $montantPlusValueImposable
     *
     * @return self
     */
    public function setMontantPlusValueImposable(?float $montantPlusValueImposable): self
    {
        $this->montantPlusValueImposable = $montantPlusValueImposable;

        return $this;
    }

    /**
     * Get the value of montantRetenuPfl.
     *
     * @return float|null
     */
    public function getMontantRetenuPfl(): ?float
    {
        return $this->montantRetenuPfl;
    }

    /**
     * Set the value of montantRetenuPfl.
     *
     * @param float|null $montantRetenuPfl
     *
     * @return self
     */
    public function setMontantRetenuPfl(?float $montantRetenuPfl): self
    {
        $this->montantRetenuPfl = $montantRetenuPfl;

        return $this;
    }

    /**
     * Get the value of montantRetenuPrelevementsSociaux.
     *
     * @return float|null
     */
    public function getMontantRetenuPrelevementsSociaux(): ?float
    {
        return $this->montantRetenuPrelevementsSociaux;
    }

    /**
     * Set the value of montantRetenuPrelevementsSociaux.
     *
     * @param float|null $montantRetenuPrelevementsSociaux
     *
     * @return self
     */
    public function setMontantRetenuPrelevementsSociaux(?float $montantRetenuPrelevementsSociaux): self
    {
        $this->montantRetenuPrelevementsSociaux = $montantRetenuPrelevementsSociaux;

        return $this;
    }

    /**
     * Get the value of montanRemboursementPrelevementsSociaux.
     *
     * @return float|null
     */
    public function getMontanRemboursementPrelevementsSociaux(): ?float
    {
        return $this->montanRemboursementPrelevementsSociaux;
    }

    /**
     * Set the value of montanRemboursementPrelevementsSociaux.
     *
     * @param float|null $montanRemboursementPrelevementsSociaux
     *
     * @return self
     */
    public function setMontanRemboursementPrelevementsSociaux(?float $montanRemboursementPrelevementsSociaux): self
    {
        $this->montanRemboursementPrelevementsSociaux = $montanRemboursementPrelevementsSociaux;

        return $this;
    }

    /**
     * Get the value of tauxPlf.
     *
     * @return float|null
     */
    public function getTauxPlf(): ?float
    {
        return $this->tauxPlf;
    }

    /**
     * Set the value of tauxPlf.
     *
     * @param float|null $tauxPlf
     *
     * @return self
     */
    public function setTauxPlf(?float $tauxPlf): self
    {
        $this->tauxPlf = $tauxPlf;

        return $this;
    }

    /**
     * Get the value of tauxPfo.
     *
     * @return float|null
     */
    public function getTauxPfo(): ?float
    {
        return $this->tauxPfo;
    }

    /**
     * Set the value of tauxPfo.
     *
     * @param float|null $tauxPfo
     *
     * @return self
     */
    public function setTauxPfo(?float $tauxPfo): self
    {
        $this->tauxPfo = $tauxPfo;

        return $this;
    }

    /**
     * Get the value of montantPlusValueImposableC3.
     *
     * @return float|null
     */
    public function getMontantPlusValueImposableC3(): ?float
    {
        return $this->montantPlusValueImposableC3;
    }

    /**
     * Set the value of montantPlusValueImposableC3.
     *
     * @param float|null $montantPlusValueImposableC3
     *
     * @return self
     */
    public function setMontantPlusValueImposableC3(?float $montantPlusValueImposableC3): self
    {
        $this->montantPlusValueImposableC3 = $montantPlusValueImposableC3;

        return $this;
    }

    /**
     * Get the value of montantPlusValueExonere.
     *
     * @return float|null
     */
    public function getMontantPlusValueExonere(): ?float
    {
        return $this->montantPlusValueExonere;
    }

    /**
     * Set the value of montantPlusValueExonere.
     *
     * @param float|null $montantPlusValueExonere
     *
     * @return self
     */
    public function setMontantPlusValueExonere(?float $montantPlusValueExonere): self
    {
        $this->montantPlusValueExonere = $montantPlusValueExonere;

        return $this;
    }

    /**
     * Get the value of montantRetenuPfo.
     *
     * @return float|null
     */
    public function getMontantRetenuPfo(): ?float
    {
        return $this->montantRetenuPfo;
    }

    /**
     * Set the value of montantRetenuPfo.
     *
     * @param float|null $montantRetenuPfo
     *
     * @return self
     */
    public function setMontantRetenuPfo(?float $montantRetenuPfo): self
    {
        $this->montantRetenuPfo = $montantRetenuPfo;

        return $this;
    }

    /**
     * Get the value of dureeFiscalite.
     *
     * @return int|null
     */
    public function getDureeFiscalite(): ?int
    {
        return $this->dureeFiscalite;
    }

    /**
     * Set the value of dureeFiscalite.
     *
     * @param int|null $dureeFiscalite
     *
     * @return self
     */
    public function setDureeFiscalite(?int $dureeFiscalite): self
    {
        $this->dureeFiscalite = $dureeFiscalite;

        return $this;
    }

    /**
     * Get the value of presenceC1.
     *
     * @return bool|null
     */
    public function getPresenceC1(): ?bool
    {
        return $this->presenceC1;
    }

    /**
     * Set the value of presenceC1.
     *
     * @param bool|null $presenceC1
     *
     * @return self
     */
    public function setPresenceC1(?bool $presenceC1): self
    {
        $this->presenceC1 = $presenceC1;

        return $this;
    }

    /**
     * Get the value of presenceC2.
     *
     * @return bool|null
     */
    public function getPresenceC2(): ?bool
    {
        return $this->presenceC2;
    }

    /**
     * Set the value of presenceC2.
     *
     * @param bool|null $presenceC2
     *
     * @return self
     */
    public function setPresenceC2(?bool $presenceC2): self
    {
        $this->presenceC2 = $presenceC2;

        return $this;
    }

    /**
     * Get the value of presenceC3.
     *
     * @return bool|null
     */
    public function getPresenceC3(): ?bool
    {
        return $this->presenceC3;
    }

    /**
     * Set the value of presenceC3.
     *
     * @param bool|null $presenceC3
     *
     * @return self
     */
    public function setPresenceC3(?bool $presenceC3): self
    {
        $this->presenceC3 = $presenceC3;

        return $this;
    }

    /**
     * Get the value of exonerationC3.
     *
     * @return bool|null
     */
    public function getExonerationC3(): ?bool
    {
        return $this->exonerationC3;
    }

    /**
     * Set the value of exonerationC3.
     *
     * @param bool|null $exonerationC3
     *
     * @return self
     */
    public function setExonerationC3(?bool $exonerationC3): self
    {
        $this->exonerationC3 = $exonerationC3;

        return $this;
    }
}
