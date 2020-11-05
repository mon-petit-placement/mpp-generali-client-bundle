<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationSouscription
{
    const MODE_REGLEMENT_AUTHORISE_PRELEVEMENT = 'PRELEVEMENT';
    const MODE_REGLEMENT_AUTHORISE_VIREMENT = 'VIREMENT';
    const MODE_REGLEMENT_AUTHORISE_CHEQUE = 'CHEQUE';
    /**
     * @var array<ClausesBenef>|null
     */
    private $clausesBenefs;

    /**
     * @var array<GarantiePrevoyance>|null
     */
    private $garantiesPrevoyance;

    /**
     * @var string|null
     */
    private $modesReglementAutorises;

    /**
     * @var InfoProduit|null
     */
    private $infoProduit;

    /**
     * @var array<SouscriptionFiscalite>|null
     */
    private $fiscalites;

    /**
     * @var array<TypeDuree>|null
     */
    private $typesDuree;

    /**
     * @var array<TypeDenouement>|null
     */
    private $typesDenouement;

    /**
     * @var array<CombinaisonPossibleSouscription>|null
     */
    private $combinaisonsPossiblesSouscription;

    /**
     * @var array<ModeGestion>|null
     */
    private $modesGestion;

    /**
     * @var ParamVersementInitial|null
     */
    private $paramVersementInitial;

    /**
     * @var ParamVersementLibreProgramme|null
     */
    private $paramVersementLibreProgramme;

    /**
     * @var Referentiel|null
     */
    private $referentiel;

    /**
     * Get the value of clausesBenefs
     *
     * @return  array<ClausesBenef>|null
     */ 
    public function getClausesBenefs(): ?array
    {
        return $this->clausesBenefs;
    }

    /**
     * Set the value of clausesBenefs
     *
     * @param  array<ClausesBenef>|null  $clausesBenefs
     *
     * @return  self
     */ 
    public function setClausesBenefs(?array $clausesBenefs): self
    {
        $this->clausesBenefs = $clausesBenefs;

        return $this;
    }

    /**
     * Get the value of garantiesPrevoyance
     *
     * @return  array<GarantiePrevoyance>|null
     */ 
    public function getGarantiesPrevoyance(): ?array
    {
        return $this->garantiesPrevoyance;
    }

    /**
     * Set the value of garantiesPrevoyance
     *
     * @param  array<GarantiePrevoyance>|null  $garantiesPrevoyance
     *
     * @return  self
     */ 
    public function setGarantiesPrevoyance(?array $garantiesPrevoyance): self
    {
        $this->garantiesPrevoyance = $garantiesPrevoyance;

        return $this;
    }

    /**
     * Get the value of modesReglementAutorises
     *
     * @return  string|null
     */ 
    public function getModesReglementAutorises(): ?string
    {
        return $this->modesReglementAutorises;
    }

    /**
     * Set the value of modesReglementAutorises
     *
     * @param  string|null  $modesReglementAutorises
     *
     * @return  self
     */ 
    public function setModesReglementAutorises(?string $modesReglementAutorises): self
    {
        $this->modesReglementAutorises = $modesReglementAutorises;

        return $this;
    }

    /**
     * Get the value of infoProduit
     *
     * @return  InfoProduit|null
     */ 
    public function getInfoProduit(): ?InfoProduit
    {
        return $this->infoProduit;
    }

    /**
     * Set the value of infoProduit
     *
     * @param  InfoProduit|null  $infoProduit
     *
     * @return  self
     */ 
    public function setInfoProduit(?InfoProduit $infoProduit): self
    {
        $this->infoProduit = $infoProduit;

        return $this;
    }

    /**
     * Get the value of fiscalites
     *
     * @return  array<SouscriptionFiscalite>|null
     */ 
    public function getFiscalites(): ?array
    {
        return $this->fiscalites;
    }

    /**
     * Set the value of fiscalites
     *
     * @param  array<SouscriptionFiscalite>|null  $fiscalites
     *
     * @return  self
     */ 
    public function setFiscalites(?array $fiscalites): self
    {
        $this->fiscalites = $fiscalites;

        return $this;
    }

    /**
     * Get the value of typesDuree
     *
     * @return  array<TypeDuree>|null
     */ 
    public function getTypesDuree(): ?array
    {
        return $this->typesDuree;
    }

    /**
     * Set the value of typesDuree
     *
     * @param  array<TypeDuree>|null  $typesDuree
     *
     * @return  self
     */ 
    public function setTypesDuree(?array $typesDuree): self
    {
        $this->typesDuree = $typesDuree;

        return $this;
    }

    /**
     * Get the value of typesDenouement
     *
     * @return  array<TypeDenouement>|null
     */ 
    public function getTypesDenouement(): ?array
    {
        return $this->typesDenouement;
    }

    /**
     * Set the value of typesDenouement
     *
     * @param  array<TypeDenouement>|null  $typesDenouement
     *
     * @return  self
     */ 
    public function setTypesDenouement(?array $typesDenouement): self
    {
        $this->typesDenouement = $typesDenouement;

        return $this;
    }

    /**
     * Get the value of combinaisonsPossiblesSouscription
     *
     * @return  array<CombinaisonPossibleSouscription>|null
     */ 
    public function getCombinaisonsPossiblesSouscription(): ?array
    {
        return $this->combinaisonsPossiblesSouscription;
    }

    /**
     * Set the value of combinaisonsPossiblesSouscription
     *
     * @param  array<CombinaisonPossibleSouscription>|null  $combinaisonsPossiblesSouscription
     *
     * @return  self
     */ 
    public function setCombinaisonsPossiblesSouscription(?array $combinaisonsPossiblesSouscription): self
    {
        $this->combinaisonsPossiblesSouscription = $combinaisonsPossiblesSouscription;

        return $this;
    }

    /**
     * Get the value of modesGestion
     *
     * @return  array<ModeGestion>|null
     */ 
    public function getModesGestion(): ?array
    {
        return $this->modesGestion;
    }

    /**
     * Set the value of modesGestion
     *
     * @param  array<ModeGestion>|null  $modesGestion
     *
     * @return  self
     */ 
    public function setModesGestion(?array $modesGestion): self
    {
        $this->modesGestion = $modesGestion;

        return $this;
    }

    /**
     * Get the value of paramVersementInitial
     *
     * @return  ParamVersementInitial|null
     */ 
    public function getParamVersementInitial(): ?ParamVersementInitial
    {
        return $this->paramVersementInitial;
    }

    /**
     * Set the value of paramVersementInitial
     *
     * @param  ParamVersementInitial|null  $paramVersementInitial
     *
     * @return  self
     */ 
    public function setParamVersementInitial(?ParamVersementInitial $paramVersementInitial): self
    {
        $this->paramVersementInitial = $paramVersementInitial;

        return $this;
    }

    /**
     * Get the value of paramVersementLibreProgramme
     *
     * @return  ParamVersementLibreProgramme|null
     */ 
    public function getParamVersementLibreProgramme(): ?ParamVersementLibreProgramme
    {
        return $this->paramVersementLibreProgramme;
    }

    /**
     * Set the value of paramVersementLibreProgramme
     *
     * @param  ParamVersementLibreProgramme|null  $paramVersementLibreProgramme
     *
     * @return  self
     */ 
    public function setParamVersementLibreProgramme(?ParamVersementLibreProgramme $paramVersementLibreProgramme): self
    {
        $this->paramVersementLibreProgramme = $paramVersementLibreProgramme;

        return $this;
    }

    /**
     * Get the value of referentiel
     *
     * @return  Referentiel|null
     */ 
    public function getReferentiel(): ?Referentiel
    {
        return $this->referentiel;
    }

    /**
     * Set the value of referentiel
     *
     * @param  Referentiel|null  $referentiel
     *
     * @return  self
     */ 
    public function setReferentiel(?Referentiel $referentiel): self
    {
        $this->referentiel = $referentiel;

        return $this;
    }
}
