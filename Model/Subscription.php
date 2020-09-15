<?php

namespace Mpp\GeneraliClientBundle\Model;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class Subscription.
 */
class Subscription
{
    /**
     * @var Subscriber
     */
    protected $subscriber;

    /**
     * @var CustomerFolder
     */
    protected $customerFolder;

    /**
     * @var Settlement
     */
    protected $settlement;
    /**
     * @var InitialPayment
     */
    protected $initialPayment;

    /**
     * @var string
     */
    protected $paymentType;

    /**
     * @var string
     */
    protected $fiscality;

    /**
     * @var string
     */
    protected $deathBeneficiaryClauseCode;

    /**
     * @var string
     */
    protected $deathBeneficiaryClauseText;

    /**
     * @var string
     */
    protected $gestionMode;

    /**
     * @param OptionsResolver $resolver
     */
    public static function configureData(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('subscriber', null)->setAllowedTypes('subscriber', ['array', 'null'])->setNormalizer('subscriber', function (Options $options, $value) {
                return Subscriber::createFromArray($value);
            })
            ->setDefault('customerFolder', null)->setAllowedTypes('customerFolder', ['array', 'null'])->setNormalizer('customerFolder', function (Options $options, $value) {
                return CustomerFolder::createFromArray($value);
            })
            ->setDefault('settlement', null)->setAllowedTypes('settlement', ['array', 'null'])->setNormalizer('settlement', function (Options $options, $value) {
                return Settlement::createFromArray($value);
            })
            ->setDefault('intitialPayment', null)->setAllowedTypes('initialPayment', ['array', 'null'])->setNormalizer('initialPayment', function (Options $options, $value) {
                return InitialPayment::createFromArray($value);
            })
            ->setDefault('paymentType', null)->setAllowedTypes('paymentType', ['string', 'null'])
            ->setDefault('fiscality', null)->setAllowedTypes('fiscality', ['string', 'null'])
            ->setDefault('deathBeneficiaryClauseCode', null)->setAllowedTypes('deathBeneficiaryClauseCode', ['string', 'null'])
            ->setDefault('deathBeneficiaryClauseText', null)->setAllowedTypes('deathBeneficiaryClauseText', ['string', 'null'])
            ->setDefault('gestionMode', null)->setAllowedTypes('gestionMode', ['string', 'null'])
        ;
    }

    /**
     * @param array $value
     */
    public static function createFromArray(array $value)
    {
        $resolver = new OptionsResolver();
        self::configureData($resolver);

        $resolvedValues = $resolver->resolve($value);

        $subscription = (new self())
            ->setSubscriber($resolvedValues['subscriber'])
            ->setCustomerFolder($resolvedValues['customerFolder'])
            ->setSettlement($resolvedValues['settlement'])
            ->setInitialPayment($resolvedValues['initialPayment'])
            ->setPaymentType($resolvedValues['paymentType'])
            ->setFiscality($resolvedValues['fiscality'])
            ->setDeathBeneficiaryClauseCode($resolvedValues['deathBeneficiaryClauseCode'])
            ->setDeathBeneficiaryClauseText($resolvedValues['deathBeneficiaryClauseText'])
            ->setGestionMode($resolvedValues['gestionMode'])
        ;
    }

    /**
     * @return Subscriber
     */
    public function getSubscriber(): Subscriber
    {
        return $this->subscriber;
    }

    /**
     * @param Subscriber $subscriber
     *
     * @return Subscription
     */
    public function setSubscriber(Subscriber $subscriber): self
    {
        $this->subscriber = $subscriber;
    }

    /**
     * @return CustomerFolder
     */
    public function getCustomerFolder(): CustomerFolder
    {
        return $this->customerFolder;
    }

    /**
     * @param CustomerFolder $customerFolder
     *
     * @return Subscription
     */
    public function setCustomerFolder(CustomerFolder $customerFolder): self
    {
        $this->customerFolder = $customerFolder;
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
     * @return Subscription
     */
    public function setSettlement(Settlement $settlement): self
    {
        $this->settlement = $settlement;
    }

    /**
     * @return InitialPayment
     */
    public function getInitialPayment(): InitialPayment
    {
        return $this->initialPayment;
    }

    /**
     * @param InitialPayment $initialPayment
     *
     * @return Subscription
     */
    public function setInitialPayment(InitialPayment $initialPayment): self
    {
        $this->initialPayment = $initialPayment;
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
     * @return Subscription
     */
    public function setPaymentType(string $paymentType): self
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @return string
     */
    public function getFiscality(): string
    {
        return $this->fiscality;
    }

    /**
     * @param string $fiscality
     *
     * @return Subscription
     */
    public function setFiscality(string $fiscality): self
    {
        $this->fiscality = $fiscality;
    }

    /**
     * @return string
     */
    public function getDeathBeneficiaryClauseCode(): string
    {
        return $this->deathBeneficiaryClauseCode;
    }

    /**
     * @param string $deathBeneficiaryClauseCode
     *
     * @return Subscription
     */
    public function setDeathBeneficiaryClauseCode(string $deathBeneficiaryClauseCode): self
    {
        $this->deathBeneficiaryClauseCode = $deathBeneficiaryClauseCode;
    }

    /**
     * @return string
     */
    public function getDeathBeneficiaryClauseText(): string
    {
        return $this->deathBeneficiaryClauseText;
    }

    /**
     * @param string $deathBeneficiaryClauseText
     *
     * @return Subscription
     */
    public function setDeathBeneficiaryClauseText(string $deathBeneficiaryClauseText): self
    {
        $this->deathBeneficiaryClauseText = $deathBeneficiaryClauseText;
    }

    /**
     * @return string
     */
    public function getGestionMode(): string
    {
        return $this->gestionMode;
    }

    /**
     * @param string $gestionMode
     *
     * @return Subscription
     */
    public function setGestionMode(string $gestionMode): self
    {
        $this->gestionMode = $gestionMode;
    }
}
