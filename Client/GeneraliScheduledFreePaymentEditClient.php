<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\ModifVersementLibreProgrammes;
use Mpp\GeneraliClientBundle\Model\RetourValidation;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliScheduledFreePaymentEditClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/transaction/modificationVersementsLibresProgrammes/initier
     * Init a scheduled free payment edit request.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function init(array $context = [], string $numContract): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', sprintf('/initier/%s', $numContract), [
            'body' => $this->serialize([
                'contexte' => $this->getContext($context),
            ]),
        ]);
    }

    /**
     * POST /v1.0/transaction/modificationVersementsLibresProgrammes/verifier
     * Check a scheduled free payment edit request.
     *
     * @param array                         $context
     * @param ModifVersementLibreProgrammes $scheduledFreePaymentEdit
     *
     * @return ApiResponse
     */
    public function check(array $context = [], ModifVersementLibreProgrammes $scheduledFreePaymentEdit, string $numContract): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', sprintf('/verifier/%s', $numContract), [
            'body' => json_encode([
                'contexte' => $this->getContext($context),
                'modifVersementLibreProgrammes' => $scheduledFreePaymentEdit,
            ]),
        ]);
    }

    /**
     * POST /v1.0/transaction/modificationVersementsLibresProgrammes/confirmer
     * Confirm a scheduled free payment edit request.
     *
     * @param array $context
     * @param array $options
     *
     * @return ApiResponse
     */
    public function confirm(array $context = [], array $options = []): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setDefaults([
                'genererUnBulletin' => true,
                'envoyerUnMailClient' => true,
                'cloturerLeDossier' => true,
            ])
        ;

        return $this->getApiResponse(RetourValidation::class, 'POST', '/confirmer', [
            'body' => json_encode([
                'contexte' => $this->getContext($context),
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
