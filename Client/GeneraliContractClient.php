<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliContractClient extends AbstractGeneraliClient
{
    /**
     * POST /v2.0/contrats
     * Retrieve contract data.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function getData(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('numContrat')
            ->setDefined(['codeApporteur', 'elementsAttendus'])
        ;

        return $this->getApiResponse(null, 'POST', '', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v2.0/contrats
     * Retrieve contract data.
     *
     * @param string $contractId
     * @param array $context
     *
     * @return ApiResponse
     */
    public function getAmendmentsList(string $contractId, array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('numContrat')
            ->setDefined(['codeApporteur', 'elementsAttendus'])
        ;

        return $this->getApiResponse(null, 'POST', sprintf('/%s', $contractId), [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getClientAlias(): string
    {
        return 'contract';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v2.0/contrats';
    }
}
