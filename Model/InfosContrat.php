<?php

namespace Mpp\GeneraliClientBundle\Model;

class InfosContrat
{
    /**
     * @var string|null
     */
    private $numeroContrat;

    /**
     * @var string|null
     */
    private $libelleProduit;

    /**
     * @var string|null
     */
    private $codeProduit;

    /**
     * @var string|null
     */
    private $modeGestion;

    /**
     * @var string|null
     */
    private $nomProfil;

    /**
     * Get the value of numeroContrat.
     *
     * @return string|null
     */
    public function getNumeroContrat(): ?string
    {
        return $this->numeroContrat;
    }

    /**
     * Set the value of numeroContrat.
     *
     * @param string|null $numeroContrat
     *
     * @return self
     */
    public function setNumeroContrat(?string $numeroContrat): self
    {
        $this->numeroContrat = $numeroContrat;

        return $this;
    }

    /**
     * Get the value of libelleProduit.
     *
     * @return string|null
     */
    public function getLibelleProduit(): ?string
    {
        return $this->libelleProduit;
    }

    /**
     * Set the value of libelleProduit.
     *
     * @param string|null $libelleProduit
     *
     * @return self
     */
    public function setLibelleProduit(?string $libelleProduit): self
    {
        $this->libelleProduit = $libelleProduit;

        return $this;
    }

    /**
     * Get the value of codeProduit.
     *
     * @return string|null
     */
    public function getCodeProduit(): ?string
    {
        return $this->codeProduit;
    }

    /**
     * Set the value of codeProduit.
     *
     * @param string|null $codeProduit
     *
     * @return self
     */
    public function setCodeProduit(?string $codeProduit): self
    {
        $this->codeProduit = $codeProduit;

        return $this;
    }

    /**
     * Get the value of modeGestion.
     *
     * @return string|null
     */
    public function getModeGestion(): ?string
    {
        return $this->modeGestion;
    }

    /**
     * Set the value of modeGestion.
     *
     * @param string|null $modeGestion
     *
     * @return self
     */
    public function setModeGestion(?string $modeGestion): self
    {
        $this->modeGestion = $modeGestion;

        return $this;
    }

    /**
     * Get the value of nomProfil.
     *
     * @return string|null
     */
    public function getNomProfil(): ?string
    {
        return $this->nomProfil;
    }

    /**
     * Set the value of nomProfil.
     *
     * @param string|null $nomProfil
     *
     * @return self
     */
    public function setNomProfil(?string $nomProfil): self
    {
        $this->nomProfil = $nomProfil;

        return $this;
    }
}
