<?php

namespace Mpp\GeneraliClientBundle\Client;

class GeneraliScheduledFreePaymentEditClient extends AbstractGeneraliClient
{
    public function init(Context $context, ScheduledFreePayment $scheduledFreePayment): ApiResponse
    {
        return $this->request('POST', '/initier', [
            'body' => json_encode([
                'contexte' => $context->arrayToInitiate(),
                'modifVersementLibreProgrammes' => $scheduledFreePayment->toEditArray(),
            ]),
        ]);
    }

    public function check(Context $context): ApiResponse
    {
        return $this->request('POST', '/verifier', [
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

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'scheduled_free_payment_edit';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v1.0/transaction/modificationVersementsLibresProgrammes';
    }
}
