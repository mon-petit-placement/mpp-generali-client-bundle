<?php

namespace Mpp\GeneraliClientBundle\Model;

class ReferenceExterne
{
    /**
     * @var string|null
     */
    private $refExterne;

    /**
     * Get the value of refExterne
     *
     * @return  string|null
     */ 
    public function getRefExterne(): ?string
    {
        return $this->refExterne;
    }

    /**
     * Set the value of refExterne
     *
     * @param  string|null  $refExterne
     *
     * @return  self
     */ 
    public function setRefExterne(?string $refExterne): self
    {
        $this->refExterne = $refExterne;

        return $this;
    }
}
