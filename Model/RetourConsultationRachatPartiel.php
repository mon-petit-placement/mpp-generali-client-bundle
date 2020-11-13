<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationRachatPartiel
{
    /**
     * @var Seuils|null
     */
    private $seuils;

    /**
     * @var bool|null
     */
    private $repartitionLibrePossible;

    /**
     * @var bool|null
     */
    private $rp72Possible;

    /**
     * @var InformationSaisieMotifSortie|null
     */
    private $informationSaisieMotifSortie;

    /**
     * @var array<Fiscalite>|null
     */
    private $listeFiscalites;

    /**
     * @var EpargneAtteinte|null
     */
    private $epargneAtteinte;

    /**
     * @var array<IbanVirement>|null
     */
    private $listeIbanVirement;

    /**
     * @var array<MotifDeRachat>|null
     */
    private $motifsDeRachat;

    /**
     * Get the value of seuils.
     *
     * @return Seuils|null
     */
    public function getSeuils(): ?Seuils
    {
        return $this->seuils;
    }

    /**
     * Set the value of seuils.
     *
     * @param Seuils|null $seuils
     *
     * @return self
     */
    public function setSeuils(?Seuils $seuils): self
    {
        $this->seuils = $seuils;

        return $this;
    }

    /**
     * Get the value of repartitionLibrePossible.
     *
     * @return bool|null
     */
    public function getRepartitionLibrePossible(): ?bool
    {
        return $this->repartitionLibrePossible;
    }

    /**
     * Set the value of repartitionLibrePossible.
     *
     * @param bool|null $repartitionLibrePossible
     *
     * @return self
     */
    public function setRepartitionLibrePossible(?bool $repartitionLibrePossible): self
    {
        $this->repartitionLibrePossible = $repartitionLibrePossible;

        return $this;
    }

    /**
     * Get the value of rp72Possible.
     *
     * @return bool|null
     */
    public function getRp72Possible(): ?bool
    {
        return $this->rp72Possible;
    }

    /**
     * Set the value of rp72Possible.
     *
     * @param bool|null $rp72Possible
     *
     * @return self
     */
    public function setRp72Possible(?bool $rp72Possible): self
    {
        $this->rp72Possible = $rp72Possible;

        return $this;
    }

    /**
     * Get the value of informationSaisieMotifSortie.
     *
     * @return InformationSaisieMotifSortie|null
     */
    public function getInformationSaisieMotifSortie(): ?InformationSaisieMotifSortie
    {
        return $this->informationSaisieMotifSortie;
    }

    /**
     * Set the value of informationSaisieMotifSortie.
     *
     * @param InformationSaisieMotifSortie|null $informationSaisieMotifSortie
     *
     * @return self
     */
    public function setInformationSaisieMotifSortie(?InformationSaisieMotifSortie $informationSaisieMotifSortie): self
    {
        $this->informationSaisieMotifSortie = $informationSaisieMotifSortie;

        return $this;
    }

    /**
     * Get the value of listeFiscalites.
     *
     * @return array<Fiscalite>|null
     */
    public function getListeFiscalites(): ?array
    {
        return $this->listeFiscalites;
    }

    /**
     * Set the value of listeFiscalites.
     *
     * @param array<Fiscalite>|null $listeFiscalites
     *
     * @return self
     */
    public function setListeFiscalites(?array $listeFiscalites): self
    {
        $this->listeFiscalites = $listeFiscalites;

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
     * Get the value of listeIbanVirement.
     *
     * @return array<IbanVirement>|null
     */
    public function getListeIbanVirement(): ?array
    {
        return $this->listeIbanVirement;
    }

    /**
     * Set the value of listeIbanVirement.
     *
     * @param array<IbanVirement>|null $listeIbanVirement
     *
     * @return self
     */
    public function setListeIbanVirement(?array $listeIbanVirement): self
    {
        $this->listeIbanVirement = $listeIbanVirement;

        return $this;
    }

    /**
     * Get the value of motifsDeRachat.
     *
     * @return array<MotifDeRachat>|null
     */
    public function getMotifsDeRachat(): ?array
    {
        return $this->motifsDeRachat;
    }

    /**
     * Set the value of motifsDeRachat.
     *
     * @param array<MotifDeRachat>|null $motifsDeRachat
     *
     * @return self
     */
    public function setMotifsDeRachat(?array $motifsDeRachat): self
    {
        $this->motifsDeRachat = $motifsDeRachat;

        return $this;
    }
}
