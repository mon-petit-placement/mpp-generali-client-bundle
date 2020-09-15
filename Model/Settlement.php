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
     * @param OptionsResolver $resolver
     */
    public static function configureData(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('paymentType', null)->setAllowedTypes('paymentType', ['string', 'null'])
            ->setDefault('bankName', null)->setAllowedTypes('bankName', ['string', 'null'])
            ->setDefault('accountOwner', null)->setAllowedTypes('accountOwner', ['string', 'null'])
            ->setDefault('accountIban', null)->setAllowedTypes('accountIban', ['string', 'null'])
            ->setDefault('accountBic', null)->setAllowedTypes('accountBic', ['string', 'null'])
            ->setDefault('debitAuthorization', true)->setAllowedTypes('debitAuthorization', ['bool', 'null'])
            ->setDefault('fundsOrigin', [])->setAllowedTypes('fundsOrigin', ['array'])->setNormalizer('fundsOrigin', function (Options $options, $values){
                $resolvedValues = [];
                foreach ($values as $value)
                {
                    $resolvedValues[] = FundsOrigin::createFromArray($value);
                }
                
                return $resolvedValues;
            })
        ;
    }

    /**
     * @param array $value
     */
    public static function createFromArray(array $value)
    {
        $resolver = new OptionsResolver();
        self::configureData($resolver);

        $resovedValues = $resolver->resolve($value);

        return (new self())
            ->setPaymentType($resovedValues['paymentType'])
            ->setBankName($resovedValues['bankName'])
            ->setAccountOwner($resovedValues['accountOwner'])
            ->setAccountBic($resovedValues['accountBic'])
            ->setAccountIban($resovedValues['accountIban'])
            ->setFundsOrigin($resovedValues['fundsOrigin'])
            ;
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
     * @return Settlement
     */
    public function setAccountIban(string $accountIban): self
    {
        $this->accountIban = $accountIban;

        return $this;
    }

    /**
     * @param string $accountBic
     * @return Settlement
     */
    public function setAccountBic(string $accountBic):self
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
     * @return Settlement
     */
    public function setDebitAuthorization(bool $debitAuthorization): self
    {
        $this->debitAuthorization = $debitAuthorization;
    }

    /**
     * @param string $fundsOrigin
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