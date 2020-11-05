<?php

namespace Mpp\GeneraliClientBundle\Model;

class RevenusAnnuelsNetFoyer
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var float|null
     */
    private $montant;

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
     * Get the value of montant
     *
     * @return  float|null
     */ 
    public function getMontant(): ?float
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @param  float|null  $montant
     *
     * @return  self
     */ 
    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }
}
