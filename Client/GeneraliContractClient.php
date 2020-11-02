<?php

namespace Mpp\GeneraliClientBundle\Client;

class GeneraliContractClient extends AbstractGeneraliClient
{
    public function getData(string $contractNumber, array $expectedItems = []): BaseResponse
    {
        return $this->request('POST', '', [
            'body' => json_encode([
                'contexte' => $this->buildContext(['contractNumber' => $contractNumber], $expectedItems),
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
