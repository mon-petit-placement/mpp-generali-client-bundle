<?php

namespace Mpp\GeneraliClientBundle\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use GuzzleHttp\RequestOptions;
use Mpp\GeneraliClientBundle\Model\GeneraliApiError;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractGeneraliClient implements GeneraliClientInterface
{
    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var string
     */
    private $providerCode;

    /**
     * @var string
     */
    private $subscriptionCode;

    public function __construct(LoggerInterface $logger, SerializerInterface $serializer, ClientInterface $httpClient, string $providerCode, string $subscriptionCode)
    {
        $this->logger = $logger;
        $this->serializer = $serializer;
        $this->httpClient = $httpClient;
        $this->providerCode = $providerCode;
        $this->subscriptionCode = $subscriptionCode;
    }

    /**
     * Retrieve logger.
     *
     * @method getLogger
     *
     * @return LoggerInterface
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Retrieve serializer.
     *
     * @method getSerializer
     *
     * @return SerializerInterface
     */
    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * Retrieve http client.
     *
     * @method getHttpClient
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * Retrieve provider code.
     *
     * @method getProviderCode
     *
     * @return string
     */
    public function getProviderCode(): string
    {
        return $this->providerCode;
    }

    /**
     * Retrieve subscription code.
     *
     * @method getSubscriptionCode
     *
     * @return string
     */
    public function getSubscriptionCode(): string
    {
        return $this->subscriptionCode;
    }

    /**
     * {@inheritdoc}
     */
    public function buildContext(array $parameters = [], array $expectedItems = []): Context
    {
        $context = (new Context())
            ->setProviderCode($this->providerCode)
            ->setSubscriptionCode($this->subscriptionCode)
            ->setExpectedItems($expectedItems)
        ;

        if (isset($parameters['contractNumber'])) {
            $context->setContractNumber($parameters['contractNumber']);
        }

        return $context;
    }

    /**
     * Make a guzzle request.
     *
     * @method request
     *
     * @param string $method
     * @param string $path
     * @param array  $options
     * @param bool   $isSign
     *
     * @return GuzzleResponse
     *
     * @throws GeneraliApiError
     */
    public function request(string $method, string $path, array $options = []): ResponseInterface
    {
        try {
            $fullPath = sprintf('%s%s', $this->getBasePath(), $path);
            $url = sprintf('%s%s', $this->httpClient->getConfig('base_uri'), $fullPath);
            $className = (new \ReflectionClass($this))->getName();

            $this->logger->info(sprintf('%s api call', $className), [
                'method' => $method,
                'url' => $url,
                'headers' => $this->httpClient->getConfig('headers'),
            ]);

            return $this->httpClient->request($method, $fullPath, $options);
        } catch (ClientException | ServerException $e) {
            if (Response::HTTP_UNAUTHORIZED === $e->getResponse()->getStatusCode()) {
                throw (new GeneraliApiError())
                    ->setCode(Response::HTTP_UNAUTHORIZED)
                    ->setMessage($e->getResponse()->getBody()->getContents())
                    ->getException()
                ;
            }

            $generaliApiError = $this->serializer->deserialize($e->getResponse()->getBody()->getContents(), GeneraliApiError::class, 'json');

            $this->logger->error(sprintf('%s error', $className), [
                'method' => $method,
                'url' => $url,
                'headers' => $this->httpClient->getConfig('headers'),
                'boby' => $e->getRequest()->getBody(),
                'response_code' => $e->getResponse()->getStatusCode(),
                'error_code' => $apicilApiError->getCode(),
                'error_messages' => (string) $apicilApiError,
            ]);

            throw $apicilApiError->getException();
        }
    }

    /**
     * Make and request and return the response ressource as file.
     *
     * @method download
     *
     * @param string $method
     * @param string $path
     * @param array  $options
     *
     * @return File
     */
    public function download(string $method, string $path, array $options = []): File
    {
        $tmpFilePath = sprintf('%s/%s', sys_get_temp_dir(), uniqid());
        $tmpFileResource = fopen($tmpFilePath, 'w+');
        $options[RequestOptions::SINK] = $tmpFileResource;
        $this->request($method, $path, $options);

        return new File($tmpFilePath, true);
    }

    /**
     * Make a request and deserialize the Guzzle response to an object of the given class name.
     *
     * @method requestAndPopulate
     *
     * @param string $className
     * @param string $method
     * @param string $path
     * @param array  $options
     * @param bool   $isSign
     *
     * @return mixed
     */
    public function requestAndPopulate(string $className, string $method, string $path, array $options = [])
    {
        $response = $this->request($method, $path, $options)->getBody()->getContents();

        if ('bool' === $className) {
            return filter_var($response, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
        }

        if ('array' === $className) {
            return json_decode($response, true);
        }

        try {
            return $this->serializer->deserialize($response, $className, 'json');
        } catch (ExceptionInterface $e) {
            $this->logger->error(sprintf('Error during deserialization: %s', $e->getMessage()));
        }
    }

    /**
     * {@inheritdoc}
     */
    abstract public static function getClientAlias(): string;

    /**
     * {@inheritdoc}
     */
    abstract public function getBasePath(): string;
}
