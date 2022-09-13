<?php

namespace Mpp\GeneraliClientBundle\Model;

class Repartition
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var bool|null
     */
    private $avenantValide;

    /**
     * @var string
     */
    private $codeFonds;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var string|null
     */
    private $codeIsin;

    /**
     * @var float|null
     */
    private $epargneAtteinte;

    /**
     * @var float|null
     */
    private $pourcentageRepartition;

    /**
     * @var float|null
     */
    private $montant;

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
    private $anneeTermeEngagement;

    /**
     * @var int|null
     */
    private $numEngagement;

    /**
     * @var bool|null
     */
    private $encoursValidation;

    /**
     * @var bool|null
     */
    private $nonDesinvestissable;

    /**
     * Get the value of code.
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set the value of code.
     *
     * @param string|null $code
     *
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAvenantValide(): ?bool
    {
        return $this->avenantValide;
    }

    /**
     * @param bool|null $avenantValide
     *
     * @return Repartition
     */
    public function setAvenantValide(?bool $avenantValide): Repartition
    {
        $this->avenantValide = $avenantValide;

        return $this;
    }

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
     * Get the value of libelle.
     *
     * @return string|null
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle.
     *
     * @param string|null $libelle
     *
     * @return self
     */
    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of codeIsin.
     *
     * @return string|null
     */
    public function getCodeIsin(): ?string
    {
        return $this->codeIsin;
    }

    /**
     * Set the value of codeIsin.
     *
     * @param string|null $codeIsin
     *
     * @return self
     */
    public function setCodeIsin(?string $codeIsin): self
    {
        $this->codeIsin = $codeIsin;

        return $this;
    }

    /**
     * Get the value of epargneAtteinte.
     *
     * @return float|null
     */
    public function getEpargneAtteinte(): ?float
    {
        return $this->epargneAtteinte;
    }

    /**
     * Set the value of epargneAtteinte.
     *
     * @param float|null $epargneAtteinte
     *
     * @return self
     */
    public function setEpargneAtteinte(?float $epargneAtteinte): self
    {
        $this->epargneAtteinte = $epargneAtteinte;

        return $this;
    }

    /**
     * Get the value of pourcentageRepartition.
     *
     * @return float|null
     */
    public function getPourcentageRepartition(): ?float
    {
        return $this->pourcentageRepartition;
    }

    /**
     * Set the value of pourcentageRepartition.
     *
     * @param float|null $pourcentageRepartition
     *
     * @return self
     */
    public function setPourcentageRepartition(?float $pourcentageRepartition): self
    {
        $this->pourcentageRepartition = $pourcentageRepartition;

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
     * Get the value of anneeTermeEngagement.
     *
     * @return int|null
     */
    public function getAnneeTermeEngagement(): ?int
    {
        return $this->anneeTermeEngagement;
    }

    /**
     * Set the value of anneeTermeEngagement.
     *
     * @param int|null $anneeTermeEngagement
     *
     * @return self
     */
    public function setAnneeTermeEngagement(?int $anneeTermeEngagement): self
    {
        $this->anneeTermeEngagement = $anneeTermeEngagement;

        return $this;
    }

    /**
     * Get the value of numEngagement.
     *
     * @return int|null
     */
    public function getNumEngagement(): ?int
    {
        return $this->numEngagement;
    }

    /**
     * Set the value of numEngagement.
     *
     * @param int|null $numEngagement
     *
     * @return self
     */
    public function setNumEngagement(?int $numEngagement): self
    {
        $this->numEngagement = $numEngagement;

        return $this;
    }

    /**
     * Get the value of encoursValidation.
     *
     * @return bool|null
     */
    public function getEncoursValidation(): ?bool
    {
        return $this->encoursValidation;
    }

    /**
     * Set the value of encoursValidation.
     *
     * @param bool|null $encoursValidation
     *
     * @return self
     */
    public function setEncoursValidation(?bool $encoursValidation): self
    {
        $this->encoursValidation = $encoursValidation;

        return $this;
    }

    /**
     * Get the value of nonDesinvestissable.
     *
     * @return bool|null
     */
    public function getNonDesinvestissable(): ?bool
    {
        return $this->nonDesinvestissable;
    }

    /**
     * Set the value of nonDesinvestissable.
     *
     * @param bool|null $nonDesinvestissable
     *
     * @return self
     */
    public function setNonDesinvestissable(?bool $nonDesinvestissable): self
    {
        $this->nonDesinvestissable = $nonDesinvestissable;

        return $this;
    }
}
