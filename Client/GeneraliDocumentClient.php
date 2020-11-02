<?php

namespace Mpp\GeneraliClientBundle\Client;

class GeneraliDocumentClient extends AbstractGeneraliClient
{
    public function uploadFile(string $idTransaction, Document $document): ApiResponse
    {
        return $this->request('POST', sprintf('/fournirPiece/%s/%s', $idTransaction, $document->getIdDocument()), [
            'body' => json_encode([
                'multipart' => [
                    [
                        'name' => $document->getTitle(),
                        'contents' => new File($document->getFilePath().$fileName),
                        'filename' => $document->getFilename(),
                    ],
                ],
            ]),
        ]);
    }

    public function listSubscriptionFiles(string $idTransaction): ApiResponse
    {
        return $this->request('GET', sprintf('/piecesAFournir/list/%s/souscription', $idTransaction));
    }

    public function listFreePaymentFiles(string $idTransaction): ApiResponse
    {
        return $this->request('GET', sprintf('/piecesAFournir/list/%s/VERSEMENT_LIBRE', $idTransaction));
    }

    public function listScheduledFreePaymentFiles(string $idTransaction): ApiResponse
    {
        return $this->request('GET', sprintf('/piecesAFournir/list/%s/CREATION_VERSEMENT_LIBRE_PROGRAMME', $idTransaction));
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
