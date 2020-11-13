<?php

namespace Mpp\GeneraliClientBundle\HttpClient;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\RachatPartiel;
use Mpp\GeneraliClientBundle\Model\RetourConsultationRachatPartiel;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneraliPartialRepurchaseClient extends AbstractGeneraliClient
{
    /**
     * POST /v1.0/donnees/rachatpartiel
     * Retrieve partial repurchase data.
     *
     * @method getData
     *
     * @param array $contextOptions
     *
     * @return ApiResponse
     */
    public function getData(array $contextOptions): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired('numContrat')
            ->setDefined('elementsAttendus')
        ;

        return $this->getApiResponse(RetourConsultationRachatPartiel::class, 'POST', '/', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($contextOptions)),
            ]),
        ]);
    }

    /**
     * POST /v1.0/donnees/rachatpartiel/all
     * Retrieve all partial repurchase data.
     *
     * @method getAllData
     *
     * @param array $contextOptions
     *
     * @return ApiResponse
     */
    public function getAllData(array $contextOptions): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired(['utilisateur', 'numContrat'])
            ->setAllowedValues('utilisateur', [Contexte::UTILISATEUR_CLIENT, Contexte::UTILISATEUR_APPORTEUR])
        ;

        return $this->getApiResponse(RetourConsultationRachatPartiel::class, 'POST', '/all', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($contextOptions)),
            ]),
        ]);
    }

    /**
     * POST /v1.0/donnees/rachatpartiel/initier
     * Init a partial repurchase request.
     *
     * @method init
     *
     * @param string $contractNumber
     *
     * @return ApiResponse
     */
    public function init(string $contractNumber): ApiResponse
    {
        return $this->getApiResponse(null, 'POST', '/initier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext([
                    'numContrat' => $contractNumber,
                ]),
            ]),
        ]);
    }

    /**
     * POST /v1.0/donnees/rachatpartiel/verifier
     * Check a partial repurchase request.
     *
     * @method check
     *
     * @param array         $contextOptions
     * @param RachatPartiel $partialRepurchase
     *
     * @return ApiResponse
     */
    public function check(array $contextOptions, RachatPartiel $partialRepurchase): ApiResponse
    {
        $resolver = (new OptionsResolver())
            ->setRequired(['statut', 'numContrat', 'utilisateur'])
            ->setAllowedValues('utilisateur', [Contexte::UTILISATEUR_CLIENT, Contexte::UTILISATEUR_APPORTEUR])
        ;

        return $this->getApiResponse(null, 'POST', '/verifier', [
            'body' => $this->serialize([
                'contexte' => $this->getContext($resolver->resolve($contextOptions)),
                'rachatPartiel' => $partialRepurchase,
            ]),
        ]);
    }

    /**
     * POST /v1.0/donnees/rachatpartiel/confirmer
     * Confirm a partial repurchase request.
     *
     * @method confirm
     *
     * @param Context $context
     *
     * @return ApiResponse
     */
    public function confirm(Context $context): ApiResponse
    {
        return $this->getApiResponse1(null, 'POST', '/confirmer', [
            'body' => $this->serialize([
                'contexte' => $context,
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
        return '/v1.0/donnees/rachatpartiel';
    }
}
