<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;

class GeneraliFundsClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/fonds/{codeFonds}
     * Retrieve funds data.
     *
     * @param string $fundsCode
     * @param array  $context
     *
     * @return ApiResponse
     */
    public function getData(string $fundsCode, array $context = []): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', sprintf('/%s', $fundsCode), [
            'body' => $this->serialize([
                'contexte' => $this->getContext($context),
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
