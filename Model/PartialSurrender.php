<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class PartialSurrender.
 */
class PartialSurrender
{
    /**
     * @var float
     */
    protected $amount;

    /**
     * @var string
     */
    protected $reasonCode;

    /**
     * @var bool
     */
    protected $proportionalRepartition;

    /**
     * @var Settlement
     */
    protected $settlement;

    /**
     * @var array<Repartition>
     */
    protected $repartitions;

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
    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getReasonCode(): string
    {
        return $this->reasonCode;
    }

    /**
     * @param string $reasonCode
     *
     * @return self
     */
    public function setReasonCode(?string $reasonCode): self
    {
        $this->reasonCode = $reasonCode;

        return $this;
    }

    /**
     * @return bool
     */
    public function getProportionalRepartition(): bool
    {
        return $this->proportionalRepartition;
    }

    /**
     * @param bool $proportionalRepartition
     *
     * @return self
     */
    public function setProportionalRepartition(?bool $proportionalRepartition): self
    {
        $this->proportionalRepartition = $proportionalRepartition;

        return $this;
    }

    /**
     * @return Settlement
     */
    public function getSettlement(): Settlement
    {
        return $this->settlement;
    }

    /**
     * @param Settlement $settlement
     *
     * @return self
     */
    public function setSettlement(Settlement $settlement): self
    {
        $this->settlement = $settlement;

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

    /**
     * @return array
     */
    public function repartitionsToArray(): array
    {
        $repartitions = [];
        foreach ($this->repartitions as $repartition) {
            $repartitions[] = [
              'codeFonds' => $repartition->getFundsCode(),
              'montant' => $repartition->getAmount(),
              'rachatTotal' => $repartition->getTotalSurrender(),
            ];
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
            'codeMotif' => $this->getReasonCode(),
            'repartitionProportionnelle' => $this->getProportionalRepartition(),
            'repartition' => $this->repartitionsToArray(),
            'modeReglement' => [
                'typePaiement' => $this->getSettlement()->getPaymentType(),
                'compteBancaire' => [
                    'domiciliation' => $this->getSettlement()->getBankName(),
                    'titulaire' => $this->getSettlement()->getAccountOwner(),
                    'iban' => $this->getSettlement()->getAccountIban(),
                    'bic' => $this->getSettlement()->getAccountBic(),
                ],
            ],
        ];
    }
}
