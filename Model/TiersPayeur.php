<?php

namespace Mpp\GeneraliClientBundle\Model;

class TiersPayeur
{
    /**
     * @var bool|null
     */
    private $personnePhysique;

    /**
     * @var string|null
     */
    private $nom;

    /**
     * @var string|null
     */
    private $prenom;

    /**
     * @var string|null
     */
    private $adresse;

    /**
     * @var bool|null
     */
    private $parenteAvecSouscripteur;

    /**
     * @var string|null
     */
    private $precisionLienAvecSouscripteur;

    /**
     * @var string|null
     */
    private $motifIntervention;

    /**
     * @var PieceIdentite|null
     */
    private $pieceIdentite;

    /**
     * Get the value of personnePhysique
     *
     * @return  bool|null
     */
    public function getPersonnePhysique(): ?bool
    {
        return $this->personnePhysique;
    }

    /**
     * Set the value of personnePhysique
     *
     * @param  bool|null  $personnePhysique
     *
     * @return  self
     */
    public function setPersonnePhysique(?bool $personnePhysique): self
    {
        $this->personnePhysique = $personnePhysique;

        return $this;
    }

    /**
     * Get the value of nom
     *
     * @return  string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param  string|null  $nom
     *
     * @return  self
     */
    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     *
     * @return  string|null
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @param  string|null  $prenom
     *
     * @return  self
     */
    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of adresse
     *
     * @return  string|null
     */
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @param  string|null  $adresse
     *
     * @return  self
     */
    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of parenteAvecSouscripteur
     *
     * @return  bool|null
     */
    public function getParenteAvecSouscripteur(): ?bool
    {
        return $this->parenteAvecSouscripteur;
    }

    /**
     * Set the value of parenteAvecSouscripteur
     *
     * @param  bool|null  $parenteAvecSouscripteur
     *
     * @return  self
     */
    public function setParenteAvecSouscripteur(?bool $parenteAvecSouscripteur): self
    {
        $this->parenteAvecSouscripteur = $parenteAvecSouscripteur;

        return $this;
    }

    /**
     * Get the value of precisionLienAvecSouscripteur
     *
     * @return  string|null
     */
    public function getPrecisionLienAvecSouscripteur(): ?string
    {
        return $this->precisionLienAvecSouscripteur;
    }

    /**
     * Set the value of precisionLienAvecSouscripteur
     *
     * @param  string|null  $precisionLienAvecSouscripteur
     *
     * @return  self
     */
    public function setPrecisionLienAvecSouscripteur(?string $precisionLienAvecSouscripteur): self
    {
        $this->precisionLienAvecSouscripteur = $precisionLienAvecSouscripteur;

        return $this;
    }

    /**
     * Get the value of motifIntervention
     *
     * @return  string|null
     */
    public function getMotifIntervention(): ?string
    {
        return $this->motifIntervention;
    }

    /**
     * Set the value of motifIntervention
     *
     * @param  string|null  $motifIntervention
     *
     * @return  self
     */
    public function setMotifIntervention(?string $motifIntervention): self
    {
        $this->motifIntervention = $motifIntervention;

        return $this;
    }

    /**
     * Get the value of pieceIdentite
     *
     * @return  PieceIdentite|null
     */
    public function getPieceIdentite(): ?PieceIdentite
    {
        return $this->pieceIdentite;
    }

    /**
     * Set the value of pieceIdentite
     *
     * @param  PieceIdentite|null  $pieceIdentite
     *
     * @return  self
     */
    public function setPieceIdentite(?PieceIdentite $pieceIdentite): self
    {
        $this->pieceIdentite = $pieceIdentite;

        return $this;
    }
}
