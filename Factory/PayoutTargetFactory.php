<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\PayoutTarget;

/**
 * Class PayoutTargetFactory
 */
class PayoutTargetFactory
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
            ->setDefault('targetCode', null)->setAllowedTypes('targetCode', ['string', 'null'])
            ->setDefault('precision', null)->setAllowedTypes('precision', ['string', 'null'])
        ;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function create(array $data): array
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);

        $resolvedValues = $resolver->resolve($data);

        return (new PayoutTarget())
            ->setPrecision($resolvedValues['precision'])
            ->setTargetCode($resolvedValues['targetCode'])
            ;
    }

}