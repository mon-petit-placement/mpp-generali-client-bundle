<?php

namespace Mpp\GeneraliClientBundle\Client;

class GeneraliFreePaymentClient extends AbstractGeneraliClient
{
    public function getData(string $contractNumber, array $expectedItems = []): BaseResponse
    {
        return $this->request('POST', '/donnees', [
            'body' => json_encode([
                'contexte' => $this->buildContext(['contractNumber' => $contractNumber], $expectedItems),
            ]),
        ]);
    }

    public function create(Context $context, FreePayment $freePayment): ApiResponse
    {
        $response = $this->init($context, $freePayment);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The free payment\'s initiation has failed.');
        }

        $this->check($context);

        return $this->confirm($context);
    }

    public function init(Context $context, FreePayment $freePayment): ApiResponse
    {
        return $this->request('POST', '/initier', [
            'body' => json_encode([
                'contexte' => $context->arrayToInitiate(),
                'versementLibre' => $freePayment->toArray(),
            ]),
        ]);
    }

    public function checkFreePayment(Context $context): ApiResponse
    {
        return $this->request('POST', '/initier', [
            'body' => json_encode([
                'contexte' => $context->arrayToCheck(),
            ]),
        ]);
    }

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

    public function finalize(Context $context, array $documents): ApiResponse
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
        return 'free_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/transaction/versementLibre';
    }
}
