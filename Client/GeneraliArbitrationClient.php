<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\RetourConsultationArbitrage;
use Mpp\GeneraliClientBundle\Model\RetourFinalisation;
use Mpp\GeneraliClientBundle\Model\RetourValidation;

class GeneraliArbitrationClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/transaction/arbitrage/donnees
     * Retrieve arbitration data.
     *
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return ApiResponse
     */
    public function getData(string $contractNumber, array $expectedItems = []): ApiResponse
    {
        return $this->getApiResponse(RetourConsultationArbitrage::class, 'POST', '/donnees', [
            'body' => $this->serialize([
                'contexte' => $this->getContext(['elementsAttendus' => $expectedItems]),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/arbitrage/initier
     * Init an arbitration request.
     *
     * @param string $contractNumber
     *
     * @return ApiResponse
     */
    public function init(string $contractNumber): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext(['numContrat' => $contractNumber]),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/arbitrage/verifier
     * Check arbitration request.
     *
     * @param Contexte    $context
     * @param Arbitration $arbitration
     *
     * @return ApiResponse
     */
    public function check(Contexte $context, Arbitration $arbitration): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/verifier', [
            'body' => $this->serialize([
                'contexte' => $context,
                'arbitrage' => $arbitration,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/arbitrage/confirmer
     * Confirm an arbitration request.
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
     * POST /v2.0/transaction/arbitrage/finaliser
     * Finalize an arbitration request.
     *
     * @param Contexte $context
     *
     * @return ApiResponse
     */
    public function finalize(Contexte $context): ApiResponse
    {
        return $this->getApiResponse(RetourFinalisation::class, 'POST', '/finaliser', [
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
        return 'arbitration';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/transaction/arbitrage';
    }
}
