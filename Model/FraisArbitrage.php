<?php

namespace Mpp\GeneraliClientBundle\Model;

class FraisArbitrage
{
    /**
     * @var ParametrageFrais|null
     */
    private $parametrageFrais;

    /**
     * Get the value of parametrageFrais.
     *
     * @return ParametrageFrais|null
     */
    public function getParametrageFrais(): ?ParametrageFrais
    {
        return $this->parametrageFrais;
    }

    /**
     * Set the value of parametrageFrais.
     *
     * @param ParametrageFrais|null $parametrageFrais
     *
     * @return self
     */
    public function setParametrageFrais(?ParametrageFrais $parametrageFrais): self
    {
        $this->parametrageFrais = $parametrageFrais;

        return $this;
    }
}
