<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\ConnaissanceClient;
use Mpp\GeneraliClientBundle\Model\RetourFinalisationOrdre;
use Mpp\GeneraliClientBundle\Model\RetourValidation;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliCustomerFileClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/transaction/dossierClient/donnees
     * Retrieve customer file data.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function getData(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired(['numContrat', 'codeApporteur'])
            ->setDefined('elementsAttendus')
        ;

        return $this->getApiResponse(ConnaissanceClient::class, 'POST', '/donnees', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/dossierClient/initier
     * Init a customer file request.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function init(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('numContrat')
            ->setDefined(['codeApporteur', 'elementsAttendus'])
        ;

        return $this->getApiResponse(null, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/dossierClient/verifier
     * Check a customer file request.
     *
     * @param ConnaissanceClient   $customerFile
     * @param array       $context
     *
     * @return ApiResponse
     */
    public function check(ConnaissanceClient $customerFile, array $context = []): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/verifier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($context),
                'dossierClient' => $customerFile,
            ]),
        ]);
    }

    /**
     * POST /v2.0/transaction/dossierClient/confirmer
     * Confirm a customer file request.
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
     * POST /v2.0/transaction/dossierClient/finaliser
     * Finalize a customer file request.
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
        return 'customer_file';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/transaction/dossierClient';
    }
}
