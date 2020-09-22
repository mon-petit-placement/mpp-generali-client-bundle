<?php

namespace Mpp\GeneraliClientBundle\HttpClient;

use App\Entity\Documents;
use Faker\Provider\Base;
use GuzzleHttp\Client;
use Mpp\GeneraliClientBundle\Model\BaseResponse;
use Mpp\GeneraliClientBundle\Model\Document;
use Mpp\GeneraliClientBundle\Model\TransactionOrder;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\SubscriptionResponse;
use Mpp\GeneraliClientBundle\Model\Subscription;

/**
 * Class GeneraliHttpClientV2
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
    public function retrieveTransactionSubscriptionData(string $contractNumber, array $exepectedItems = []): BaseResponse
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
     * @param array $parameters
     * @param array $expectedItems
     *
     * @return Context
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

        $response = $this->checkSubscription($context, $response);

        return $this->confirmSubscription($context, $response);
    }

    /**
     * @param Context $context
     * @param Subscription $subscription
     * @param string $comment
     * @param bool $dematerialization
     * @return SubscriptionResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
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
            $response->setMessage($errorMessage);
        }
        return $response;
    }

    /**
     * @param Context $context
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkSubscription(Context $context, SubscriptionResponse $response): SubscriptionResponse
    {
        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SUBSCRIPTION_CHECK, [
                'body' => json_encode(['contexte' => $context->arrayToCheck()]),
            ]);
            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            dump($decodedRawResponse);

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
     * @param Context $context
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function confirmSubscription(Context $context, SubscriptionResponse $response): SubscriptionResponse
    {
        try {
            $rawResponse = $this->httpClient->post(self::TRANSACTION_SUBSCRIPTION_CONFIRM, [
                'body' => json_encode([
                    'contexte' => $context->arrayToConfirm(),
                    'options' => [
                        'genererUnBulletin' => true,
                        'envoyerUnMailClient' => true,
                        'cloturerLeDossier' => true
                    ]
                ])
            ]);

            $decodedRawResponse = json_decode($rawResponse->getBody()->getContents(), true);
            dump($decodedRawResponse);
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
     * @param string $path
     * @param string $idTransaction
     * @param string $fileName
     * @param Document $documents
     * @return array|mixed
     */
    public function sendSubscriptionFile(SubscriptionResponse $response, string $idTransaction, Document $document): SubscriptionResponse
    {
        $fileName = $document->getFilename();

        $file = new UploadedFile($document->getFilePath().$fileName, $fileName);
        $url = sprintf('/epart/v1.0/transaction/fournirPiece/%s/%s', $idTransaction, $document->getIdDocument());

        try {
            $response = $this->httpClient->post(
                $url,
                [
                    'multipart' => [
                        [
                            'name'     => $document->getTitle(),
                            'contents' => $file,
                            'filename' => $fileName,
                        ]
                    ]
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
     * @param SubscriptionResponse $response
     * @param string $idTransaction
     * @return SubscriptionResponse
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listSubscriptionFiles(SubscriptionResponse $response, string $idTransaction): SubscriptionResponse
    {
        $path = sprintf(
            '/epart/v1.0/transaction/piecesAFournir/list/%s/souscription',
            $idTransaction
        );

        try {
            $response = $this->httpClient->get($path);
            $this->logger->info(sprintf(
                '[Generali - httpClient.listSubscriptionFiles on path %s] SUCCESS',
                $path
            ));
            $contents = json_decode($response->getBody()->getContents(), true);
            $response
                ->setRequiredDocuments([])
                ->setMessage(null)
            ;

            foreach ($contents['donnees']['piecesAFournir'] as $docToGive) {
                $document = (new Document())
                    ->setIdDocument($docToGive['idPieceAFournir'])
                    ->setTitle($docToGive['libelle'])
                    ->setRequired((bool)$docToGive['nombreMin'])
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
     *  Finalize a Subscription with a token Status.
     **
     * @param Context $context
     * @param SubscriptionResponse $response
     * @param array<Document> $documents
     *
     * @return TransactionOrder
     */
    public function finalizeSubscription(Context $context, SubscriptionResponse $response, array $documents): SubscriptionResponse
    {
        foreach ($documents as $document) {
            $response = $this->sendSubscriptionFile($response, $context->getIdTransaction(), $document);
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
     * Retrieve free payment informations with contractNumber & expectedItems.
     *
     * path: /epart/v2.0/transaction/versementLibre/donnee
     *
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return array
     */
    public function getFreePaymentInformations(string $contractNumber, array $expectedItems = []): array
    {
        return [];
    }

    /**
     *  Initiate Data to create a free payment.
     *
     * path: /epart/v2.0/transaction/versementLibre/initier
     *
     * @param array $expectedItems
     * @param array $freePayment
     *
     * @return SubscriptionResponse
     */
    public function initiateFreePayment(array $expectedItems, array $freePayment): SubscriptionResponse
    {
        return [];
    }

    /**
     *  Check a Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementLibre/verifier
     *
     * @param array $expectedItems
     * @param array $freePayment
     *
     * @return array
     */
    public function checkFreePayment(array $expectedItems, array $freePayment): array
    {
        return [];
    }

    /**
     *  Confirm a Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementLibre/confirmer
     *
     * @param array $expectedItems
     * @param array $freePayment
     *
     * @return array
     */
    public function confirmFreePayment(array $expectedItems, array $freePayment): array
    {
        return [];
    }

    /**
     *  Finalize a Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementLibre/finaliser
     *
     * @param array $expectedItems
     * @param array $freePayment
     *
     * @return TransactionOrder
     */
    public function finalizeFreePayment(array $expectedItems, array $freePayment): TransactionOrder
    {
        return [];
    }

    /**
     * Retrieve scheduled free payment informations with contractNumber & expectedItems.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/donnee
     *
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return array
     */
    public function getScheduledFreePaymentInformations(string $contractNumber, array $expectedItems = []): array
    {
        return [];
    }

    /**
     *  Initiate Data to create a Scheduled Free Payment.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/initier
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     *
     * @return SubscriptionResponse
     */
    public function initiateScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse
    {
        return [];
    }

    /**
     *  Check a Scheduled Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/verifier
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     *
     * @return array
     */
    public function checkScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): array
    {
        return [];
    }

    /**
     *  Confirm a Scheduled Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/confirmer
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     *
     * @return array
     */
    public function confirmScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): array
    {
        return [];
    }

    /**
     *  Finalize a Scheduled Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/finaliser
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     *
     * @return TransactionOrder
     */
    public function finalizeScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): TransactionOrder
    {
        return [];
    }

    /**
     * Suspend a Scheduled Free Payment.
     *
     * path: /epart/v1.0/transaction/suspensionVersementsLibresProgrammes
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     *
     * @return array
     */
    public function suspendScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): array
    {
        return [];
    }

    /**
     * Intiate a Scheduled Free Payment's edit.
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/initier
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     *
     * @return SubscriptionResponse
     */
    public function initiateEditScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse
    {
        return [];
    }

    /**
     * Check a Scheduled Free Payment's edit.
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/verifier
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     *
     * @return array
     */
    public function checkEditScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): array
    {
        return [];
    }

    /**
     * Confirm a Scheduled Free Payment's edit.
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/confirmer
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     *
     * @return array
     */
    public function confirmEditScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): array
    {
        return [];
    }

    /**
     * Retrieve partial surrender informations with contractNumber & expectedItems.
     *
     * path: /epart/v1.0/donnees/rachatpartiel/all
     *
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return array
     */
    public function getPartialSurrenderInformations(string $contractNumber, array $expectedItems = []): array
    {
        return [];
    }

    /**
     *  Initiate Data to create a Partial Surrender.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/initier
     *
     * @param array $expectedItems
     * @param array $partialSurrender
     *
     * @return SubscriptionResponse
     */
    public function initiatePartialSurrender(array $expectedItems, array $partialSurrender): SubscriptionResponse
    {
        return [];
    }

    /**
     *  Check a Partial Surrender with a token Status.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/verifier
     *
     * @param array $expectedItems
     * @param array $partialSurrender
     *
     * @return array
     */
    public function checkPartialSurrender(array $expectedItems, array $partialSurrender): array
    {
        return [];
    }

    /**
     *  Confirm a Partial Surrender with a token Status.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/confirmer
     *
     * @param array $expectedItems
     * @param array $partialSurrender
     *
     * @return array
     */
    public function confirmPartialSurrender(array $expectedItems, array $partialSurrender): array
    {
        return [];
    }

    /**
     *  Finalize a Partial Surrender with a token Status.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/finaliser
     *
     * @param array $expectedItems
     * @param array $partialSurrender
     *
     * @return TransactionOrder
     */
    public function finalizePartialSurrender(array $expectedItems, array $partialSurrender): TransactionOrder
    {
        return [];
    }

    /**
     * Retrieve partial surrender informations with contractNumber & expectedItems.
     *
     * path: /epart/v2.0/transaction/arbitrage/donnee
     *
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return array
     */
    public function getArbitrationInformations(string $contractNumber, array $expectedItems = []): array
    {

    }

    /**
     *  Initiate Data to create a Arbitration.
     *
     * path: /epart/v2.0/transaction/arbitrage/initier
     *
     * @param array $expectedItems
     * @param array $arbitration
     *
     * @return SubscriptionResponse
     */
    public function initiateArbitration(array $expectedItems, array $arbitration): SubscriptionResponse
    {
        return [];
    }

    /**
     *  Check a Arbitration with a token Status.
     *
     * path: /epart/v2.0/transaction/arbitrage/verifier
     *
     * @param array $expectedItems
     * @param array $arbitration
     *
     * @return array
     */
    public function checkArbitration(array $expectedItems, array $arbitration): array
    {
        return [];
    }

    /**
     *  Confirm a Arbitration with a token Status.
     *
     * path: /epart/v2.0/transaction/arbitrage/confirmer
     *
     * @param array $expectedItems
     * @param array $arbitration
     *
     * @return array
     */
    public function confirmArbitration(array $expectedItems, array $arbitration): array
    {
        return [];
    }

    /**
     *  Finalize a Arbitration with a token Status.
     *
     * path: /epart/v2.0/transaction/arbitrage/finaliser
     *
     * @param array $expectedItems
     * @param array $arbitration
     *
     * @return TransactionOrder
     */
    public function finalizeArbitration(array $expectedItems, array $arbitration): TransactionOrder
    {
        return [];
    }
}
