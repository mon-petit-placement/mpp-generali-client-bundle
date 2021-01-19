<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\RetourConsultationVersementLibre;
use Mpp\GeneraliClientBundle\Model\RetourFinalisationOrdre;
use Mpp\GeneraliClientBundle\Model\RetourValidation;
use Mpp\GeneraliClientBundle\Model\VersementLibre;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliFreePaymentClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/transaction/versementLibre/donnees
     * Retrieve free payment data.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function getData(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('numContrat')
            ->setDefined('elementsAttendus')
        ;

        return $this->getApiResponse(RetourConsultationVersementLibre::class, 'POST', '/donnees', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementLibre/initier
     * Init a free payment request.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function init(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('numContrat')
            ->setDefined('numeroOrdreTransactionLiee')
        ;

        return $this->getApiResponse(null, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementLibre/verifier
     * Check a free payment request.
     *
     * @param array          $context
     * @param VersementLibre $freePayment
     *
     * @return ApiResponse
     */
    public function check(array $context = [], VersementLibre $freePayment): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/verifier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($context),
                'versementLibre' => $freePayment,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/versementLibre/confirmer
     * Confirm a free payment request.
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
     * POST /v2.0/transaction/versementLibre/finaliser.
     * Finalize a free payment request.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function finalize(array $context = []): ApiResponse
    {
        return $this->getApiResponse(RetourFinalisationOrdre::class, 'POST', '/finaliser', [
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
