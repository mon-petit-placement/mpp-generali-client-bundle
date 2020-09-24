<?php

namespace Mpp\GeneraliClientBundle\Model;

class InitialPayment
{
    /**
     * @var float
     */
    protected $amount;

    /**
     * @var array<Repartition>
     */
    protected $repartitions;

    /**
     * @return array
     */
    public function repartitionsToArray(): array
    {
        $repartitions = [];
        foreach ($this->repartitions as $repartition) {
            $repartitions[] = $repartition->toArray();
        }

        return $repartitions;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'montant' => $this->getAmount(),
            'repartition' => $this->repartitionsToArray(),
        ];
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     *
     * @return $this
     */
    public function setAmount(float $amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return array
     */
    public function getRepartitions(): array
    {
        return $this->repartitions;
    }

    /**
     * @param array $repartitions
     *
     * @return self
     */
    public function setRepartitions(array $repartitions): self
    {
        $this->repartitions = $repartitions;

        return $this;
    }
}
