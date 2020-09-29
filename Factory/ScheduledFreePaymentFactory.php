<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\ScheduledFreePayment;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ScheduledFreePaymentFactory.
 */
class ScheduledFreePaymentFactory extends AbstractFactory
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
     * @var RepartitionFactory
     */
    private $repartitionFactory;

    /**
     * SubscriptionFactory constructor.
     *
     * @param GeneraliHttpClientInterface $httpClient
     * @param SubscriberFactory           $subscriberFactory
     * @param CustomerFolderFactory       $customerFolderFactory
     * @param SettlementFactory           $settlementFactory
     * @param InitialPaymentFactory       $initialPaymentFactory
     */
    public function __construct(
        GeneraliHttpClientInterface $httpClient,
        SubscriberFactory $subscriberFactory,
        CustomerFolderFactory $customerFolderFactory,
        SettlementFactory $settlementFactory,
        RepartitionFactory $repartitionFactory
    ) {
        parent::__construct($httpClient);
        $this->subscriberFactory = $subscriberFactory;
        $this->customerFolderFactory = $customerFolderFactory;
        $this->settlementFactory = $settlementFactory;
        $this->repartitionFactory = $repartitionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('customerFolder')->setAllowedTypes('customerFolder', ['array'])->setNormalizer('customerFolder', function (Options $options, $value) {
                return $this->customerFolderFactory->create($value);
            })
            ->setRequired('repartitions')->setAllowedTypes('repartitions', ['array'])->setNormalizer('repartitions', function (Options $options, $values) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->repartitionFactory->create($value);
                }

                return $resolvedValues;
            })
            ->setRequired('settlement')->setAllowedTypes('settlement', ['array'])->setNormalizer('settlement', function (Options $options, $value) {
                return $this->settlementFactory->create($value);
            })
            ->setRequired('amount')->setAllowedTypes('amount', ['float'])
            ->setDefault('periodicity', 'MENSUELLE')->setAllowedTypes('periodicity', ['string'])
            ->setRequired('subscriber')->setAllowedTypes('subscriber', ['array', 'null'])->setNormalizer('subscriber', function (Options $options, $value) {
                return $this->subscriberFactory->create($value);
            })
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new ScheduledFreePayment())
            ->setCustomerFolder($resolvedData['customerFolder'])
            ->setRepartitions($resolvedData['repartitions'])
            ->setSettlement($resolvedData['settlement'])
            ->setSubscriber($resolvedData['subscriber'])
            ->setAmount($resolvedData['amount'])
            ->setPeriodicity($resolvedData['periodicity'])
        ;
    }
}
