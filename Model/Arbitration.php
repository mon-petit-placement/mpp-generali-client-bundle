<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class Arbitration
 */
class Arbitration
{
    /**
     * @var string
     */
    private $externalNumberOperation;

    /**
     * @var bool
     */
    private $mandateTransmissionOrder;

    /**
     * @var bool
     */
    private $mandateArbitration;

    /**
     * @var array<Repartition>
     */
    private $divestedFunds;

    /**
     * @var array<Repartition>
     */
    private $investedFunds;

    /**
     * @return string
     */
    public function getExternalNumberOperation(): string
    {
        return $this->externalNumberOperation;
    }

    /**
     * @param string $externalNumberOperation
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
     * @return self
     */
    public function setDivestedFunds(array $divestedFunds): self
    {
        $this->divestedFunds = $divestedFunds;

        return $this;
    }

    /**
     * @param array $investedFunds
     * @return array
     */
    public function getInvestedFunds(array $investedFunds): array
    {
        return $this->investedFunds;
    }

    /**
     * @param array $investedFunds
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
    public function arrayToInvestedFunds(): array
    {
        $investedFunds = [];
        foreach ($this->investedFunds as $investedFund) {
            $investedFunds[] = [
                'fondsInvesti' => $investedFund->toArray()
            ];
        }

        return $investedFunds;
    }

    /**
     * @return array
     */
    public function arrayToDisvestedFunds(): array
    {
        $disvestedFunds = [];
        foreach ($this->divestedFunds as $divestedFund) {
            $disvestedFunds[] = [
                'fondsDesinvesti' =>$divestedFund->toArray()
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
            'numOperationExterne' => $faker->numberBetween(0, 999999),
            'mandatTransmissionOrdre' => false,
            'mandatArbitrage' => false,
            'fondsInvestis' => $this->arrayToInvestedFunds(),
            'fondsDesinvestis' => $this->arrayToDisvestedFunds()
        ];
    }



}