<?php

namespace Mpp\GeneraliClientBundle\Model;

class ParametrageVersementLibre
{
    public const MODE_REGLEMENT_CHEQUE = 'CHEQUE';
    public const MODE_REGLEMENT_PRELEVEMENT = 'PRELEVEMENT';
    public const MODE_REGLEMENT_VIREMENT = 'VIREMENT';

    /**
     * @var int|null
     */
    private $montantMin;

    /**
     * @var int|null
     */
    private $montantMinParFonds;

    /**
     * @var array<string>|null
     */
    private $modesReglement;

    /**
     * Get the value of montantMin.
     *
     * @return int|null
     */
    public function getMontantMin(): ?int
    {
        return $this->montantMin;
    }

    /**
     * Set the value of montantMin.
     *
     * @param int|null $montantMin
     *
     * @return self
     */
    public function setMontantMin(?int $montantMin): self
    {
        $this->montantMin = $montantMin;

        return $this;
    }

    /**
     * Get the value of montantParFonds.
     *
     * @return int|null
     */
    public function getMontantMinParFonds(): ?int
    {
        return $this->montantMinParFonds;
    }

    /**
     * Set the value of montantMinParFonds.
     *
     * @param int|null $montantMinParFonds
     *
     * @return self
     */
    public function setMontantMinParFonds(?int $montantMinParFonds): self
    {
        $this->montantMinSupport = $montantMinParFonds;

        return $this;
    }

    /**
     * Get the value of modesReglement.
     *
     * @return array<string>|null
     */
    public function getModesReglement(): ?array
    {
        return $this->modesReglement;
    }

    /**
     * Set the value of modesReglement.
     *
     * @param array<string>|null $modesReglement
     *
     * @return self
     */
    public function setModesReglement(?array $modesReglement): self
    {
        $this->modesReglement = $modesReglement;

        return $this;
    }
}
