<?php


namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\Repartition;

/**
 * Class RepartitionFactory
 */
class RepartitionFactory
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
            ->setDefault('amount', null)->setAllowedTypes('amount', ['string', 'null'])
            ->setDefault('fundsCode', null)->setAllowedTypes('fundsCode', ['string', 'null'])
        ;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);
        $resolvedData = $resolver->resolve($data);

        return (new Repartition())
            ->setAmount($resolvedData['amount'])
            ->setFundsCode($resolvedData['fundsCode'])
            ;
    }
}