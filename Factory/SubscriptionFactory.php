<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\Subscriber;
use Mpp\GeneraliClientBundle\Model\Subscription;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SubscriptionFactory.
 */
class SubscriptionFactory extends AbstractFactory
{
    /**
     * @var SubscriberFactory
     */
    private $subscriberFactory;

    /**
     * @var CustomerFolderFactory
     */
    private $customerFolderFactory;

    /**
     * @var SettlementFactory
     */
    private $settlementFactory;

    /**
     * @var InitialPaymentFactory
     */
    private $initialPaymentFactory;

    /**
     * @var InitialScheduledFreePaymentFactory
     */
    private $initialScheduledFreePaymentFactory;

    /**
     * SubscriptionFactory constructor.
     *
     * @param GeneraliHttpClientInterface $httpClient
     * @param SubscriberFactory $subscriberFactory
     * @param CustomerFolderFactory $customerFolderFactory
     * @param SettlementFactory $settlementFactory
     * @param InitialPaymentFactory $initialPaymentFactory
     * @param InitialScheduledFreePaymentFactory $initialScheduledFreePaymentFactory
     */
    public function __construct(
        GeneraliHttpClientInterface $httpClient,
        SubscriberFactory $subscriberFactory,
        CustomerFolderFactory $customerFolderFactory,
        SettlementFactory $settlementFactory,
        InitialPaymentFactory $initialPaymentFactory,
        InitialScheduledFreePaymentFactory $initialScheduledFreePaymentFactory
    ) {
        parent::__construct($httpClient);
        $this->subscriberFactory = $subscriberFactory;
        $this->customerFolderFactory = $customerFolderFactory;
        $this->settlementFactory = $settlementFactory;
        $this->initialPaymentFactory = $initialPaymentFactory;
        $this->initialScheduledFreePaymentFactory = $initialScheduledFreePaymentFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $beneficiaryClauseCodes = $this->getExpectedItemCodes(Context::EXPECTED_ITEM_BENEFICIARY_CLAUSE);
        $beneficiaryClauseOutcomes = $this->getExpectedItemCodes(Context::EXPECTED_ITEM_DENOUEMENT_TYPE);

        $resolver
            ->setRequired('externalReference1')->setAllowedTypes('externalReference1', ['string'])
            ->setDefined('externalReference2')->setAllowedTypes('externalReference2', ['string'])
            ->setRequired('subscriber')->setAllowedTypes('subscriber', ['array', 'null'])->setNormalizer('subscriber', function (Options $options, $value) {
                return $this->subscriberFactory->create($value);
            })
            ->setRequired('customerFolder')->setAllowedTypes('customerFolder', ['array'])->setNormalizer('customerFolder', function (Options $options, $value) {
                return $this->customerFolderFactory->create($value);
            })
            ->setRequired('settlement')->setAllowedTypes('settlement', ['array'])->setNormalizer('settlement', function (Options $options, $value) {
                return $this->settlementFactory->create($value);
            })
            ->setRequired('initialScheduledFreePayment')->setAllowedTypes('initialScheduledFreePayment', ['array'])->setNormalizer('initialScheduledFreePayment', function (Options $options, $value) {
                return $this->initialScheduledFreePaymentFactory->create($value);
            })
            ->setRequired('initialPayment')->setAllowedTypes('initialPayment', ['array'])->setNormalizer('initialPayment', function (Options $options, $value) {
                return $this->initialPaymentFactory->create($value);
            })
            ->setRequired('paymentType')->setAllowedValues('paymentType', ['PRELEVEMENT', 'VIREMENT', 'CHEQUE'])
            ->setRequired('fiscality')->setAllowedTypes('fiscality', ['string'])
            ->setDefined('deathBeneficiaryClauseOutcome')->setAllowedValues('deathBeneficiaryClauseOutcome', $beneficiaryClauseOutcomes)
            ->setDefined('deathBeneficiaryClauseCode')->setAllowedValues('deathBeneficiaryClauseCode', $beneficiaryClauseCodes)
            ->setDefined('deathBeneficiaryClauseText')->setAllowedTypes('deathBeneficiaryClauseText', ['string'])
            ->setRequired('gestionMode')->setAllowedTypes('gestionMode', ['string'])
            ->setRequired('durationType')->setAllowedTypes('durationType', ['string'])
            ->setDefined('duration')->setAllowedTypes('duration', ['int'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        $subscription = (new Subscription())
            ->setExternalReference1($resolvedData['externalReference1'])
            ->setExternalReference2($resolvedData['externalReference2'])
            ->setSubscriber($resolvedData['subscriber'])
            ->setCustomerFolder($resolvedData['customerFolder'])
            ->setSettlement($resolvedData['settlement'])
            ->setInitialPayment($resolvedData['initialPayment'])
            ->setInitialScheduledFreePayment($resolvedData['initialScheduledFreePayment'])
            ->setPaymentType($resolvedData['paymentType'])
            ->setFiscality($resolvedData['fiscality'])
            ->setDeathBeneficiaryClauseCode($resolvedData['deathBeneficiaryClauseCode'])
            ->setDeathBeneficiaryClauseText($resolvedData['deathBeneficiaryClauseText'])
            ->setGestionMode($resolvedData['gestionMode'])
            ->setDurationType($resolvedData['durationType'])
        ;
        if (isset($resolvedData['duration'])) {
            $subscription->setDuration($resolvedData['duration']);
        }
        if (isset($resolvedData['deathBeneficiaryClauseOutcome'])) {
            $subscription->setDeathBeneficiaryClauseOutcome($resolvedData['deathBeneficiaryClauseOutcome']);
        }

        return $subscription;
    }
}
