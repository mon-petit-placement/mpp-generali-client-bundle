<?php


namespace Mpp\GeneraliClientBundle\HttpClient;


use GuzzleHttp\Client;

class GeneraliHttpClientV2 implements GeneraliHttpClientInterface
{
    const AVAILABLE_EXPECTED_ITEMS = [

    ];

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
     * @param Client $httpClient
     * @param LoggerInterface $logger
     * @param string $providerCode
     * @param string $subscriptionCode
     */
    public function __construct(Client $httpClient, LoggerInterface $logger, string $providerCode, string $subscriptionCode)
    {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->providerCode = $providerCode;
        $this->subscriptionCode = $subscriptionCode;
    }

    /**
     * {@inheritDoc}
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
     * @param array $expectedItems
     * @return array
     */
    private function buildContextBody(array $expectedItems = [])
    {
        //TODO vérifier contenu $expectedItems

        $body = [
            'contexte' => [
                'codeApporteur' => $this->providerCode,
            ],
        ];
        if(!empty($expectedItems)) {
            $body['contexte']['elementsAttendus'] = $expectedItems;
        }

        return $body;
    }
}