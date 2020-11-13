<?php

namespace Mpp\GeneraliClientBundle\Model;

class Profil
{
    /**
     * @var string|null
     */
    private $idProfilGestion;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var string|null
     */
    private $descriptif;

    /**
     * Get the value of idProfilGestion.
     *
     * @return string|null
     */
    public function getIdProfilGestion(): ?string
    {
        return $this->idProfilGestion;
    }

    /**
     * Set the value of idProfilGestion.
     *
     * @param string|null $idProfilGestion
     *
     * @return self
     */
    public function setIdProfilGestion(?string $idProfilGestion): self
    {
        $this->idProfilGestion = $idProfilGestion;

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
}
