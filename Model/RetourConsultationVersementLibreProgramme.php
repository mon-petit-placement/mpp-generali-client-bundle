<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationVersementLibreProgramme
{
    /**
     * @var InfosContrat|null
     */
    private $infosContrat;

    /**
     * @var ParametrageVersementLibreProgramme|null
     */
    private $parametrageVersementLibreProgramme;

    /**
     * @var array<FondsInvestissable>|null
     */
    private $fondsInvestissables;

    /**
     * @var Referentiel|null
     */
    private $referentiel;

    /**
     * @var array<IbanVirement>|null
     */
    private $comptesBancairesPrelevement;

    /**
     * @var ConnaissanceClient|null
     */
    private $connaissanceClient;

    /**
     * @var EpargneAtteinte|null
     */
    private $epargneAtteinte;

    /**
     * @var InfoVersement|null
     */
    private $infoVersement;

    /**
     * Get the value of infosContrat.
     *
     * @return InfosContrat|null
     */
    public function getInfosContrat(): ?InfosContrat
    {
        return $this->infosContrat;
    }

    /**
     * Set the value of infosContrat.
     *
     * @param InfosContrat|null $infosContrat
     *
     * @return self
     */
    public function setInfosContrat(?InfosContrat $infosContrat): self
    {
        $this->infosContrat = $infosContrat;

        return $this;
    }

    /**
     * Get the value of parametrageVersementLibreProgramme.
     *
     * @return ParametrageVersementLibreProgramme|null
     */
    public function getParametrageVersementLibreProgramme(): ?ParametrageVersementLibreProgramme
    {
        return $this->parametrageVersementLibreProgramme;
    }

    /**
     * Set the value of parametrageVersementLibreProgramme.
     *
     * @param ParametrageVersementLibreProgramme|null $parametrageVersementLibreProgramme
     *
     * @return self
     */
    public function setParametrageVersementLibreProgramme(?ParametrageVersementLibreProgramme $parametrageVersementLibreProgramme): self
    {
        $this->parametrageVersementLibreProgramme = $parametrageVersementLibreProgramme;

        return $this;
    }

    /**
     * Get the value of fondsInvestissables.
     *
     * @return array<FondsInvestissable>|null
     */
    public function getFondsInvestissables(): ?array
    {
        return $this->fondsInvestissables;
    }

    /**
     * Set the value of fondsInvestissables.
     *
     * @param array<FondsInvestissable>|null $fondsInvestissables
     *
     * @return self
     */
    public function setFondsInvestissables(?array $fondsInvestissables): self
    {
        $this->fondsInvestissables = $fondsInvestissables;

        return $this;
    }

    /**
     * Get the value of referentiel.
     *
     * @return Referentiel|null
     */
    public function getReferentiel(): ?Referentiel
    {
        return $this->referentiel;
    }

    /**
     * Set the value of referentiel.
     *
     * @param Referentiel|null $referentiel
     *
     * @return self
     */
    public function setReferentiel(?Referentiel $referentiel): self
    {
        $this->referentiel = $referentiel;

        return $this;
    }

    /**
     * Get the value of comptesBancairesPrelevement.
     *
     * @return array<IbanVirement>|null
     */
    public function getComptesBancairesPrelevement(): ?array
    {
        return $this->comptesBancairesPrelevement;
    }

    /**
     * Set the value of comptesBancairesPrelevement.
     *
     * @param array<IbanVirement>|null $comptesBancairesPrelevement
     *
     * @return self
     */
    public function setComptesBancairesPrelevement(?array $comptesBancairesPrelevement): self
    {
        $this->comptesBancairesPrelevement = $comptesBancairesPrelevement;

        return $this;
    }

    /**
     * Get the value of connaissanceClient.
     *
     * @return ConnaissanceClient|null
     */
    public function getConnaissanceClient(): ?ConnaissanceClient
    {
        return $this->connaissanceClient;
    }

    /**
     * Set the value of connaissanceClient.
     *
     * @param ConnaissanceClient|null $connaissanceClient
     *
     * @return self
     */
    public function setConnaissanceClient(?ConnaissanceClient $connaissanceClient): self
    {
        $this->connaissanceClient = $connaissanceClient;

        return $this;
    }

    /**
     * Get the value of epargneAtteinte.
     *
     * @return EpargneAtteinte|null
     */
    public function getEpargneAtteinte(): ?EpargneAtteinte
    {
        return $this->epargneAtteinte;
    }

    /**
     * Set the value of epargneAtteinte.
     *
     * @param EpargneAtteinte|null $epargneAtteinte
     *
     * @return self
     */
    public function setEpargneAtteinte(?EpargneAtteinte $epargneAtteinte): self
    {
        $this->epargneAtteinte = $epargneAtteinte;

        return $this;
    }

    /**
     * Get the value of infoVersement.
     *
     * @return InfoVersement|null
     */
    public function getInfoVersement(): ?InfoVersement
    {
        return $this->infoVersement;
    }

    /**
     * Set the value of infoVersement.
     *
     * @param InfoVersement|null $infoVersement
     *
     * @return self
     */
    public function setInfoVersement(?InfoVersement $infoVersement): self
    {
        $this->infoVersement = $infoVersement;

        return $this;
    }
}
