<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\Repartition;
use Mpp\GeneraliClientBundle\Model\ScheduledFreePayment;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Options;

/**
 * Class ScheduledFreePaymentFactory
 */
class ScheduledFreePaymentFactory extends AbstractFactory
{
    /**
     * @var RepartitionFactory
     */
    private $repartitionFactory;

    /**
     * ScheduledFreePaymentFactory constructor.
     * @param GeneraliHttpClientInterface $httpClient
     * @param RepartitionFactory $repartitionFactory
     */
    public function __construct(GeneraliHttpClientInterface $httpClient, RepartitionFactory $repartitionFactory)
    {
        parent::__construct($httpClient);
        $this->repartitionFactory = $repartitionFactory;
    }

    /**
     * {@inheritDoc}
     */
    public function configureData(OptionsResolver $resolver, string $contractNumber): void
    {
        $resolver
            ->setRequired('bankDebitDay')->setAllowedTypes('bankDebitDay', ['int'])
            ->setRequired('amount')->setAllowedTypes('amount', ['float', 'int'])
            ->setRequired('periodicity')->setAllowedTypes('periodicity', ['string'])
            ->setRequired('repartition')->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function (Options $options, $values) use ($contractNumber): array {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->repartitionFactory->create($value, $contractNumber);
                }

                return $resolvedValues;
            });
    }

    /**
     * {@inheritDoc}
     */
    public function doCreate(array $resolvedData, $contractNumber)
    {
        return (new ScheduledFreePayment())
            ->setBankDebitDay($resolvedData['bankDebitDay'])
            ->setAmount($resolvedData['amount'])
            ->setPeriodicity($resolvedData['periodicity'])
            ->setRepartition($resolvedData['repartition'])
        ;
    }
}