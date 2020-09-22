<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class ScheduledFreePayment
 */
class ScheduledFreePayment
{
    /**
     * @var int
     */
    protected $bankDebitDay;

    /**
     * @var string
     */
    protected $amount;

    /**
     * @var string
     */
    protected $periodicity;

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
            'repartition' => $this->repartitionToarray(),
            'jourPrelevement' => $this->getBankDebitDay(),
            'vlpMontant' => [
                'montant' => $this->getAmount(),
                'periodicite' => $this->getPeriodicity(),
            ]
        ];
    }

    /**
     * ScheduledFreePayment constructor.
     */
    public function __construct()
    {
        $this->repartition = [];
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

    /**
     * @return array
     */
    public function getRepartition(): array
    {
        return $this->repartition;
    }

    /**
     * @param string $periodicity
     *
     * @return ScheduledFreePayment
     */
    public function setPeriodicity(string $periodicity): self
    {
        $this->periodicity = $periodicity;

        return $this;
    }

    /**
     * @return string
     */
    public function getPeriodicity(): string
    {
        return $this->periodicity;
    }

    /**
     * @param string $amount
     *
     * @return self
     */
    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

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
     * @param int $bankDebitDay
     *
     * @return self
     */
    public function setBankDebitDay(int $bankDebitDay): self
    {
        $this->bankDebitDay = $bankDebitDay;

        return $this;
    }

    /**
     * @return int
     */
    public function getBankDebitDay(): int
    {
        return $this->bankDebitDay;
    }
}
