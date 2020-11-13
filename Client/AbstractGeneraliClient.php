<?php

namespace Mpp\GeneraliClientBundle\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use GuzzleHttp\RequestOptions;
use Mpp\GeneraliClientBundle\Factory\ModelFactory;
use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\ErrorMessage;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
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
     * @var ModelFactory
     */
    protected $modelFactory;

    /**
     * @var string
     */
    protected $providerCode;

    /**
     * @var string
     */
    protected $subscriptionCode;

    public function __construct(
        LoggerInterface $logger,
        SerializerInterface $serializer,
        ClientInterface $httpClient,
        ModelFactory $modelFactory,
        string $providerCode,
        string $subscriptionCode
    ) {
        $this->logger = $logger;
        $this->serializer = $serializer;
        $this->httpClient = $httpClient;
        $this->modelFactory = $modelFactory;
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
     * Retrieve model factory.
     *
     * @method getModelFactory
     *
     * @return ModelFactory
     */
    public function getModelFactory(): ModelFactory
    {
        return $this->modelFactory;
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
    public function getContext(array $parameters = []): Contexte
    {
        $parameters['codeApporteur'] = $this->providerCode;
        $parameters['codeSouscription'] = $this->subscriptionCode;

        return $this->getModelFactory()->createFromArray(Contexte::class, $parameters);
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
     * @throws ErrorMessage
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
                'options' => $options,
                'headers' => $this->httpClient->getConfig('headers'),
            ]);

            return $this->httpClient->request($method, $url, $options);
        } catch (ClientException | ServerException $e) {
            if (Response::HTTP_UNAUTHORIZED === $e->getResponse()->getStatusCode()) {
                throw (new ErrorMessage())
                    ->setCode(Response::HTTP_UNAUTHORIZED)
                    ->setTexte($e->getResponse()->getBody()->getContents())
                    ->getException()
                ;
            }

            $errorMessages = $this->getModelFactory()->createFromJson(ApiResponse::class, $e->getResponse()->getBody()->getContents());

            $this->logger->error(sprintf('%s error', $className), [
                'method' => $method,
                'url' => $url,
                'headers' => $this->httpClient->getConfig('headers'),
                'boby' => $e->getRequest()->getBody(),
                'response_code' => $e->getResponse()->getStatusCode(),
                'error_message' => (string) $errorMessages,
            ]);

            throw $errorMessages->getException();
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

        try {
            return $this->getModelFactory()->createFromJson($className, $response);
        } catch (ExceptionInterface $e) {
            $this->logger->error(sprintf('Error during deserialization: %s', $e->getMessage()));
        }
    }

    /**
     * Make a request and deserialize the Guzzle response to an object of the given class name and put it in api response object.
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
    public function getApiResponse(?string $className, string $method, string $path, array $options = []): ApiResponse
    {
        $apiResponse = $this->requestAndPopulate(ApiResponse::class, $method, $path, $options);

        if (null === $className) {
            return $apiResponse;
        }

        return $apiResponse->setDonnees($this->getModelFactory()->createFromArray($className, $apiResponse->getDonnees()));
    }

    /**
     * Serialize model class to json format.
     *
     * @method serialize
     *
     * @param mixed $model
     *
     * @return string
     */
    public function serialize($model): string
    {
        return $this->serializer->serialize($model, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
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
