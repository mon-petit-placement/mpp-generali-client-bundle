<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\ModifVersementLibreProgrammes;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliScheduledFreePaymentEditClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/transaction/modificationVersementsLibresProgrammes/initier
     * Init a scheduled free payment edit request.
     *
     * @return ApiResponse
     */
    public function init(): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext(),
            ]),
        ]);
    }

    /**
     * POST /v1.0/transaction/modificationVersementsLibresProgrammes/verifier
     * Check a scheduled free payment edit request.
     *
     * @param Contexte                      $context
     * @param ModifVersementLibreProgrammes $scheduledFreePaymentEdit
     *
     * @return ApiResponse
     */
    public function check(Contexte $context, ModifVersementLibreProgrammes $scheduledFreePaymentEdit): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/verifier', [
            'body' => json_encode([
                'contexte' => $context,
                'modifVersementLibreProgrammes' => $scheduledFreePaymentEdit,
            ]),
        ]);
    }

    /**
     * POST /v1.0/transaction/modificationVersementsLibresProgrammes/confirmer
     * Confirm a scheduled free payment edit request.
     *
     * @param Contexte $context
     * @param array    $options
     *
     * @return ApiResponse
     */
    public function confirm(Contexte $context, array $options = []): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefaults([
                'genererUnBulletin' => true,
                'envoyerUnMailClient' => true,
                'cloturerLeDossier' => true,
            ])
        ;

        return $this->getApiResponse(null, 'POST', '/confirmer', [
            'body' => json_encode([
                'contexte' => $context,
                'options' => $resolver->resolve($options),
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
