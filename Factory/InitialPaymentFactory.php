<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\InitialPayment;
use Mpp\GeneraliClientBundle\Model\Repartition;

/**
 * Class InitialPaymentFactory
 */
class InitialPaymentFactory
{
    /**
     * @var GeneraliHttpClientInterface
     */
    private $httpClient;

    /**
     * @param GeneraliHttpClientInterface $httpClient
     */
    public function __construct(GeneraliHttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureData(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('amount', null)->setAllowedTypes('amount', ['float', 'null'])
            ->setDefault('repartition', [])->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function (Options $options, $values) {
                $resolvedValues = [];

                foreach ($values as $value) {
                    $resolvedValues[] = RepartitionFactory::create($value);
                }

                return $resolvedValues;
            })
        ;
    }

    /**
     * @param array $data
     * @return InitialPayment
     */
    public function create(array $data)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);

        $resolvedValues = $resolver->resolve($data);

        return (new InitialPayment())
            ->setAmount($resolvedValues['amount'])
            ->setRepartition($resolvedValues['repartition'])
            ;
    }
}