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
     * @param string $repartition
     *
     * @return InitialPayment
     */
    public function setRepartition(string $repartition): self
    {
        $this->repartition = $repartition;
    }
}
