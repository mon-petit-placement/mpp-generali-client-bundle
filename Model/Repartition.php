<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class Repartition.
 */
class Repartition
{
    /**
     * @var string
     */
    protected $fundsCode;

    /**
     * @var string
     */
    protected $amount;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
          'codeFonds' => $this->getFundsCode(),
          'montant' => $this->getAmount(),
        ];
    }

    /**
     * @return string
     */
    public function getFundsCode(): string
    {
        return $this->fundsCode;
    }

    /**
     * @param string $fundsCode
     *
     * @return Repartition
     */
    public function setFundsCode(string $fundsCode): self
    {
        $this->fundsCode = $fundsCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     *
     * @return Repartition
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }
}
