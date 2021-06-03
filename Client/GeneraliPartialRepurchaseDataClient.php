<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\RachatPartiel;
use Mpp\GeneraliClientBundle\Model\RetourConsultationRachatPartiel;
use Mpp\GeneraliClientBundle\Model\RetourValidation;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliPartialRepurchaseDataClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/donnees/rachatpartiel
     * Retrieve partial repurchase data.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function getData(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('utilisateur')->setAllowedValues('utilisateur', [Contexte::UTILISATEUR_CLIENT, Contexte::UTILISATEUR_APPORTEUR])
            ->setRequired('numContrat')
            ->setDefined(['codeApporteur', 'elementsAttendus'])
        ;

        return $this->getApiResponse(RetourConsultationRachatPartiel::class, 'POST', '/', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v1.0/donnees/rachatpartiel/all
     * Retrieve all partial repurchase data.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function getAllData(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired(['utilisateur', 'numContrat'])
            ->setRequired('utilisateur')->setAllowedValues('utilisateur', [Contexte::UTILISATEUR_CLIENT, Contexte::UTILISATEUR_APPORTEUR])
            ->setAllowedValues('utilisateur', [Contexte::UTILISATEUR_CLIENT, Contexte::UTILISATEUR_APPORTEUR])
            ->setDefined(['codeApporteur'])
        ;

        return $this->getApiResponse(RetourConsultationRachatPartiel::class, 'POST', '/all', [
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
        return 'partial_repurchase_data';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v1.0/donnees/rachatpartiel';
    }
}
