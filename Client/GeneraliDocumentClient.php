<?php

namespace Mpp\GeneraliClientBundle\Client;

use InvalidArgumentException;
use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\PieceAFournir;
use Mpp\GeneraliClientBundle\Model\RetourValidation;

class GeneraliDocumentClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/document/avenant/{codeApp}/{numContrat}/{numAvenant}/{numOperation}/{controle}
     * Retrieve binary flux from a PDF amendment
     *
     * @param string $codeApp
     * @param string $contratId
     * @param string $amendmentId
     * @param string $transactionId
     * @param string $checkKey
     *
     * @return ApiResponse
     */
    public function getAmendment(
        string $codeApp,
        string $contratId,
        string $documentId,
        string $transactionId,
        string $checkKey
    ): ApiResponse {
        return $this->getApiResponse(
            null,
            'GET',
            sprintf('/avenant/%s/%s/%s/%s/%s', $codeApp, $contratId, $documentId, $transactionId, $checkKey),
            []
        );
    }

    /**
     * POST /v2.0/document/editique/{numCourrier}/{controle}
     * Retrieve binary flux from a PDF state of affairs, unique tax forms or real estate assets prints
     *
     * @param string $documentId
     * @param string $checkKey
     *
     * @return ApiResponse
     */
    public function getDocument(string $documentId, string $checkKey): ApiResponse
    {
        return $this->getApiResponse(null, 'GET', sprintf('/editique/%s/%s', $documentId, $checkKey), []);
    }

    /**
     * POST /v2.0/document/releveSituation/{codeApp}/{numContrat}/{dateReleve}/{controle}
     * Retrieve binary flux from a PDF situation report
     *
     * @param string $codeApp
     * @param string $contratId
     * @param string $reportDate
     * @param string $checkKey
     *
     * @return ApiResponse
     */
    public function getSituationReport(
        string $codeApp,
        string $contratId,
        string $reportDate,
        string $checkKey
    ): ApiResponse {
        return $this->getApiResponse(
            null,
            'GET',
            sprintf('/editique/%s/%s', $codeApp, $contratId, $reportDate, $checkKey),
            []
        );
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
        return '/v2.0/document';
    }
}
