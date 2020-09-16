<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Model\FundsOrigin;
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;

/**
 * Class FundsOriginFactory
 */
class FundsOriginFactory
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
     * @param array $parameters
     * @return FundsOrigin
     */
    public function create(array $parameters): FundsOrigin
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);

        $resovedParameters = $resolver->resolve($parameters);

        return (new FundsOrigin())
            ->setPrecision($resovedParameters['precision'])
            ->setAmount($resovedParameters['amount'])
            ->setDate($resovedParameters['date'])
            ->setCodeOrigin($resovedParameters['codeOrigin'])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureData(OptionsResolver $resolver)
    {
        $codeOriginAllowedValues = $this->httpClient->getSubscriptionInformations();
        $resolver
            ->setDefault('codeOrigin', null)->setAllowedTypes('codeOrigin', ['string', 'null'])->setAllowedValues('codeOrigin', $codeOriginAllowedValues)
            ->setDefault('amount', null)->setAllowedTypes('amount', ['float', 'null'])
            ->setDefault('date', null)->setAllowedTypes('date', ['\DateTime', 'null'])
            ->setDefault('precision', null)->setAllowedTypes('precision', ['string', 'null'])
        ;
    }

}