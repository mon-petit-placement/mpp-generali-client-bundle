<?php

namespace Mpp\GeneraliClientBundle\HttpClient;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\BaseResponse;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\PartialSurrender;

class GeneraliPartialRepurchaseClient extends AbstractGeneraliClient
{
    /**
     * {@inheritdoc}
     */
    public function getData(string $contractNumber, array $expectedItems = []): BaseResponse
    {
        return $this->request('POST', '/all', [
            'body' => json_encode([
                'contexte' => $this->buildContext(['contractNumber' => $contractNumber], $expectedItems),
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function create(Context $context, PartialSurrender $partialSurrender): ApiResponse
    {
        $response = $this->init($context, $partialSurrender);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The partial repurchase\'s initiation has failed.');
        }

        $this->check($context);

        return $this->confirm($context);
    }

    /**
     * {@inheritdoc}
     */
    public function init(Context $context, PartialSurrender $partialSurrender): ApiResponse
    {
        return $this->request('POST', sprintf('/initier/%s', $context->getContractNumber()), [
            'body' => json_encode([
                'contexte' => $context->arrayToInitiate(),
                'rachatPartiel' => $partialSurrender->toArray(),
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function check(Context $context): ApiResponse
    {
        return $this->request('POST', '/initier', [
            'body' => json_encode([
                'contexte' => $context->arrayToCheck(),
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function confirm(Context $context): ApiResponse
    {
        return $this->request('POST', '/confirmer', [
            'body' => json_encode([
                'contexte' => $context->arrayToConfirm(),
                'options' => [
                    'genererUnBulletin' => true,
                    'envoyerUnMailClient' => true,
                    'cloturerLeDossier' => true,
                ],
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function finalize(Context $context): ApiResponse
    {
        return $this->request('POST', '/finaliser', [
            'body' => json_encode([
                'contexte' => $context->arrayToFinalize(),
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'partial_repurchase';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v1.0/donnees/rachatpartiel';
    }
}
