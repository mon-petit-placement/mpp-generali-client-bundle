<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\InitialScheduledFreePayment;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Options;

/**
 * Class ScheduledFreePaymentFactory.
 */
class InitialScheduledFreePaymentFactory extends AbstractFactory
{
    /**
     * @var RepartitionFactory
     */
    private $repartitionFactory;

    /**
     * ScheduledFreePaymentFactory constructor.
     *
     * @param GeneraliHttpClientInterface $httpClient
     * @param RepartitionFactory          $repartitionFactory
     */
    public function __construct(GeneraliHttpClientInterface $httpClient, RepartitionFactory $repartitionFactory)
    {
        parent::__construct($httpClient);
        $this->repartitionFactory = $repartitionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('bankDebitDay')->setAllowedTypes('bankDebitDay', ['int'])
            ->setRequired('amount')->setAllowedTypes('amount', ['float', 'int'])
            ->setRequired('periodicity')->setAllowedTypes('periodicity', ['string'])
            ->setRequired('repartitions')->setAllowedTypes('repartitions', ['array'])->setNormalizer('repartitions', function (Options $options, $values): array {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->repartitionFactory->create($value);
                }

                return $resolvedValues;
            });
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new InitialScheduledFreePayment())
            ->setBankDebitDay($resolvedData['bankDebitDay'])
            ->setAmount($resolvedData['amount'])
            ->setPeriodicity($resolvedData['periodicity'])
            ->setRepartitions($resolvedData['repartitions'])
        ;
    }
}
