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
use Mpp\GeneraliClientBundle\Model\SubscriptionResponse;

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
     * @return array
     */
    public function getContractInformations(string $contractNumber, array $expectedItems = []): array;

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
     * @return SubscriptionResponse
     */
    public function createSubscription(Context $context, Subscription $subscription, bool $dematerialization = true, string $comment = null): SubscriptionResponse;

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
     * @return SubscriptionResponse
     */
    public function initiateSubscription(Context $context, Subscription $subscription, bool $dematerialization, string $comment): SubscriptionResponse;

    /**
     * Check a Subscription with a Context.
     *
     * path: /epart/v2.0/transaction/souscription/verifier
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function checkSubscription(Context $context): SubscriptionResponse;

    /**
     * Confirm a Subscription with a Context, a SubscriptionResponse, and get the required documents to send.
     *
     * path: /epart/v2.0/transaction/souscription/confirmer
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function confirmSubscription(Context $context): SubscriptionResponse;

    /**
     * Send a document to the API Generali with a SubscriptionResponse, and get the required documents to send.
     *
     * path: /epart/v1.0/transaction/fournirPiece/{idTransaction}/{idDocument}
     *
     * @param string   $idTransaction
     * @param Document $document
     *
     * @return SubscriptionResponse
     */
    public function sendFile(string $idTransaction, Document $document): SubscriptionResponse;

    /**
     * list all the files the customer need to send for the subscription with a SubscriptionResponse, and the idTransaction.
     *
     * path: /epart/v1.0/transaction/piecesAFournir/list/{idTransaction}/souscription
     *
     * @param string $idTransaction
     *
     * @return SubscriptionResponse
     */
    public function listSubscriptionFiles(string $idTransaction): SubscriptionResponse;

    /**
     * Finalize a Subscription with a Context, a SubscriptionResponse, the list of Document to send.
     *
     * path: /epart/v2.0/transaction/souscription/finalisser
     *
     * @param Context         $context
     * @param array<Document> $documents
     *
     * @return SubscriptionResponse
     */
    public function finalizeSubscription(Context $context, array $documents): SubscriptionResponse;

    /**
     * Retrieve free payment informations with contractNumber and expectedItems.
     *
     * path: /epart/v2.0/transaction/versementLibre/donnee
     *
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return array
     */
    public function getFreePaymentInformations(string $contractNumber, array $expectedItems = []): array;

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
     * @return SubscriptionResponse
     */
    public function createFreePayment(Context $context, FreePayment $freePayment): SubscriptionResponse;

    /**
     *  Initiate Data to create a free payment.
     *
     * path: /epart/v2.0/transaction/versementLibre/initier
     *
     * @param Context     $context
     * @param FreePayment $freePayment
     *
     * @return SubscriptionResponse
     */
    public function initiateFreePayment(Context $context, FreePayment $freePayment): SubscriptionResponse;

    /**
     *  Check a Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementLibre/verifier
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function checkFreePayment(Context $context): SubscriptionResponse;

    /**
     *  Confirm a Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementLibre/confirmer
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function confirmFreePayment(Context $context): SubscriptionResponse;

    /**
     *  list all the files the customer need to send for the freePayment with a SubscriptionResponse, and the idTransaction.
     *
     * path: /epart/v1.0/transaction/piecesAFournir/list/{idTransaction}/VERSEMENT_LIBRE
     *
     * @param string $idTransaction
     *
     * @return SubscriptionResponse
     */
    public function listFreePaymentFiles(string $idTransaction): SubscriptionResponse;

    /**
     *  Finalize a Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementLibre/finaliser
     *
     * @param Context $context
     * @param array   $documents
     *
     * @return SubscriptionResponse
     */
    public function finalizeFreePayment(Context $context, array $documents): SubscriptionResponse;

    /**
     * Retrieve scheduled free payment informations with contractNumber & expectedItems.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/donnee
     *
     * @param array  $expectedItems
     * @param string $contractNumber
     *
     * @return array
     */
    public function getScheduledFreePaymentInformations(string $contractNumber, array $expectedItems = []): array;

    /**
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/initier
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/verifier
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/confirmer.
     *
     * @param Context              $context
     * @param ScheduledFreePayment $scheduledFreePayment
     *
     * @return SubscriptionResponse
     */
    public function createScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse;

    /**
     *  Initiate Data to create a Scheduled Free Payment.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/initier
     *
     * @param Context              $context
     * @param ScheduledFreePayment $scheduledFreePayment
     *
     * @return SubscriptionResponse
     */
    public function initiateScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse;

    /**
     *  Check a Scheduled Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/verifier
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function checkScheduledFreePayment(Context $context): SubscriptionResponse;

    /**
     *  Confirm a Scheduled Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/confirmer
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function confirmScheduledFreePayment(Context $context): SubscriptionResponse;

    /**
     *  Finalize a Scheduled Free Payment with a token Status.
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/finaliser
     *
     * @param Context $context
     * @param array   $documents
     *
     * @return SubscriptionResponse
     */
    public function finalizeScheduledFreePayment(Context $context, array $documents): SubscriptionResponse;

    /**
     * Suspend a Scheduled Free Payment.
     *
     * path: /epart/v1.0/transaction/suspensionVersementsLibresProgrammes
     *
     * @param Context              $context
     * @param ScheduledFreePayment $scheduledFreePayment
     *
     * @return SubscriptionResponse
     */
    public function suspendScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse;

    /**
     * Intiate a Scheduled Free Payment's edit.
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/initier
     *
     * @param Context              $context
     * @param ScheduledFreePayment $scheduledFreePayment
     *
     * @return SubscriptionResponse
     */
    public function initiateEditScheduledFreePayment(Context $context, ScheduledFreePayment $scheduledFreePayment): SubscriptionResponse;

    /**
     * Check a Scheduled Free Payment's edit.
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/verifier
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function checkEditScheduledFreePayment(Context $context): SubscriptionResponse;

    /**
     * Confirm a Scheduled Free Payment's edit.
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/confirmer
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function confirmEditScheduledFreePayment(Context $context): SubscriptionResponse;

    /**
     * Retrieve partial surrender informations with contractNumber & expectedItems.
     *
     * path: /epart/v1.0/donnees/rachatpartiel/all
     *
     * @param array  $expectedItems
     * @param string $contractNumber
     *
     * @return array
     */
    public function getPartialSurrenderInformations(string $contractNumber, array $expectedItems = []): array;

    /**
     *  Initiate Data to create a Partial Surrender.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/initier
     *
     * @param Context          $context
     * @param PartialSurrender $partialSurrender
     *
     * @return SubscriptionResponse
     */
    public function initiatePartialSurrender(Context $context, PartialSurrender $partialSurrender): SubscriptionResponse;

    /**
     *  Check a Partial Surrender with a token Status.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/verifier
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function checkPartialSurrender(Context $context): SubscriptionResponse;

    /**
     *  Confirm a Partial Surrender with a token Status.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/confirmer
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function confirmPartialSurrender(Context $context): SubscriptionResponse;

    /**
     *  Finalize a Partial Surrender with a token Status.
     *
     * path: /epart/v2.0/transaction/rachatpartiel/finaliser
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function finalizePartialSurrender(Context $context): SubscriptionResponse;

    /**
     * Retrieve partial surrender informations with contractNumber & expectedItems.
     *
     * path: /epart/v2.0/transaction/arbitrage/donnee
     *
     * @param array  $expectedItems
     * @param string $contractNumber
     *
     * @return array
     */
    public function getArbitrationInformations(string $contractNumber, array $expectedItems = []): array;

    /**
     *  Initiate Data to create a Arbitration.
     *
     * path: /epart/v2.0/transaction/arbitrage/initier
     *
     * @param Context     $context
     * @param Arbitration $arbitration
     *
     * @return SubscriptionResponse
     */
    public function initiateArbitration(Context $context, Arbitration $arbitration): SubscriptionResponse;

    /**
     *  Check a Arbitration with a token Status.
     *
     * path: /epart/v2.0/transaction/arbitrage/verifier
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function checkArbitration(Context $context): SubscriptionResponse;

    /**
     *  Confirm a Arbitration with a token Status.
     *
     * path: /epart/v2.0/transaction/arbitrage/confirmer
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function confirmArbitration(Context $context): SubscriptionResponse;

    /**
     *  Finalize a Arbitration with a token Status.
     *
     * path: /epart/v2.0/transaction/arbitrage/finaliser
     *
     * @param Context $context
     *
     * @return SubscriptionResponse
     */
    public function finalizeArbitration(Context $context): SubscriptionResponse;
}
