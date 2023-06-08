<?php

namespace Mpp\GeneraliClientBundle\Model;

class Situation
{
    /**
     * @var string|null
     */
    private ?string $libelleSituation;

    /**
     * @var float|null
     */
    private ?float $niveauGlobalSrri;

    /**
     * Get the value of libelleSituation.
     *
     * @return string|null
     */
    public function getLibelleSituation(): ?string
    {
        return $this->libelleSituation;
    }

    /**
     * Set the value of libelleSituation.
     *
     * @param string|null $libelleSituation
     *
     * @return self
     */
    public function setLibelleSituation(?string $libelleSituation): self
    {
        $this->libelleSituation = $libelleSituation;

        return $this;
    }

    /**
     * Get the value of niveauGlobalSrri.
     *
     * @return float|null
     */
    public function getNiveauGlobalSrri(): ?float
    {
        return $this->niveauGlobalSrri;
    }

    /**
     * Set the value of niveauGlobalSrri.
     *
     * @param float|null $niveauGlobalSrri
     *
     * @return self
     */
    public function setNiveauGlobalSrri(?float $niveauGlobalSrri): self
    {
        $this->niveauGlobalSrri = $niveauGlobalSrri;

        return $this;
    }
}
