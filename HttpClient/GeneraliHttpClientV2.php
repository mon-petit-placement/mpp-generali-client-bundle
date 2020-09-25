<?php

namespace Mpp\GeneraliClientBundle\HttpClient;

use GuzzleHttp\Client;
use Mpp\GeneraliClientBundle\Model\Arbitration;
use Mpp\GeneraliClientBundle\Model\BaseResponse;
use Mpp\GeneraliClientBundle\Model\Document;
use Mpp\GeneraliClientBundle\Model\FreePayment;
use Mpp\GeneraliClientBundle\Model\PartialSurrender;
use Mpp\GeneraliClientBundle\Model\ScheduledFreePayment;
use Mpp\GeneraliClientBundle\Model\TransactionOrder;
use Psr\Log\LoggerInterface;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\SubscriptionResponse;
use Mpp\GeneraliClientBundle\Model\Subscription;

/**
 * Class GeneraliHttpClientV2.
 */
class GeneraliHttpClientV2 implements GeneraliHttpClientInterface
{
    const TRANSACTION_SUBSCRIPTION_INITIATE = '/epart/v2.0/transaction/souscription/initier';
    const TRANSACTION_SUBSCRIPTION_CHECK = '/epart/v2.0/transaction/souscription/verifier';
    const TRANSACTION_SUBSCRIPTION_CONFIRM = '/epart/v2.0/transaction/souscription/confirmer';
    const TRANSACTION_SUBSCRIPTION_FINALIZE = '/epart/v2.0/transaction/souscription/finaliser';

    const TRANSACTION_FREE_PAYMENT_INITIATE = '/epart/v2.0/transaction/versementLibre/initier';
    const TRANSACTION_FREE_PAYMENT_CHECK = '/epart/v2.0/transaction/versementLibre/initier';
    const TRANSACTION_FREE_PAYMENT_CONFIRM = '/epart/v2.0/transaction/versementLibre/confirmer';
    const TRANSACTION_FREE_PAYMENT_FINALIZE = '/epart/v2.0/transaction/versementLibre/finaliser';

    const TRANSACTION_SCHEDULED_FREE_PAYMENT_INITIATE = '/epart/v2.0/transaction/versementsLibresProgrammes/initier';
    const TRANSACTION_SCHEDULED_FREE_PAYMENT_CHECK = '/epart/v2.0/transaction/versementsLibresProgrammes/initier';
    const TRANSACTION_SCHEDULED_FREE_PAYMENT_CONFIRM = '/epart/v2.0/transaction/versementsLibresProgrammes/confirmer';
    const TRANSACTION_SCHEDULED_FREE_PAYMENT_FINALIZE = '/epart/v2.0/transaction/versementsLibresProgrammes/finaliser';

    const TRANSACTION_ARBITRATION_INITIATE = '/epart/v2.0/transaction/arbitrage/initier';
    const TRANSACTION_ARBITRATION_CHECK = '/epart/v2.0/transaction/arbitrage/initier';
    const TRANSACTION_ARBITRATION_CONFIRM = '/epart/v2.0/transaction/arbitrage/confirmer';
    const TRANSACTION_ARBITRATION_FINALIZE = '/epart/v2.0/transaction/arbitrage/finaliser';

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

        $response = [];
        try {
            $response = $this->httpClient->post($path, [
                'body' => $this->buildContext($exepectedItems),
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

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveTransactionSubscriptionData(array $exepectedItems = []): BaseResponse
    {
        $path = '/epart/v2.0/transaction/souscription/donnees';
        $context = $this->buildContext([], $exepectedItems)->toArray();
        $response = new BaseResponse();

        try {
            $rawResponse = $this->httpClient->post($path, [
                'body' => json_encode(['contexte' => $context]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response
                ->setDonnees($decodedRawResponse['donnees'])
                ->setMessages($decodedRawResponse['messages'])
            ;

            $this->logger->info(sprintf(
                '[Generali - httpClient.retrieveTransactionSubscriptionData %s ] SUCCESS',
                $path
            ));
        } catch (\Exception $e) {
            $this->logger->error(sprintf(
                '[Generali - httpClient.retrieveTransactionSubscriptionData %s ] ERROR: %s',
                $path,
                $e->getMessage()
            ));
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function buildContext(array $parameters = [], array $expectedItems = []): Context
    {
        $context = new Context();
        $context
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
     * {@inheritdoc}
     */
    public function createSubscription(Context $context, Subscription $subscription, bool $dematerialization = true, string $comment = null): SubscriptionResponse
    {
        $response = $this->initiateSubscription($context, $subscription, $dematerialization, $comment);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The Initiation of the Subscription has failed');
        }

        $response = $this->checkSubscription($context);

        return $this->confirmSubscription($context);
    }

    /**
     * {@inheritdoc}
     */
    public function initiateSubscription(
        Context $context,
        Subscription $subscription,
        bool $dematerialization = true,
        string $comment = null
    ): SubscriptionResponse {
        $response = new SubscriptionResponse();

        dump(json_encode([
            'contexte' => $context->arrayToInitiate(),
            'souscription' => $subscription->toArray(),
            'commentaire' => $comment,
            'dematerialisationCourriers' => $dematerialization,
        ]));

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SUBSCRIPTION_INITIATE, [
                'body' => json_encode([
                    'contexte' => $context->arrayToInitiate(),
                    'souscription' => $subscription->toArray(),
                    'commentaire' => $comment,
                    'dematerialisationCourriers' => $dematerialization,
                ]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setStatus($decodedRawResponse['statut']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.createSubscription.initiate %s ] SUCCESS',
                self::TRANSACTION_SUBSCRIPTION_INITIATE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.createSubscription.initiate %s ] ERROR: %s',
                self::TRANSACTION_SUBSCRIPTION_INITIATE,
                $e->getMessage()
            );
            $this->logger->error($errorMessage);
            $response->setErrorMessage($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function checkSubscription(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();
        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SUBSCRIPTION_CHECK, [
                'body' => json_encode(['contexte' => $context->arrayToCheck()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);

            $this->logger->info(sprintf(
                '[Generali - httpClient.createSubscription.check %s ] SUCCESS',
                self::TRANSACTION_SUBSCRIPTION_CHECK
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.createSubscription.check %s ] ERROR: %s',
                self::TRANSACTION_SUBSCRIPTION_CHECK,
                $e->getMessage()
            );
            $this->logger->error($errorMessage);
            $response->setMessage($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function confirmSubscription(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SUBSCRIPTION_CONFIRM, [
                'body' => json_encode([
                    'contexte' => $context->arrayToConfirm(),
                    'options' => [
                        'genererUnBulletin' => true,
                        'envoyerUnMailClient' => true,
                        'cloturerLeDossier' => true,
                    ],
                ]),
            ]);

            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setIdTransaction($decodedRawResponse['donnees']['idTransaction']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.createSubscription.confirm %s ] SUCCESS',
                self::TRANSACTION_SUBSCRIPTION_CONFIRM
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.createSubscription.confirm %s ] ERROR: %s',
                self::TRANSACTION_SUBSCRIPTION_CONFIRM,
                $e->getMessage()
            );

            $this->logger->error($errorMessage);
            $response->setMessage($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function sendFile(string $idTransaction, Document $document): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        $fileName = $document->getFilename();

        $file = new UploadedFile($document->getFilePath().$fileName, $fileName);
        $url = sprintf('/epart/v1.0/transaction/fournirPiece/%s/%s', $idTransaction, $document->getIdDocument());

        try {
            $response = $this->httpClient->post(
                $url,
                [
                    'multipart' => [
                        [
                            'name' => $document->getTitle(),
                            'contents' => $file,
                            'filename' => $fileName,
                        ],
                    ],
                ]
            );
            $contents = json_decode($response->getBody()->getContents(), true);

            $this->logger->info(sprintf(
                '[Generali - httpClient.sendFile %s on %s] SUCCESS',
                $fileName,
                $url
            ));
        } catch (Exception $exception) {
            $errorMessage = sprintf(
                '[Generali - httpClient.sendFile %s on %s] ERROR: %s',
                $fileName,
                $url,
                $exception->getMessage()
            );
            $this->logger->error($errorMessage);
            $response->setMessage($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function listSubscriptionFiles(string $idTransaction): SubscriptionResponse
    {
        $path = sprintf(
            '/epart/v1.0/transaction/piecesAFournir/list/%s/souscription',
            $idTransaction
        );

        $response = new SubscriptionResponse();

        try {
            $response = $this->httpClient->get($path);
            $this->logger->info(sprintf(
                '[Generali - httpClient.listSubscriptionFiles on path %s] SUCCESS',
                $path
            ));
            $contents = json_decode($response->getBody()->getContents(), true);

            foreach ($contents['donnees']['piecesAFournir'] as $docToGive) {
                $document = (new Document())
                    ->setIdDocument($docToGive['idPieceAFournir'])
                    ->setTitle($docToGive['libelle'])
                    ->setRequired((bool) $docToGive['nombreMin'])
                ;
                $response->addRequiredDocument($document);
            }
        } catch (Exception $exception) {
            $errorMessage = sprintf(
                '[Generali - httpClient.listSubscriptionFiles on path %s] ERROR: %s',
                $path,
                $exception->getMessage()
            );
            $this->logger->error($errorMessage);
            $response->setMessage($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function finalizeSubscription(Context $context, array $documents): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        foreach ($documents as $document) {
            $response = $this->sendFile($context->getIdTransaction(), $document);
            if (!empty($response->getMessage())) {
                return $response;
            }
        }

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SUBSCRIPTION_FINALIZE, [
                'body' => json_encode(['contexte' => $context->arrayToFinalize()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setOrderTransaction($decodedRawResponse['donnees']['orderTransaction']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.finalizeSubscription %s ] SUCCESS',
                self::TRANSACTION_SUBSCRIPTION_FINALIZE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.finalizeSubscription %s ] ERROR: %s',
                self::TRANSACTION_SUBSCRIPTION_FINALIZE,
                $e->getMessage()
            );
            $this->logger->error($errorMessage);
            $response->setMessage($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function getFreePaymentInformations(array $expectedItems = []): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function createFreePayment(Context $context, FreePayment $freePayment): SubscriptionResponse
    {
        $response = $this->initiateFreePayment($context, $freePayment);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The Initiation of the Subscription has failed');
        }

        $response = $this->checkSubscription($context);

        return $this->confirmSubscription($context);
    }

    /**
     * {@inheritdoc}
     */
    public function initiateFreePayment(Context $context, FreePayment $freePayment): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function checkFreePayment(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function confirmFreePayment(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function finalizeFreePayment(Context $context, array $documents): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getScheduledFreePaymentInformations(array $expectedItems = []): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function initiateScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function checkScheduledFreePayment(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function confirmScheduledFreePayment(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function finalizeScheduledFreePayment(Context $context, array $documents): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function suspendScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function initiateEditScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function checkEditScheduledFreePayment(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function confirmEditScheduledFreePayment(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getPartialSurrenderInformations(array $expectedItems = []): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function initiatePartialSurrender(Context $context, PartialSurrender $partialSurrender): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function checkPartialSurrender(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function confirmPartialSurrender(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function finalizePartialSurrender(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getArbitrationInformations(array $expectedItems = []): array
    {
    }

    /**
     * {@inheritdoc}
     */
    public function initiateArbitration(Context $context, Arbitration $arbitration): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function checkArbitration(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function confirmArbitration(Context $context): SubscriptionResponse
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function finalizeArbitration(Context $context): SubscriptionResponse
    {
        return [];
    }
}
