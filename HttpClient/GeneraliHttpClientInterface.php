<?php

namespace Mpp\GeneraliClientBundle\HttpClient;

use Mpp\GeneraliClientBundle\Model\Arbitration;
use Mpp\GeneraliClientBundle\Model\BaseResponse;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\Document;
use Mpp\GeneraliClientBundle\Model\FreePayment;
use Mpp\GeneraliClientBundle\Model\PartialSurrender;
use Mpp\GeneraliClientBundle\Model\ScheduledFreePayment;
use Mpp\GeneraliClientBundle\Model\Subscription;
use Mpp\GeneraliClientBundle\Model\ApiResponse;

/**
 * Interface GeneraliHttpClientInterface.
 */
interface GeneraliHttpClientInterface
{
    /**
     *  Build Context wich contains your subscription's code and your intermediary code defined in the configuration.
     *
     * @param array $parameters
     * @param array $expectedItems
     *
     * @return Context
     */
    public function buildContext(array $parameters = [], array $expectedItems = []): Context;

    /**
     * Retrieve contract information with contractNumber & expectedItems.
     *
     * path: /epart/v2.0/contrats/{contractNumber}
     *
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return BaseResponse
     */
    public function retrieveContractData(string $contractNumber, array $expectedItems = []): BaseResponse;

    /**
     * Retrieve subscription informations with contractNumber & expectedItems.
     *
     * path: /epart/v2.0/transaction/subscription/donnee
     *
     * @param array $expectedItems
     *
     * @return BaseResponse
     */
    public function retrieveTransactionSubscriptionData(array $expectedItems = []): BaseResponse;

    /**
     * Create a Subscription with a Context, a GeneraliSubsription, a comment if you wish dematerialize the process.
     *
     * path: /epart/v2.0/transaction/souscription/initier
     * path: /epart/v2.0/transaction/souscription/verifier
     * path: /epart/v2.0/transaction/souscription/confirmer
     *
     * @param Context      $context
     * @param Subscription $subscription
     * @param string       $comment
     * @param bool         $dematerialization
     *
     * @return ApiResponse
     */
    public function createSubscription(Context $context, Subscription $subscription, bool $dematerialization, string $comment): ApiResponse;

    /**
     * Initiate a Subscription with a Context, a GeneraliSubsription, a comment if you wish dematerialize the process.
     *
     * path: /epart/v2.0/transaction/souscription/initier
     *
     * @param Context      $context
     * @param Subscription $subscription
     * @param string       $comment
     * @param bool         $dematerialization
     *
     * @return ApiResponse
     */
    public function initiateSubscription(Context $context, Subscription $subscription, bool $dematerialization, string $comment): ApiResponse;

    /**
     * Check a Subscription with a Context.
     *
     * path: /epart/v2.0/transaction/souscription/verifier
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function checkSubscription(Context $context): ApiResponse;

    /**
     * Confirm a Subscription with a Context, a ApiResponse, and get the required documents to send.
     *
     * path: /epart/v2.0/transaction/souscription/confirmer
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function confirmSubscription(Context $context): ApiResponse;

    /**
     * Send a document to the API Generali with a ApiResponse, and get the required documents to send.
     *
     * path: /epart/v1.0/transaction/fournirPiece/{idTransaction}/{idDocument}
     *
     * @param string   $idTransaction
     * @param Document $document
     *
     * @return ApiResponse
     */
    public function sendFile(string $idTransaction, Document $document): ApiResponse;

    /**
     * list all the files the customer need to send for the subscription with a ApiResponse, and the idTransaction.
     *
     * path: /epart/v1.0/transaction/piecesAFournir/list/{idTransaction}/souscription
     *
     * @param string $idTransaction
     *
     * @return ApiResponse
     */
    public function listSubscriptionFiles(string $idTransaction): ApiResponse;

    /**
     * Finalize a Subscription with a Context, a ApiResponse, the list of Document to send.
     *
     * path: /epart/v2.0/transaction/souscription/finalisser
     *
     * @param Context         $context
     * @param array<Document> $documents
     *
     * @return ApiResponse
     */
    public function finalizeSubscription(Context $context, array $documents): ApiResponse;

    /**
     * Retrieve free payment informations with contractNumber and expectedItems.
     *
     * path: /epart/v2.0/transaction/versementLibre/donnee
     *
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return BaseResponse
     */
    public function retrieveTransactionFreePaymentData(string $contractNumber, array $expectedItems = []): BaseResponse;

    /**
     *  Create a free payment with a Context and the object FreePayment.
     *
     * path: /epart/v2.0/transaction/versementLibre/initier
     * path: /epart/v2.0/transaction/versementLibre/verifier
     * path: /epart/v2.0/transaction/versementLibre/confirmer
     *
     * @param Context     $context
     * @param FreePayment $freePayment
     *
     * @return ApiResponse
     */
    public function createFreePayment(Context $context, FreePayment $freePayment): ApiResponse;

    /**
     *  Initiate Data to create a free payment.
     *
     * path: /epart/v2.0/transaction/versementLibre/initier
     *
     * @param Context     $context
     * @param FreePayment $freePayment
     *
     * @return ApiResponse
     */
    public function initiateFreePayment(Context $context, FreePayment $freePayment): ApiResponse;

    /**
     *  Check a Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementLibre/verifier
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function checkFreePayment(Context $context): ApiResponse;

    /**
     *  Confirm a Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementLibre/confirmer
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function confirmFreePayment(Context $context): ApiResponse;

    /**
     *  list all the files the customer need to send for the freePayment with a ApiResponse, and the idTransaction.
     *
     * path: /epart/v1.0/transaction/piecesAFournir/list/{idTransaction}/VERSEMENT_LIBRE
     *
     * @param string $idTransaction
     *
     * @return ApiResponse
     */
    public function listFreePaymentFiles(string $idTransaction): ApiResponse;

    /**
     *  Finalize a Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementLibre/finaliser
     *
     * @param Context $context
     * @param array   $documents
     *
     * @return ApiResponse
     */
    public function finalizeFreePayment(Context $context, array $documents): ApiResponse;

    /**
     * Retrieve scheduled free payment informations with contractNumber & expectedItems.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/donnee
     *
     * @param array  $expectedItems
     * @param string $contractNumber
     *
     * @return BaseResponse
     */
    public function retrieveTransactionScheduledFreePaymentData(string $contractNumber, array $expectedItems = []): BaseResponse;

    /**
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/initier
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/verifier
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/confirmer.
     *
     * @param Context              $context
     * @param ScheduledFreePayment $scheduledFreePayment
     *
     * @return ApiResponse
     */
    public function createScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): ApiResponse;

    /**
     *  Initiate Data to create a Scheduled Free Payment.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/initier
     *
     * @param Context              $context
     * @param ScheduledFreePayment $scheduledFreePayment
     *
     * @return ApiResponse
     */
    public function initiateScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): ApiResponse;

    /**
     *  Check a Scheduled Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/verifier
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function checkScheduledFreePayment(Context $context): ApiResponse;

    /**
     *  Confirm a Scheduled Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/confirmer
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function confirmScheduledFreePayment(Context $context): ApiResponse;

    /**
     *  list all the files the customer need to send for the scheduledFreePayment with a ApiResponse, and the idTransaction.
     *
     * path: /epart/v1.0/transaction/piecesAFournir/list/{idTransaction}/CREATION_VERSEMENT_LIBRE_PROGRAMME
     *
     * @param string $idTransaction
     *
     * @return ApiResponse
     */
    public function listScheduledFreePaymentFiles(string $idTransaction): ApiResponse;

    /**
     *  Finalize a Scheduled Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/finaliser
     *
     * @param Context $context
     * @param array   $documents
     *
     * @return ApiResponse
     */
    public function finalizeScheduledFreePayment(Context $context, array $documents): ApiResponse;

    /**
     * Suspend a Scheduled Free Payment.
     *
     * path: /epart/v1.0/transaction/suspensionVersementsLibresProgrammes
     *
     * @param Context              $context
     * @param ScheduledFreePayment $scheduledFreePayment
     *
     * @return ApiResponse
     */
    public function suspendScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): ApiResponse;

    /**
     * Intiate a Scheduled Free Payment's edit.
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/initier
     *
     * @param Context              $context
     * @param ScheduledFreePayment $scheduledFreePayment
     *
     * @return ApiResponse
     */
    public function initiateEditScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): ApiResponse;

    /**
     * Check a Scheduled Free Payment's edit.
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/verifier
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function checkEditScheduledFreePayment(Context $context): ApiResponse;

    /**
     * Confirm a Scheduled Free Payment's edit.
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/confirmer
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function confirmEditScheduledFreePayment(Context $context): ApiResponse;

    /**
     * Retrieve partial surrender informations with contractNumber & expectedItems.
     *
     * path: /epart/v1.0/donnees/rachatpartiel/all
     *
     * @param array  $expectedItems
     * @param string $contractNumber
     *
     * @return BaseResponse
     */
    public function retrieveTransactionPartialSurrenderData(string $contractNumber, array $expectedItems = []): BaseResponse;

    /**
     *  Initiate Data to create a Partial Surrender.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/initier
     *
     * @param Context          $context
     * @param PartialSurrender $partialSurrender
     *
     * @return ApiResponse
     */
    public function initiatePartialSurrender(Context $context, PartialSurrender $partialSurrender): ApiResponse;

    /**
     *  Check a Partial Surrender with a token Status.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/verifier
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function checkPartialSurrender(Context $context): ApiResponse;

    /**
     *  Confirm a Partial Surrender with a token Status.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/confirmer
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function confirmPartialSurrender(Context $context): ApiResponse;

    /**
     *  Finalize a Partial Surrender with a token Status.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/finaliser
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function finalizePartialSurrender(Context $context): ApiResponse;

    /**
     * Retrieve partial surrender informations with contractNumber & expectedItems.
     *
     * path: /epart/v2.0/transaction/arbitrage/donnee
     *
     * @param array  $expectedItems
     * @param string $contractNumber
     *
     * @return BaseResponse
     */
    public function retrieveTransactionArbitrationData(string $contractNumber, array $expectedItems = []): BaseResponse;

    /**
     *  Initiate Data to create a Arbitration.
     *
     * path: /epart/v2.0/transaction/arbitrage/initier
     *
     * @param Context     $context
     * @param Arbitration $arbitration
     *
     * @return ApiResponse
     */
    public function initiateArbitration(Context $context, Arbitration $arbitration): ApiResponse;

    /**
     *  Check a Arbitration with a token Status.
     *
     * path: /epart/v2.0/transaction/arbitrage/verifier
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function checkArbitration(Context $context): ApiResponse;

    /**
     *  Confirm a Arbitration with a token Status.
     *
     * path: /epart/v2.0/transaction/arbitrage/confirmer
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function confirmArbitration(Context $context): ApiResponse;

    /**
     *  Finalize a Arbitration with a token Status.
     *
     * path: /epart/v2.0/transaction/arbitrage/finaliser
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function finalizeArbitration(Context $context): ApiResponse;
}
