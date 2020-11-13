<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\RetourConsultationVersementLibre;
use Mpp\GeneraliClientBundle\Model\VersementLibre;

class GeneraliFreePaymentClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/transaction/versementLibre/donnees
     * Retrieve free payment data.
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
        return $this->getApiResponse(RetourConsultationVersementLibre::class, 'POST', '/donnees', [
            'body' => $this->serialize([
                'contexte' => $this->getContext([
                    'numContrat' => $contractNumber,
                    'elementsAttendus' => $expectedItems,
                ]),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementLibre/initier
     * Init a free payment request.
     *
     * @method init
     *
     * @param string      $contractNumber
     * @param string|null $linkedTransactionNumber
     *
     * @return ApiResponse
     */
    public function init(string $contractNumber, ?string $linkedTransactionNumber = null): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext([
                    'numContrat' => $contractNumber,
                    'numeroOrdreTransactionLiee' => $linkedTransactionNumber,
                ]),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementLibre/verifier
     * Check a free payment request.
     *
     * @method check
     *
     * @param Contexte       $context
     * @param VersementLibre $freePayment
     *
     * @return ApiResponse
     */
    public function check(Contexte $context, VersementLibre $freePayment): ApiResponse
    {
        return $this->request(null, 'POST', '/verifier', [
            'body' => $this->serialize([
                'contexte' => $context,
                'versementLibre' => $freePayment,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementLibre/confirmer
     * Confirm a free payment request.
     *
     * @method confirm
     *
     * @param Contexte $context
     *
     * @return ApiResponse
     */
    public function confirm(Contexte $context): ApiResponse
    {
        return $this->request('POST', '/confirmer', [
            'body' => $this->serialize([
                'contexte' => $context,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementLibre/finaliser.
     * Finalize a free payment request.
     *
     * @method finalize
     *
     * @param Contexte $context
     *
     * @return ApiResponse
     */
    public function finalize(Contexte $context): ApiResponse
    {
        return $this->request('POST', '/finaliser', [
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
        return 'free_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/transaction/versementLibre';
    }
}
