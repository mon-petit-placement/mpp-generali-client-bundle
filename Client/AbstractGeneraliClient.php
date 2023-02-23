<?php

namespace Mpp\GeneraliClientBundle\Client;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use GuzzleHttp\RequestOptions;
use Mpp\GeneraliClientBundle\Exception\GeneraliApiException;
use Mpp\GeneraliClientBundle\Factory\ModelFactory;
use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\ErrorMessage;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use ReflectionClass;
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
     * @var array
     */
    protected $defaultContext;

    public function __construct(
        LoggerInterface $logger,
        SerializerInterface $serializer,
        ClientInterface $httpClient,
        ModelFactory $modelFactory,
        array $defaultContext
    ) {
        $this->logger = $logger;
        $this->serializer = $serializer;
        $this->httpClient = $httpClient;
        $this->modelFactory = $modelFactory;
        $this->defaultContext = $defaultContext;
    }

    /**
     * Retrieve logger.
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
     * @return SerializerInterface
     */
    public function getSerializer(): SerializerInterface
    {
        return $this->serializer;
    }

    /**
     * Retrieve http client.
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
     * @return ModelFactory
     */
    public function getModelFactory(): ModelFactory
    {
        return $this->modelFactory;
    }

    /**
     * Retrieve default context.
     *
     * @return array
     */
    public function getDefaultContext(): array
    {
        return $this->defaultContext;
    }

    /**
     * {@inheritdoc}
     */
    public function getContext(array $parameters = []): Contexte
    {
        return $this->getModelFactory()->createFromArray(Contexte::class, array_merge(
            $this->getDefaultContext(),
            $parameters
        ));
    }

    /**
     * Make a guzzle request.
     *
     * @param string $method
     * @param string $path
     * @param array  $options
     * @param bool   $isSign
     *
     * @return ResponseInterface
     */
    private function request(string $method, string $path, array $options = []): ResponseInterface
    {
        $fullPath = sprintf('%s%s', $this->getBasePath(), $path);
        $url = sprintf('%s%s', $this->httpClient->getConfig('base_uri'), $fullPath);
        $className = (new ReflectionClass($this))->getName();

        $this->logger->info(sprintf('%s api call', $className), [
            'method' => $method,
            'url' => $url,
            'options' => $options,
            'headers' => $this->httpClient->getConfig('headers'),
        ]);

        return $this->httpClient->request($method, $url, $options);
    }

    /**
     * Request and return the response ressource as file.
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
     * Make a request and deserialize the Guzzle response to an object of the given class name and put it in api response object.
     *
     * @param string $className
     * @param string $method
     * @param string $path
     * @param array  $options
     * @param bool   $isSign
     *
     * @return ApiResponse|null
     */
    public function getApiResponse(?string $className, string $method, string $path, array $options = []): ?ApiResponse
    {
        $response = $this->request($method, $path, $options);
        $contents = $response->getBody()->getContents();

        if (empty($contents)) {
            return null;
        }

        if (!self::isValidJson($contents)) {
            throw new GeneraliApiException(sprintf('Generali API response isn\'t a valid JSON: %s', $contents));
        }

        $apiResponse = $this->getModelFactory()->createFromJson(ApiResponse::class, $contents);

        if ($apiResponse->hasErrors()) {
            $errorMessages = json_encode(array_map(function ($message) {
                return (string) $message;
            }, $apiResponse->getMessages()));

            throw new GeneraliApiException(sprintf('Generali API response has error messages: %s', $errorMessages));
        }

        $donnees = $apiResponse->getDonnees();
        if (null !== $className && null !== $apiResponse->getDonnees()) {
            $donnees = $this->getModelFactory()->createFromArray($className, $apiResponse->getDonnees());
        }

        return $apiResponse->setDonnees($donnees);
    }

    /**
     * Serialize model class to json format.
     *
     * @param mixed $model
     *
     * @return string
     */

    public function serialize($model): string
    {
        $stringReplacementsArray = [
            'œ' => 'oe',
            'ÿ' => 'y'
        ];
        $json = $this->serializer->serialize($model, 'json', [
            AbstractObjectNormalizer::SKIP_NULL_VALUES => true,
            AbstractObjectNormalizer::PRESERVE_EMPTY_OBJECTS => true,
            "json_encode_options" =>
                \JSON_HEX_TAG | \JSON_HEX_APOS | \JSON_HEX_AMP | \JSON_HEX_QUOT | \JSON_UNESCAPED_UNICODE,
        ]);

        return str_replace(array_keys($stringReplacementsArray), array_values($stringReplacementsArray), $json);
    }

    /**
     * Check if the given string is a valid JSON
     */
    public static function isValidJson(string $string): bool
    {
        json_decode($string);

        return (json_last_error() == JSON_ERROR_NONE);
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
