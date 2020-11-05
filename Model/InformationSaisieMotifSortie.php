<?php

namespace Mpp\GeneraliClientBundle\Model;

class InformationSaisieMotifSortie
{
    /**
     * @var bool|null
     */
    private $motifSortieObligatoire;

    /**
     * Get the value of motifSortieObligatoire
     *
     * @return  bool|null
     */ 
    public function getMotifSortieObligatoire(): ?bool
    {
        return $this->motifSortieObligatoire;
    }

    /**
     * Set the value of motifSortieObligatoire
     *
     * @param  bool|null  $motifSortieObligatoire
     *
     * @return  self
     */ 
    public function setMotifSortieObligatoire(?bool $motifSortieObligatoire): self
    {
        $this->motifSortieObligatoire = $motifSortieObligatoire;

        return $this;
    }
}
