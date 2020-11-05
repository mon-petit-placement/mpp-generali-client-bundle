<?php

namespace Mpp\GeneraliClientBundle\Model;

class SouscripteurNaissance
{
    /**
     * @var string|null
     */
    private $dateNaissance;

    /**
     * @var string|null
     */
    private $lieuNaissance;

    /**
     * @var string|null
     */
    private $codeDepartementNaissance;

    /**
     * @var string|null
     */
    private $paysNaissance;

    /**
     * @var string|null
     */
    private $codeInseeCommuneNaissance;

    /**
     * @var string|null
     */
    private $codePostal;

    /**
     * Get the value of dateNaissance
     *
     * @return  string|null
     */ 
    public function getDateNaissance(): ?string
    {
        return $this->dateNaissance;
    }

    /**
     * Set the value of dateNaissance
     *
     * @param  string|null  $dateNaissance
     *
     * @return  self
     */ 
    public function setDateNaissance(?string $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get the value of lieuNaissance
     *
     * @return  string|null
     */ 
    public function getLieuNaissance(): ?string
    {
        return $this->lieuNaissance;
    }

    /**
     * Set the value of lieuNaissance
     *
     * @param  string|null  $lieuNaissance
     *
     * @return  self
     */ 
    public function setLieuNaissance(?string $lieuNaissance): self
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * Get the value of codeDepartementNaissance
     *
     * @return  string|null
     */ 
    public function getCodeDepartementNaissance(): ?string
    {
        return $this->codeDepartementNaissance;
    }

    /**
     * Set the value of codeDepartementNaissance
     *
     * @param  string|null  $codeDepartementNaissance
     *
     * @return  self
     */ 
    public function setCodeDepartementNaissance(?string $codeDepartementNaissance): self
    {
        $this->codeDepartementNaissance = $codeDepartementNaissance;

        return $this;
    }

    /**
     * Get the value of paysNaissance
     *
     * @return  string|null
     */ 
    public function getPaysNaissance(): ?string
    {
        return $this->paysNaissance;
    }

    /**
     * Set the value of paysNaissance
     *
     * @param  string|null  $paysNaissance
     *
     * @return  self
     */ 
    public function setPaysNaissance(?string $paysNaissance): self
    {
        $this->paysNaissance = $paysNaissance;

        return $this;
    }

    /**
     * Get the value of codeInseeCommuneNaissance
     *
     * @return  string|null
     */ 
    public function getCodeInseeCommuneNaissance(): ?string
    {
        return $this->codeInseeCommuneNaissance;
    }

    /**
     * Set the value of codeInseeCommuneNaissance
     *
     * @param  string|null  $codeInseeCommuneNaissance
     *
     * @return  self
     */ 
    public function setCodeInseeCommuneNaissance(?string $codeInseeCommuneNaissance): self
    {
        $this->codeInseeCommuneNaissance = $codeInseeCommuneNaissance;

        return $this;
    }

    /**
     * Get the value of codePostal
     *
     * @return  string|null
     */ 
    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    /**
     * Set the value of codePostal
     *
     * @param  string|null  $codePostal
     *
     * @return  self
     */ 
    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }
}
