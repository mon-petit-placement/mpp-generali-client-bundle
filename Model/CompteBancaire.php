<?php

namespace Mpp\GeneraliClientBundle\Model;

class CompteBancaire
{
    /**
     * @var string|null
     */
    private $iban;

    /**
     * @var string|null
     */
    private $bic;

    /**
     * @var string|null
     */
    private $domiciliation;

    /**
     * @var string|null
     */
    private $titulaire;

    /**
     * @var bool|null
     */
    private $actif;

    /**
     * @var bool|null
     */
    private $autorise;

    /**
     * Get the value of iban
     *
     * @return  string|null
     */ 
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * Set the value of iban
     *
     * @param  string|null  $iban
     *
     * @return  self
     */ 
    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get the value of bic
     *
     * @return  string|null
     */ 
    public function getBic(): ?string
    {
        return $this->bic;
    }

    /**
     * Set the value of bic
     *
     * @param  string|null  $bic
     *
     * @return  self
     */ 
    public function setBic(?string $bic): self
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * Get the value of domiciliation
     *
     * @return  string|null
     */ 
    public function getDomiciliation(): ?string
    {
        return $this->domiciliation;
    }

    /**
     * Set the value of domiciliation
     *
     * @param  string|null  $domiciliation
     *
     * @return  self
     */ 
    public function setDomiciliation(?string $domiciliation): self
    {
        $this->domiciliation = $domiciliation;

        return $this;
    }

    /**
     * Get the value of titulaire
     *
     * @return  string|null
     */ 
    public function getTitulaire(): ?string
    {
        return $this->titulaire;
    }

    /**
     * Set the value of titulaire
     *
     * @param  string|null  $titulaire
     *
     * @return  self
     */ 
    public function setTitulaire(?string $titulaire): self
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    /**
     * Get the value of actif
     *
     * @return  bool
     */ 
    public function getActif(): bool
    {
        return $this->actif;
    }

    /**
     * Set the value of actif
     *
     * @param  bool  $actif
     *
     * @return  self
     */ 
    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get the value of autorise
     *
     * @return  bool
     */ 
    public function getAutorise(): bool
    {
        return $this->autorise;
    }

    /**
     * Set the value of autorise
     *
     * @param  bool  $autorise
     *
     * @return  self
     */ 
    public function setAutorise(bool $autorise): self
    {
        $this->autorise = $autorise;

        return $this;
    }
}
