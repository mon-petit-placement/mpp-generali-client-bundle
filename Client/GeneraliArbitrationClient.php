<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Arbitrage;
use Mpp\GeneraliClientBundle\Model\RetourConsultationArbitrage;
use Mpp\GeneraliClientBundle\Model\RetourFinalisation;
use Mpp\GeneraliClientBundle\Model\RetourFinalisationOrdre;
use Mpp\GeneraliClientBundle\Model\RetourValidation;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliArbitrationClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/transaction/arbitrage/donnees
     * Retrieve arbitration data.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function getData(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('numContrat')
            ->setDefined(['elementsAttendus', 'codeApporteur'])
        ;

        return $this->getApiResponse(RetourConsultationArbitrage::class, 'POST', '/donnees', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/arbitrage/initier
     * Init an arbitration request.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function init(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('numContrat')
            ->setDefined(['codeApporteur'])
        ;

        return $this->getApiResponse(null, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/arbitrage/verifier
     * Check arbitration request.
     *
     * @param array       $context
     * @param Arbitrage   $arbitration
     *
     * @return ApiResponse
     */
    public function check(Arbitrage $arbitration, array $context = []): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/verifier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($context),
                'arbitrage' => $arbitration,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/arbitrage/confirmer
     * Confirm an arbitration request.
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
     * POST /v2.0/transaction/arbitrage/finaliser
     * Finalize an arbitration request.
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
        return 'arbitration';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/transaction/arbitrage';
    }
}
