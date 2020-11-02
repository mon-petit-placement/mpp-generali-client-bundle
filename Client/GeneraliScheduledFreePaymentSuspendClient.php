<?php

namespace Mpp\GeneraliClientBundle\Client;

class GeneraliScheduledFreePaymentSuspendClient extends AbstractGeneraliClient
{
    public function init(Context $context, ScheduledFreePayment $scheduledFreePayment): ApiResponse
    {
        return $this->request('POST', sprintf('/%s', $context->getContractNumber()), [
            'body' => json_encode([
                'contexte' => $context->arrayToSuspend(),
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'scheduled_free_payment_suspend';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v1.0/transaction/suspensionVersementsLibresProgrammes';
    }
}
