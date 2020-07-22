<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\HttpClient;

use GuzzleHttp\Client;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Mpp\GeneraliClientBundle\OptionsResolver\ContexteResolver;
use Mpp\GeneraliClientBundle\Model\Subscription;

/**
 * Class GeneraliHttpClient
 * @package Mpp\GeneraliClientBundle\HttpClient
 */
class GeneraliHttpClient
{
    /** @var Client */
    private $httpClient;

    /**
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function initiateSubscription(string $product, array $parameters)
    {
        return $this->stepSubscription(Subscription::STEP_INITIATE, $product,  $parameters);
    }

    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function checkSubscription(string $product, array $parameters)
    {
        return $this->stepSubscription(Subscription::STEP_CHECK, $product,  $parameters);
    }

    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function confirmSubscription(string $product, array $parameters)
    {
        return $this->stepSubscription(Subscription::STEP_CONFIRM, $product,  $parameters);
    }
    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function finalizeSubscription(string $product, array $parameters)
    {
        return $this->stepSubscription(Subscription::STEP_FINALIZE, $product,  $parameters);
    }


    /**
     * @param string $step
     * @param string $product
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function stepSubscription(string $step, string $product, array $parameters)
    {
        if (!isset(Subscription::STEPS_MAP[$step])){
            throw new \UnexpectedValueException('Step must be part of these: ' . implode(", ", Subscription::AVAILABLE_STEPS));
        }
        if (!isset(Subscription::PRODUCTS_MAP[$product])){
            throw new \UnexpectedValueException('Product must be part of these: ' . implode(", ", Subscription::AVAILABLE_PRODUCTS));
        }

        $resolver = new OptionsResolver();
        $this->configureSubscriptionParameters($resolver);

        $resolvedParameters = $resolver->resolve($parameters);

        dump($resolvedParameters);
        dump(json_encode($resolvedParameters));

        return $this->httpClient->request(
            'POST',
            sprintf('/epart/v2.0/transaction/%s/%s', Subscription::PRODUCTS_MAP[$product], Subscription::STEPS_MAP[$step]),
            [
                'body'=> json_encode($resolvedParameters),
            ]
        );
    }

    /**
     * @param OptionsResolver $resolver
     */
    private function configureSubscriptionParameters(OptionsResolver $resolver)
    {
         $resolver
             ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function (Options $options, $value) {
                 return $this->resolveContext($value);
             })
             ->setRequired('souscription')->setAllowedTypes('souscription', ['array'])->setNormalizer('souscription', function(Options $options, $value) {
                 return $this->resolveSouscription($value);
             })
             ->setRequired('dateSignature')->setAllowedTypes('dateSignature', ['\DateTime'])->setNormalizer('dateSignature', function(Options $options, $value) {
                 return $value->format('Y-m-d');
             })
             ->setDefault('destinataireVirement', null)->setAllowedTypes('destinataireVirement', ['string', 'null'])
             ->setDefault('codeGarantiePrevoyance', null)->setAllowedTypes('codeGarantiePrevoyance', ['string'])
             ->setDefault('commentaire', null)->setAllowedTypes('commentaire', ['string'])
             ->setDefault('dematerialisationCourriers', null)->setAllowedTypes('dematerialisationCourriers', ['bool'])
         ;
    }

    /**
     * @param $value
     */
    private function resolveSouscription($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setRequired('referencesExternes')->setAllowedTypes('referencesExternes', ['array'])->setNormalizer('referencesExternes', function (Options $options, $value) {
                return $this->resolveReferencesExternes($value);
            })
            ->setRequired('typePaiement')->setAllowedTypes('typePaiement', ['string'])
            ->setRequired('typeReglementVersementPonctuel')->setAllowedTypes('typeReglementVersementPonctuel', ['string'])
            ->setDefault('ouvrirAccesEnLigne', true)->setAllowedTypes('ouvrirAccesEnLigne', ['bool'])
            ->setDefined('souscripteur')->setAllowedTypes('souscripteur', ['array'])->setNormalizer('souscripteur', function(Options $options, $value) {
                return $this->resolveSouscripteur($value);
            })
            ->setDefined('dossierClient')->setAllowedTypes('dossierClient', ['array'])->setNormalizer('dossierClient', function(Options $options, $value) {
                return $this->resolveDossierClient($value);
            })
            ->setDefined('versementInitial')->setAllowedTypes('versementInitial', ['array'])->setNormalizer('versementInitial', function(Options $options, $value) {
                return $this->resolveVersementInitial($value);
            })
            ->setDefined('versementsLibresProgrammes')->setAllowedTypes('versementsLibresProgrammes', ['array'])->setNormalizer('versementsLibresProgrammes', function(Options $options, $value) {
                return $this->resolveVersementLibreProgrammes($value);
            })
            ->setDefined('limitationMoinsValuesV1')->setAllowedTypes('limitationMoinsValuesV1', ['array'])->setNormalizer('limitationMoinsValuesV1', function(Options $options, $value) {
                return $this->resolveLimitationMoinsValuesV1($value);
            })
            ->setDefined('limitationMoinsValues')->setAllowedTypes('limitationMoinsValues', ['array'])->setNormalizer('limitationMoinsValues', function(Options $options, $value) {
                return $this->resolveLimitationMoinsValues($value);
            })
            ->setDefined('duree')->setAllowedTypes('duree', ['array'])->setNormalizer('duree', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('typeDuree')->setAllowedTypes('typeDuree', ['string'])
                ;

                return $resolver->resolve($value);
            })
            ->setDefined('fiscalite')->setAllowedTypes('fiscalite', ['string'])
            ->setDefined('clauseBeneficiaireDeces')->setAllowedTypes('clauseBeneficiaireDeces', ['array'])->setNormalizer('clauseBeneficiaireDeces', function(Options $options, $value) {
                return $this->resolveClauseBeneficiaireDeces($value);
            })
            ->setDefined('modeGestion')->setAllowedTypes('modeGestion', ['array'])->setNormalizer('modeGestion', function(Options $options, $value) {
                return $this->resolveModeGestion($value);
            })
            ->setDefined('reglement')->setAllowedTypes('reglement', ['array'])->setNormalizer('reglement', function(Options $options, $value) {
                return $this->resolveReglement($value);
            })
            ->setDefined('ibanContractant')->setAllowedTypes('ibanContractant', ['array'])->setNormalizer('ibanContractant', function(Options $options, $value) {
                return $this->resolveIbanContractant($value);
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    public function resolveIbanContractant($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setDefined('nomBanque')->setAllowedTypes('nomBanque', ['string'])
            ->setDefined('titulaire')->setAllowedTypes('titulaire', ['string'])
            ->setDefined('iban')->setAllowedTypes('iban', ['string'])
            ->setDefined('ibanContractant')->setAllowedTypes('ibanContractant', ['string'])
            ->setDefined('bic')->setAllowedTypes('bic', ['string'])
            ->setDefined('autorisationPrelevement')->setAllowedTypes('autorisationPrelevement', ['bool'])
            ->setDefined('adresseAgenceBancaire')->setAllowedTypes('adresseAgenceBancaire', ['array'])->setNormalizer('adresseAgenceBancaire', function(Options $options, $value){
                return $this->resolveAdresseAgenceBancaire($value);
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    public function resolveAdresseAgenceBancaire($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setDefault('adresse1PointRemise', '')->setAllowedTypes('adresse1PointRemise', ['string'])
            ->setDefault('adresse2PointGeographique', '')->setAllowedTypes('adresse2PointGeographique', ['string'])
            ->setDefined('adresse3LibelleVoie')->setAllowedTypes('adresse3LibelleVoie', ['string'])
            ->setDefault('adresse4LieuDitBP', '')->setAllowedTypes('adresse4LieuDitBP', ['string'])
            ->setDefined('codePostal')->setAllowedTypes('codePostal', ['int'])
            ->setDefault('commune', '')->setAllowedTypes('commune', ['string'])
            ->setDefined('codePays')->setAllowedTypes('codePays', ['string'])
            ->setDefined('nePasNormaliser')->setAllowedTypes('nePasNormaliser', ['bool'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $values
     * @return array
     */
    private function resolveReglement($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('originesFonds')->setAllowedTypes('originesFonds', ['array'])->setNormalizer('originesFonds', function (Options $options, $values) {
                $resolver = new OptionsResolver();
                $resolvedValues = [];

                $resolver
                    ->setDefined('code')->setAllowedValues('code', Subscription::AVAILABLE_FUNDS_ORIGIN)->setNormalizer('code', function (Options $options, $value){
                        return Subscription::FUNDS_ORIGIN_MAP[$value]['code'];
                    })
                    ->setDefined('montant')->setAllowedTypes('montant', ['int'])
                    ->setDefined('date')->setAllowedTypes('date', ['\DateTime'])->setNormalizer('date', function(Options $options, $value) {
                        return $value->format('Y-m-d');
                    })
                    ->setDefined('precision')->setAllowedTypes('precision', ['string'])
                ;
                foreach ($values as $value) {
                    $resolvedValues[] = $resolver->resolve($value);
                }

                return $resolvedValues;

            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $values
     * @return array
     */
    private function resolveModeGestion($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefined('codeModeGestion')->setAllowedTypes('codeModeGestion', ['string'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveClauseBeneficiaireDeces($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setDefined('denouement')->setAllowedTypes('denouement', ['string']) //Subscription::TYPESDENOUEMENT[$this->faker->numberBetween(0, count(Subscription::TYPESDENOUEMENT) - 1)]['code'],
            ->setDefined('code')->setAllowedTypes('code', ['string']) //Subscription::CLAUSESBENEFS[$this->faker->numberBetween(0, count(Subscription::CLAUSESBENEFS) - 1)]['code'],
            ->setDefined('texteLibre')->setAllowedTypes('texteLibre', ['string'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveLimitationMoinsValues($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setDefined('tauxDeclenchement')->setAllowedTypes('tauxDeclenchement', ['int'])
            ->setDefined('codeFondsCible')->setAllowedTypes('codeFondsCible', ['string'])
            ->setDefined('codeFondsAExclure')->setAllowedTypes('codeFondsAExclure', ['array'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveLimitationMoinsValuesV1($value)
    {
        $resolver = new OptionsResolver();
        $resolvedValue = [];

        $resolver
            ->setRequired('securisationFonds')->setAllowedTypes('securisationFonds', ['array'])->setNormalizer('securisationFonds', function(Options $options, $values) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('codeFondsSource')->setAllowedTypes('codeFondsSource', ['string'])
                    ->setRequired('codeFondsCible')->setAllowedTypes('codeFondsCible', ['string'])
                    ->setRequired('tauxDeclenchement')->setAllowedTypes('tauxDeclenchement', ['int'])
                ;
                foreach ($values as $value){
                    $resolvedValue[] = $resolver->resolve($value);
                }

                return $resolvedValue;
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     */
    private function resolveVersementLibreProgrammes($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('repartition')->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function (Options $options, $values) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('codeFonds')->setAllowedTypes('codeFonds', ['string'])
                    ->setRequired('montant')->setAllowedTypes('montant', ['int'])
                    ->setRequired('taux')->setAllowedTypes('taux', ['int'])
                    ->setRequired('duree')->setAllowedTypes('duree', ['int'])
                    ->setRequired('numeroEngagement')->setAllowedTypes('numeroEngagement', ['int'])
                    ->setRequired('avenantValide')->setAllowedTypes('avenantValide', ['bool'])
                ;
                $resolvedValue = [];
                foreach ($values as $value) {
                    $resolvedValue[] = $resolver->resolve($value);
                }

                return $resolvedValue;
            })
            ->setRequired('jourPrelevement')->setAllowedVALUES('jourPrelevement', Subscription::AVAILABLE_BANK_DEBIT)->setNormalizer('jourPrelevement', function (Options $options, $value){
                return Subscription::BANK_DEBIT_MAP[$value];
            })
            ->setRequired('vlpMontant')->setAllowedTypes('vlpMontant', ['array'])->setNormalizer('vlpMontant', function(Options $options, $value) {
                $resolver = new OptionsResolver();

                $resolver
                    ->setRequired('montant')->setAllowedTypes('montant', ['int'])
                    ->setRequired('periodicite')->setAllowedTypes('periodicite', ['string'])
                ;

                return $resolver->resolve($value);
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveVersementInitial($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setDefined('montant', 0)->setAllowedTypes('montant', ['int'])
            ->setDefined('repartition')->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function (Options $options, $values) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setDefined('codeFonds')->setAllowedTypes('codeFonds', ['string'])
                    ->setDefined('montant')->setAllowedTypes('montant', ['int'])
                    ->setDefined('taux')->setAllowedTypes('taux', ['int'])
                    ->setDefined('duree')->setAllowedTypes('duree', ['int'])
                    ->setDefined('numeroEngagement')->setAllowedTypes('numeroEngagement', ['int'])
                    ->setDefined('avenantValide')->setAllowedTypes('avenantValide', ['bool'])
                ;
                foreach ($values as $value) {
                    $resolvedValue[] = $resolver->resolve($value);
                }

                return $resolvedValue;
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveDossierClient($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setRequired('situationPatrimoniale')->setAllowedTypes('situationPatrimoniale', ['array'])->setNormalizer('situationPatrimoniale', function(Options $options, $value) {
                return $this->resolveSituationPatrimoniale($value);
            })
            ->setRequired('objectifsVersement')->setAllowedTypes('objectifsVersement', ['array'])->setNormalizer('objectifsVersement', function(Options $options, $value) {
                return $this->resolveObjectifsVersement($value);
            })
            ->setRequired('originePaiement')->setAllowedTypes('originePaiement', ['array'])->setNormalizer('originePaiement', function(Options $options, $value) {
                return $this->resolveOriginePaiement($value);
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveOriginePaiement($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setRequired('moyenPaiementFrancais')->setAllowedTypes('moyenPaiementFrancais', ['bool'])
            ->setRequired('paiementParTiersPayeur')->setAllowedTypes('paiementParTiersPayeur', ['bool'])
            ->setRequired('tiersPayeur')->setAllowedTypes('tiersPayeur', ['array'])->setNormalizer('tiersPayeur', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('personnePhysique')->setAllowedTypes('personnePhysique', ['bool'])
                    ->setRequired('nom')->setAllowedTypes('nom', ['string'])
                    ->setRequired('prenom')->setAllowedTypes('prenom', ['string'])
                    ->setRequired('adresse')->setAllowedTypes('adresse', ['string'])
                    ->setRequired('parenteAvecSouscripteur')->setAllowedTypes('parenteAvecSouscripteur', ['bool'])
                    ->setDefined('precisionLienAvecSouscripteur')->setAllowedTypes('precisionLienAvecSouscripteur', ['string'])
                    ->setDefined('motifIntervention')->setAllowedTypes('motifIntervention', ['string'])
                    ->setDefined('pieceIdentite')->setAllowedTypes('pieceIdentite', ['array'])->setNormalizer('pieceIdentite', function (Options $options, $value) {
                        $resolver = new OptionsResolver();

                        $resolver
                            ->setDefined('codePieceIdentite')->setAllowedValues('codePieceIdentite', Subscription::AVAILABLE_IDENTITY_DOC_2)->setNormalizer('codePieceIdentite', function (Options $options, $value){
                                return Subscription::IDENTITY_DOC_2_MAP[$value];
                            })
                            ->setDefined('dateValidite')->setAllowedTypes('dateValidite', ['\DateTime'])->setNormalizer('dateValidite', function(Options $options, $value) {
                                return $value->format('Y-m-d');
                            })
                        ;

                        return $resolver->resolve($value);
                    })
                ;

                return $resolver->resolve($value);
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $values
     * @return array
     */
    private function resolveObjectifsVersement($values)
    {
        $resolver = new OptionsResolver();
        $resolvedValues = [];
        $resolver
            ->setDefined('codeObjectif')->setAllowedTypes('codeObjectif', ['string'])
            ->setDefined('precision')->setAllowedTypes('precision', ['string'])
        ;
        foreach ($values as $value){
            $resolvedValues[] = $resolver->resolve($value);
        }

        return $resolvedValues;
    }

    private function resolveSituationPatrimoniale($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setRequired('codeTrancheRevenu')->setAllowedValues('codeTrancheRevenu', Subscription::AVAILABLE_INCOME_BRACKETS)->setNormalizer('codeTrancheRevenu', function (Options $options, $value){
                return Subscription::INCOME_BRACKETS_MAP[$value]['code'];
            })
            ->setRequired('codeTranchePatrimoine')->setAllowedValues('codeTranchePatrimoine', Subscription::AVAILABLE_PERSONAL_ASSETS)->setNormalizer('codeTranchePatrimoine', function (Options $options, $value){
                return Subscription::PERSONAL_ASSETS_MAP[$value]['code'];
            })
            ->setRequired('montantRevenu')->setAllowedTypes('montantRevenu', ['int'])
            ->setRequired('montantPatrimoine')->setAllowedTypes('montantPatrimoine', ['int'])
            ->setDefined('originePatrimoniale')->setAllowedTypes('originePatrimoniale', ['array'])->setNormalizer('originePatrimoniale', function(Options $options, $values){
                $resolver = new OptionsResolver();
                $resolvedValue = [];
                $resolver
                    ->setRequired('code')->setAllowedValues('code', Subscription::AVAILABLE_HERITAGE_ORIGIN)->setNormalizer('code', function (Options $options, $value){
                        return Subscription::HERITAGE_ORIGIN_MAP[$value]['code'];
                    })
                    ->setRequired('precision')->setAllowedTypes('precision', ['string'])
                ;
                foreach ($values as $value){
                    $resolvedValue[] = $resolver->resolve($value);
                }

                return $resolvedValue;
            })
            ->setDefined('repartitionPatrimoniale')->setAllowedTypes('repartitionPatrimoniale', ['array'])->setNormalizer('repartitionPatrimoniale', function(Options $options, $values){
                $resolver = new OptionsResolver();
                $resolvedValue = [];
                $resolver
                    ->setRequired('code')->setAllowedValues('code', Subscription::AVAILABLE_HERITAGE_DISTRIBUTION)->setNormalizer('code', function (Options $options, $value){
                        return Subscription::HERITAGE_DISTRIBUTION_MAP[$value]['code'];
                    })
                    ->setRequired('pourcentage')->setAllowedTypes('pourcentage', ['int', 'float'])
                    ->setRequired('precision')->setAllowedTypes('precision', ['string'])
                ;
                foreach ($values as $value){
                    $resolvedValue[] = $resolver->resolve($value);
                }

                return $resolvedValue;
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     */
    private function resolveSouscripteur($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setRequired('noms')->setAllowedTypes('noms', ['array'])->setNormalizer('noms', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('codeCivilite')->setAllowedValues('codeCivilite', Subscription::AVAILABLE_CIVILITY)->setNormalizer('codeCivilite', function (Options $options, $value){
                        return Subscription::CIVILITY_MAP[$value]['code'];
                    })
                    ->setRequired('prenom')->setAllowedTypes('prenom', ['string'])
                    ->setRequired('nom')->setAllowedTypes('nom', ['string'])
                    ->setDefined('nomNaissance')->setAllowedTypes('nomNaissance', ['string'])
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('residenceFiscale')->setAllowedTypes('residenceFiscale', ['array'])->setNormalizer('residenceFiscale', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('codePays')->setAllowedValues('codePays', Subscription::FISCALITY_RESIDENCE_COUNTRY_MAP)->setNormalizer('codePays', function (Options $options, $value){

                    })
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('naissance')->setAllowedTypes('naissance', ['array'])->setNormalizer('naissance', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('dateNaissance')->setAllowedTypes('dateNaissance', ['\DateTime'])
                    ->setRequired('lieuNaissance')->setAllowedTypes('lieuNaissance', ['string'])
                    ->setRequired('paysNaissance')->setAllowedTypes('paysNaissance', ['string'])
                    ->setDefined('codeDepartementNaissance')->setAllowedTypes('codeDepartementNaissance', ['string'])
                    ->setDefined('codeInseeCommuneNaissance')->setAllowedTypes('codeInseeCommuneNaissance', ['int'])
                    ->setDefined('codePostal')->setAllowedTypes('codePostal', ['int'])
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('nationalite')->setAllowedTypes('nationalite', ['string'])
            ->setDefined('complement')->setAllowedTypes('complement', ['array'])->setNormalizer('complement', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('situationFamiliale')->setAllowedValues('situationFamiliale', Subscription::AVAILABLE_FAMILY_SITUATION)->setNormalizer('situationFamiliale', function (Options $options, $value){
                        return Subscription::FAMILY_SITUATION_MAP[$value]['code'];
                    })
                    ->setRequired('situationProfessionnelle')->setAllowedValues('situationProfessionnelle', Subscription::AVAILABLE_PROFESSIONAL_SITUATION)->setNormalizer('situationProfessionnelle', function (Options $options, $value){
                        return Subscription::PROFESSIONAL_SITUATION_MAP[$value]['code'];
                    })
                    ->setRequired('regimeMatrimonial')->setAllowedValues('regimeMatrimonial', Subscription::AVAILABLE_MATRIMONIAL_REGIME)->setNormalizer('regimeMatrimonial', function (Options $options, $value){
                        return Subscription::MATRIMONIAL_REGIME_MAP[$value]['code'];
                    })
                    ->setRequired('csp')->setAllowedValues('csp', Subscription::AVAILABLE_CSPS_CODE)->setNormalizer('csp', function (Options $options, $value){
                        return Subscription::CSPS_CODE_MAP[$value]['code'];
                    })
                    ->setRequired('profession')->setAllowedTypes('profession', ['string'])
                    ->setRequired('codeNaf')->setAllowedValues('codeNaf', Subscription::AVAILABLE_NAF_CODE)->setNormalizer('codeNaf', function (Options $options, $value){
                        return Subscription::NAF_CODE_MAP[$value]['code'];
                    })
                    ->setRequired('siret')->setAllowedTypes('siret', ['int'])
                    ->setRequired('nomEmployeur')->setAllowedTypes('nomEmployeur', ['string'])
                    ->setRequired('cspDerniereProfession')->setAllowedValues('cspDerniereProfession', Subscription::AVAILABLE_CSPS_CODE)->setNormalizer('cspDerniereProfession', function (Options $options, $value){
                        return Subscription::CSPS_CODE_MAP[$value]['code'];
                    })
                    ->setRequired('dateDebutInactivite')->setAllowedTypes('dateDebutInactivite', ['\DateTime'])->setNormalizer('dateDebutInactivite', function(Options $options, $value) {
                        return $value->format('Y-m-d');
                    })
                ;

                return $resolver->resolve($value);
            })
            ->setDefined('contact')->setAllowedTypes('contact', ['array'])->setNormalizer('contact', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('adressePostale')->setAllowedTypes('adressePostale', ['array'])->setNormalizer('adressePostale', function (Options $options, $value) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setDefault('adresse1PointRemise', '')->setAllowedTypes('adresse1PointRemise', ['string'])
                            ->setDefault('adresse2PointGeographique', '')->setAllowedTypes('adresse2PointGeographique', ['string'])
                            ->setDefault('adresse4LieuDitBP', '')->setAllowedTypes('adresse4LieuDitBP', ['string'])
                            ->setDefined('adresse3LibelleVoie')->setAllowedTypes('adresse3LibelleVoie', ['string'])
                            ->setDefined('codePostal')->setAllowedTypes('codePostal', ['int'])
                            ->setDefined('commune')->setAllowedTypes('commune', ['string'])
                            ->setDefined('codePays')->setAllowedTypes('codePays', ['string'])
                            ->setDefined('nePasNormaliser')->setAllowedTypes('nePasNormaliser', ['bool'])
                        ;

                        return $resolver->resolve($value);
                    })
                    ->setRequired('telephone')->setAllowedTypes('telephone', ['string'])
                    ->setRequired('telephonePortable')->setAllowedTypes('telephonePortable', ['string'])
                    ->setDefined('email')->setAllowedTypes('email', ['string'])
                ;

                return $resolver->resolve($value);
            })
            ->setDefined('ppe')->setAllowedTypes('ppe', ['array'])->setNormalizer('ppe', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('etatPPE')->setAllowedTypes('etatPPE', ['array'])->setNormalizer('etatPPE', function (Options $options, $value) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setDefault('indicateur', false)->setAllowedTypes('indicateur', ['bool'])
                        ;

                        return $resolver->resolve($value);
                    })
                    ->setRequired('etatPPEFamille')->setAllowedTypes('etatPPEFamille', ['array'])->setNormalizer('etatPPEFamille', function (Options $options, $value) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setDefault('indicateur', false)->setAllowedTypes('indicateur', ['bool'])
                        ;

                        return $resolver->resolve($value);
                    })
                ;

                return $resolver->resolve($value);
            })
            ->setDefined('fatca')->setAllowedTypes('fatca', ['array'])->setNormalizer('fatca', function(Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setDefault('citoyenUSA', false)->setAllowedTypes('citoyenUSA', ['bool'])
                    ->setDefault('residenceUSA', false)->setAllowedTypes('residenceUSA', ['bool'])
                ;

                return $resolver->resolve($value);
            })
            ->setDefined('pieceIdentite')->setAllowedTypes('pieceIdentite', ['array'])->setNormalizer('pieceIdentite', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('codePieceIdentite')->setAllowedValues('codePieceIdentite', Subscription::AVAILABLE_IDENTITY_DOC_2)->setNormalizer('codePieceIdentite', function(Options $options, $value){
                        return Subscription::IDENTITY_DOC_2_MAP[$value];
                    })
                    ->setRequired('dateValidite')->setAllowedTypes('dateValidite', ['\DateTime'])->setNormalizer('dateValidite', function(Options $options, $value) {
                        return $value->format('Y-m-d');
                    })
                ;

                return $resolver->resolve($value);
            })
            ->setDefined('capaciteJuridique')->setAllowedTypes('capaciteJuridique', ['string'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveContext($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setRequired('codeApporteur')->setAllowedTypes('codeApporteur', ['string'])
            ->setRequired('codeSubscription')->setAllowedTypes('codeSubscription', 'string')
            ->setDefault('elementsAttendus', [])->setAllowedTypes('elementsAttendus', ['array'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     */
    private function resolveReferencesExternes($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setDefined('refExterne')->setAllowedTypes('refExterne', ['string'])
            ->setDefined('refExterne2')->setAllowedTypes('refExterne2', ['string'])
        ;

        return $resolver->resolve($value);
    }
}