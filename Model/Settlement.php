<?php

namespace Mpp\GeneraliClientBundle\Model;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Settlement
{
    /**
     * @var string
     */
    protected $paymentType;

    /**
     * @var string
     */
    protected $bankName;

    /**
     * @var string
     */
    protected $accountOwner;

    /**
     * @var string
     */
    protected $accountIban;

    /**
     * @var string
     */
    protected $accountBic;

    /**
     * @var bool
     */
    protected $debitAuthorization;

    /**
     * @var array
     */
    protected $fundsOrigin;

    /**
     * @return array
     */
    public function fundsOriginToArray(): array
    {
        $fundsOrigins = [];

        foreach ($this->fundsOrigin as $fundsOrigin) {
            $fundsOrigins[] = $fundsOrigin->toArray();
        }

        return $fundsOrigins;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'typeReglementVersementPonctuel' => $this->getPaymentType(),
            'originesFonds' => $this->fundsOriginToArray(),
            'ibanContractant' => [
                'nomBanque' => $this->getBankName(),
                'titulaire' => $this->getAccountOwner(),
                'iban' => $this->getAccountIban(),
                'bic' => $this->getAccountBic(),
                'autorisationPrelevement' => $this->getDebitAuthorization(),
            ],
        ];
    }

    /**
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     *
     * @return Settlement
     */
    public function setPaymentType(string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankName(): string
    {
        return $this->bankName;
    }

    /**
     * @param string $bankName
     *
     * @return Settlement
     */
    public function setBankName(string $bankName): self
    {
        $this->bankName = $bankName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountOwner(): string
    {
        return $this->accountOwner;
    }

    /**
     * @param string $accountOwner
     *
     * @return self
     */
    public function setAccountOwner(string $accountOwner): self
    {
        $this->accountOwner = $accountOwner;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountIban(): string
    {
        return $this->accountIban;
    }

    /**
     * @param string $accountIban
     *
     * @return self
     */
    public function setAccountIban(string $accountIban): self
    {
        $this->accountIban = $accountIban;

        return $this;
    }

    /**
     * @param string $accountBic
     *
     * @return self
     */
    public function setAccountBic(string $accountBic): self
    {
        $this->accountBic = $accountBic;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountBic(): string
    {
        return $this->accountBic;
    }

    /**
     * @return bool
     */
    public function getDebitAuthorization(): bool
    {
        return $this->debitAuthorization;
    }

    /**
     * @param bool $debitAuthorization
     *
     * @return self
     */
    public function setDebitAuthorization(bool $debitAuthorization): self
    {
        $this->debitAuthorization = $debitAuthorization;

        return $this;
    }

    /**
     * @param array $fundsOrigin
     *
     * @return self
     */
    public function setFundsOrigin(array $fundsOrigin): self
    {
        $this->fundsOrigin = $fundsOrigin;

        return $this;
    }

    /**
     * @return string
     */
    public function getFundsOrigin(): string
    {
        return $this->fundsOrigin;
    }
}
