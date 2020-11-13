<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;

class GeneraliScheduledFreePaymentSuspendClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/transaction/suspensionVersementsLibresProgrammes
     * Init a scheduled free payment suspend request.
     *
     * @method init
     *
     * @param string $contractNumber
     *
     * @return ApiResponse
     */
    public function init(string $contractNumber): ApiResponse
    {
        return $this->getApiResponse('POST', '', [
            'body' => $this->serialize([
                'contexte' => $this->getContext([
                    'numContrat' => $contractNumber,
                ]),
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
