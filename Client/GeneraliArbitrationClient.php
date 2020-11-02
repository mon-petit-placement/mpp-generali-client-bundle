<?php

namespace Mpp\GeneraliClientBundle\Client;

class GeneraliArbitrationClient extends AbstractGeneraliClient
{
    public function getData(string $contractNumber, array $expectedItems = []): BaseResponse
    {
        $context = $this->buildContext(['contractNumber' => $contractNumber], $expectedItems);

        return $this->request('POST', '/donnees', [
            'json' => [
                'contexte' => [
                    'codeApporteur' => $context->getProviderCode(),
                    'numContrat' => $context->getContractNumber(),
                    'elementsAttendus' => $context->expectedItems(),
                ],
            ],
        ]);
    }

    public function create(Context $context, Arbitration $arbitration): ApiResponse
    {
        $response = $this->init($context);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The arbitration\'s initiation has failed.');
        }

        $this->check($context, $arbitration);

        return $this->confirm($context);
    }

    public function init(Context $context): BaseResponse
    {
        return $this->request('POST', '/initier', [
            'json' => [
                'contexte' => [
                    'codeApporteur' => $context->getProviderCode(),
                    'numContrat' => $context->getContractNumber(),
                ],
            ],
        ]);
    }

    public function check(Context $context, Arbitration $arbitration): ApiResponse
    {
        return $this->request('POST', '/verifier', [
            'json' => [
                'contexte' => [
                    'status' => $context->getStatus(),
                ],
                'arbitrage' => $arbitration->toArray(),
            ],
        ]);
    }

    public function confirm(Context $context): ApiResponse
    {
        return $this->request('POST', '/confirmer', [
            'json' => [
                'contexte' => $context->arrayToConfirm(),
                'options' => [
                    'genererUnBulletin' => true,
                    'envoyerUnMailClient' => true,
                    'cloturerLeDossier' => true,
                ],
            ],
        ]);
    }

    public function finalize(Context $context): ApiResponse
    {
        return $this->request('POST', '/finaliser', [
            'json' => [
                'contexte' => $context->arrayToFinalize(),
            ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'arbitration';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/transaction/arbitrage';
    }
}
