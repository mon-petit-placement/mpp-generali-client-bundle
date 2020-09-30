<?php

namespace Mpp\GeneraliClientBundle\HttpClient;

use GuzzleHttp\Client;
use Mpp\GeneraliClientBundle\Model\Arbitration;
use Mpp\GeneraliClientBundle\Model\BaseResponse;
use Mpp\GeneraliClientBundle\Model\Document;
use Mpp\GeneraliClientBundle\Model\FreePayment;
use Mpp\GeneraliClientBundle\Model\PartialSurrender;
use Mpp\GeneraliClientBundle\Model\ScheduledFreePayment;
use Psr\Log\LoggerInterface;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\SubscriptionResponse;
use Mpp\GeneraliClientBundle\Model\Subscription;

/**
 * Class GeneraliHttpClientV2.
 */
class GeneraliHttpClientV2 implements GeneraliHttpClientInterface
{
    const TRANSACTION_CONTRACT_DATA = '/epart/v2.0/contrats';

    const TRANSACTION_FSUBSCRIPTION_DATA = '/epart/v2.0/transaction/versementLibre/donnees';
    const TRANSACTION_SUBSCRIPTION_INITIATE = '/epart/v2.0/transaction/souscription/initier';
    const TRANSACTION_SUBSCRIPTION_CHECK = '/epart/v2.0/transaction/souscription/verifier';
    const TRANSACTION_SUBSCRIPTION_CONFIRM = '/epart/v2.0/transaction/souscription/confirmer';
    const TRANSACTION_SUBSCRIPTION_FINALIZE = '/epart/v2.0/transaction/souscription/finaliser';

    const TRANSACTION_FREE_PAYMENT_DATA = '/epart/v2.0/transaction/versementLibre/donnees';
    const TRANSACTION_FREE_PAYMENT_INITIATE = '/epart/v2.0/transaction/versementLibre/initier';
    const TRANSACTION_FREE_PAYMENT_CHECK = '/epart/v2.0/transaction/versementLibre/initier';
    const TRANSACTION_FREE_PAYMENT_CONFIRM = '/epart/v2.0/transaction/versementLibre/confirmer';
    const TRANSACTION_FREE_PAYMENT_FINALIZE = '/epart/v2.0/transaction/versementLibre/finaliser';

    const TRANSACTION_SCHEDULED_FREE_PAYMENT_DATA = '/epart/v2.0/transaction/versementsLibresProgrammes/donnees';
    const TRANSACTION_SCHEDULED_FREE_PAYMENT_INITIATE = '/epart/v2.0/transaction/versementsLibresProgrammes/initier';
    const TRANSACTION_SCHEDULED_FREE_PAYMENT_CHECK = '/epart/v2.0/transaction/versementsLibresProgrammes/initier';
    const TRANSACTION_SCHEDULED_FREE_PAYMENT_CONFIRM = '/epart/v2.0/transaction/versementsLibresProgrammes/confirmer';
    const TRANSACTION_SCHEDULED_FREE_PAYMENT_FINALIZE = '/epart/v2.0/transaction/versementsLibresProgrammes/finaliser';

    const TRANSACTION_SCHEDULED_FREE_PAYMENT_SUSPEND = '/epart/v1.0/transaction/suspensionVersementsLibresProgrammes';

    const TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_INITIATE = '/epart/v1.0/transaction/modificationVersementsLibresProgrammes/initier';
    const TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_CHECK = '/epart/v1.0/transaction/modificationVersementsLibresProgrammes/verifier';
    const TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_CONFIRM = '/epart/v1.0/transaction/modificationVersementsLibresProgrammes/confirmer';

    const TRANSACTION_ARBITRATION_DATA = '/epart/v2.0/transaction/arbitrage/donnees';
    const TRANSACTION_ARBITRATION_INITIATE = '/epart/v2.0/transaction/arbitrage/initier';
    const TRANSACTION_ARBITRATION_CHECK = '/epart/v2.0/transaction/arbitrage/initier';
    const TRANSACTION_ARBITRATION_CONFIRM = '/epart/v2.0/transaction/arbitrage/confirmer';
    const TRANSACTION_ARBITRATION_FINALIZE = '/epart/v2.0/transaction/arbitrage/finaliser';

    const TRANSACTION_PARTIAL_SURRENDER_DATA = '/epart/v1.0/donnees/rachatpartiel/all';
    const TRANSACTION_PARTIAL_SURRENDER_INITIATE = '/epart/v1.0/transaction/rachatpartiel/initier';
    const TRANSACTION_PARTIAL_SURRENDER_CHECK = '/epart/v1.0/transaction/rachatpartiel/verifier';
    const TRANSACTION_PARTIAL_SURRENDER_CONFIRM = '/epart/v1.0/transaction/rachatpartiel/confirmer';
    const TRANSACTION_PARTIAL_SURRENDER_FINALIZE = '/epart/v1.0/transaction/rachatpartiel/finaliser';

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
    public function retrieveContractData(string $contractNumber, array $exepectedItems = []): BaseResponse
    {
        $path = sprintf('%s/%s', self::TRANSACTION_CONTRACT_DATA, $contractNumber);

        $response = new BaseResponse();
        try {
            $rawResponse = $this->httpClient->post($path, [
                'body' => json_encode($this->buildContext(['contractNumber' => $contractNumber], $exepectedItems)),
            ]);

            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response
                ->setDonnees($decodedRawResponse['donnees'])
                ->setErrorMessages($decodedRawResponse['messages'])
            ;
            $this->logger->info(sprintf(
                '[Generali - httpClient.getContractInformations %s ] SUCCESS',
                $path
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.getContractInformations %s ] ERROR: %s',
                $path,
                $e->getMessage()
            );
            $response->setErrorMessages($errorMessage);
            $this->logger->error($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function retrieveTransactionSubscriptionData(array $exepectedItems = []): BaseResponse
    {
        $path = self::TRANSACTION_FSUBSCRIPTION_DATA;
        $response = new BaseResponse();

        try {
            $rawResponse = $this->httpClient->post($path, [
                'body' => json_encode(['contexte' => $this->buildContext([], $exepectedItems)->toArray()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response
                ->setDonnees($decodedRawResponse['donnees'])
                ->setErrorMessages($decodedRawResponse['messages'])
            ;

            $this->logger->info(sprintf(
                '[Generali - httpClient.retrieveTransactionSubscriptionData %s ] SUCCESS',
                $path
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.retrieveTransactionSubscriptionData %s ] ERROR: %s',
                $path,
                $e->getMessage()
            );
            $response->setErrorMessages($errorMessage);
            $this->logger->error($errorMessage);
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
            throw new \RuntimeException('The Subsriptions\' Initiation has failed');
        }

        $response = $this->checkSubscription($context);

        return $this->confirmSubscription($context);
    }

    /**
     * {@inheritdoc}
     */
    public function initiateSubscription(Context $context, Subscription $subscription, bool $dematerialization = true, string $comment = null): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SUBSCRIPTION_INITIATE, [
                'body' => json_encode([
                    'contexte' => $context->arrayToInitiateSubscription(),
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
                '[Generali - httpClient.confirmSubscription %s ] SUCCESS',
                self::TRANSACTION_SUBSCRIPTION_CONFIRM
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.confirmSubscription %s ] ERROR: %s',
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
    public function retrieveTransactionFreePaymentData(string $contractNumber, array $expectedItems = []): BaseResponse
    {
        $path = self::TRANSACTION_FREE_PAYMENT_DATA;

        $response = new BaseResponse();
        try {
            $rawResponse = $this->httpClient->post($path, [
                'body' => $this->buildContext(['contractNumber' => $contractNumber], $expectedItems),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response
                ->setDonnees($decodedRawResponse['donnees'])
                ->setErrorMessages($decodedRawResponse['messages'])
            ;
            $this->logger->info(sprintf(
                '[Generali - httpClient.getFreePaymentInformations %s ] SUCCESS',
                $path
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.getFreePaymentInformations %s ] ERROR: %s',
                $path,
                $e->getMessage()
            );
            $response->setErrorMessages($errorMessage);
            $this->logger->error($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function createFreePayment(Context $context, FreePayment $freePayment): SubscriptionResponse
    {
        $response = $this->initiateFreePayment($context, $freePayment);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The FreePayments\' Initiation has failed');
        }

        $response = $this->checkFreePayment($context);

        return $this->confirmFreePayment($context);
    }

    /**
     * {@inheritdoc}
     */
    public function initiateFreePayment(Context $context, FreePayment $freePayment): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_FREE_PAYMENT_INITIATE, [
                'body' => json_encode([
                    'contexte' => $context->arrayToInitiate(),
                    'versementLibre' => $freePayment->toArray(),
                ]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setStatus($decodedRawResponse['statut']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.initiateFreePayment.initiate %s ] SUCCESS',
                self::TRANSACTION_FREE_PAYMENT_INITIATE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.initiateFreePayment.initiate %s ] ERROR: %s',
                self::TRANSACTION_FREE_PAYMENT_INITIATE,
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
    public function checkFreePayment(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();
        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_FREE_PAYMENT_CHECK, [
                'body' => json_encode(['contexte' => $context->arrayToCheck()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);

            $this->logger->info(sprintf(
                '[Generali - httpClient.checkFreePayment.check %s ] SUCCESS',
                self::TRANSACTION_FREE_PAYMENT_CHECK
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.checkFreePayment.check %s ] ERROR: %s',
                self::TRANSACTION_FREE_PAYMENT_CHECK,
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
    public function confirmFreePayment(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_FREE_PAYMENT_CONFIRM, [
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
                '[Generali - httpClient.confirmFreePayment %s ] SUCCESS',
                self::TRANSACTION_FREE_PAYMENT_CONFIRM
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.confirmFreePayment %s ] ERROR: %s',
                self::TRANSACTION_FREE_PAYMENT_CONFIRM,
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
    public function listFreePaymentFiles(string $idTransaction): SubscriptionResponse
    {
        $path = sprintf(
            '/epart/v1.0/transaction/piecesAFournir/list/%s/VERSEMENT_LIBRE',
            $idTransaction
        );

        $response = new SubscriptionResponse();

        try {
            $response = $this->httpClient->get($path);
            $this->logger->info(sprintf(
                '[Generali - httpClient.listFreePaymentFiles on path %s] SUCCESS',
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
                '[Generali - httpClient.listFreePaymentFiles on path %s] ERROR: %s',
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
    public function finalizeFreePayment(Context $context, array $documents): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        foreach ($documents as $document) {
            $response = $this->sendFile($context->getIdTransaction(), $document);
            if (!empty($response->getMessage())) {
                return $response;
            }
        }

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_FREE_PAYMENT_FINALIZE, [
                'body' => json_encode(['contexte' => $context->arrayToFinalize()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setOrderTransaction($decodedRawResponse['donnees']['orderTransaction']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.finalizeFreePayment %s ] SUCCESS',
                self::TRANSACTION_FREE_PAYMENT_FINALIZE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.finalizeFreePayment %s ] ERROR: %s',
                self::TRANSACTION_FREE_PAYMENT_FINALIZE,
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
    public function retrieveTransactionScheduledFreePaymentData(string $contractNumber, array $expectedItems = []): BaseResponse
    {
        $path = sprintf('%s/%s', self::TRANSACTION_SCHEDULED_FREE_PAYMENT_DATA, $contractNumber);

        $response = new BaseResponse();
        try {
            $rawResponse = $this->httpClient->get($path);
            $this->logger->info(sprintf(
                '[Generali - httpClient.getScheduledFreePaymentInformations %s ] SUCCESS',
                $path
            ));
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response
                ->setDonnees($decodedRawResponse['donnees'])
                ->setErrorMessages($decodedRawResponse['messages'])
            ;
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.getScheduledFreePaymentInformations %s ] ERROR: %s',
                $path,
                $e->getMessage()
            );
            $this->logger->error($errorMessage);
            $response->setErrorMessages($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function createScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse
    {
        $response = $this->initiateScheduledFreePayment($context, $scheduledFreePayment);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The Initiation of the Subscription has failed');
        }

        $response = $this->checkScheduledFreePayment($context);

        return $this->confirmScheduledFreePayment($context);
    }

    /**
     * {@inheritdoc}
     */
    public function initiateScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SCHEDULED_FREE_PAYMENT_INITIATE, [
                'body' => json_encode([
                    'contexte' => $context->arrayToInitiate(),
                    'versementsLibresProgrammes' => $scheduledFreePayment->toArray(),
                ]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setStatus($decodedRawResponse['statut']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.initiateScheduledFreePayment.initiate %s ] SUCCESS',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_INITIATE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.initiateScheduledFreePayment.initiate %s ] ERROR: %s',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_INITIATE,
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
    public function checkScheduledFreePayment(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();
        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SCHEDULED_FREE_PAYMENT_CHECK, [
                'body' => json_encode(['contexte' => $context->arrayToCheck()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);

            $this->logger->info(sprintf(
                '[Generali - httpClient.checkScheduledFreePayment.check %s ] SUCCESS',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_CHECK
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.checkScheduledFreePayment.check %s ] ERROR: %s',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_CHECK,
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
    public function confirmScheduledFreePayment(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SCHEDULED_FREE_PAYMENT_CONFIRM, [
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
                '[Generali - httpClient.confirmScheduledFreePayment %s ] SUCCESS',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_CONFIRM
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.confirmScheduledFreePayment %s ] ERROR: %s',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_CONFIRM,
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
    public function finalizeScheduledFreePayment(Context $context, array $documents): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        foreach ($documents as $document) {
            $response = $this->sendFile($context->getIdTransaction(), $document);
            if (!empty($response->getMessage())) {
                return $response;
            }
        }

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SCHEDULED_FREE_PAYMENT_FINALIZE, [
                'body' => json_encode(['contexte' => $context->arrayToFinalize()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setOrderTransaction($decodedRawResponse['donnees']['orderTransaction']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.finalizeScheduledFreePayment %s ] SUCCESS',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_FINALIZE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.finalizeScheduledFreePayment %s ] ERROR: %s',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_FINALIZE,
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
    public function suspendScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse
    {
        $path = sprintf('%s/%s', self::TRANSACTION_SCHEDULED_FREE_PAYMENT_SUSPEND, $context->getContractNumber());

        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post($path, [
                'body' => json_encode(['contexte' => $context->arrayToSuspend()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setErrorMessage($decodedRawResponse['messages']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.suspendScheduledFreePayment %s ] SUCCESS',
                $path
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.suspendScheduledFreePayment %s ] ERROR: %s',
                $path,
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
    public function initiateEditScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_INITIATE, [
                'body' => json_encode([
                    'contexte' => $context->arrayToInitiate(),
                    'modifVersementLibreProgrammes' => $scheduledFreePayment->toEditArray(),
                ]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setStatus($decodedRawResponse['statut']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.initiateEditScheduledFreePayment.initiate %s ] SUCCESS',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_INITIATE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.initiateEditScheduledFreePayment.initiate %s ] ERROR: %s',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_INITIATE,
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
    public function checkEditScheduledFreePayment(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();
        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_CHECK, [
                'body' => json_encode(['contexte' => $context->arrayToCheck()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);

            $this->logger->info(sprintf(
                '[Generali - httpClient.checkEditScheduledFreePayment.check %s ] SUCCESS',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_CHECK
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.checkEditScheduledFreePayment.check %s ] ERROR: %s',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_CHECK,
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
    public function confirmEditScheduledFreePayment(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_CONFIRM, [
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
                '[Generali - httpClient.confirmEditScheduledFreePayment %s ] SUCCESS',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_CONFIRM
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.confirmEditScheduledFreePayment %s ] ERROR: %s',
                self::TRANSACTION_SCHEDULED_FREE_PAYMENT_EDIT_CONFIRM,
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
    public function retrieveTransactionPartialSurrenderData(string $contractNumber, array $expectedItems = []): BaseResponse
    {
        $path = self::TRANSACTION_PARTIAL_SURRENDER_DATA;

        $response = new BaseResponse();
        try {
            $rawResponse = $this->httpClient->post($path, [
                'body' => $this->buildContext(['contractNumber' => $contractNumber], $expectedItems),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents());
            $response
                ->setDonnees($decodedRawResponse['donnees'])
                ->setErrorMessages($decodedRawResponse['messages'])
            ;
            $this->logger->info(sprintf(
                '[Generali - httpClient.getPartialSurrenderInformations %s ] SUCCESS',
                $path
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.getPartialSurrenderInformations %s ] ERROR: %s',
                $path,
                $e->getMessage()
            );
            $response->setErrorMessages($errorMessage);
            $this->logger->error($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function createPartialSurrender(Context $context, PartialSurrender $partialSurrender): SubscriptionResponse
    {
        $response = $this->initiatePartialSurrender($context, $partialSurrender);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The Partial Arbitration\' Initiation has failed');
        }

        $response = $this->checkPartialSurrender($context);

        return $this->confirmPartialSurrender($context);
    }

    /**
     * {@inheritdoc}
     */
    public function initiatePartialSurrender(Context $context, PartialSurrender $partialSurrender): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(
                sprintf('%s/%s', self::TRANSACTION_PARTIAL_SURRENDER_INITIATE, $context->getContractNumber()), [
                'body' => json_encode([
                    'contexte' => $context->arrayToInitiate(),
                    'rachatPartiel' => $partialSurrender->toArray(),
                ]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setStatus($decodedRawResponse['statut']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.initiatePartialSurrender %s ] SUCCESS',
                self::TRANSACTION_PARTIAL_SURRENDER_INITIATE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.initiatePartialSurrender %s ] ERROR: %s',
                self::TRANSACTION_PARTIAL_SURRENDER_INITIATE,
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
    public function checkPartialSurrender(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();
        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_PARTIAL_SURRENDER_CHECK, [
                'body' => json_encode(['contexte' => $context->arrayToCheck()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);

            $this->logger->info(sprintf(
                '[Generali - httpClient.checkPartialSurrender.check %s ] SUCCESS',
                self::TRANSACTION_PARTIAL_SURRENDER_CHECK
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.checkPartialSurrender.check %s ] ERROR: %s',
                self::TRANSACTION_PARTIAL_SURRENDER_CHECK,
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
    public function confirmPartialSurrender(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_PARTIAL_SURRENDER_CONFIRM, [
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
                '[Generali - httpClient.confirmPartialSurrender %s ] SUCCESS',
                self::TRANSACTION_PARTIAL_SURRENDER_CONFIRM
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.confirmPartialSurrender %s ] ERROR: %s',
                self::TRANSACTION_PARTIAL_SURRENDER_CONFIRM,
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
    public function finalizePartialSurrender(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_PARTIAL_SURRENDER_FINALIZE, [
                'body' => json_encode(['contexte' => $context->arrayToFinalize()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setOrderTransaction($decodedRawResponse['donnees']['orderTransaction']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.finalizePartialSurrender %s ] SUCCESS',
                self::TRANSACTION_PARTIAL_SURRENDER_FINALIZE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.finalizePartialSurrender %s ] ERROR: %s',
                self::TRANSACTION_PARTIAL_SURRENDER_FINALIZE,
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
    public function retrieveTransactionArbitrationData(string $contractNumber, array $expectedItems = []): BaseResponse
    {
        $path = self::TRANSACTION_ARBITRATION_DATA;

        $response = new BaseResponse();
        try {
            $rawResponse = $this->httpClient->post($path, [
                'body' => $this->buildContext(['contractNumber' => $contractNumber], $expectedItems),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents());
            $response
                ->setDonnees($decodedRawResponse['donnees'])
                ->setErrorMessages($decodedRawResponse['messages'])
            ;
            $this->logger->info(sprintf(
                '[Generali - httpClient.retrieveTransactionArbitrationData %s ] SUCCESS',
                $path
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.retrieveTransactionArbitrationData %s ] ERROR: %s',
                $path,
                $e->getMessage()
            );
            $response->setErrorMessages($errorMessage);
            $this->logger->error($errorMessage);
        }

        return $response;
    }

    /**
     * {@inheritdoc}
     */
    public function createArbitration(Context $context, Arbitration $arbitration): SubscriptionResponse
    {
        $response = $this->initiateArbitration($context, $arbitration);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The Arbitrations\' Initiation has failed');
        }

        $response = $this->checkArbitration($context);

        return $this->confirmArbitration($context);
    }

    /**
     * {@inheritdoc}
     */
    public function initiateArbitration(Context $context, Arbitration $arbitration): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_ARBITRATION_INITIATE, [
                'body' => json_encode([
                    'contexte' => $context->arrayToInitiate(),
                    'arbitrage' => $arbitration->toArray(),
                ]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            $response->setStatus($decodedRawResponse['statut']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.initiateArbitration %s ] SUCCESS',
                self::TRANSACTION_ARBITRATION_INITIATE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.initiateArbitration %s ] ERROR: %s',
                self::TRANSACTION_ARBITRATION_INITIATE,
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
    public function checkArbitration(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();
        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_ARBITRATION_CHECK, [
                'body' => json_encode(['contexte' => $context->arrayToCheck()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            if (isset($decodedRawResponse['messages'])) {
                $response->setErrorMessage($decodedRawResponse['messages']);
            }
            $this->logger->info(sprintf(
                '[Generali - httpClient.checkArbitration %s ] SUCCESS',
                self::TRANSACTION_ARBITRATION_CHECK
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.checkArbitration %s ] ERROR: %s',
                self::TRANSACTION_ARBITRATION_CHECK,
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
    public function confirmArbitration(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_ARBITRATION_CONFIRM, [
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
            if (isset($decodedRawResponse['messages'])) {
                $response->setErrorMessage($decodedRawResponse['messages']);
            }
            $response->setIdTransaction($decodedRawResponse['donnees']['idTransaction']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.confirmArbitration %s ] SUCCESS',
                self::TRANSACTION_ARBITRATION_CONFIRM
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.confirmArbitration %s ] ERROR: %s',
                self::TRANSACTION_ARBITRATION_CONFIRM,
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
    public function finalizeArbitration(Context $context): SubscriptionResponse
    {
        $response = new SubscriptionResponse();

        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_ARBITRATION_FINALIZE, [
                'body' => json_encode(['contexte' => $context->arrayToFinalize()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            if (isset($decodedRawResponse['messages'])) {
                $response->setErrorMessage($decodedRawResponse['messages']);
            }
            $response->setOrderTransaction($decodedRawResponse['donnees']['orderTransaction']);

            $this->logger->info(sprintf(
                '[Generali - httpClient.finalizeArbitration %s ] SUCCESS',
                self::TRANSACTION_ARBITRATION_FINALIZE
            ));
        } catch (\Exception $e) {
            $errorMessage = sprintf(
                '[Generali - httpClient.finalizeArbitration %s ] ERROR: %s',
                self::TRANSACTION_ARBITRATION_FINALIZE,
                $e->getMessage()
            );
            $this->logger->error($errorMessage);
            $response->setErrorMessage($errorMessage);
        }

        return $response;
    }
}
