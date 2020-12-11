<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\RetourConsultationSouscription;
use Mpp\GeneraliClientBundle\Model\RetourFinalisation;
use Mpp\GeneraliClientBundle\Model\RetourInitiationSouscription;
use Mpp\GeneraliClientBundle\Model\RetourValidation;
use Mpp\GeneraliClientBundle\Model\Souscription;

class GeneraliSubscriptionClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/transaction/souscription/donnees
     * Retrieve subscription data.
     *
     * @param array $expectedItems
     *
     * @return ApiResponse
     */
    public function getData(array $expectedItems = []): ApiResponse
    {
        return $this->getApiResponse(RetourConsultationSouscription::class, 'POST', '/donnees', [
            'body' => $this->serialize([
                'contexte' => $this->getContext(['elementsAttendus' => $expectedItems]),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/souscription/initier
     * Init a subscription request.
     *
     * @param Souscription|null $subscription
     * @param array             $expectedItems
     *
     * @return ApiResponse
     */
    public function init(?Souscription $subscription = null, array $expectedItems = []): ApiResponse
    {
        return $this->getApiResponse(RetourInitiationSouscription::class, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext(['elementsAttendus' => $expectedItems]),
                'souscription' => $subscription,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/souscription/verifier
     * Check a subscription request.
     *
     * @param Contexte     $context
     * @param Souscription $subscription
     *
     * @return ApiResponse
     */
    public function check(Contexte $context, Souscription $subscription): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/verifier', [
            'body' => $this->serialize([
                'contexte' => $context,
                'souscription' => $subscription,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/souscription/confirmer
     * Confirm a subscription request.
     *
     * @param Contexte $context
     *
     * @return ApiResponse
     */
    public function confirm(Contexte $context): ApiResponse
    {
        return $this->getApiResponse(RetourValidation::class, 'POST', '/confirmer', [
            'body' => $this->serialize([
                'contexte' => $context,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/souscription/finaliser
     * Finalize a subscription request.
     *
     * @param Contexte $context
     *
     * @return ApiResponse
     */
    public function finalize(Contexte $context): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/finaliser', [
            'body' => $this->serialize([
                'contexte' => $context,
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'subscription';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/transaction/souscription';
    }
}
