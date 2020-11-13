<?php

namespace Mpp\GeneraliClientBundle\Model;

class AdressePostale
{
    /**
     * @var string|null
     */
    private $adresse3LibelleVoie;

    /**
     * @var string|null
     */
    private $codePostal;

    /**
     * @var string|null
     */
    private $commune;

    /**
     * @var string|null
     */
    private $codePays;

    /**
     * @var bool|null
     */
    private $nePasNormaliser;

    /**
     * Get the value of adresse3LibelleVoie.
     *
     * @return string|null
     */
    public function getAdresse3LibelleVoie(): ?string
    {
        return $this->adresse3LibelleVoie;
    }

    /**
     * Set the value of adresse3LibelleVoie.
     *
     * @param string|null $adresse3LibelleVoie
     *
     * @return self
     */
    public function setAdresse3LibelleVoie(?string $adresse3LibelleVoie): self
    {
        $this->adresse3LibelleVoie = $adresse3LibelleVoie;

        return $this;
    }

    /**
     * Get the value of codePostal.
     *
     * @return string|null
     */
    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal.
     *
     * @param string|null $codePostal
     *
     * @return self
     */
    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get the value of commune.
     *
     * @return string|null
     */
    public function getCommune(): ?string
    {
        return $this->commune;
    }

    /**
     * Set the value of commune.
     *
     * @param string|null $commune
     *
     * @return self
     */
    public function setCommune(?string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get the value of codePays.
     *
     * @return string|null
     */
    public function getCodePays(): ?string
    {
        return $this->codePays;
    }

    /**
     * Set the value of codePays.
     *
     * @param string|null $codePays
     *
     * @return self
     */
    public function setCodePays(?string $codePays): self
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * Get the value of nePasNormaliser.
     *
     * @return bool|null
     */
    public function getNePasNormaliser(): ?bool
    {
        return $this->nePasNormaliser;
    }

    /**
     * Set the value of nePasNormaliser.
     *
     * @param bool|null $nePasNormaliser
     *
     * @return self
     */
    public function setNePasNormaliser(?bool $nePasNormaliser): self
    {
        $this->nePasNormaliser = $nePasNormaliser;

        return $this;
    }
}
