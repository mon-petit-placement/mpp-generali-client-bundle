<?php

namespace Mpp\GeneraliClientBundle\Model;

class TypeDuree
{
    const TYPE_DUREE_CAPITAL_DIFFERE = 'CAPITAL_DIFFERE';
    const TYPE_DUREE_VIE_ENTIERE = 'VIE_ENTIERE';

    /**
     * @var string|null
     */
    private $typeDuree;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var bool|null
     */
    private $dureeNecessaire;

    /**
     * @var int|null
     */
    private $dureeMin;

    /**
     * @var int|null
     */
    private $dureeMax;

    /**
     * Get the value of typeDuree
     *
     * @return  string|null
     */ 
    public function getTypeDuree(): ?string
    {
        return $this->typeDuree;
    }

    /**
     * Set the value of typeDuree
     *
     * @param  string|null  $typeDuree
     *
     * @return  self
     */ 
    public function setTypeDuree(?string $typeDuree): self
    {
        $this->typeDuree = $typeDuree;

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
     * Get the value of dureeNecessaire
     *
     * @return  bool|null
     */ 
    public function getDureeNecessaire(): ?bool
    {
        return $this->dureeNecessaire;
    }

    /**
     * Set the value of dureeNecessaire
     *
     * @param  bool|null  $dureeNecessaire
     *
     * @return  self
     */ 
    public function setDureeNecessaire(?bool $dureeNecessaire): self
    {
        $this->dureeNecessaire = $dureeNecessaire;

        return $this;
    }

    /**
     * Get the value of dureeMin
     *
     * @return  int|null
     */ 
    public function getDureeMin(): ?int
    {
        return $this->dureeMin;
    }

    /**
     * Set the value of dureeMin
     *
     * @param  int|null  $dureeMin
     *
     * @return  self
     */ 
    public function setDureeMin(?int $dureeMin): self
    {
        $this->dureeMin = $dureeMin;

        return $this;
    }

    /**
     * Get the value of dureeMax
     *
     * @return  int|null
     */ 
    public function getDureeMax(): ?int
    {
        return $this->dureeMax;
    }

    /**
     * Set the value of dureeMax
     *
     * @param  int|null  $dureeMax
     *
     * @return  self
     */ 
    public function setDureeMax(?int $dureeMax): self
    {
        $this->dureeMax = $dureeMax;

        return $this;
    }
}
