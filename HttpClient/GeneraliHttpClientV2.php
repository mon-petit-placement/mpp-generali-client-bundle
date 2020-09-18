<?php

namespace Mpp\GeneraliClientBundle\HttpClient;

use Faker\Provider\Base;
use GuzzleHttp\Client;
use Mpp\GeneraliClientBundle\Model\BaseResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\SubscriptionConstant;
use Mpp\GeneraliClientBundle\Model\SubscriptionResponse;

/**
 * Class GeneraliHttpClientV2
 */
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
     * @param strinc $contractNumber
     * @return array
     */
    public function availableCodeProfessionnalSituations(string $contractNumber): array
    {
        $dataRepository = $this->retrieveTransactionSubscriptionData($contractNumber, [self::EXPECTED_ITEM_REFERENTIEL]);

        $availableSituations = [];

        foreach ($dataRepository['situationsProfessionnelles'] as $prossionalSituation) {
            $availableSituations[] = $prossionalSituation['code'];
        }

        return $availableSituations;
    }

    /**
     * @param array $parameters
     * @param array $expectedItems
     *
     * @return Context
     */
    private function buildContext(array $parameters, array $expectedItems = []): Context
    {
        $context = new Context();
        $context
            ->setProviderCode($this->providerCode)
            ->setSubscriptionCode($this->subscriptionCode)
            ->setExpectedItems($expectedItems)
        ;

        return $context;
    }

    /**
     * Create a Subscription with a Context, a GeneraliSubsription, a comment if you wish dematerialize the process.
     *
     * path: /epart/v2.0/transaction/souscription/initier
     * path: /epart/v2.0/transaction/souscription/verifier
     * path: /epart/v2.0/transaction/souscription/confirmer
     *
     * @param Context              $context
     * @param SubscriptionConstant $subscription
     * @param string               $comment
     * @param bool                 $dematerialization
     *
     * @return SubscriptionResponse
     */
    public function createSubscription(Context $context, SubscriptionConstant $subscription, string $comment, bool $dematerialization): SubscriptionResponse
    {
        return [];
    }

    /**
     *  Finalize a Subscription with a token Status.
     *
     * path: /epart/v2.0/transaction/souscription/finaliser
     *
     * @param Context $context
     *
     * @return TransactionOrder
     */
    public function finalizeSubscription(Context $context): TransactionOrder
    {
        return [];
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

    /**
     * Send File needed, after confirm Request, for the subscription and Free Payment.
     *
     *  path: '/epart/v1.0/transaction/fournirPiece/{idTransaction}/{idPieceAFournir}
     *
     * @param string $idTransaction
     * @param string $idPieceAFournir
     * @param string $path
     * @param string $fileName
     *
     * @return array
     */
    public function sendFile(string $idTransaction, string $idPieceAFournir, string $path, string $fileName): array
    {
        return [];
    }

    /**
     * List all the files sent, and the file to send for a subscription or a Free Payment.
     *
     * /epart/v1.0/transaction/piecesAFournir/list/{idTransaction}/{product}
     *
     * @param string $idTransaction
     * @param string $product
     *
     * @return array
     */
    public function listFile(string $idTransaction, string $product): array
    {
        return [];
    }
}
