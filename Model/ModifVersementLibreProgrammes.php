<?php

namespace Mpp\GeneraliClientBundle\Model;

class ModifVersementLibreProgrammes
{
    /**
     * @var VlpMontant|null
     */
    private $versement;

    /**
     * @var Repartition|null
     */
    private $repartition;

    /**
     * Get the value of versement
     *
     * @return  VlpMontant|null
     */ 
    public function getVersement(): ?VlpMontant
    {
        return $this->versement;
    }

    /**
     * Set the value of versement
     *
     * @param  VlpMontant|null  $versement
     *
     * @return  self
     */ 
    public function setVersement(?VlpMontant $versement): self
    {
        $this->versement = $versement;

        return $this;
    }

    /**
     * Get the value of repartition
     *
     * @return  Repartition|null
     */ 
    public function getRepartition(): ?Repartition
    {
        return $this->repartition;
    }

    /**
     * Set the value of repartition
     *
     * @param  Repartition|null  $repartition
     *
     * @return  self
     */ 
    public function setRepartition(?Repartition $repartition): self
    {
        $this->repartition = $repartition;

        return $this;
    }
}
