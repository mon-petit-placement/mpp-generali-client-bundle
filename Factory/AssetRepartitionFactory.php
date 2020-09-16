<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\AssetsRepartition;

/**
 * Class AssetRepartitionFactory
 */
class AssetRepartitionFactory
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
            ->setDefault('codeRepartition', null)->setAllowedTypes('codeRepartition', ['string', 'null'])
            ->setDefault('percentRepartition', null)->setAllowedTypes('percentRepartition', ['float', 'null'])
            ->setDefault('precision', null)->setAllowedTypes('precision', ['string', 'null'])
        ;
    }

    /**
     * @param array $value
     *
     * @return AssetsRepartition
     */
    public function create(array $value)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);

        $resolvedValues = $resolver->resolve($value);

        return (new AssetsRepartition())
            ->setPercentRepartition($resolvedValues['percentRepartition'])
            ->setPrecision($resolvedValues['precision'])
            ->setCodeRepartition($resolvedValues['codeRepartition'])
            ;
    }
}