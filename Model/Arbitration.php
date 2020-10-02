<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class Arbitration.
 */
class Arbitration
{
    /**
     * @var string
     */
    protected $externalNumberOperation;

    /**
     * @var bool
     */
    protected $mandateTransmissionOrder;

    /**
     * @var bool
     */
    protected $mandateArbitration;

    /**
     * @var array<Repartition>
     */
    protected $divestedFunds;

    /**
     * @var array<Repartition>
     */
    protected $investedFunds;

    /**
     * @return string
     */
    public function getExternalNumberOperation(): string
    {
        return $this->externalNumberOperation;
    }

    /**
     * @param string $externalNumberOperation
     *
     * @return self
     */
    public function setExternalNumberOperation(string $externalNumberOperation): self
    {
        $this->externalNumberOperation = $externalNumberOperation;

        return $this;
    }

    /**
     * @return bool
     */
    public function getMandateTransmissionOrder(): bool
    {
        return $this->mandateTransmissionOrder;
    }

    /**
     * @param bool $mandateTransmissionOrder
     *
     * @return self
     */
    public function setMandateTransmissionOrder(bool $mandateTransmissionOrder): self
    {
        $this->mandateTransmissionOrder = $mandateTransmissionOrder;

        return $this;
    }

    /**
     * @return bool
     */
    public function getMandateArbitration(): bool
    {
        return $this->mandateArbitration;
    }

    /**
     * @param bool $mandateArbitration
     *
     * @return Arbitration
     */
    public function setMandateArbitration(bool $mandateArbitration): self
    {
        $this->mandateArbitration = $mandateArbitration;

        return $this;
    }

    /**
     * @return array
     */
    public function getDivestedFunds(): array
    {
        return $this->divestedFunds;
    }

    /**
     * @param array $divestedFunds
     *
     * @return self
     */
    public function setDivestedFunds(array $divestedFunds): self
    {
        $this->divestedFunds = $divestedFunds;

        return $this;
    }

    /**
     * @return array
     */
    public function getInvestedFunds(): array
    {
        return $this->investedFunds;
    }

    /**
     * @param array $investedFunds
     *
     * @return self
     */
    public function setInvestedFunds(array $investedFunds): self
    {
        $this->investedFunds = $investedFunds;

        return $this;
    }

    /**
     * @return array
     */
    public function investedFundsToArray(): array
    {
        $investedFunds = [];
        foreach ($this->getInvestedFunds() as $investedFund) {
            $investedFunds[] = [
                'fondsInvesti' => $investedFund->toArray(),
            ];
        }

        return $investedFunds;
    }

    /**
     * @return array
     */
    public function divestedFundsToArray(): array
    {
        $disvestedFunds = [];
        foreach ($this->getInvestedFunds() as $divestedFund) {
            $disvestedFunds[] = [
                'fondsDesinvesti' => $divestedFund->toArray(),
            ];
        }

        return $disvestedFunds;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'numOperationExterne' => $this->getExternalNumberOperation(),
            'mandatTransmissionOrdre' => $this->getMandateTransmissionOrder(),
            'mandatArbitrage' => $this->getMandateArbitration(),
            'fondsInvestis' => $this->investedFundsToArray(),
            'fondsDesinvestis' => $this->divestedFundsToArray(),
        ];
    }
}
