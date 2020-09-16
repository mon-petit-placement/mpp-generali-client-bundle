<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\AssetOrigin;

/**
 * Class AssetOriginFactory
 */
class AssetOriginFactory
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
            ->setDefault('codeOrigin', null)->setAllowedTypes('codeOrigin', ['string', 'null'])
            ->setDefault('precision', null)->setAllowedTypes('precision', ['string', 'null'])
        ;
    }

    /**
     * @param array $value
     *
     * @return AssetOrigin
     */
    public function create(array $value)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);

        $resolvedValue = $resolver->resolve($value);

        return (new AssetOrigin())
            ->setPrecision($resolvedValue['precision'])
            ->setCodeOrigin($resolvedValue['codeOrigin'])
            ;
    }
}