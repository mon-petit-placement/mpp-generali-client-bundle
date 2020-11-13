<?php

namespace Mpp\GeneraliClientBundle\Model;

class Souscription
{
    /**
     * @var string|null
     */
    private $codeSouscription;

    /**
     * @var string|null
     */
    private $referenceCG;

    /**
     * @var string|null
     */
    private $fiscalite;

    /**
     * @var TypeDuree|null
     */
    private $duree;

    /**
     * @var ModeGestion|null
     */
    private $modeGestion;

    /**
     * @var ReferenceExterne|null
     */
    private $referencesExternes;

    /**
     * @var Souscripteur|null
     */
    private $souscripteur;

    /**
     * @var DossierClient|null
     */
    private $dossierClient;

    /**
     * @var VersementInitial|null
     */
    private $versementInitial;

    /**
     * @var VersementsLibresProgrammes|null
     */
    private $versementsLibresProgrammes;

    /**
     * @var Reglement|null
     */
    private $reglement;

    /**
     * @var ClauseBeneficiaireDeces|null
     */
    private $clauseBeneficiaireDeces;

    /**
     * @var string|null
     */
    private $codeGarantiePrevoyance;

    /**
     * @var string|null
     */
    private $commentaire;

    /**
     * @var bool|null
     */
    private $dematerialisationCourriers;

    /**
     * @var string|null
     */
    private $dateSignature;

    /**
     * Get the value of codeSouscription.
     *
     * @return string|null
     */
    public function getCodeSouscription(): ?string
    {
        return $this->codeSouscription;
    }

    /**
     * Set the value of codeSouscription.
     *
     * @param string|null $codeSouscription
     *
     * @return self
     */
    public function setCodeSouscription(?string $codeSouscription): self
    {
        $this->codeSouscription = $codeSouscription;

        return $this;
    }

    /**
     * Get the value of referenceCG.
     *
     * @return string|null
     */
    public function getReferenceCG(): ?string
    {
        return $this->referenceCG;
    }

    /**
     * Set the value of referenceCG.
     *
     * @param string|null $referenceCG
     *
     * @return self
     */
    public function setReferenceCG(?string $referenceCG): self
    {
        $this->referenceCG = $referenceCG;

        return $this;
    }

    /**
     * Get the value of fiscalite.
     *
     * @return string|null
     */
    public function getFiscalite(): ?string
    {
        return $this->fiscalite;
    }

    /**
     * Set the value of fiscalite.
     *
     * @param string|null $fiscalite
     *
     * @return self
     */
    public function setFiscalite(?string $fiscalite): self
    {
        $this->fiscalite = $fiscalite;

        return $this;
    }

    /**
     * Get the value of duree.
     *
     * @return TypeDuree|null
     */
    public function getDuree(): ?TypeDuree
    {
        return $this->duree;
    }

    /**
     * Set the value of duree.
     *
     * @param TypeDuree|null $duree
     *
     * @return self
     */
    public function setDuree(?TypeDuree $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of modeGestion.
     *
     * @return ModeGestion|null
     */
    public function getModeGestion(): ?ModeGestion
    {
        return $this->modeGestion;
    }

    /**
     * Set the value of modeGestion.
     *
     * @param ModeGestion|null $modeGestion
     *
     * @return self
     */
    public function setModeGestion(?ModeGestion $modeGestion): self
    {
        $this->modeGestion = $modeGestion;

        return $this;
    }

    /**
     * Get the value of referencesExternes.
     *
     * @return ReferenceExterne|null
     */
    public function getReferencesExternes(): ?ReferenceExterne
    {
        return $this->referencesExternes;
    }

    /**
     * Set the value of referencesExternes.
     *
     * @param ReferenceExterne|null $referencesExternes
     *
     * @return self
     */
    public function setReferencesExternes(?ReferenceExterne $referencesExternes): self
    {
        $this->referencesExternes = $referencesExternes;

        return $this;
    }

    /**
     * Get the value of souscripteur.
     *
     * @return Souscripteur|null
     */
    public function getSouscripteur(): ?Souscripteur
    {
        return $this->souscripteur;
    }

    /**
     * Set the value of souscripteur.
     *
     * @param Souscripteur|null $souscripteur
     *
     * @return self
     */
    public function setSouscripteur(?Souscripteur $souscripteur): self
    {
        $this->souscripteur = $souscripteur;

        return $this;
    }

    /**
     * Get the value of dossierClient.
     *
     * @return DossierClient|null
     */
    public function getDossierClient(): ?DossierClient
    {
        return $this->dossierClient;
    }

    /**
     * Set the value of dossierClient.
     *
     * @param DossierClient|null $dossierClient
     *
     * @return self
     */
    public function setDossierClient(?DossierClient $dossierClient): self
    {
        $this->dossierClient = $dossierClient;

        return $this;
    }

    /**
     * Get the value of versementInitial.
     *
     * @return VersementInitial|null
     */
    public function getVersementInitial(): ?VersementInitial
    {
        return $this->versementInitial;
    }

    /**
     * Set the value of versementInitial.
     *
     * @param VersementInitial|null $versementInitial
     *
     * @return self
     */
    public function setVersementInitial(?VersementInitial $versementInitial): self
    {
        $this->versementInitial = $versementInitial;

        return $this;
    }

    /**
     * Get the value of versementsLibresProgrammes.
     *
     * @return VersementsLibresProgrammes|null
     */
    public function getVersementsLibresProgrammes(): ?VersementsLibresProgrammes
    {
        return $this->versementsLibresProgrammes;
    }

    /**
     * Set the value of versementsLibresProgrammes.
     *
     * @param VersementsLibresProgrammes|null $versementsLibresProgrammes
     *
     * @return self
     */
    public function setVersementsLibresProgrammes(?VersementsLibresProgrammes $versementsLibresProgrammes): self
    {
        $this->versementsLibresProgrammes = $versementsLibresProgrammes;

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
     * Get the value of clauseBeneficiaireDeces.
     *
     * @return ClauseBeneficiaireDeces|null
     */
    public function getClauseBeneficiaireDeces(): ?ClauseBeneficiaireDeces
    {
        return $this->clauseBeneficiaireDeces;
    }

    /**
     * Set the value of clauseBeneficiaireDeces.
     *
     * @param ClauseBeneficiaireDeces|null $clauseBeneficiaireDeces
     *
     * @return self
     */
    public function setClauseBeneficiaireDeces(?ClauseBeneficiaireDeces $clauseBeneficiaireDeces): self
    {
        $this->clauseBeneficiaireDeces = $clauseBeneficiaireDeces;

        return $this;
    }

    /**
     * Get the value of codeGarantiePrevoyance.
     *
     * @return string|null
     */
    public function getCodeGarantiePrevoyance(): ?string
    {
        return $this->codeGarantiePrevoyance;
    }

    /**
     * Set the value of codeGarantiePrevoyance.
     *
     * @param string|null $codeGarantiePrevoyance
     *
     * @return self
     */
    public function setCodeGarantiePrevoyance(?string $codeGarantiePrevoyance): self
    {
        $this->codeGarantiePrevoyance = $codeGarantiePrevoyance;

        return $this;
    }

    /**
     * Get the value of commentaire.
     *
     * @return string|null
     */
    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire.
     *
     * @param string|null $commentaire
     *
     * @return self
     */
    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get the value of dematerialisationCourriers.
     *
     * @return bool|null
     */
    public function getDematerialisationCourriers(): ?bool
    {
        return $this->dematerialisationCourriers;
    }

    /**
     * Set the value of dematerialisationCourriers.
     *
     * @param bool|null $dematerialisationCourriers
     *
     * @return self
     */
    public function setDematerialisationCourriers(?bool $dematerialisationCourriers): self
    {
        $this->dematerialisationCourriers = $dematerialisationCourriers;

        return $this;
    }

    /**
     * Get the value of dateSignature.
     *
     * @return string|null
     */
    public function getDateSignature(): ?string
    {
        return $this->dateSignature;
    }

    /**
     * Set the value of dateSignature.
     *
     * @param string|null $dateSignature
     *
     * @return self
     */
    public function setDateSignature(?string $dateSignature): self
    {
        $this->dateSignature = $dateSignature;

        return $this;
    }
}
