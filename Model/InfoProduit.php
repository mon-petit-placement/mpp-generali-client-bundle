<?php

namespace Mpp\GeneraliClientBundle\Model;

class InfoProduit
{
    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var bool|null
     */
    private $gerePBDiffere;

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
     * Get the value of gerePBDiffere
     *
     * @return  bool|null
     */ 
    public function getGerePBDiffere(): ?bool
    {
        return $this->gerePBDiffere;
    }

    /**
     * Set the value of gerePBDiffere
     *
     * @param  bool|null  $gerePBDiffere
     *
     * @return  self
     */ 
    public function setGerePBDiffere(?bool $gerePBDiffere): self
    {
        $this->gerePBDiffere = $gerePBDiffere;

        return $this;
    }
}
