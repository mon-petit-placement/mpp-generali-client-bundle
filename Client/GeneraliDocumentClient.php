<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\PieceAFournir;
use Mpp\GeneraliClientBundle\Model\RetourValidation;

class GeneraliDocumentClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/transaction/fournirPiece/{idTransaction}/{idDocument}
     * Upload document for a given request transaction id.
     *
     * @method uploadDocument
     *
     * @param string        $idTransaction
     * @param PieceAFournir $document
     *
     * @return ApiResponse
     */
    public function uploadDocument(string $transactionId, PieceAFournir $document): ApiResponse
    {
        if (null === $document->getFile() || $document->getIdPieceAFournir()) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The fields "idPieceAFournir" and "file" could not be null on object of type %s when using %s::uploadDocument method',
                    PieceAFournir::class,
                    self::class
                )
            );
        }

        return $this->request('POST', sprintf('/fournirPiece/%s/%s', $transactionId, $document->getIdPieceAFournir()), [
            'body' => json_encode([
                'multipart' => [
                    [
                        'name' => $document->getIdPieceAFournir(),
                        'contents' => fopen($document->getFile(), 'r'),
                    ],
                ],
            ]),
        ]);
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/ARBITRAGE
     * List all arbitration files for a given transaction id.
     *
     * @method listArbitrationFiles
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listArbitrationFiles(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(RetourValidation::class, 'GET', sprintf('/piecesAFournir/list/%s/ARBITRAGE', $transactionId));
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/SOUSCRIPTION
     * List all subscription files for a given transaction id.
     *
     * @method listSubscriptionFiles
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listSubscriptionFiles(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(RetourValidation::class, 'GET', sprintf('/piecesAFournir/list/%s/SOUSCRIPTION', $transactionId));
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/VERSEMENT_LIBRE
     * List all free payment files for a given transaction id.
     *
     * @method listFreePaymentFiles
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listFreePaymentFiles(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(RetourValidation::class, 'GET', sprintf('/piecesAFournir/list/%s/VERSEMENT_LIBRE', $transactionId));
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/VERSEMENT_LIBRES_PROGRAMME
     * List all scheduled free payment files for a given transaction id.
     *
     * @method listScheduledFreePaymentFiles
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listScheduledFreePaymentFiles(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(RetourValidation::class, 'GET', sprintf('/piecesAFournir/list/%s/VERSEMENT_LIBRES_PROGRAMME', $transactionId));
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v1.0/transaction';
    }
}
