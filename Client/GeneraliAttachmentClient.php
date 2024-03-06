<?php

namespace Mpp\GeneraliClientBundle\Client;

use InvalidArgumentException;
use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\PieceAFournir;
use Mpp\GeneraliClientBundle\Model\RetourValidation;

class GeneraliAttachmentClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/transaction/fournirPiece/{idTransaction}/{idDocument}
     * Upload document for a given request transaction id.
     *
     * @param string        $idTransaction
     * @param PieceAFournir $document
     *
     * @return void
     */
    public function uploadDocument(string $transactionId, PieceAFournir $document): void
    {
        if (null === $document->getFilePath() || null === $document->getIdPieceAFournir()) {
            throw new InvalidArgumentException(
                sprintf(
                    'The fields "idPieceAFournir" and "filePath" could not be null on object of type %s when using %s::uploadDocument method',
                    PieceAFournir::class,
                    self::class
                )
            );
        }

        $this->getApiResponse(null, 'POST', sprintf('/fournirPiece/%s/%s', $transactionId, $document->getIdPieceAFournir()), [
            'multipart' => [
                [
                    'name' => $document->getSousLibelle(),
                    'contents' => fopen($document->getFilePath(), 'r'),
                    'filename' => $document->getFileName(),
                ],
            ]
        ]);
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/ARBITRAGE
     * List all arbitration files for a given transaction id.
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listArbitrationFiles(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(null, 'GET', sprintf('/piecesAFournir/list/%s/ARBITRAGE', $transactionId), []);
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/SOUSCRIPTION
     * List all subscription files for a given transaction id.
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listSubscriptionFiles(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(null, 'GET', sprintf('/piecesAFournir/list/%s/SOUSCRIPTION', $transactionId), []);
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/MAJDOSSCLT
     * List all kyc update files for a given transaction id.
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listKycUpdateFiles(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(null, 'GET', sprintf('/piecesAFournir/list/%s/MAJ_DOSSIER_CLIENT', $transactionId), []);
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/VERSEMENT_LIBRE
     * List all free payment files for a given transaction id.
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listFreePaymentFiles(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(null, 'GET', sprintf('/piecesAFournir/list/%s/VERSEMENT_LIBRE', $transactionId), []);
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/{transactionType}
     * List all scheduled free payment files for a given transaction id.
     *
     * @deprecated use listStartScheduledFreePaymentFiles or listUpdateScheduledFreePaymentFiles methods instead
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listScheduledFreePaymentFiles(string $transactionId): ApiResponse
    {
        if (str_contains('MEPVLP', $transactionId)) {
            return $this->listStartScheduledFreePaymentFiles($transactionId);
        } else {
            return $this->listUpdateScheduledFreePaymentFiles($transactionId);
        }
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/CREATION_VERSEMENT_LIBRE_PROGRAMME
     * List all start scheduled free payment files for a given transaction id.
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listStartScheduledFreePaymentFiles(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(null, 'GET', sprintf('/piecesAFournir/list/%s/CREATION_VERSEMENT_LIBRE_PROGRAMME', $transactionId), []);
    }

    /**
     * POST /v1.0/transaction/piecesAFournir/list/{idTransaction}/MODIF_VERSEMENT_LIBRE_PROGRAMME
     * List all update scheduled free payment files for a given transaction id.
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function listUpdateScheduledFreePaymentFiles(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(null, 'GET', sprintf('/piecesAFournir/list/%s/MODIF_VERSEMENT_LIBRE_PROGRAMME', $transactionId), []);
    }

    /**
     * POST /v2.0/document/avenant/{codeApp}/{numContrat}/{numAvenant}/{numOperation}/{controle}
     * Retrieve binary flux from a PDF amendment
     *
     * @param string $transactionId
     *
     * @return ApiResponse
     */
    public function getAmendment(string $transactionId): ApiResponse
    {
        return $this->getApiResponse(null, 'GET', sprintf('/piecesAFournir/list/%s/VERSEMENT_LIBRES_PROGRAMME', $transactionId), []);
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'attachment';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v1.0/transaction';
    }
}
