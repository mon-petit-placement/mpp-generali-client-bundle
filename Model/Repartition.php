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
     * @var float
     */
    protected $amount;

    /**
     * @var bool
     */
    protected $totalSurrender;

    /**
     * @var float
     */
    protected $percent;

    /**
     * Repartition constructor.
     */
    public function __construct()
    {
        $this->totalSurrender = false;
    }

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
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     *
     * @return self
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return bool
     */
    public function getTotalSurrender(): ?bool
    {
        return $this->totalSurrender;
    }

    /**
     * @param bool $totalSurrender
     *
     * @return self
     */
    public function setTotalSurrender(?bool $totalSurrender): self
    {
        $this->totalSurrender = $totalSurrender;

        return $this;
    }

    /**
     * @return float
     */
    public function getPercent(): float
    {
        return $this->percent;
    }

    /**
     * @param float $percent
     *
     * @return $this
     */
    public function setPercent(float $percent)
    {
        $this->percent = $percent;

        return $this;
    }
}
