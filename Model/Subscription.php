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
     * @var ScheduledFreePayment
     */
    protected $scheduledFreePayment;

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
     * @var string
     */
    protected $duration;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'referencesExternes' => [
                'refExterne' => $this->getExternalReference1(),
                'refExterne2' => $this->getExternalReference2(),
            ],
            'souscripteur' => $this->getSubscriber()->toArray(),
            'dossierClient' => $this->getCustomerFolder()->toArray(),
            'versementInitial' => $this->getInitialPayment()->toArray(),
            'versementsLibresProgrammes' => $this->getScheduledFreePayment()->toArray(),
            'typePaiement' => $this->getPaymentType(),
            'duree' => $this->getDuration(),
            'fiscalite' => $this->getFiscality(),
            'clauseBeneficiaireDeces' => [
                'code' => $this->getDeathBeneficiaryClauseCode(),
                'texteLibre' => $this->getDeathBeneficiaryClauseText(),
            ],
            'modeGestion' => $this->getGestionMode(),
            'reglement' => $this->getSettlement()->toArray()
        ];
    }

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
    public function getExternalReference2(): ?string
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
     * @return self
     */
    public function setSubscriber(Subscriber $subscriber): self
    {
        $this->subscriber = $subscriber;

        return $this;
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
     * @return self
     */
    public function setCustomerFolder(CustomerFolder $customerFolder): self
    {
        $this->customerFolder = $customerFolder;

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
     * @return InitialPayment
     */
    public function getInitialPayment(): InitialPayment
    {
        return $this->initialPayment;
    }

    /**
     * @param InitialPayment $initialPayment
     *
     * @return self
     */
    public function setInitialPayment(InitialPayment $initialPayment): self
    {
        $this->initialPayment = $initialPayment;

        return $this;
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
     * @return self
     */
    public function setPaymentType(string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
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
     * @return self
     */
    public function setFiscality(string $fiscality): self
    {
        $this->fiscality = $fiscality;

        return $this;
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
     * @return self
     */
    public function setDeathBeneficiaryClauseCode(string $deathBeneficiaryClauseCode): self
    {
        $this->deathBeneficiaryClauseCode = $deathBeneficiaryClauseCode;

        return $this;
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
     * @return self
     */
    public function setDeathBeneficiaryClauseText(string $deathBeneficiaryClauseText): self
    {
        $this->deathBeneficiaryClauseText = $deathBeneficiaryClauseText;

        return $this;
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

        return $this;
    }

    /**
     * @return ScheduledFreePayment
     */
    public function getScheduledFreePayment(): ScheduledFreePayment
    {
        return $this->scheduledFreePayment;
    }

    /**
     * @param ScheduledFreePayment $scheduledFreePayment
     * @return Subscription
     */
    public function setScheduledFreePayment(ScheduledFreePayment $scheduledFreePayment): self
    {
        $this->scheduledFreePayment = $scheduledFreePayment;

        return $this;
    }

    /**
     * @return string
     */
    public function getDuration(): string
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     * @return self
     */
    public function setDuration(string $duration): self
    {
        $this->duration = $duration;

        return $this;
    }
}
