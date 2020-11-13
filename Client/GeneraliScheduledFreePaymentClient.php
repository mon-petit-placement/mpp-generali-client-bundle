<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\RetourConsultationVersementLibreProgramme;
use Mpp\GeneraliClientBundle\Model\RetourValidation;
use Mpp\GeneraliClientBundle\Model\VersementsLibresProgrammes;

class GeneraliScheduledFreePaymentClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/transaction/versementsLibresProgrammes/donnees
     * Retrieve scheduled free payment data.
     *
     * @method getData
     *
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return ApiResponse
     */
    public function getData(string $contractNumber, array $expectedItems = []): ApiResponse
    {
        return $this->getApiResponse(RetourConsultationVersementLibreProgramme::class, 'POST', '/donnees', [
            'body' => $this->serialize([
                'contexte' => $this->getContext([
                    'numContrat' => $contractNumber,
                    'elementsAttendus' => $expectedItems,
                ]),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementsLibresProgrammes/initier
     * Init a partial repurchase request.
     *
     * @method init
     *
     * @param string $contractNumber
     *
     * @return ApiResponse
     */
    public function init(string $contractNumber): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext([
                    'numContrat' => $contractNumber,
                ]),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementsLibresProgrammes/verifier.
     * Check a partial repruchase request.
     *
     * @method check
     *
     * @param Contexte                   $context
     * @param VersementsLibresProgrammes $scheduledFreePayment
     *
     * @return ApiResponse
     */
    public function check(Contexte $context, VersementsLibresProgrammes $scheduledFreePayment): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/verifier', [
            'body' => $this->serialize([
                'contexte' => $context,
                'versementsLibresProgrammes' => $scheduledFreePayment,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementsLibresProgrammes/confirmer.
     * Confirm a partial repruchase request.
     *
     * @method confirm
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
     * POST /v2.0/transaction/versementsLibresProgrammes/finaliser.
     * Finalize a partial repruchase request.
     *
     * @method finalize
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
        return 'scheduled_free_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/transaction/versementsLibresProgrammes';
    }
}
