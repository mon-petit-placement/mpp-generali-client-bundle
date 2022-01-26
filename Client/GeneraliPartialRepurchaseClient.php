<?php

namespace Mpp\GeneraliClientBundle\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\RachatPartiel;
use Mpp\GeneraliClientBundle\Model\RetourConsultationRachatPartiel;
use Mpp\GeneraliClientBundle\Model\RetourValidation;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliPartialRepurchaseClient extends AbstractGeneraliClient
{

    /**
     * POST /v1.0/donnees/rachatpartiel/initier
     * Init a partial repurchase request.
     *
     * @param array $context
     *
     * @return ApiResponse
     */
    public function init(array $context): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired(['numContrat', 'utilisateur'])
            ->setAllowedValues('utilisateur', [Contexte::UTILISATEUR_CLIENT, Contexte::UTILISATEUR_APPORTEUR])
            ->setDefined(['codeApporteur'])
        ;

        return $this->getApiResponse(null, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
            ]),
        ]);
    }

    /**
     * POST /v1.0/donnees/rachatpartiel/verifier
     * Check a partial repurchase request.
     *
     * @param RachatPartiel $partialRepurchase
     * @param array         $context
     *
     * @return ApiResponse
     */
    public function check(RachatPartiel $partialRepurchase, array $context = []): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired(['statut', 'numContrat', 'utilisateur'])
            ->setAllowedValues('utilisateur', [Contexte::UTILISATEUR_CLIENT, Contexte::UTILISATEUR_APPORTEUR])
            ->setDefined(['codeApporteur'])
        ;

        return $this->getApiResponse(null, 'POST', '/verifier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($context)),
                'rachatPartiel' => $partialRepurchase,
            ]),
        ]);
    }

    /**
     * POST /v1.0/donnees/rachatpartiel/confirmer
     * Confirm a partial repurchase request.
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
            'body' => $this->serialize([
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
        return 'partial_repurchase';
    }

    /**
     * {@inheritdoc}
     */
    public function getBasePath(): string
    {
        return '/v1.0/transaction/rachatpartiel';
    }
}
