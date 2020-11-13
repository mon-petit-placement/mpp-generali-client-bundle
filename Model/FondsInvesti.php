<?php

namespace Mpp\GeneraliClientBundle\Model;

class FondsInvesti
{
    /**
     * @var string|null
     */
    private $codeFonds;

    /**
     * @var float|null
     */
    private $montant;

    /**
     * @var float|null
     */
    private $pourcentage;

    /**
     * @var bool|null
     */
    private $avenantValide;

    /**
     * @var int|null
     */
    private $taux;

    /**
     * @var int|null
     */
    private $duree;

    /**
     * @var int|null
     */
    private $numeroEngagement;

    /**
     * Get the value of codeFonds.
     *
     * @return string|null
     */
    public function getCodeFonds(): ?string
    {
        return $this->codeFonds;
    }

    /**
     * Set the value of codeFonds.
     *
     * @param string|null $codeFonds
     *
     * @return self
     */
    public function setCodeFonds(?string $codeFonds): self
    {
        $this->codeFonds = $codeFonds;

        return $this;
    }

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
     * Get the value of pourcentage.
     *
     * @return float|null
     */
    public function getPourcentage(): ?float
    {
        return $this->pourcentage;
    }

    /**
     * Set the value of pourcentage.
     *
     * @param float|null $pourcentage
     *
     * @return self
     */
    public function setPourcentage(?float $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    /**
     * Get the value of avenantValide.
     *
     * @return bool|null
     */
    public function getAvenantValide(): ?bool
    {
        return $this->avenantValide;
    }

    /**
     * Set the value of avenantValide.
     *
     * @param bool|null $avenantValide
     *
     * @return self
     */
    public function setAvenantValide(?bool $avenantValide): self
    {
        $this->avenantValide = $avenantValide;

        return $this;
    }

    /**
     * Get the value of taux.
     *
     * @return int|null
     */
    public function getTaux(): ?int
    {
        return $this->taux;
    }

    /**
     * Set the value of taux.
     *
     * @param int|null $taux
     *
     * @return self
     */
    public function setTaux(?int $taux): self
    {
        $this->taux = $taux;

        return $this;
    }

    /**
     * Get the value of duree.
     *
     * @return int|null
     */
    public function getDuree(): ?int
    {
        return $this->duree;
    }

    /**
     * Set the value of duree.
     *
     * @param int|null $duree
     *
     * @return self
     */
    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of numeroEngagement.
     *
     * @return int|null
     */
    public function getNumeroEngagement(): ?int
    {
        return $this->numeroEngagement;
    }

    /**
     * Set the value of numeroEngagement.
     *
     * @param int|null $numeroEngagement
     *
     * @return self
     */
    public function setNumeroEngagement(?int $numeroEngagement): self
    {
        $this->numeroEngagement = $numeroEngagement;

        return $this;
    }
}
