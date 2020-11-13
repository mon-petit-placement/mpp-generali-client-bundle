<?php

namespace Mpp\GeneraliClientBundle\Model;

class PaysNaissance
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var array<Departement>|null
     */
    private $departements;

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
     * Get the value of departements.
     *
     * @return array<Departement>|null
     */
    public function getDepartements(): ?array
    {
        return $this->departements;
    }

    /**
     * Set the value of departements.
     *
     * @param array<Departement>|null $departements
     *
     * @return self
     */
    public function setDepartements(?array $departements): self
    {
        $this->departements = $departements;

        return $this;
    }
}
