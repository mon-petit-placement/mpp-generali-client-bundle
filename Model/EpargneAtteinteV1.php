<?php

namespace Mpp\GeneraliClientBundle\Model;

class EpargneAtteinteV1
{
    /**
     * @var float|null
     */
    private $montantEpargneAtteinte;

    /**
     * @var array<Repartition>|null
     */
    private $repartitionList;

    /**
     * Get the value of montantEpargneAtteinte.
     *
     * @return float|null
     */
    public function getMontantEpargneAtteinte(): ?float
    {
        return $this->montantEpargneAtteinte;
    }

    /**
     * Set the value of montantEpargneAtteinte.
     *
     * @param float|null $montantEpargneAtteinte
     *
     * @return self
     */
    public function setMontantEpargneAtteinte(?float $montantEpargneAtteinte): self
    {
        $this->montantEpargneAtteinte = $montantEpargneAtteinte;

        return $this;
    }

    /**
     * Get the value of repartition.
     *
     * @return array<Repartition>|null
     */
    public function getRepartitionList(): ?array
    {
        return $this->repartitionList;
    }

    /**
     * Set the value of repartition.
     *
     * @param array<Repartition>|null $repartitionList
     *
     * @return self
     */
    public function setRepartitionList(?array $repartitionList): self
    {
        $this->repartitionList = $repartitionList;

        return $this;
    }
}
