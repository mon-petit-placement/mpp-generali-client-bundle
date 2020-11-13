<?php

namespace Mpp\GeneraliClientBundle\Model;

class ParametrageFrais
{
    /**
     * @var bool|null
     */
    private $derogeable;

    /**
     * @var float|null
     */
    private $tauxStandard;

    /**
     * @var float|null
     */
    private $tauxMinimal;

    /**
     * @var float|null
     */
    private $montantStandard;

    /**
     * Get the value of derogeable.
     *
     * @return bool|null
     */
    public function getDerogeable(): ?bool
    {
        return $this->derogeable;
    }

    /**
     * Set the value of derogeable.
     *
     * @param bool|null $derogeable
     *
     * @return self
     */
    public function setDerogeable(?bool $derogeable): self
    {
        $this->derogeable = $derogeable;

        return $this;
    }

    /**
     * Get the value of tauxStandard.
     *
     * @return float|null
     */
    public function getTauxStandard(): ?float
    {
        return $this->tauxStandard;
    }

    /**
     * Set the value of tauxStandard.
     *
     * @param float|null $tauxStandard
     *
     * @return self
     */
    public function setTauxStandard(?float $tauxStandard): self
    {
        $this->tauxStandard = $tauxStandard;

        return $this;
    }

    /**
     * Get the value of tauxMinimal.
     *
     * @return float|null
     */
    public function getTauxMinimal(): ?float
    {
        return $this->tauxMinimal;
    }

    /**
     * Set the value of tauxMinimal.
     *
     * @param float|null $tauxMinimal
     *
     * @return self
     */
    public function setTauxMinimal(?float $tauxMinimal): self
    {
        $this->tauxMinimal = $tauxMinimal;

        return $this;
    }

    /**
     * Get the value of montantStandard.
     *
     * @return float|null
     */
    public function getMontantStandard(): ?float
    {
        return $this->montantStandard;
    }

    /**
     * Set the value of montantStandard.
     *
     * @param float|null $montantStandard
     *
     * @return self
     */
    public function setMontantStandard(?float $montantStandard): self
    {
        $this->montantStandard = $montantStandard;

        return $this;
    }
}
