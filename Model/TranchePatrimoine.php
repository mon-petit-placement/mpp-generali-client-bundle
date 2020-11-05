<?php

namespace Mpp\GeneraliClientBundle\Model;

class TranchePatrimoine
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
     * @var int|null
     */
    private $trancheMin;

    /**
     * @var int|null
     */
    private $trancheMax;

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
     * Get the value of trancheMin
     *
     * @return  int|null
     */ 
    public function getTrancheMin(): ?int
    {
        return $this->trancheMin;
    }

    /**
     * Set the value of trancheMin
     *
     * @param  int|null  $trancheMin
     *
     * @return  self
     */ 
    public function setTrancheMin(?int $trancheMin): self
    {
        $this->trancheMin = $trancheMin;

        return $this;
    }

    /**
     * Get the value of trancheMax
     *
     * @return  int|null
     */ 
    public function getTrancheMax(): ?int
    {
        return $this->trancheMax;
    }

    /**
     * Set the value of trancheMax
     *
     * @param  int|null  $trancheMax
     *
     * @return  self
     */ 
    public function setTrancheMax(?int $trancheMax): self
    {
        $this->trancheMax = $trancheMax;

        return $this;
    }
}
