<?php


namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\Context;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SettlementFactory
 */
abstract class AbstractFactory implements FactoryInterface
{
    /**
     * @var GeneraliHttpClientInterface
     */
    private $httpClient;

    /**
     * AbstractFactory constructor.
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
     * @return array
     */
    protected function getReferentialCodes(string $referentialKey, string $contractNumber): array
    {
        return ReferentialHandler::extractCodes(
            $this->getHttpClient()->retrieveTransactionSubscriptionData($contractNumber, [Context::EXPECTED_ITEM_REFERENTIEL])->getDonnees(),
            $referentialKey
        );
    }

    /**
     * @param string $referentialKey
     * @param string $contractNumber
     * @param float $searchedAmount
     * @return string|null
     */
    protected function guessReferentialCode(string $referentialKey, string $contractNumber, float $searchedAmount): ?string
    {
        return ReferentialHandler::guessCodeByAmount(
            $this->getHttpClient()->retrieveTransactionSubscriptionData($contractNumber, [Context::EXPECTED_ITEM_REFERENTIEL])->getDonnees(),
            $referentialKey,
            $searchedAmount
        );
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $parameters, string $contractNumber)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver, $contractNumber);

        $resolvedData = $resolver->resolve($parameters);

        return $this->doCreate($resolvedData, $contractNumber);
    }

    /**
     * @param OptionsResolver $resolver
     * @param string $contractNumber
     */
    abstract public function configureData(OptionsResolver $resolver, string $contractNumber): void;

    /**
     * @param array $resolvedData
     * @param string $contractNumber
     * @return mixed
     */
    abstract public function doCreate(array $resolvedData, string $contractNumber);
}