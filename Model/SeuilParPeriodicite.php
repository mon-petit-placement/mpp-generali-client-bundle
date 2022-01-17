<?php

namespace Mpp\GeneraliClientBundle\Model;

class SeuilParPeriodicite
{
    public const CODE_PERIODICITE_HEBDOMADAIRE = 'HEBDOMADAIRE';
    public const CODE_PERIODICITE_MENSUELLE = 'MENSUELLE';
    public const CODE_PERIODICITE_TRIMESTRIELLE = 'TRIMESTRIELLE';
    public const CODE_PERIODICITE_SEMESTRIELLE = 'SEMESTRIELLE';
    public const CODE_PERIODICITE_ANNUELLE = 'ANNUELLE';

    /**
     * @var string|null
     */
    private $codePeriodicite;

    /**
     * @var float|null
     */
    private $montantMin;

    /**
     * Get the value of codePeriodicite.
     *
     * @return string|null
     */
    public function getCodePeriodicite(): ?string
    {
        return $this->codePeriodicite;
    }

    /**
     * Set the value of codePeriodicite.
     *
     * @param string|null $codePeriodicite
     *
     * @return self
     */
    public function setCodePeriodicite(?string $codePeriodicite): self
    {
        $this->codePeriodicite = $codePeriodicite;

        return $this;
    }

    /**
     * Get the value of montantMin.
     *
     * @return float|null
     */
    public function getMontantMin(): ?float
    {
        return $this->montantMin;
    }

    /**
     * Set the value of montantMin.
     *
     * @param float|null $montantMin
     *
     * @return self
     */
    public function setMontantMin(?float $montantMin): self
    {
        $this->montantMin = $montantMin;

        return $this;
    }
}
