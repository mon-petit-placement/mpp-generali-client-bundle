<?php

namespace Mpp\GeneraliClientBundle\Model;

class VersementsLibresProgrammes
{
    /**
     * @var ConnaissanceClient|null
     */
    private $dossierClient;

    /**
     * @var VlpMontant|null
     */
    private $versement;

    /**
     * @var array<Repartition>|null
     */
    private $repartition;

    /**
     * @var Reglement|null
     */
    private $reglement;

    /**
     * @var VlpMontant|null
     */
    private $vlpMontant;

    /**
     * Get the value of dossierClient.
     *
     * @return ConnaissanceClient|null
     */
    public function getDossierClient(): ?ConnaissanceClient
    {
        return $this->dossierClient;
    }

    /**
     * Set the value of dossierClient.
     *
     * @param ConnaissanceClient|null $dossierClient
     *
     * @return self
     */
    public function setDossierClient(?ConnaissanceClient $dossierClient): self
    {
        $this->dossierClient = $dossierClient;

        return $this;
    }

    /**
     * Get the value of versement.
     *
     * @return VlpMontant|null
     */
    public function getVersement(): ?VlpMontant
    {
        return $this->versement;
    }

    /**
     * Set the value of versement.
     *
     * @param VlpMontant|null $versement
     *
     * @return self
     */
    public function setVersement(?VlpMontant $versement): self
    {
        $this->versement = $versement;

        return $this;
    }

    /**
     * Get the value of repartition.
     *
     * @return array<Repartition>|null
     */
    public function getRepartition(): ?array
    {
        return $this->repartition;
    }

    /**
     * Set the value of repartition.
     *
     * @param array<Repartition>|null $repartition
     *
     * @return self
     */
    public function setRepartition(?array $repartition): self
    {
        $this->repartition = $repartition;

        return $this;
    }

    /**
     * Get the value of reglement.
     *
     * @return Reglement|null
     */
    public function getReglement(): ?Reglement
    {
        return $this->reglement;
    }

    /**
     * Set the value of reglement.
     *
     * @param Reglement|null $reglement
     *
     * @return self
     */
    public function setReglement(?Reglement $reglement): self
    {
        $this->$reglement = $reglement;

        return $this;
    }

    /**
     * Get the value of vlpMontant.
     *
     * @return VlpMontant|null
     */
    public function getVlpMontant(): ?VlpMontant
    {
        return $this->vlpMontant;
    }

    /**
     * Set the value of vlpMontant.
     *
     * @param VlpMontant|null $vlpMontant
     *
     * @return self
     */
    public function setVlpMontant(?VlpMontant $vlpMontant): self
    {
        $this->vlpMontant = $vlpMontant;

        return $this;
    }
}
