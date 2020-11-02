<?php

namespace Mpp\GeneraliClientBundle\Client;

class GeneraliFundsClient extends AbstractGeneraliClient
{
    public function getData(string $fundsCode, array $expectedItems = []): ApiResponse
    {
        return $this->request('POST', sprintf('/%s', $fundsCode), [
            'json' => [
                'contexte' => [
                    'elementsAttendus' => $context->expectedItems(),
                ],
            ],
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
        return '/v2.0/fonds';
    }
}
