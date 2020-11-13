<?php

namespace Mpp\GeneraliClientBundle\Model;

class OriginePaiement
{
    /**
     * @var bool|null
     */
    private $moyenPaiementFrancais;

    /**
     * Get the value of moyenPaiementFrancais.
     *
     * @return bool|null
     */
    public function getMoyenPaiementFrancais(): ?bool
    {
        return $this->moyenPaiementFrancais;
    }

    /**
     * Set the value of moyenPaiementFrancais.
     *
     * @param bool|null $moyenPaiementFrancais
     *
     * @return self
     */
    public function setMoyenPaiementFrancais(?bool $moyenPaiementFrancais): self
    {
        $this->moyenPaiementFrancais = $moyenPaiementFrancais;

        return $this;
    }
}
