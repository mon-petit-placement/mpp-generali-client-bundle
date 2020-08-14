<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\HttpClient;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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

    public function getAvailableFunds(string $product, array $parameters)
    {
        if (!isset(Subscription::PRODUCTS_MAP[$product])){
            throw new \UnexpectedValueException('Product must be part of these: ' . implode(", ", Subscription::AVAILABLE_PRODUCTS));
        }

        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('codeApporteur')->setAllowedTypes('codeApporteur', ['string'])
                    ->setDefined('numContrat')->setAllowedTypes('numContrat', ['string'])
                    ->setDefined('elementsAttendus')->setAllowedTypes('elementsAttendus', ['array'])
                ;

                return $resolver->resolve($value);
            })
        ;
        $resolvedParameters = $resolver->resolve($parameters);

        $path =  sprintf(
            '/epart/v2.0/transaction/%s/donnees',
            Subscription::PRODUCTS_MAP[$product]
        );
        if ($product === Subscription::PRODUCT_PARTIAL_SURRENDER){
            $path .= '/all';
        }

        $response = $this->httpClient->post(
            $path, [
                'body'=> json_encode($resolvedParameters),
            ]
        );

        return json_decode($response->getBody()->getContents(), true);

    }

    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function initiate(string $product, array $parameters)
    {
        $resolver = new OptionsResolver();

        switch ($product){
            case Subscription::PRODUCT_SUBSCRIPTION:
                $this->configureSubscriptionParameters($resolver);
                break;
            case Subscription::PRODUCT_FREE_PAYMENT:
                $this->configureFreePaymentParameters($resolver);
                break;
            case Subscription::PRODUCT_SCHEDULED_FREE_PAYMENT:
                $this->configureScheduledFreePaymentParameters($resolver);
                break;
            case Subscription::PRODUCT_ARBITRATION:
                $this->configureArbitrationParameters($resolver);
                break;
            case Subscription::PRODUCT_PARTIAL_SURRENDER:
                $this->configurePartialSurrender($resolver);
                break;
        }
        $resolvedParameters = $resolver->resolve($parameters);
        dump(json_encode($resolvedParameters));

        return $this->runStep(Subscription::STEP_INITIATE, $product,  $resolvedParameters);
    }

    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function check(string $product, array $parameters)
    {
        $resolver = new OptionsResolver();
        $resolver->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function (Options $options, $value) {
            $resolver = new OptionsResolver();
            $resolver
                ->setRequired('statut')->setAllowedTypes('statut', ['string'])
                ->setDefined('codeApporteur')->setAllowedTypes('codeApporteur', ['string'])
                ->setDefined('utilisateur')->setAllowedTypes('utilisateur', ['string'])
                ->setDefined('numContrat')->setAllowedTypes('numContrat', ['string'])
            ;
            return $resolver->resolve($value);
        });
        $resolvedParameters = $resolver->resolve($parameters);

        return $this->runStep(Subscription::STEP_CHECK, $product,  $resolvedParameters);
    }

    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function confirm(string $product, array $parameters)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('statut')->setAllowedTypes('statut', ['string'])
                    ->setDefined('numContrat')->setAllowedTypes('numContrat', ['string'])
                ;

                return $resolver->resolve($value);
            })
            ->setDefined('options')->setAllowedTypes('options', ['array'])->setNormalizer('options', function(Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setDefined('genererUnBulletin')->setAllowedTypes('genererUnBulletin', ['bool'])->setDefault('genererUnBulletin', true)
                    ->setDefined('envoyerUnMailClient')->setAllowedTypes('envoyerUnMailClient', ['bool'])->setDefault('envoyerUnMailClient', true)
                    ->setDefined('cloturerLeDossier')->setAllowedTypes('cloturerLeDossier', ['bool'])->setDefault('cloturerLeDossier', true)
                ;

                return $resolver->resolve($value);
            })
        ;
        $resolvedParameters = $resolver->resolve($parameters);

        return $this->runStep(Subscription::STEP_CONFIRM, $product,  $resolvedParameters);
    }
    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function finalize(string $product, array $parameters)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('idTransaction')->setAllowedTypes('idTransaction', ['string']);
                return $resolver->resolve($value);
            });
        $resolvedParameters = $resolver->resolve($parameters);

        return $this->runStep(Subscription::STEP_FINALIZE, $product,  $resolvedParameters);
    }

    /**
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function suspendScheduledFreePayment(array $parameters)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function (Options $options, $value) {
                return $this->resolveContext($value);
            })
        ;
        $resolvedParameters = $resolver->resolve($parameters);

        return $this->runSpecificStep(
            Subscription::STEP_SCHEDULED_FREE_PAYMENT_SUSPEND,
            $resolvedParameters,
            $resolvedParameters['contexte']['numContrat']
        );
    }

    /**
     * @param string $step
     * @param string $product
     * @param array $parameters
     * @param string|null $contractCode
     */
    private function runSpecificStep(string $step, array $parameters, string $contractCode = null)
    {
        $path = '/epart/v1.0/transaction/'.Subscription::STEP_SCHEDULED_FREE_PAYMENT_MAP[$step];

        if ($contractCode){
            $path .= '/' . $contractCode;
        }

        return $this->call($path, $parameters);
    }

    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     */
    public function initiateScheduledFreePaymentEdition(array $parameters)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function(Options $options, $value){
                return $this->resolveContext($value);
            });
        $resolvedParameters = $resolver->resolve($parameters);
       return $this->runSpecificStep(
           Subscription::STEP_SCHEDULED_FREE_PAYMENT_EDIT_INITIATE,
           $resolvedParameters,
           $resolvedParameters['contexte']['numContrat']
       );
    }

    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     */
    public function checkScheduledFreePaymentEdition(array $parameters)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function(Options $options, $value){
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('codeApporteur')->setAllowedTypes('codeApporteur', ['string'])
                    ->setRequired('statut')->setAllowedTypes('statut', ['string'])
                    ->setRequired('numContrat')->setAllowedTypes('numContrat', ['string'])
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('modifVersementLibreProgrammes')->setAllowedTypes('modifVersementLibreProgrammes', ['array'])->setNormalizer('modifVersementLibreProgrammes', function (Options $options, $value){
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('versement')->setAllowedTypes('versement', ['array'])->setNormalizer('versement', function(Options $options, $value){
                        return $this->resolveVersement($value);
                    })
                    ->setRequired('repartition')->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function(Options $options, $value){
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setRequired('fondsInvestis')->setAllowedTypes('fondsInvestis', ['array'])->setNormalizer('fondsInvestis', function(Options $options, $values){
                                $resolver = new OptionsResolver();
                                $resolver
                                    ->setRequired('codeFonds')->setAllowedTypes('codeFonds', ['string'])
                                    ->setRequired('montant')->setAllowedTypes('montant', ['int'])
                                ;
                                $resolvedValues = [];
                                foreach ($values as $value){
                                    $resolvedValues[] = $resolver->resolve($value);
                                }
                                return $resolvedValues;
                            })
                        ;

                        return $resolver->resolve($value);
                    })
                ;

                return $resolver->resolve($value);
            })
        ;
        $resolvedParameters = $resolver->resolve($parameters);

       return $this->runSpecificStep(
           Subscription::STEP_SCHEDULED_FREE_PAYMENT_EDIT_CHECK,
           $resolvedParameters,
           $resolvedParameters['contexte']['numContrat']
       );
    }

    /**
     * @param string $product
     * @param array $parameters
     * @return mixed
     */
    public function confirmScheduledFreePaymentEdition(array $parameters)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function (Options $options, $value) {
                return $this->resolveContext($value);
            })
        ;
        $resolvedParameters = $resolver->resolve($parameters);

       return $this->runSpecificStep(
           Subscription::STEP_SCHEDULED_FREE_PAYMENT_EDIT_CONFIRM,
           $resolvedParameters
       );
    }

    /**
     * @param string $step
     * @param string $product
     * @param array $parameters
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function runStep(string $step, string $product, array $parameters)
    {
        if (!isset(Subscription::STEPS_MAP[$step])){
            throw new \UnexpectedValueException('Step must be part of these: ' . implode(", ", Subscription::AVAILABLE_STEPS));
        }
        if (!isset(Subscription::PRODUCTS_MAP[$product])){
            throw new \UnexpectedValueException('Product must be part of these: ' . implode(", ", Subscription::AVAILABLE_PRODUCTS));
        }
        $path = sprintf('/epart/v2.0/transaction/%s/%s', Subscription::PRODUCTS_MAP[$product], Subscription::STEPS_MAP[$step]);

        if ($product === Subscription::PRODUCT_PARTIAL_SURRENDER){
            $path = sprintf(
                '/epart/v1.0/transaction/%s/%s',
                Subscription::PRODUCTS_MAP[$product],
                Subscription::STEPS_MAP[$step],
                )
            ;
            if ($step === Subscription::STEP_INITIATE){
                $path .= '/'.$parameters['contexte']['numContrat'];
            }
        }

        return $this->call($path, $parameters);
    }

    /**
     * @param string $path
     * @param array $parameters
     * @return mixed
     */
    private function call(string $path, array $parameters)
    {
        $response = $this->httpClient->post(
            $path,
            [
                'body'=> json_encode($parameters),
            ]
        );

        return json_decode($response->getBody()->getContents(), true);
    }

    /**
     * @param string $product
     * @param string $path
     * @param string $fileName
     * @param string $idTransaction
     * @param string $document
     * @return mixed
     */
    public function sendFile(string $product, string $path, string $idTransaction, string $fileName, array $document)
    {
        if (!isset(Subscription::PRODUCTS_MAP[$product])){
            throw new \UnexpectedValueException('Product must be part of these: ' . implode(", ", Subscription::AVAILABLE_PRODUCTS));
        }

        $file = new UploadedFile($path.$fileName, $fileName);
        $url = sprintf('/epart/v1.0/transaction/fournirPiece/%s/%s', $idTransaction, $document['idPieceAFournir']);
        $request = $this->httpClient->post($url, [
                'multipart' => [
                    [
                        'name'     => $document['libelle'],
                        'contents' => $file,
                        'filename' => $fileName,
                    ]
                ]
            ]
        );
        return json_decode($request->getBody()->getContents(), true);
    }

    /**
     * @param string $product
     * @param string $idTransaction
     * @return mixed
     */
    public function checkFiles(string $product, string $idTransaction)
    {
        if (!isset(Subscription::PRODUCTS_MAP[$product])){
            throw new \UnexpectedValueException('Product must be part of these: ' . implode(", ", Subscription::AVAILABLE_PRODUCTS));
        }

        $request = $this->httpClient->get(
            sprintf(
                '/epart/v1.0/transaction/piecesAFournir/list/%s/%s',
                $idTransaction,
                strtoupper(Subscription::PRODUCTS_FILES_MAP[$product])
            )
        );
        return json_decode($request->getBody()->getContents(), true);
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
             ->setDefined('dateSignature')->setAllowedTypes('dateSignature', ['\DateTime'])->setNormalizer('dateSignature', function(Options $options, $value) {
                 return $value->format('Y-m-d');
             })
             ->setDefined('destinataireVirement')->setAllowedTypes('destinataireVirement', ['string', 'null'])
             ->setDefined('codeGarantiePrevoyance')->setAllowedTypes('codeGarantiePrevoyance', ['string'])
             ->setDefined('commentaire', null)->setAllowedTypes('commentaire', ['string'])
             ->setDefined('dematerialisationCourriers', null)->setAllowedTypes('dematerialisationCourriers', ['bool'])
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
            ->setRequired('typePaiement')->setAllowedTypes('typePaiement', ['string'])
            ->setDefined('duree')->setAllowedTypes('duree', ['array'])->setNormalizer('duree', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('typeDuree')->setAllowedTypes('typeDuree', ['string'])
                    ->setDefined('duree')->setAllowedTypes('duree', ['int'])
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
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveIbanContractant($value)
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
    private function resolveAdresseAgenceBancaire($value)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setDefined('adresse1PointRemise')->setAllowedTypes('adresse1PointRemise', ['string'])
            ->setDefined('adresse2PointGeographique')->setAllowedTypes('adresse2PointGeographique', ['string'])
            ->setDefined('adresse3LibelleVoie')->setAllowedTypes('adresse3LibelleVoie', ['string'])
            ->setDefined('adresse4LieuDitBP')->setAllowedTypes('adresse4LieuDitBP', ['string'])
            ->setDefined('codePostal')->setAllowedTypes('codePostal', ['int'])
            ->setDefined('commune')->setAllowedTypes('commune', ['string'])
            ->setDefined('codePays')->setAllowedValues('codePays', Subscription::AVAILABLE_FISCALITY_COUNTRY)->setNormalizer('codePays', function(Options $options, $value){
                return Subscription::FISCALITY_COUNTRY_MAP[$value]['code'];
            })
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
            ->setDefined('originesFonds')->setAllowedTypes('originesFonds', ['array'])->setNormalizer('originesFonds', function(Options $options, $values){
                return $this->resolveOriginesFonds($values);
            })
            ->setDefined('typeReglementVersementPonctuel')->setAllowedValues('typeReglementVersementPonctuel', Subscription::AVAILABLE_PAYMENT_METHOD)->setNormalizer('typeReglementVersementPonctuel', function(Options $options, $value){
                return Subscription::PAYMENT_METHOD_MAP[$value];
            })
            ->setDefined('ibanContractant')->setAllowedTypes('ibanContractant', ['array'])->setNormalizer('ibanContractant', function(Options $options, $value) {
                return $this->resolveIbanContractant($value);
            })
            ->setDefined('destinataireVirement')->setAllowedTypes('destinataireVirement', ['string'])
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
            ->setDefined('code')->setAllowedValues('code', Subscription::AVAILABLE_BENEFICIARY_CLAUSES)->setNormalizer('code', function (Options $options, $value){
                return Subscription::BENEFICIARY_CLAUSES_MAP[$value]['code'];
            })
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
                $resolvedValue = [];
                foreach ($values as $value) {
                    $resolvedValue[] = $this->resolveFond($value);
                }

                return $resolvedValue;
            })
            ->setRequired('jourPrelevement')->setAllowedValues('jourPrelevement', Subscription::AVAILABLE_BANK_DEBIT)->setNormalizer('jourPrelevement', function (Options $options, $value){
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
            ->setDefined('montant')->setAllowedTypes('montant', ['int'])
            ->setDefined('repartition')->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function (Options $options, $values) {
                $resolvedValue = [];
                foreach ($values as $value) {
                    $resolvedValue[] = $this->resolveFond($value);
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
            ->setDefined('tiersPayeur')->setAllowedTypes('tiersPayeur', ['array'])->setNormalizer('tiersPayeur', function (Options $options, $value) {
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
                            ->setDefined('codePieceIdentite')->setAllowedValues('codePieceIdentite', Subscription::AVAILABLE_IDENTITY_DOC)->setNormalizer('codePieceIdentite', function (Options $options, $value){
                                return Subscription::IDENTITY_DOC_MAP[$value]['code'];
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

    /**
     * @param $value
     * @return array
     */
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
                return $this->resolveOriginePatrimoniale($values);
            })
            ->setDefined('repartitionPatrimoniale')->setAllowedTypes('repartitionPatrimoniale', ['array'])->setNormalizer('repartitionPatrimoniale', function(Options $options, $values){
                return $this->resolveRepartitionPatrimoniale($values);
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $values
     * @return array
     */
    private function resolveOriginePatrimoniale($values)
    {
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
    }

    /**
     * @param $values
     * @return array
     */
    private function resolveRepartitionPatrimoniale($values)
    {
        $resolver = new OptionsResolver();
        $resolvedValue = [];
        $resolver
            ->setRequired('code')->setAllowedValues('code', Subscription::AVAILABLE_HERITAGE_DISTRIBUTION)->setNormalizer('code', function (Options $options, $value){
                return Subscription::HERITAGE_DISTRIBUTION_MAP[$value]['code'];
            })
            ->setRequired('pourcentage')->setAllowedTypes('pourcentage', ['int', 'double', 'float'])
            ->setRequired('precision')->setAllowedTypes('precision', ['string'])
        ;
        foreach ($values as $value){
            $resolvedValue[] = $resolver->resolve($value);
        }

        return $resolvedValue;
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
                    ->setRequired('codePays')->setAllowedValues('codePays', Subscription::AVAILABLE_FISCALITY_COUNTRY)->setNormalizer('codePays', function (Options $options, $value){
                        return Subscription::FISCALITY_COUNTRY_MAP[$value]['code'];
                    })
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('naissance')->setAllowedTypes('naissance', ['array'])->setNormalizer('naissance', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('dateNaissance')->setAllowedTypes('dateNaissance', ['\DateTime'])->setNormalizer('dateNaissance', function (Options $options, $value){
                        return $value->format('Y-m-d');
                    })
                    ->setRequired('lieuNaissance')->setAllowedTypes('lieuNaissance', ['string'])
                    ->setRequired('paysNaissance')->setAllowedValues('paysNaissance', Subscription::AVAILABLE_COUNTRY)->setNormalizer('paysNaissance', function(Options $options, $value){
                        return Subscription::COUNTRY_MAP[$value]['code'];
                    })
                    ->setDefined('codeDepartementNaissance')->setAllowedTypes('codeDepartementNaissance', ['string'])
                    ->setDefined('codeInseeCommuneNaissance')->setAllowedTypes('codeInseeCommuneNaissance', ['int'])
                    ->setDefined('codePostal')->setAllowedTypes('codePostal', ['int'])
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('nationalite')->setAllowedTypes('nationalite', ['string'])
            ->setDefined('complement')->setAllowedTypes('complement', ['array'])->setNormalizer('complement', function (Options $options, $value) {
                return $this->resolveComplement($value);
            })
            ->setDefined('contact')->setAllowedTypes('contact', ['array'])->setNormalizer('contact', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('adressePostale')->setAllowedTypes('adressePostale', ['array'])->setNormalizer('adressePostale', function (Options $options, $value) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setDefined('adresse1PointRemise')->setAllowedTypes('adresse1PointRemise', ['string'])
                            ->setDefined('adresse2PointGeographique')->setAllowedTypes('adresse2PointGeographique', ['string'])
                            ->setDefined('adresse4LieuDitBP')->setAllowedTypes('adresse4LieuDitBP', ['string'])
                            ->setDefined('adresse3LibelleVoie')->setAllowedTypes('adresse3LibelleVoie', ['string'])
                            ->setDefined('codePostal')->setAllowedTypes('codePostal', ['int'])
                            ->setDefined('commune')->setAllowedTypes('commune', ['string'])
                            ->setDefined('codePays')->setAllowedValues('codePays', Subscription::AVAILABLE_ADDRESS_COUNTRY)->setNormalizer('codePays', function( Options $options, $value){
                                return Subscription::ADDRESS_COUNTRY_MAP[$value]['code'];
                            })
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
                            ->setDefined('indicateur', false)->setAllowedTypes('indicateur', ['bool'])
                        ;

                        return $resolver->resolve($value);
                    })
                    ->setRequired('etatPPEFamille')->setAllowedTypes('etatPPEFamille', ['array'])->setNormalizer('etatPPEFamille', function (Options $options, $value) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setDefined('indicateur', false)->setAllowedTypes('indicateur', ['bool'])
                        ;

                        return $resolver->resolve($value);
                    })
                ;

                return $resolver->resolve($value);
            })
            ->setDefined('fatca')->setAllowedTypes('fatca', ['array'])->setNormalizer('fatca', function(Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setDefined('citoyenUSA', false)->setAllowedTypes('citoyenUSA', ['bool'])
                    ->setDefined('residenceUSA', false)->setAllowedTypes('residenceUSA', ['bool'])
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
            ->setDefined('capaciteJuridique')->setAllowedValues('capaciteJuridique', Subscription::AVAILABLE_LEGAL_CAPACITY)->setNormalizer('capaciteJuridique', function (Options $options, $value){
                return Subscription::LEGAL_CAPACITY_MAP[$value]['code'];
            })
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
            ->setDefined('numContrat')->setAllowedTypes('numContrat', ['string'])
            ->setDefined('codeSouscription')->setAllowedTypes('codeSouscription', 'string')
            ->setDefined('elementsAttendus', [])->setAllowedTypes('elementsAttendus', ['array'])
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
            ->setDefined('refExterne')->setAllowedTypes('refExterne', ['int'])
            ->setDefined('refExterne2')->setAllowedTypes('refExterne2', ['int'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param OptionsResolver $resolver
     */
    private function configureFreePaymentParameters(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function(Options $options, $value){
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('codeApporteur')->setAllowedTypes('codeApporteur', ['string'])
                    ->setRequired('numContrat')->setAllowedTypes('numContrat', ['string'])
                    ->setDefined('elementsAttendus')->setAllowedTypes('elementsAttendus', ['array'])
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('versementLibre')->setAllowedTypes('versementLibre', ['array'])->setNormalizer('versementLibre', function(Options $options, $value){
                return $this->resolveVersementLibre($value);
            })
        ;
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveContractant($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefined('nom')->setAllowedTypes('nom', ['string'])
            ->setDefined('prenom')->setAllowedTypes('prenom', ['string'])
            ->setDefined('nationalite')->setAllowedTypes('nationalite', ['string'])
            ->setDefined('residenceFiscale')->setAllowedValues('residenceFiscale', Subscription::AVAILABLE_FISCALITY_COUNTRY)->setNormalizer('residenceFiscale', function (Options $options, $value) {
                return Subscription::FISCALITY_COUNTRY_MAP[$value]['code'];
            })
            ->setDefined('complement')->setAllowedTypes('complement', ['array'])->setNormalizer('complement', function (Options $options, $value){
                return $this->resolveComplement($value);
            })
            ->setDefined('ppe')->setAllowedTypes('ppe', ['array'])->setNormalizer('ppe', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('etatPPE')->setAllowedTypes('etatPPE', ['array'])->setNormalizer('etatPPE', function (Options $options, $value) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setDefined('indicateur', false)->setAllowedTypes('indicateur', ['bool'])
                        ;

                        return $resolver->resolve($value);
                    })
                    ->setRequired('etatPPEFamille')->setAllowedTypes('etatPPEFamille', ['array'])->setNormalizer('etatPPEFamille', function (Options $options, $value) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setDefined('indicateur')->setAllowedTypes('indicateur', ['bool'])
                        ;

                        return $resolver->resolve($value);
                    })
                ;

                return $resolver->resolve($value);
            })
            ->setDefined('capaciteJuridique')->setAllowedValues('capaciteJuridique', Subscription::AVAILABLE_LEGAL_CAPACITY)->setNormalizer('capaciteJuridique', function (Options $options, $value){
                return Subscription::LEGAL_CAPACITY_MAP[$value]['code'];
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveVersementLibre($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('dossierClient')->setAllowedTypes('dossierClient', ['array'])->setNormalizer('dossierClient', function(Options $options, $value){
                $resolver = new OptionsResolver();
                $resolver
                    ->setDefined('contractant')->setAllowedTypes('contractant', ['array'])->setNormalizer('contractant', function(Options $options, $value) {
                        return $this->resolveContractant($value);
                    })
                    ->setRequired('objectifsVersement')->setAllowedTypes('objectifsVersement', ['array'])->setNormalizer('objectifsVersement', function(Options $options, $value) {
                        return $this->resolveObjectifsVersement($value);
                    })
                    ->setDefined('originesPatrimoine')->setAllowedTypes('originesPatrimoine', ['array'])->setNormalizer('originesPatrimoine', function(Options $options, $values){
                        return $this->resolveOriginePatrimoniale($values);
                    })
                    ->setRequired('originePaiement')->setAllowedTypes('originePaiement', ['array'])->setNormalizer('originePaiement', function(Options $options, $value) {
                        return $this->resolveOriginePaiement($value);
                    })
                    ->setRequired('repartitionPatrimoine')->setAllowedTypes('repartitionPatrimoine', ['array'])->setNormalizer('repartitionPatrimoine', function(Options $options, $value){
                        return $this->resolveRepartitionPatrimoniale($value);
                    })
                    ->setDefined('revenusAnnuelsNetFoyer')->setAllowedTypes('revenusAnnuelsNetFoyer', ['array'])->setNormalizer('revenusAnnuelsNetFoyer', function (Options $options, $value) {
                        return $this->resolveRevenusAnnuelsNetFoyer($value);
                    })
                    ->setDefined('estimationPatrimoineFoyer')->setAllowedTypes('estimationPatrimoineFoyer', ['array'])->setNormalizer('estimationPatrimoineFoyer', function (Options $options, $value) {
                        return $this->resolveEstimationPatrimoineFoyer($value);
                    })

                ;
                return $resolver->resolve($value);
            })

            ->setRequired('repartition')->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function (Options $options, $values){
                return $this->resolveRepartition($values);
            })
            ->setRequired('reglement')->setAllowedTypes('reglement', ['array'])->setNormalizer('reglement', function (Options $options, $value){
                return $this->resolveReglement($value);
            })
            ->setRequired('montant')->setAllowedTypes('montant', ['int'])
            ->setDefined('numeroOperationExterne')->setAllowedTypes('numeroOperationExterne', ['int'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $values
     * @return array
     */
    private function resolveOriginesFonds($values)
    {
        $resolver = new OptionsResolver();
        $resolvedValues = [];

        $resolver
            ->setDefined('code')->setAllowedValues('code', Subscription::AVAILABLE_FUNDS_ORIGIN)->setNormalizer('code', function (Options $options, $value){
                return Subscription::FUNDS_ORIGIN_MAP[$value]['code'];
            })
            ->setDefined('codesDetail')->setAllowedTypes('codesDetail', ['array'])->setNormalizer('codesDetail', function(Options $options, $values){
                foreach ($values as $value){
                   $resolvedValues[] = Subscription::FUNDS_ORIGIN_INCOME_MAP[$value]['code'];
               }

                return $resolvedValues;
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
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveComplement($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('situationFamiliale')->setAllowedValues('situationFamiliale', Subscription::AVAILABLE_FAMILY_SITUATION)->setNormalizer('situationFamiliale', function (Options $options, $value){
                return Subscription::FAMILY_SITUATION_MAP[$value]['code'];
            })
            ->setRequired('situationProfessionnelle')->setAllowedValues('situationProfessionnelle', Subscription::AVAILABLE_PROFESSIONAL_SITUATION)->setNormalizer('situationProfessionnelle', function (Options $options, $value){
                return Subscription::PROFESSIONAL_SITUATION_MAP[$value]['code'];
            })
            ->setDefined('regimeMatrimonial')->setAllowedValues('regimeMatrimonial', Subscription::AVAILABLE_MATRIMONIAL_REGIME)->setNormalizer('regimeMatrimonial', function (Options $options, $value){
                return Subscription::MATRIMONIAL_REGIME_MAP[$value]['code'];
            })
            ->setDefined('csp')->setAllowedValues('csp', Subscription::AVAILABLE_CSPS_CODE)->setNormalizer('csp', function (Options $options, $value){
                return Subscription::CSPS_CODE_MAP[$value]['code'];
            })
            ->setRequired('profession')->setAllowedTypes('profession', ['string'])
            ->setDefined('codeNaf')->setAllowedValues('codeNaf', Subscription::AVAILABLE_NAF_CODE)->setNormalizer('codeNaf', function (Options $options, $value){
                return Subscription::NAF_CODE_MAP[$value]['code'];
            })
            ->setDefined('siret')->setAllowedTypes('siret', ['int'])
            ->setDefined('nomEmployeur')->setAllowedTypes('nomEmployeur', ['string'])
            ->setDefined('cspDerniereProfession')->setAllowedValues('cspDerniereProfession', Subscription::AVAILABLE_CSPS_CODE)->setNormalizer('cspDerniereProfession', function(Options $options, $value){
                return Subscription::CSPS_CODE_MAP[$value]['code'];
            })
            ->setDefined('dateDebutInactivite')->setAllowedTypes('dateDebutInactivite', ['\Datetime'])->setNormalizer('dateDebutInactivite', function(Options $options, $value){
                return $value->format('Y-m-d');
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param OptionsResolver $resolver
     */
    private function configureScheduledFreePaymentParameters(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function (Options $options, $value){
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('codeApporteur')->setAllowedTypes('codeApporteur', ['string'])
                    ->setRequired('numContrat')->setAllowedTypes('numContrat', ['string'])
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('versementsLibresProgrammes')->setAllowedTypes('versementsLibresProgrammes', ['array'])->setNormalizer('versementsLibresProgrammes', function (Options $options, $value){
                return $this->resolveVersementsLibreProgrammes($value);
            })
        ;
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveVersementsLibreProgrammes($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('dossierClient')->setAllowedTypes('dossierClient', ['array'])->setNormalizer('dossierClient', function(Options $options, $value){
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('contractant')->setAllowedTypes('contractant', ['array'])->setNormalizer('contractant', function(Options $options, $value){
                        return $this->resolveContractant($value);
                    })
                    ->setRequired('estimationPatrimoineFoyer')->setAllowedTypes('estimationPatrimoineFoyer', ['array'])->setNormalizer('estimationPatrimoineFoyer', function (Options $options, $value){
                        return $this->resolveEstimationPatrimoineFoyer($value);
                    })
                    ->setRequired('objectifsVersement')->setAllowedTypes('objectifsVersement', ['array'])->setNormalizer('objectifsVersement', function (Options $option, $value){
                        return $this->resolveObjectifsVersement($value);
                    })
                    ->setRequired('originesPatrimoine')->setAllowedTypes('originesPatrimoine', ['array'])->setNormalizer('originesPatrimoine', function(Options $options, $value){
                        return $this->resolveOriginePatrimoniale($value);
                    })
                    ->setRequired('repartitionPatrimoine')->setAllowedTypes('repartitionPatrimoine', ['array'])->setNormalizer('repartitionPatrimoine', function(Options $options, $value){
                        return $this->resolveRepartitionPatrimoniale($value);
                    })
                    ->setRequired('revenusAnnuelsNetFoyer')->setAllowedTypes('revenusAnnuelsNetFoyer', ['array'])->setNormalizer('revenusAnnuelsNetFoyer', function(Options $options, $value){
                        return $this->resolveRevenusAnnuelsNetFoyer($value);
                    })
                    ->setRequired('originePaiement')->setAllowedTypes('originePaiement', ['array'])->setNormalizer('originePaiement', function(Options $options, $value){
                        return $this->resolveOriginePaiement($value);
                    })
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('repartition')->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function(Options $options, $values){
                $resolvedValues = [];
                foreach($values as $value)
                {
                    $resolvedValues[]= $this->resolveFond($value);
                }
                return $resolvedValues;
            })
            ->setRequired('versement')->setAllowedTypes('versement', ['array'])->setNormalizer('versement', function(Options $options, $value){
                return $this->resolveVersement($value);
            })
            ->setRequired('reglement')->setAllowedTypes('reglement', ['array'])->setNormalizer('reglement', function(Options $options, $value){
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('ibanContractant')->setAllowedTypes('ibanContractant', ['array'])->setNormalizer('ibanContractant', function(Options $options, $value){
                        return $this->resolveIbanContractant($value);
                    })
                    ->setDefined('originesFonds')->setAllowedTypes('originesFonds', ['array'])->setNormalizer('originesFonds', function(Options $options, $values){
                        return $this->resolveOriginesFonds($values);
                    })
                    ->setDefined('compteExternePartenaire')->setAllowedTypes('compteExternePartenaire', ['bool'])
                    ->setDefined('compteDeVirement')->setAllowedTypes('compteDeVirement', ['bool'])
                ;

                return $resolver->resolve($value);
            })
            ->setDefined('numeroOperationExterne')->setAllowedTypes('numeroOperationExterne', ['int'])
        ;

        return $resolver->resolve($value);
    }

    public function resolveVersement($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('montant')->setAllowedTypes('montant', ['int'])
            ->setRequired('periodicite')->setAllowedTypes('periodicite', ['string'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveEstimationPatrimoineFoyer($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefined('code')->setAllowedValues('code', Subscription::AVAILABLE_PERSONAL_ASSETS)->setNormalizer('code', function (Options $options, $value){
                return Subscription::PERSONAL_ASSETS_MAP[$value]['code'];
            })
            ->setDefined('montant')->setAllowedTypes('montant', ['int'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveRevenusAnnuelsNetFoyer($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefined('code')->setAllowedValues('code', Subscription::AVAILABLE_INCOME_BRACKETS)->setNormalizer('code', function(Options $options, $value){
                return Subscription::INCOME_BRACKETS_MAP[$value]['code'];
            })
            ->setDefined('montant')->setAllowedTypes('montant', ['int'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveFond($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired('codeFonds')->setAllowedTypes('codeFonds', ['string'])
            ->setRequired('montant')->setAllowedTypes('montant', ['int'])
            ->setDefined('taux')->setAllowedTypes('taux', ['int'])
            ->setDefined('duree')->setAllowedTypes('duree', ['int'])
            ->setDefined('numeroEngagement')->setAllowedTypes('numeroEngagement', ['int'])
            ->setDefined('avenantValide')->setAllowedTypes('avenantValide', ['bool'])
            ->setDefined('pourcentage')->setAllowedTypes('pourcentage', ['int', 'double', 'float'])
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param OptionsResolver $resolver
     */
    private function configureArbitrationParameters(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('codeApporteur')->setAllowedTypes('codeApporteur', ['string'])
                    ->setRequired('numContrat')->setAllowedTypes('numContrat', ['string'])
                    ->setDefined('codeCompagnie')->setAllowedTypes('codeCompagnie', ['string'])
                    ->setDefined('codePortefeuille')->setAllowedTypes('codePortefeuille', ['string'])
                    ->setDefined('utilisateur')->setAllowedTypes('utilisateur', ['string'])
                    ->setDefined('numeroOrdreTransactionLiee')->setAllowedTypes('numeroOrdreTransactionLiee', ['string'])
                    ->setDefined('elementsAttendus')->setAllowedTypes('elementsAttendus', ['array']);
                return $resolver->resolve($value);
            })
            ->setRequired('arbitrage')->setAllowedTypes('arbitrage', ['array'])->setNormalizer('arbitrage', function (Options $options, $value) {
                return $this->resolveArbitrage($value);
            })
        ;
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveArbitrage($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefined('numOperationExterne')->setAllowedTypes('numOperationExterne', ['int'])
            ->setDefined('fraisDeroge')->setAllowedTypes('fraisDeroge', ['array'])->setNormalizer('fraisDeroge', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setDefined('montant')->setAllowedTypes('montant', ['int'])
                    ->setDefined('taux')->setAllowedTypes('taux', ['int']);
                return $resolver->resolve($value);
            })
            ->setDefined('mandatTransmissionOrdre')->setAllowedTypes('mandatTransmissionOrdre', ['bool'])
            ->setDefined('mandatArbitrage')->setAllowedTypes('mandatArbitrage', ['bool'])
            ->setRequired('fondsInvestis')->setAllowedTypes('fondsInvestis', ['array'])->setNormalizer('fondsInvestis', function (Options $options, $values) {
                $resolver = new OptionsResolver();
                $resolvedValues = [];
                foreach ($values as $value)
                {
                    $resolvedValues[] = $this->resolveFondsInvestis($value);
                }

                return $resolvedValues;
            })
            ->setDefined('fondsDesinvestis')->setAllowedTypes('fondsDesinvestis', ['array'])->setNormalizer('fondsDesinvestis', function (Options $options, $values) {
                $resolver = new OptionsResolver();
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->resolveFondsDesInvestis($value);
                }

                return $resolvedValues;
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $value
     * @return array
     */
    private function resolveFondsInvestis($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefined('fondsInvesti')->setAllowedTypes('fondsInvesti', ['array'])->setNormalizer('fondsInvesti', function (Options $options, $value) {
                return $this->resolveFond($value);
            })
        ;

       return $resolver->resolve($value);
    }

    /**
     * @param $values
     * @return array
     */
    private function resolveFondsDesInvestis($value)
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefined('fondsDesinvesti')->setAllowedTypes('fondsDesinvesti', ['array'])->setNormalizer('fondsDesinvesti', function (Options $options, $value) {
                return $this->resolveFond($value);
            })
        ;

        return $resolver->resolve($value);
    }

    /**
     * @param $values
     * @return array
     */
    private function resolveRepartition($values)
    {
        foreach ($values as $value){
            $resolvedValues[] = $this->resolveFond($value);
        }
        return $resolvedValues;
    }

    /**
     * @param OptionsResolver $resolver
     */
    private function configurePartialSurrender(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('contexte')->setAllowedTypes('contexte', ['array'])->setNormalizer('contexte', function(Options $options, $value){
                $resolver  = new OptionsResolver();
                $resolver
                    ->setRequired('codeApporteur')->setAllowedTypes('codeApporteur', ['string'])
                    ->setRequired('numContrat')->setAllowedTypes('numContrat', ['string'])
                    ->setDefined('codeCompagnie')->setAllowedTypes('codeCompagnie', ['string'])
                    ->setDefined('codePortefeuille')->setAllowedTypes('codePortefeuille', ['string'])
                    ->setDefined('utilisateur')->setAllowedTypes('utilisateur', ['string'])
                    ->setDefined('numeroOrdreTransactionLiee')->setAllowedTypes('numeroOrdreTransactionLiee', ['string'])
                    ->setDefined('elementsAttendus')->setAllowedTypes('elementsAttendus', ['array'])
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('rachatPartiel')->setAllowedTypes('rachatPartiel', ['array'])->setNormalizer('rachatPartiel', function(Options $options, $value){
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('montant')->setAllowedTypes('montant', ['int'])
                    ->setRequired('codeMotif')->setAllowedTypes('codeMotif', ['string'])
                    ->setDefined('repartitionProportionnelle')->setAllowedTypes('repartitionProportionnelle', ['bool'])
                    ->setRequired('repartition')->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function(Options $options, $values){
                        $resolver  = new OptionsResolver();
                        $resolver
                            ->setRequired('codeFonds')->setAllowedTypes('codeFonds', ['string'])
                            ->setRequired('montant')->setAllowedTypes('montant', ['int'])
                            ->setRequired('rachatTotal')->setAllowedTypes('rachatTotal', ['bool'])
                        ;
                        $resolvedValues = [];
                        foreach ($values as $value){
                            $resolvedValues[] = $resolver->resolve($value);
                        }

                        return $resolvedValues;
                    })
                    ->setRequired('modeReglement')->setAllowedTypes('modeReglement', ['array'])->setNormalizer('modeReglement', function(Options $options, $value){
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setRequired('typePaiement')->setAllowedTypes('typePaiement', ['string'])
                            ->setRequired('compteBancaire')->setAllowedTypes('compteBancaire', ['array'])->setNormalizer('compteBancaire', function(Options $options, $value){
                                $resolver = new OptionsResolver();
                                $resolver
                                    ->setDefined('domiciliation')->setAllowedTypes('domiciliation', ['string'])
                                    ->setDefined('titulaire')->setAllowedTypes('titulaire', ['string'])
                                    ->setDefined('iban')->setAllowedTypes('iban', ['string'])
                                    ->setDefined('bic')->setAllowedTypes('bic', ['string'])
                                ;

                                return $resolver->resolve($value);
                            })
                        ;

                        return $resolver->resolve($value);
                    })
                ;
                return $resolver->resolve($value);
            })
        ;
    }
}