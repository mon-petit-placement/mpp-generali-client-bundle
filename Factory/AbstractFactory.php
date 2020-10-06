<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\Context;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SettlementFactory.
 */
abstract class AbstractFactory implements FactoryInterface
{
    /**
     * @var GeneraliHttpClientInterface
     */
    private $httpClient;

    /**
     * AbstractFactory constructor.
     *
     * @param GeneraliHttpClientInterface $httpClient
     */
    public function __construct(GeneraliHttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @return GeneraliHttpClientInterface
     */
    public function getHttpClient(): GeneraliHttpClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @param string $referentialKey
     *
     * @return array
     */
    protected function getReferentialCodes(string $referentialKey): array
    {
        return ReferentialHandler::extractReferentialCodes(
            $this->getHttpClient()->retrieveTransactionSubscriptionData([Context::EXPECTED_ITEM_REFERENTIEL])->getDonnees(),
            $referentialKey
        );
    }

    /**
     * @param string $referentialKey
     * @param string $subReferentialKey
     *
     * @return array
     */
    protected function getSubReferentialCode(string $referentialKey, string $subReferentialKey): array
    {
        return ReferentialHandler::extractSubReferentialCodes(
            $this->getHttpClient()->retrieveTransactionSubscriptionData([Context::EXPECTED_ITEM_REFERENTIEL])->getDonnees(),
            $referentialKey,
            $subReferentialKey
        );
    }

    /**
     * @param string $referentialKey
     * @param float  $searchedAmount
     *
     * @return string|null
     */
    protected function guessReferentialCode(string $referentialKey, float $searchedAmount): ?string
    {
        return ReferentialHandler::guessCodeByAmount(
            $this->getHttpClient()->retrieveTransactionSubscriptionData([Context::EXPECTED_ITEM_REFERENTIEL])->getDonnees(),
            $referentialKey,
            $searchedAmount
        );
    }

    /**
     * @param string $expectedItem
     *
     * @return array
     */
    public function getExpectedItemCodes(string $expectedItem): array
    {
        return ReferentialHandler::extractExpectedItemsCode(
            $this->getHttpClient()->retrieveTransactionSubscriptionData([$expectedItem])->getDonnees(),
            $expectedItem
        );
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $parameters)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);
        $resolvedData = $resolver->resolve($parameters);

        return $this->doCreate($resolvedData);
    }

    /**
     * @param OptionsResolver $resolver
     */
    abstract public function configureData(OptionsResolver $resolver): void;

    /**
     * @param array $resolvedData
     *
     * @return mixed
     */
    abstract public function doCreate(array $resolvedData);
}
