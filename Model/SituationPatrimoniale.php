<?php

namespace Mpp\GeneraliClientBundle\Model;

class SituationPatrimoniale
{
    /**
     * @var string|null
     */
    private $codeTrancheRevenu;

    /**
     * @var float|null
     */
    private $montantRevenu;

    /**
     * @var string|null
     */
    private $codeTranchePatrimoine;

    /**
     * @var float|null
     */
    private $montantPatrimoine;

    /**
     * @var array<OriginePatrimoniale>|null
     */
    private $originePatrimoniale;

    /**
     * @var array<RepartitionPatrimoniale>|null
     */
    private $repartitionPatrimoniale;

    /**
     * Get the value of codeTrancheRevenu.
     *
     * @return string|null
     */
    public function getCodeTrancheRevenu(): ?string
    {
        return $this->codeTrancheRevenu;
    }

    /**
     * Set the value of codeTrancheRevenu.
     *
     * @param string|null $codeTrancheRevenu
     *
     * @return self
     */
    public function setCodeTrancheRevenu(?string $codeTrancheRevenu): self
    {
        $this->codeTrancheRevenu = $codeTrancheRevenu;

        return $this;
    }

    /**
     * Get the value of montantRevenu.
     *
     * @return float|null
     */
    public function getMontantRevenu(): ?float
    {
        return $this->montantRevenu;
    }

    /**
     * Set the value of montantRevenu.
     *
     * @param float|null $montantRevenu
     *
     * @return self
     */
    public function setMontantRevenu(?float $montantRevenu): self
    {
        $this->montantRevenu = $montantRevenu;

        return $this;
    }

    /**
     * Get the value of codeTranchePatrimoine.
     *
     * @return string|null
     */
    public function getCodeTranchePatrimoine(): ?string
    {
        return $this->codeTranchePatrimoine;
    }

    /**
     * Set the value of codeTranchePatrimoine.
     *
     * @param string|null $codeTranchePatrimoine
     *
     * @return self
     */
    public function setCodeTranchePatrimoine(?string $codeTranchePatrimoine): self
    {
        $this->codeTranchePatrimoine = $codeTranchePatrimoine;

        return $this;
    }

    /**
     * Get the value of montantPatrimoine.
     *
     * @return float|null
     */
    public function getMontantPatrimoine(): ?float
    {
        return $this->montantPatrimoine;
    }

    /**
     * Set the value of montantPatrimoine.
     *
     * @param float|null $montantPatrimoine
     *
     * @return self
     */
    public function setMontantPatrimoine(?float $montantPatrimoine): self
    {
        $this->montantPatrimoine = $montantPatrimoine;

        return $this;
    }

    /**
     * Get the value of originePatrimoniale.
     *
     * @return array<OriginePatrimoniale>|null
     */
    public function getOriginePatrimoniale(): ?array
    {
        return $this->originePatrimoniale;
    }

    /**
     * Set the value of originePatrimoniale.
     *
     * @param array<OriginePatrimoniale>|null $originePatrimoniale
     *
     * @return self
     */
    public function setOriginePatrimoniale(?array $originePatrimoniale): self
    {
        $this->originePatrimoniale = $originePatrimoniale;

        return $this;
    }

    /**
     * Get the value of repartitionPatrimoniale.
     *
     * @return array<RepartitionPatrimoniale>|null
     */
    public function getRepartitionPatrimoniale(): ?array
    {
        return $this->repartitionPatrimoniale;
    }

    /**
     * Set the value of repartitionPatrimoniale.
     *
     * @param array<RepartitionPatrimoniale>|null $repartitionPatrimoniale
     *
     * @return self
     */
    public function setRepartitionPatrimoniale(?array $repartitionPatrimoniale): self
    {
        $this->repartitionPatrimoniale = $repartitionPatrimoniale;

        return $this;
    }
}
