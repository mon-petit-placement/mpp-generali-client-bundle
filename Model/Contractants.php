<?php

namespace Mpp\GeneraliClientBundle\Model;

class Contractants
{
    /**
     * @var Contractant|null
     */
    private ?Contractant $contractant;

    /**
     * Set the value of Contractant.
     *
     * @param Contractant|null $contractant
     *
     * @return self
     */
    public function setContractant(?Contractant $contractant): self
    {
        $this->contractant = $contractant;

        return $this;
    }

    /**
     * Get the value of Contractant.
     *
     * @return Contractant|null
     */
    public function getContractant(): ?Contractant
    {
        return $this->contractant;
    }
}
