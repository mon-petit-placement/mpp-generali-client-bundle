<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\InitialPayment;
use Mpp\GeneraliClientBundle\Model\Repartition;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class InitialPaymentFactory
 */
class InitialPaymentFactory extends AbstractFactory
{
    /**
     * @var RepartitionFactory
     */
    private $repartitionFactory;

    /**
     * InitialPaymentFactory constructor.
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
            ->setRequired('amount')->setAllowedTypes('amount', ['float'])
            ->setRequired('repartition', [])->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function (Options $options, $values, $contractNumber) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->repartitionFactory->create($value, $contractNumber);
                }

                return $resolvedValues;
            })
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function doCreate(array $resolvedData, $contractNumber)
    {
        return (new InitialPayment())
            ->setAmount($resolvedData['amount'])
            ->setRepartition($resolvedData['repartition'])
        ;
    }
}