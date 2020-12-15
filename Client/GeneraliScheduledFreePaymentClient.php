<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\RetourConsultationVersementLibreProgramme;
use Mpp\GeneraliClientBundle\Model\RetourValidation;
use Mpp\GeneraliClientBundle\Model\VersementsLibresProgrammes;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliScheduledFreePaymentClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/transaction/versementsLibresProgrammes/donnees
     * Retrieve scheduled free payment data.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function getData(array $context = []): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('numContrat')
            ->setDefined('elementsAttendus')
        ;

        return $this->getApiResponse(RetourConsultationVersementLibreProgramme::class, 'POST', '/donnees', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementsLibresProgrammes/initier
     * Init a partial repurchase request.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function init(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired(['numContrat'])
        ;

        return $this->getApiResponse(null, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementsLibresProgrammes/verifier.
     * Check a partial repruchase request.
     *
     * @param array $context
     * @param VersementsLibresProgrammes $scheduledFreePayment
     *
     * @return ApiResponse
     */
    public function check(array $context = [], VersementsLibresProgrammes $scheduledFreePayment): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/verifier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($context),
                'versementsLibresProgrammes' => $scheduledFreePayment,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementsLibresProgrammes/confirmer.
     * Confirm a partial repruchase request.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function confirm(array $context = []): ApiResponse
    {
        return $this->getApiResponse(RetourValidation::class, 'POST', '/confirmer', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($context),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementsLibresProgrammes/finaliser.
     * Finalize a partial repruchase request.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function finalize(array $context = []): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/finaliser', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($context),
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
