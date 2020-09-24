<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class InitialScheduledFreePayment.
 */
class InitialScheduledFreePayment
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
     * @var array<Repartition>
     */
    protected $repartitions;

    /**
     * @return array
     */
    public function repartitionsToarray(): array
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
            'repartition' => $this->repartitionsToarray(),
            'jourPrelevement' => $this->getBankDebitDay(),
            'vlpMontant' => [
                'montant' => $this->getAmount(),
                'periodicite' => $this->getPeriodicity(),
            ],
        ];
    }

    /**
     * ScheduledFreePayment constructor.
     */
    public function __construct()
    {
        $this->repartitions = [];
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

    /**
     * @return array
     */
    public function getRepartitions(): array
    {
        return $this->repartitions;
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
