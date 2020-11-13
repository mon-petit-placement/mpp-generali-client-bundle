<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contexte;

class GeneraliFundsClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/fonds/{codeFonds}
     * Retrieve funds data.
     *
     * @method getData
     *
     * @param string $fundsCode
     * @param array  $expectedItems
     *
     * @return ApiResponse
     */
    public function getData(string $fundsCode, array $expectedItems = []): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', sprintf('/%s', $fundsCode), [
            'body' => $this->serialize([
                'contexte' => (new Contexte())->setElementsAttendus($expectedItems),
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'funds';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v1.0/fonds';
    }
}
