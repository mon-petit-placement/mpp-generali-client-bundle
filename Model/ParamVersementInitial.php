<?php

namespace Mpp\GeneraliClientBundle\Model;

class ParamVersementInitial
{
    /**
     * @var array<Seuil>|null
     */
    private $seuils;

    /**
     * Get the value of seuils
     *
     * @return  array<Seuil>|null
     */ 
    public function getSeuils(): ?array
    {
        return $this->seuils;
    }

    /**
     * Set the value of seuils
     *
     * @param  array<Seuil>|null  $seuils
     *
     * @return  self
     */ 
    public function setSeuils(?array $seuils): self
    {
        $this->seuils = $seuils;

        return $this;
    }
}
