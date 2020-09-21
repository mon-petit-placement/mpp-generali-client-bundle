<?php

namespace Mpp\GeneraliClientBundle\HttpClient;

use Mpp\GeneraliClientBundle\Model\BaseResponse;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\Subscription;
use Mpp\GeneraliClientBundle\Model\SubscriptionConstant;
use Mpp\GeneraliClientBundle\Model\SubscriptionResponse;
use Mpp\GeneraliClientBundle\Model\TransactionOrder;

/**
 * Interface GeneraliHttpClientInterface.
 */
interface GeneraliHttpClientInterface
{
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
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return array
     */
    public function retrieveTransactionSubscriptionData(string $contractNumber, array $expectedItems = []): BaseResponse;

    /**
     * Create a Subscription with a Context, a GeneraliSubsription, a comment if you wish dematerialize the process.
     *
     * path: /epart/v2.0/transaction/souscription/initier
     * path: /epart/v2.0/transaction/souscription/verifier
     * path: /epart/v2.0/transaction/souscription/confirmer
     *
     * @param Context              $context
     * @param Subscription         $subscription
     * @param string               $comment
     * @param bool                 $dematerialization
     *
     * @return SubscriptionResponse
     */
    public function createSubscription(Context $context, Subscription $subscription, string $comment = null, bool $dematerialization = true): SubscriptionResponse;

    /**
     * Finalize a Subscription with a token Status.
     *
     * path: /epart/v2.0/transaction/souscription/finaliser
     *
     * @param Context $context
     * @param array $filesToSend
     *
     * @return TransactionOrder
     */
    public function finalizeSubscription(Context $context, array $filesToSend): TransactionOrder;

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
    public function getFreePaymentInformations(string $contractNumber, array $expectedItems = []): array;

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
    public function initiateFreePayment(array $expectedItems, array $freePayment): SubscriptionResponse;

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
    public function checkFreePayment(array $expectedItems, array $freePayment): array;

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
    public function confirmFreePayment(array $expectedItems, array $freePayment): array;

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
    public function finalizeFreePayment(array $expectedItems, array $freePayment): TransactionOrder;

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
    public function getScheduledFreePaymentInformations(string $contractNumber, array $expectedItems = []): array;

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
    public function initiateScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse;

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
    public function checkScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): array;

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
    public function confirmScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): array;

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
    public function finalizeScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): TransactionOrder;

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
    public function suspendScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): array;

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
    public function initiateEditScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse;

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
    public function checkEditScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): array;

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
    public function confirmEditScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): array;

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
    public function getPartialSurrenderInformations(string $contractNumber, array $expectedItems = []): array;

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
    public function initiatePartialSurrender(array $expectedItems, array $partialSurrender): SubscriptionResponse;

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
    public function checkPartialSurrender(array $expectedItems, array $partialSurrender): array;

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
    public function confirmPartialSurrender(array $expectedItems, array $partialSurrender): array;

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
    public function finalizePartialSurrender(array $expectedItems, array $partialSurrender): TransactionOrder;

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
    public function getArbitrationInformations(string $contractNumber, array $expectedItems = []): array;

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
    public function initiateArbitration(array $expectedItems, array $arbitration): SubscriptionResponse;

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
    public function checkArbitration(array $expectedItems, array $arbitration): array;

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
    public function confirmArbitration(array $expectedItems, array $arbitration): array;

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
    public function finalizeArbitration(array $expectedItems, array $arbitration): TransactionOrder;

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
    public function sendFile(string $idTransaction, string $idPieceAFournir, string $path, string $fileName): array;

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
    public function listFile(string $idTransaction, string $product): array;
}
