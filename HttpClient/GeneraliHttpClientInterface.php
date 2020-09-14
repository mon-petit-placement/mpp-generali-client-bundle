<?php


namespace Mpp\GeneraliClientBundle\HttpClient;

use Mpp\GeneraliClientBundle\Model\SubscriptionResponse;

/**
 * Interface GeneraliHttpClientInterface
 */
interface GeneraliHttpClientInterface
{
    /**
     * Retrieve contract information with contractNumber & expectedItems
     *
     * path: /epart/v2.0/contrats/{contractNumber}
     *
     * @param string $contractNumber
     * @param array $expectedItems
     * @return array
     */
    public function getContractInformations(string $contractNumber, array $expectedItems = []): array;

    /**
     * Retrieve subscription informations with contractNumber & expectedItems
     *
     * path: /epart/v2.0/transaction/subscription/donnee
     *
     * @param string $contractNumber
     * @param array $expectedItems
     * @return array
     */
    public function getSubscriptionInformations(string $contractNumber, array $expectedItems = []): array;

    /**
     *  Initiate a Subscription with $subscription data
     *
     * path: /epart/v2.0/transaction/souscription/initier
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function initiateSubscription(array $expectedItems, array $subscription): SubscriptionResponse;

    /**
     *  Check a Subscription with a token Status
     *
     * path: /epart/v2.0/transaction/souscription/verifier
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function checkSubscription(array $expectedItems, array $subscription): SubscriptionResponse;

    /**
     *  Confirm a Subscription with a token Status
     *
     * path: /epart/v2.0/transaction/souscription/confirmer
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function confirmSubscription(array $expectedItems, array $subscription): SubscriptionResponse;

    /**
     *  Finalize a Subscription with a token Status
     *
     * path: /epart/v2.0/transaction/souscription/finaliser
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function finalizeSubscription(array $expectedItems, array $subscription): SubscriptionResponse;

    /**
     * Retrieve free payment informations with contractNumber & expectedItems
     *
     * path: /epart/v2.0/transaction/versementLibre/donnee
     *
     * @param string $contractNumber
     * @param array $expectedItems
     * @return array
     */
    public function getFreePaymentInformations(string $contractNumber, array $expectedItems = []): array;

    /**
     *  Initiate Data to create a free payment
     *
     * path: /epart/v2.0/transaction/versementLibre/initier
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function initiateFreePayment(array $expectedItems, array $subscription): SubscriptionResponse;

    /**
     *  Check a Free Payment with a token Status
     *
     * path: /epart/v2.0/transaction/versementLibre/verifier
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function checkFreePayment(array $expectedItems, array $subscription): SubscriptionResponse;

    /**
     *  Confirm a Free Payment with a token Status
     *
     * path: /epart/v2.0/transaction/versementLibre/confirmer
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function confirmFreePayment(array $expectedItems, array $subscription): SubscriptionResponse;

    /**
     *  Finalize a Free Payment with a token Status
     *
     * path: /epart/v2.0/transaction/versementLibre/finaliser
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function finalizeFreePayment(array $expectedItems, array $subscription): SubscriptionResponse;

    /**
     * Retrieve scheduled free payment informations with contractNumber & expectedItems
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/donnee
     *
     * @param string $contractNumber
     * @param array $expectedItems
     * @return array
     */
    public function getScheduledFreePaymentInformations(string $contractNumber, array $expectedItems = []): array;

    /**
     *  Initiate Data to create a Scheduled Free Payment
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/initier
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function initiateScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse;

    /**
     *  Check a Scheduled Free Payment with a token Status
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/verifier
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function checkScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse;

    /**
     *  Confirm a Scheduled Free Payment with a token Status
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/confirmer
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function confirmScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse;

    /**
     *  Finalize a Scheduled Free Payment with a token Status
     *
     * path: /epart/v2.0/transaction/versementsLibresProgrammes/finaliser
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function finalizeScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse;

    /**
     * Suspend a Scheduled Free Payment
     *
     * path: /epart/v1.0/transaction/suspensionVersementsLibresProgrammes
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     * @return SubscriptionResponse
     */
    public function suspendScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse;

    /**
     * Intiate a Scheduled Free Payment's edit
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/initier
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     * @return SubscriptionResponse
     */
    public function initiateEditScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse;

    /**
     * Check a Scheduled Free Payment's edit
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/verifier
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     * @return SubscriptionResponse
     */
    public function checkEditScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse;

    /**
     * Confirm a Scheduled Free Payment's edit
     *
     * path: /epart/v1.0/transaction/modificationVersementsLibresProgrammes/confirmer
     *
     * @param array $expectedItems
     * @param array $scheduledFreePayment
     * @return SubscriptionResponse
     */
    public function confirmEditScheduledFreePayment(array $expectedItems, array $scheduledFreePayment): SubscriptionResponse;

    /**
     * Retrieve partial surrender informations with contractNumber & expectedItems
     *
     * path: /epart/v1.0/donnees/rachatpartiel/all
     *
     * @param string $contractNumber
     * @param array $expectedItems
     * @return array
     */
    public function getPartialSurrenderInformations(string $contractNumber, array $expectedItems = []): array;

    /**
     *  Initiate Data to create a Partial Surrender
     *
     * path: /epart/v2.0/transaction/rachatpartiel/initier
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function initiatePartialSurrender(array $expectedItems, array $partialSurrender): SubscriptionResponse;

    /**
     *  Check a Partial Surrender with a token Status
     *
     * path: /epart/v2.0/transaction/rachatpartiel/verifier
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function checkPartialSurrender(array $expectedItems, array $partialSurrender): SubscriptionResponse;

    /**
     *  Confirm a Partial Surrender with a token Status
     *
     * path: /epart/v2.0/transaction/rachatpartiel/confirmer
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function confirmPartialSurrender(array $expectedItems, array $partialSurrender): SubscriptionResponse;

    /**
     *  Finalize a Partial Surrender with a token Status
     *
     * path: /epart/v2.0/transaction/rachatpartiel/finaliser
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function finalizePartialSurrender(array $expectedItems, array $partialSurrender): SubscriptionResponse;

    /**
     * Retrieve partial surrender informations with contractNumber & expectedItems
     *
     * path: /epart/v2.0/transaction/arbitrage/donnee
     *
     * @param string $contractNumber
     * @param array $expectedItems
     * @return array
     */
    public function getArbitrationInformations(string $contractNumber, array $expectedItems = []): array;

    /**
     *  Initiate Data to create a Arbitration
     *
     * path: /epart/v2.0/transaction/arbitrage/initier
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function initiateArbitration(array $expectedItems, array $arbitration): SubscriptionResponse;

    /**
     *  Check a Arbitration with a token Status
     *
     * path: /epart/v2.0/transaction/arbitrage/verifier
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function checkArbitration(array $expectedItems, array $arbitration): SubscriptionResponse;

    /**
     *  Confirm a Arbitration with a token Status
     *
     * path: /epart/v2.0/transaction/arbitrage/confirmer
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function confirmArbitration(array $expectedItems, array $arbitration): SubscriptionResponse;

    /**
     *  Finalize a Arbitration with a token Status
     *
     * path: /epart/v2.0/transaction/arbitrage/finaliser
     *
     * @param array $expectedItems
     * @param array $subscription
     * @return SubscriptionResponse
     */
    public function finalizeArbitration(array $expectedItems, array $arbitration): SubscriptionResponse;
}