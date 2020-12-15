<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;

class GeneraliFundsClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/fonds/{codeFonds}
     * Retrieve funds data.
     *
     * @param array  $context
     * @param string $fundsCode
     *
     * @return ApiResponse
     */
    public function getData(array $context = [], string $fundsCode): ApiResponse
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
