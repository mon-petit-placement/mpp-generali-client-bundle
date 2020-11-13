<?php

namespace Mpp\GeneraliClientBundle\Model;

class ModeGestion
{
    const TYPE_MODE_GESTION_LIBRE = 'LIBRE';
    const TYPE_MODE_GESTION_PILOTEE = 'PILOTEE';
    const TYPE_MODE_GESTION_PROFILEE = 'PROFILEE';
    const TYPE_MODE_GESTION_HORIZON_RETRAITE = 'HORIZON_RETRAITE';
    const TYPE_MODE_GESTION_DEDIEEE = 'DEDIEE';
    const TYPE_MODE_GESTION_CONSEILLEE = 'CONSEILLEE';
    const TYPE_MODE_GESTION_MULTIPROFILEE = 'MULTIPROFILEE';

    /**
     * @var string|null
     */
    private $idModeGestion;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var string|null
     */
    private $descriptif;

    /**
     * @var string|null
     */
    private $typeModeGestion;

    /**
     * @var array<Profil>|null
     */
    private $profils;

    /**
     * Get the value of idModeGestion.
     *
     * @return string|null
     */
    public function getIdModeGestion(): ?string
    {
        return $this->idModeGestion;
    }

    /**
     * Set the value of idModeGestion.
     *
     * @param string|null $idModeGestion
     *
     * @return self
     */
    public function setIdModeGestion(?string $idModeGestion): self
    {
        $this->idModeGestion = $idModeGestion;

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
     * Get the value of descriptif.
     *
     * @return string|null
     */
    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    /**
     * Set the value of descriptif.
     *
     * @param string|null $descriptif
     *
     * @return self
     */
    public function setDescriptif(?string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    /**
     * Get the value of typeModeGestion.
     *
     * @return string|null
     */
    public function getTypeModeGestion(): ?string
    {
        return $this->typeModeGestion;
    }

    /**
     * Set the value of typeModeGestion.
     *
     * @param string|null $typeModeGestion
     *
     * @return self
     */
    public function setTypeModeGestion(?string $typeModeGestion): self
    {
        $this->typeModeGestion = $typeModeGestion;

        return $this;
    }

    /**
     * Get the value of profils.
     *
     * @return array<Profil>|null
     */
    public function getProfils(): ?array
    {
        return $this->profils;
    }

    /**
     * Set the value of profils.
     *
     * @param array<Profil>|null $profils
     *
     * @return self
     */
    public function setProfils(?array $profils): self
    {
        $this->profils = $profils;

        return $this;
    }
}
