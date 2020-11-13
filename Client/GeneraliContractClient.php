<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;

class GeneraliContractClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/contrats
     * Retrieve contract data.
     *
     * @param string $contractNumber
     * @param array  $expectedItems
     *
     * @return ApiResponse
     */
    public function getData(string $contractNumber, array $expectedItems = []): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '', [
            'body' => $this->serialize([
                'contexte' => $this->getContext([
                    'numContrat' => $contractNumber,
                    'elementsAttendus' => $expectedItems,
                ]),
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'contract';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/contrats';
    }
}
