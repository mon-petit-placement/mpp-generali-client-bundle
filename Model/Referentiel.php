<?php

namespace Mpp\GeneraliClientBundle\Model;

class Referentiel
{
    /**
     * @var array<SituationProfessionnelle>|null
     */
    private $situationsProfessionnelles;

    /**
     * @var array<SituationFamiliale>|null
     */
    private $situationsFamiliales;

    /**
     * @var array<TrancheRevenus>|null
     */
    private $tranchesRevenus;

    /**
     * @var array<TranchePatrimoine>|null
     */
    private $tranchesPatrimoine;

    /**
     * @var array<OrigineFonds>|null
     */
    private $originesFonds;

    /**
     * @var array<LienContractant>|null
     */
    private $liensCoContractant;

    /**
     * @var array<FonctionPPE>|null
     */
    private $fonctionsPPE;

    /**
     * @var array<LienContractant>|null
     */
    private $liensContractantPPE;

    /**
     * @var array<ObjectifVersement>|null
     */
    private $objectifsVersement;

    /**
     * @var array<CodeNaf>|null
     */
    private $codesNaf;

    /**
     * @var array<Csp>|null
     */
    private $csps;

    /**
     * @var array<PaysResidenceFiscale>|null
     */
    private $paysResidenceFiscale;

    /**
     * @var array<RegimeMatrimonial>|null
     */
    private $regimesMatrimoniaux;

    /**
     * @var array<RepartitionPatrimoine>|null
     */
    private $repartitionsPatrimoine;

    /**
     * @var array<OriginePatrimoine>|null
     */
    private $originesPatrimoine;

    /**
     * @var array<CapaciteJuridique>|null
     */
    private $capacitesJuridiques;

    /**
     * @var array<Nationalite>|null
     */
    private $nationalites;

    /**
     * @var array<PaysNaissance>|null
     */
    private $paysNaissance;

    /**
     * @var array<PaysAdresse>|null
     */
    private $paysAdresses;

    /**
     * @var array<PaysCrsOcde>|null
     */
    private $paysCrsOcde;

    /**
     * @var array<Civilite>|null
     */
    private $civilites;

    /**
     * @var array<PieceIdentite>|null
     */
    private $piecesIdentite;

    /**
     * @var array<PieceIdentite>|null
     */
    private $secondesPiecesIdentite;

    /**
     * Get the value of situationsProfessionnelles
     *
     * @return  array<SituationProfessionnelle>|null
     */ 
    public function getSituationsProfessionnelles(): ?array
    {
        return $this->situationsProfessionnelles;
    }

    /**
     * Set the value of situationsProfessionnelles
     *
     * @param  array<SituationProfessionnelle>|null  $situationsProfessionnelles
     *
     * @return  self
     */ 
    public function setSituationsProfessionnelles(?array $situationsProfessionnelles): self
    {
        $this->situationsProfessionnelles = $situationsProfessionnelles;

        return $this;
    }

    /**
     * Get the value of situationsFamiliales
     *
     * @return  array<SituationFamiliale>|null
     */ 
    public function getSituationsFamiliales(): ?array
    {
        return $this->situationsFamiliales;
    }

    /**
     * Set the value of situationsFamiliales
     *
     * @param  array<SituationFamiliale>|null  $situationsFamiliales
     *
     * @return  self
     */ 
    public function setSituationsFamiliales(?array $situationsFamiliales): self
    {
        $this->situationsFamiliales = $situationsFamiliales;

        return $this;
    }

    /**
     * Get the value of tranchesRevenus
     *
     * @return  array<TrancheRevenus>|null
     */ 
    public function getTranchesRevenus(): ?array
    {
        return $this->tranchesRevenus;
    }

    /**
     * Set the value of tranchesRevenus
     *
     * @param  array<TrancheRevenus>|null  $tranchesRevenus
     *
     * @return  self
     */ 
    public function setTranchesRevenus(?array $tranchesRevenus): self
    {
        $this->tranchesRevenus = $tranchesRevenus;

        return $this;
    }

    /**
     * Get the value of tranchesPatrimoine
     *
     * @return  array<TranchePatrimoine>|null
     */ 
    public function getTranchesPatrimoine(): ?array
    {
        return $this->tranchesPatrimoine;
    }

    /**
     * Set the value of tranchesPatrimoine
     *
     * @param  array<TranchePatrimoine>|null  $tranchesPatrimoine
     *
     * @return  self
     */ 
    public function setTranchesPatrimoine(?array $tranchesPatrimoine): self
    {
        $this->tranchesPatrimoine = $tranchesPatrimoine;

        return $this;
    }

    /**
     * Get the value of originesFonds
     *
     * @return  array<OrigineFonds>|null
     */ 
    public function getOriginesFonds(): ?array
    {
        return $this->originesFonds;
    }

    /**
     * Set the value of originesFonds
     *
     * @param  array<OrigineFonds>|null  $originesFonds
     *
     * @return  self
     */ 
    public function setOriginesFonds(?array $originesFonds): self
    {
        $this->originesFonds = $originesFonds;

        return $this;
    }

    /**
     * Get the value of liensCoContractant
     *
     * @return  array<LienContractant>|null
     */ 
    public function getLiensCoContractant(): ?array
    {
        return $this->liensCoContractant;
    }

    /**
     * Set the value of liensCoContractant
     *
     * @param  array<LienContractant>|null  $liensCoContractant
     *
     * @return  self
     */ 
    public function setLiensCoContractant(?array $liensCoContractant): self
    {
        $this->liensCoContractant = $liensCoContractant;

        return $this;
    }

    /**
     * Get the value of fonctionsPPE
     *
     * @return  array<FonctionPPE>|null
     */ 
    public function getFonctionsPPE(): ?array
    {
        return $this->fonctionsPPE;
    }

    /**
     * Set the value of fonctionsPPE
     *
     * @param  array<FonctionPPE>|null  $fonctionsPPE
     *
     * @return  self
     */ 
    public function setFonctionsPPE(?array $fonctionsPPE): self
    {
        $this->fonctionsPPE = $fonctionsPPE;

        return $this;
    }

    /**
     * Get the value of liensContractantPPE
     *
     * @return  array<LienContractant>|null
     */ 
    public function getLiensContractantPPE(): ?array
    {
        return $this->liensContractantPPE;
    }

    /**
     * Set the value of liensContractantPPE
     *
     * @param  array<LienContractant>|null  $liensContractantPPE
     *
     * @return  self
     */ 
    public function setLiensContractantPPE(?array $liensContractantPPE): self
    {
        $this->liensContractantPPE = $liensContractantPPE;

        return $this;
    }

    /**
     * Get the value of objectifsVersement
     *
     * @return  array<ObjectifVersement>|null
     */ 
    public function getObjectifsVersement(): ?array
    {
        return $this->objectifsVersement;
    }

    /**
     * Set the value of objectifsVersement
     *
     * @param  array<ObjectifVersement>|null  $objectifsVersement
     *
     * @return  self
     */ 
    public function setObjectifsVersement(?array $objectifsVersement): self
    {
        $this->objectifsVersement = $objectifsVersement;

        return $this;
    }

    /**
     * Get the value of codesNaf
     *
     * @return  array<CodeNaf>|null
     */ 
    public function getCodesNaf(): ?array
    {
        return $this->codesNaf;
    }

    /**
     * Set the value of codesNaf
     *
     * @param  array<CodeNaf>|null  $codesNaf
     *
     * @return  self
     */ 
    public function setCodesNaf(?array $codesNaf): self
    {
        $this->codesNaf = $codesNaf;

        return $this;
    }

    /**
     * Get the value of csps
     *
     * @return  array<Csp>|null
     */ 
    public function getCsps(): ?array
    {
        return $this->csps;
    }

    /**
     * Set the value of csps
     *
     * @param  array<Csp>|null  $csps
     *
     * @return  self
     */ 
    public function setCsps(?array $csps): self
    {
        $this->csps = $csps;

        return $this;
    }

    /**
     * Get the value of paysResidenceFiscale
     *
     * @return  array<PaysResidenceFiscale>|null
     */ 
    public function getPaysResidenceFiscale(): ?array
    {
        return $this->paysResidenceFiscale;
    }

    /**
     * Set the value of paysResidenceFiscale
     *
     * @param  array<PaysResidenceFiscale>|null  $paysResidenceFiscale
     *
     * @return  self
     */ 
    public function setPaysResidenceFiscale(?array $paysResidenceFiscale): self
    {
        $this->paysResidenceFiscale = $paysResidenceFiscale;

        return $this;
    }

    /**
     * Get the value of regimesMatrimoniaux
     *
     * @return  array<RegimeMatrimonial>|null
     */ 
    public function getRegimesMatrimoniaux(): ?array
    {
        return $this->regimesMatrimoniaux;
    }

    /**
     * Set the value of regimesMatrimoniaux
     *
     * @param  array<RegimeMatrimonial>|null  $regimesMatrimoniaux
     *
     * @return  self
     */ 
    public function setRegimesMatrimoniaux(?array $regimesMatrimoniaux): self
    {
        $this->regimesMatrimoniaux = $regimesMatrimoniaux;

        return $this;
    }

    /**
     * Get the value of repartitionsPatrimoine
     *
     * @return  array<RepartitionPatrimoine>|null
     */ 
    public function getRepartitionsPatrimoine(): ?array
    {
        return $this->repartitionsPatrimoine;
    }

    /**
     * Set the value of repartitionsPatrimoine
     *
     * @param  array<RepartitionPatrimoine>|null  $repartitionsPatrimoine
     *
     * @return  self
     */ 
    public function setRepartitionsPatrimoine(?array $repartitionsPatrimoine): self
    {
        $this->repartitionsPatrimoine = $repartitionsPatrimoine;

        return $this;
    }

    /**
     * Get the value of originesPatrimoine
     *
     * @return  array<OriginePatrimoine>|null
     */ 
    public function getOriginesPatrimoine(): ?array
    {
        return $this->originesPatrimoine;
    }

    /**
     * Set the value of originesPatrimoine
     *
     * @param  array<OriginePatrimoine>|null  $originesPatrimoine
     *
     * @return  self
     */ 
    public function setOriginesPatrimoine(?array $originesPatrimoine): self
    {
        $this->originesPatrimoine = $originesPatrimoine;

        return $this;
    }

    /**
     * Get the value of capacitesJuridiques
     *
     * @return  array<CapaciteJuridique>|null
     */ 
    public function getCapacitesJuridiques(): ?array
    {
        return $this->capacitesJuridiques;
    }

    /**
     * Set the value of capacitesJuridiques
     *
     * @param  array<CapaciteJuridique>|null  $capacitesJuridiques
     *
     * @return  self
     */ 
    public function setCapacitesJuridiques(?array $capacitesJuridiques): self
    {
        $this->capacitesJuridiques = $capacitesJuridiques;

        return $this;
    }

    /**
     * Get the value of nationalites
     *
     * @return  array<Nationalite>|null
     */ 
    public function getNationalites(): ?array
    {
        return $this->nationalites;
    }

    /**
     * Set the value of nationalites
     *
     * @param  array<Nationalite>|null  $nationalites
     *
     * @return  self
     */ 
    public function setNationalites(?array $nationalites): self
    {
        $this->nationalites = $nationalites;

        return $this;
    }

    /**
     * Get the value of paysNaissance
     *
     * @return  array<PaysNaissance>|null
     */ 
    public function getPaysNaissance(): ?array
    {
        return $this->paysNaissance;
    }

    /**
     * Set the value of paysNaissance
     *
     * @param  array<PaysNaissance>|null  $paysNaissance
     *
     * @return  self
     */ 
    public function setPaysNaissance(?array $paysNaissance): self
    {
        $this->paysNaissance = $paysNaissance;

        return $this;
    }

    /**
     * Get the value of paysAdresses
     *
     * @return  array<PaysAdresse>|null
     */ 
    public function getPaysAdresses(): ?array
    {
        return $this->paysAdresses;
    }

    /**
     * Set the value of paysAdresses
     *
     * @param  array<PaysAdresse>|null  $paysAdresses
     *
     * @return  self
     */ 
    public function setPaysAdresses(?array $paysAdresses): self
    {
        $this->paysAdresses = $paysAdresses;

        return $this;
    }

    /**
     * Get the value of paysCrsOcde
     *
     * @return  array<PaysCrsOcde>|null
     */ 
    public function getPaysCrsOcde(): ?array
    {
        return $this->paysCrsOcde;
    }

    /**
     * Set the value of paysCrsOcde
     *
     * @param  array<PaysCrsOcde>|null  $paysCrsOcde
     *
     * @return  self
     */ 
    public function setPaysCrsOcde(?array $paysCrsOcde): self
    {
        $this->paysCrsOcde = $paysCrsOcde;

        return $this;
    }

    /**
     * Get the value of civilites
     *
     * @return  array<Civilite>|null
     */ 
    public function getCivilites(): ?array
    {
        return $this->civilites;
    }

    /**
     * Set the value of civilites
     *
     * @param  array<Civilite>|null  $civilites
     *
     * @return  self
     */ 
    public function setCivilites(?array $civilites): self
    {
        $this->civilites = $civilites;

        return $this;
    }

    /**
     * Get the value of piecesIdentite
     *
     * @return  array<PieceIdentite>|null
     */ 
    public function getPiecesIdentite(): ?array
    {
        return $this->piecesIdentite;
    }

    /**
     * Set the value of piecesIdentite
     *
     * @param  array<PieceIdentite>|null  $piecesIdentite
     *
     * @return  self
     */ 
    public function setPiecesIdentite(?array $piecesIdentite): self
    {
        $this->piecesIdentite = $piecesIdentite;

        return $this;
    }

    /**
     * Get the value of secondesPiecesIdentite
     *
     * @return  array<PieceIdentite>|null
     */ 
    public function getSecondesPiecesIdentite(): ?array
    {
        return $this->secondesPiecesIdentite;
    }

    /**
     * Set the value of secondesPiecesIdentite
     *
     * @param  array<PieceIdentite>|null  $secondesPiecesIdentite
     *
     * @return  self
     */ 
    public function setSecondesPiecesIdentite(?array $secondesPiecesIdentite): self
    {
        $this->secondesPiecesIdentite = $secondesPiecesIdentite;

        return $this;
    }
}
