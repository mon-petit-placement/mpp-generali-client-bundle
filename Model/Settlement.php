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
    public function toArray(): array
    {
        $data = [
            'typeReglementVersementPonctuel' => $this->paymentType,
            'ibanContractant' => [
                'nomBanque' => $this->bankName,
                'titulaire' => $this->accountOwner,
                'iban' => $this->accountIban,
                'bic' => $this->accountBic,
                'autorisationPrelevement' => $this->debitAuthorization,
            ],
        ];

        foreach ($this->getFundsOrigin() as $fundOrigin) {
            $data['originesFonds'][] = $fundOrigin->toArray();
        }

        return $data;
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
     * @return Settlement
     */
    public function setAccountOwner(string $accountOwner): self
    {
        $this->accountOwner = $accountOwner;
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
     * @return Settlement
     */
    public function setAccountIban(string $accountIban): self
    {
        $this->accountIban = $accountIban;

        return $this;
    }

    /**
     * @param string $accountBic
     *
     * @return Settlement
     */
    public function setAccountBic(string $accountBic): self
    {
        $this->accountBic = $accountBic;
    }

    /**
     * @return string
     */
    public function getAccountBic(): string
    {
        return $this->accountBic;
    }

    /**
     * @return string
     */
    public function getDebitAuthorization(): string
    {
        return $this->debitAuthorization;
    }

    /**
     * @param bool $debitAuthorization
     *
     * @return Settlement
     */
    public function setDebitAuthorization(bool $debitAuthorization): self
    {
        $this->debitAuthorization = $debitAuthorization;
    }

    /**
     * @param string $fundsOrigin
     *
     * @return Settlement
     */
    public function setFundsOrigin(string $fundsOrigin): self
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
