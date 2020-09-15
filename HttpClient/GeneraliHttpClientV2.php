<?php

namespace Mpp\GeneraliClientBundle\HttpClient;

use GuzzleHttp\Client;
use Mpp\GeneraliClientBundle\Model\Context;

class GeneraliHttpClientV2 implements GeneraliHttpClientInterface
{
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var string
     */
    private $providerCode;

    /**
     * @var string
     */
    private $subscriptionCode;

    /**
     * GeneraliHttpClientV2 constructor.
     *
     * @param Client          $httpClient
     * @param LoggerInterface $logger
     * @param string          $providerCode
     * @param string          $subscriptionCode
     */
    public function __construct(Client $httpClient, LoggerInterface $logger, string $providerCode, string $subscriptionCode)
    {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->providerCode = $providerCode;
        $this->subscriptionCode = $subscriptionCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getContractInformations(string $contractNumber, array $exepectedItems = []): array
    {
        $path = sprintf('/epart/v2.0/contrats/%s', $contractNumber);

        try {
            $this->httpClient->post($path, [
                'body' => $this->buildContextBody($exepectedItems),
            ]);
            $this->logger->info(sprintf(
                '[Generali - httpClient.getContractInformations %s ] SUCCESS',
                $path
            ));
        } catch (\Exception $e) {
            $this->logger->error(sprintf(
                '[Generali - httpClient.getContractInformations %s ] ERROR: %s',
                $path,
                $e->getMessage()
            ));
        }
    }

    /**
     * @param array $parameters
     * @param array $expectedItems
     *
     * @return Context
     */
    private function buildContext(array $parameters, array $expectedItems = []): Context
    {
        $context = new Context($expectedItems);
        $context
            ->setProviderCode($this->providerCode)
        ;

        return $context;
    }
}
