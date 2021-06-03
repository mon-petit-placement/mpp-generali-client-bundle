<?php

namespace Mpp\GeneraliClientBundle\Model;

class VersementLibre
{
    /**
     * @var ConnaissanceClient|null
     */
    private $dossierClient;

    /**
     * @var array<Repartition>|null
     */
    private $repartition;

    /**
     * @var Reglement|null
     */
    private $reglement;

    /**
     * @var int|null
     */
    private $montant;

    /**
     * @var string|null
     */
    private $numeroOperationExterne;

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
        $this->reglement = $reglement;

        return $this;
    }

    /**
     * Get the value of montant.
     *
     * @return int|null
     */
    public function getMontant(): ?int
    {
        return $this->montant;
    }

    /**
     * Set the value of montant.
     *
     * @param int|null $montant
     *
     * @return self
     */
    public function setMontant(?int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumeroOperationExterne(): ?string
    {
        return $this->numeroOperationExterne;
    }

    /**
     * @param string|null $numeroOperationExterne
     *
     * @return VersementLibre
     */
    public function setNumeroOperationExterne(?string $numeroOperationExterne): VersementLibre
    {
        $this->numeroOperationExterne = $numeroOperationExterne;

        return $this;
    }
}
