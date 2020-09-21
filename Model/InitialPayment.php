<?php

namespace Mpp\GeneraliClientBundle\Model;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InitialPayment
{
    /**
     * @var float
     */
    protected $amount;

    /**
     * @var array
     */
    protected $repartition;

    /**
     * @return array
     */
    public function repartitionToarray(): array
    {
        $repartitions = [];
        foreach($this->repartition as $repartition) {
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
            'repartition' => $this->repartitionToarray()
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
    public function getRepartition(): array
    {
        return $this->repartition;
    }

    /**
     * @param array $repartition
     *
     * @return self
     */
    public function setRepartition(array $repartition): self
    {
        $this->repartition = $repartition;

        return $this;
    }
}
