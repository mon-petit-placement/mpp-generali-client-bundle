<?php

namespace Mpp\GeneraliClientBundle\Model;

class SituationProfessionnelle
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
     * @var array<Csp>|null
     */
    private $listeCsp;

    /**
     * Get the value of code
     *
     * @return  string|null
     */ 
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @param  string|null  $code
     *
     * @return  self
     */ 
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of libelle
     *
     * @return  string|null
     */ 
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @param  string|null  $libelle
     *
     * @return  self
     */ 
    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of listeCsp
     *
     * @return  array<Csp>|null
     */ 
    public function getListeCsp(): ?array
    {
        return $this->listeCsp;
    }

    /**
     * Set the value of listeCsp
     *
     * @param  array<Csp>|null  $listeCsp
     *
     * @return  self
     */ 
    public function setListeCsp(?array $listeCsp): self
    {
        $this->listeCsp = $listeCsp;

        return $this;
    }
}
