<?php

namespace Mpp\GeneraliClientBundle\Client;

class GeneraliScheduledFreePaymentClient extends AbstractGeneraliClient
{
    public function getData(string $contractNumber, array $expectedItems = []): BaseResponse
    {
        return $this->request('GET', sprintf('/donnees/%s', $contractNumber));
    }

    public function create(Context $context, ScheduledFreePayment $scheduledFreePayment): ApiResponse
    {
        $response = $this->init($context, $scheduledFreePayment);

        if (null === $response->getStatus()) {
            throw new \RuntimeException('The scheduled free payment\'s initiation has failed.');
        }

        $this->check($context);

        return $this->confirm($context);
    }

    public function init(Context $context, ScheduledFreePayment $scheduledFreePayment): ApiResponse
    {
        return $this->request('POST', '/initier', [
            'body' => json_encode([
                'contexte' => $context->arrayToInitiate(),
                'versementsLibresProgrammes' => $scheduledFreePayment->toArray(),
            ]),
        ]);
    }

    public function check(Context $context): ApiResponse
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

    public function finalizeScheduledFreePayment(Context $context, array $documents): ApiResponse
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
        return 'scheduled_free_payment';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/transaction/versementsLibresProgrammes';
    }
}
