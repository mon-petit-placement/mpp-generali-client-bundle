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
     * @var string
     */
    protected $externalReference1;

    /**
     * @var string
     */
    protected $externalReference2;

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
     * @return string
     */
    public function getExternalReference1(): string
    {
        return $this->externalReference1;
    }

    /**
     * @param string $externalReference1
     * @return Subscription
     */
    public function setExternalReference1(string $externalReference1): self
    {
        $this->externalReference1 = $externalReference1;

        return $this;
    }
    /**
     * @return string
     */
    public function getExternalReference2(): string
    {
        return $this->externalReference2;
    }

    /**
     * @param string $externalReference2
     * @return Subscription
     */
    public function setExternalReference2(string $externalReference2): self
    {
        $this->externalReference2 = $externalReference2;

        return $this;
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
