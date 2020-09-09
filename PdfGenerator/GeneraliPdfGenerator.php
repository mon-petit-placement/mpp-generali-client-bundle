<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\PdfGenerator;

use Mpp\GeneraliClientBundle\Model\Subscription;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Twig\Environment;

/**
 * Class GeneraliPdfGenerator
 */
class GeneraliPdfGenerator
{
    /** @var ContainerInterface $container */
    private $container;

    /** @var Environment $twig */
    private $twig;

    public function __construct(ContainerInterface $container, Environment $twig)
    {
        $this->container = $container;
        $this->twig = $twig;
    }

    public function parametersFileMap(array $subscriptionParameters)
    {
        $resp = [];

        $customer = $subscriptionParameters['souscription']['souscripteur'];
        $funds = $subscriptionParameters['souscription']['reglement'];
        $folder = $subscriptionParameters['souscription']['dossierClient'];

        $resp['resp'] = [
            'civility'=> $customer['noms']['codeCivilite'],
            'lastname'=> $customer['noms']['nom'],
            'firstname'=> $customer['noms']['prenom'],
            'birthname'=> $customer['noms']['nomNaissance'],
            'address'=> $customer['contact']['adressePostale']['adresse1PointRemise'].' '.$customer['contact']['adressePostale']['adresse2PointGeographique'].' '.$customer['contact']['adressePostale']['adresse3LibelleVoie'],
            'zipcode'=> $customer['contact']['adressePostale']['codePostal'],
            'city'=> $customer['contact']['adressePostale']['commune'],
            'country'=> 'toto',
            'birthdate'=> $customer['naissance']['dateNaissance'],
            'birthZipcode'=> $customer['naissance']['codePostal'],
            'birthCity'=> $customer['naissance']['lieuNaissance'],
            'birthCountry'=> $customer['naissance']['paysNaissance'],
            'nationality'=> $customer['nationalite'],
            'taxCountry'=> $customer['residenceFiscale']['codePays'],
            'phoneNumber'=> $customer['contact']['telephone'],
            'email'=> $customer['contact']['email'],
            'identityDocumentType'=> $customer['pieceIdentite']['codePieceIdentite'],
            'maritalStatus'=> $customer['complement']['situationFamiliale'],
            'matrimonialRegime'=> isset($customer['complement']['regimeMatrimonial']) ? $customer['complement']['regimeMatrimonial'] : Subscription::MATRIMONIAL_REGIME_OTHER,
            'nbChildren'=> 999,
            'professionalStatus'=> $customer['complement']['situationProfessionnelle'],
            'socioprofessionalCategory'=> 'toto',
            'activityArea'=> 'toto',
            'employer'=> $customer['complement']['nomEmployeur'],
            'siretNumber'=> $customer['complement']['siret'],
            'job'=> $customer['complement']['profession'],
            'activityEndDate'=> $customer['complement']['dateDebutInactivite'],
            'incomeCategory'=> 'toto',
            'patrimonyCategory'=> $folder['situationPatrimoniale']['codeTranchePatrimoine'],
            'percentEstate'=> 'toto',
            'percentFinancialInstruments'=> 'toto',
            'percentSavings'=> 'toto',
            'percentCapitalizationContracts'=> 'toto',
            'percentOthers'=> 'toto',
            'patrimonyOrigins'=> 'toto',
            'goals'=> 'toto',
            'durationCategory'=> 'toto',
            'beneficiaryClause'=> 'toto',
            'initialInvestment'=> 'toto',
            'todayDate'=> new \DateTime('now'),
            'contractId'=> 'toto',
            'establishmentCode'=> 'toto',
            'counter'=> 'toto',
            'accountNumber'=> 'toto',
            'ribKey'=> 'toto',
            'iban'=> 'toto',
            'bic'=> 'toto',
            'monthlyInvestment'=> 'toto',
        ];

        $fundsOrigin = [];

        foreach ($funds['originesFonds'] as $fundOrigin) {
            $fundsOrigin[] = [
                'label' => $fundOrigin['code'],
                'date' => $fundOrigin['date'],
                'amount' => $fundOrigin['montant'],
            ];
        }
        $resp['resp']['fundsOrigins'] = $fundsOrigin;

        $resp['otherTaxCountry'] = 'toto';
        $resp['taxCountry'] = 'toto';
        $resp['nif'] = 'toto';
        $resp['taxAddress'] = 'toto';
        $resp['noDematerialization'] = 'toto';

        $resp['resp']['initialRepartition'] = [
            [
                'name'=> 'toto',
                'isin'=> 'toto',
                'percent'=> 'toto',
            ], [
                'name'=> 'toto',
                'isin'=> 'toto',
                'percent'=> 'toto',
            ]
        ];

        $resp['resp']['monthlyRepartition'] = [
            [
                'name'=> 'toto',
                'isin'=> 'toto',
                'percent'=> 'toto',
            ],[
                'name'=> 'toto',
                'isin'=> 'toto',
                'percent'=> 'toto',
            ]
        ];

        return $resp;
    }

    /**
     * @param array $fileParameters
     * @return array
     */
    private function resolveFileParameters(array $fileParameters)
    {
        $resolver = new OptionsResolver();

        $resolver
            ->setRequired('resp')->setAllowedTypes('resp', ['array'])->setNormalizer('resp', function(Options $options, $value){
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('civility')->setAllowedValues('civility', Subscription::AVAILABLE_CIVILITY)->setNormalizer('civility', function (Options $options, $value) {
                        return Subscription::CIVILITY_MAP[$value]['code'];
                    })
                    ->setRequired('lastname')->setAllowedTypes('lastname', ['string'])
                    ->setRequired('firstname')->setAllowedTypes('firstname', ['string'])
                    ->setRequired('birthname')->setAllowedTypes('birthname', ['string'])
                    ->setRequired('address')->setAllowedTypes('address', ['string'])
                    ->setRequired('zipcode')->setAllowedTypes('zipcode', ['integer'])
                    ->setRequired('city')->setAllowedTypes('city', ['string'])
                    ->setRequired('country')->setAllowedTypes('country', ['string'])
                    ->setRequired('birthdate')->setAllowedTypes('birthdate', ['\DateTime'])->setNormalizer('birthdate', function(Options $options, $value){
                        return $value->format('Y-m-d');
                    })
                    ->setRequired('birthZipcode')->setAllowedTypes('birthZipcode', ['integer'])
                    ->setRequired('birthCity')->setAllowedTypes('birthCity', ['string'])
                    ->setRequired('birthCountry')->setAllowedValues('birthCountry', Subscription::AVAILABLE_COUNTRY)->setNormalizer('birthCountry', function (Options $options, $value) {
                        return Subscription::COUNTRY_MAP[$value]['code'];
                    })
                    ->setRequired('nationality')->setAllowedTypes('nationality', ['string'])
                    ->setRequired('taxCountry')->setAllowedValues('taxCountry', Subscription::AVAILABLE_COUNTRY)->setNormalizer('taxCountry', function (Options $options, $value) {
                        return Subscription::COUNTRY_MAP[$value]['code'];
                    })
                    ->setRequired('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])
                    ->setRequired('email')->setAllowedTypes('email', ['string'])
                    ->setDefined('identityDocumentType')->setAllowedValues('identityDocumentType', Subscription::AVAILABLE_IDENTITY_DOC)->setNormalizer('identityDocumentType', function (Options $options, $value) {
                        return Subscription::IDENTITY_DOC_MAP[$value]['code'];
                    })
                    ->setRequired('maritalStatus')->setAllowedValues('maritalStatus', Subscription::AVAILABLE_FAMILY_SITUATION)->setNormalizer('maritalStatus', function (Options $options, $value) {
                        return Subscription::FAMILY_SITUATION_MAP[$value]['code'];
                    })
                    ->setDefined('matrimonialRegime')->setAllowedValues('matrimonialRegime', Subscription::AVAILABLE_MATRIMONIAL_REGIME)->setNormalizer('matrimonialRegime', function (Options $options, $value) {
                        return Subscription::MATRIMONIAL_REGIME_MAP[$value]['code'];
                    })
                    ->setRequired('nbChildren')->setAllowedTypes('nbChildren', ['integer'])
                    ->setRequired('professionalStatus')->setAllowedValues('professionalStatus', Subscription::AVAILABLE_PROFESSIONAL_SITUATION)->setNormalizer('professionalStatus', function (Options $options, $value) {
                        return Subscription::PROFESSIONAL_SITUATION_MAP[$value]['code'];
                    })
                    ->setRequired('socioprofessionalCategory')->setAllowedTypes('socioprofessionalCategory', ['string'])
                    ->setRequired('activityArea')->setAllowedTypes('activityArea', ['string'])
                    ->setRequired('employer')->setAllowedTypes('employer', ['string'])
                    ->setRequired('siretNumber')->setAllowedTypes('siretNumber', ['integer'])
                    ->setRequired('job')->setAllowedTypes('job', ['string'])
                    ->setRequired('activityEndDate')->setAllowedTypes('activityEndDate', ['\DateTime'])->setNormalizer('activityEndDate', function (Options $options, $value){
                        return $value->format('Y-m-d');
                    })
                    ->setRequired('incomeCategory')->setAllowedTypes('incomeCategory', ['string'])
                    ->setRequired('patrimonyCategory')->setAllowedValues('patrimonyCategory', Subscription::AVAILABLE_PERSONAL_ASSETS)->setNormalizer('patrimonyCategory', function (Options $options, $value) {
                        return Subscription::PERSONAL_ASSETS_MAP[$value]['code'];
                    })
                    ->setRequired('percentFinancialInstruments')->setAllowedTypes('percentFinancialInstruments', ['string'])
                    ->setRequired('percentSavings')->setAllowedTypes('percentSavings', ['string'])
                    ->setRequired('percentCapitalizationContracts')->setAllowedTypes('percentCapitalizationContracts', ['string'])
                    ->setRequired('percentOthers')->setAllowedTypes('percentOthers', ['string'])
                    ->setRequired('patrimonyOrigins')->setAllowedTypes('patrimonyOrigins', ['string'])
                    ->setRequired('goals')->setAllowedTypes('goals', ['string'])
                    ->setRequired('durationCategory')->setAllowedTypes('durationCategory', ['string'])
                    ->setRequired('percentEstate')->setAllowedTypes('percentEstate', ['string'])
                    ->setRequired('fundsOrigins')->setAllowedTypes('fundsOrigins', ['array'])->setNormalizer('fundsOrigins', function(Options $options, $values) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setRequired('label')->setAllowedTypes('label', ['string'])
                            ->setRequired('date')->setAllowedTypes('date', ['\DateTime'])->setNormalizer('date', function(Options $options, $value) {
                                return $value->format('Y-m-d');
                            })
                            ->setRequired('amount')->setAllowedTypes('amount', ['integer'])
                        ;

                        $resolvedValues = [];
                        foreach ($values as $value)
                        {
                            $resolvedValues[] = $resolver->resolve($value);
                        }

                        return $resolvedValues;
                    })
                    ->setRequired('accountNumber')->setAllowedTypes('accountNumber', ['string'])
                    ->setRequired('beneficiaryClause')->setAllowedTypes('beneficiaryClause', ['string'])
                    ->setRequired('bic')->setAllowedTypes('bic', ['string'])
                    ->setRequired('contractId')->setAllowedTypes('contractId', ['string'])
                    ->setRequired('counter')->setAllowedTypes('counter', ['string'])
                    ->setRequired('establishmentCode')->setAllowedTypes('establishmentCode', ['string'])
                    ->setRequired('iban')->setAllowedTypes('iban', ['string'])
                    ->setRequired('initialInvestment')->setAllowedTypes('initialInvestment', ['string'])
                    ->setRequired('monthlyInvestment')->setAllowedTypes('monthlyInvestment', ['string'])
                    ->setRequired('ribKey')->setAllowedTypes('ribKey', ['string'])
                    ->setRequired('todayDate')->setAllowedTypes('todayDate', ['\DateTime'])->setNormalizer('todayDate', function(Options $options, $value) {
                        return $value->format('Y-m-d');
                    })
                    ->setRequired('initialRepartition')->setAllowedTypes('initialRepartition', ['array'])->setNormalizer('initialRepartition', function (Options $options, $values) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setRequired('name')->setAllowedTypes('name', ['string'])
                            ->setRequired('isin')->setAllowedTypes('isin', ['string'])
                            ->setRequired('percent')->setAllowedTypes('percent', ['string'])
                        ;

                        $resolvedValues = [];
                        foreach ($values as $value)
                        {
                            $resolvedValues[] = $resolver->resolve($value);
                        }

                        return $resolvedValues;
                    })
                    ->setRequired('monthlyRepartition')->setAllowedTypes('monthlyRepartition', ['array'])->setNormalizer('monthlyRepartition', function(Options $options, $values) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setRequired('name')->setAllowedTypes('name', ['string'])
                            ->setRequired('isin')->setAllowedTypes('isin', ['string'])
                            ->setRequired('percent')->setAllowedTypes('percent', ['string'])
                        ;

                        $resolvedValues = [];
                        foreach ($values as $value)
                        {
                            $resolvedValues[] = $resolver->resolve($value);
                        }

                        return $resolvedValues;
                    })
                ;

                return $resolver->resolve($value);
            })
            ->setRequired('otherTaxCountry')->setAllowedTypes('otherTaxCountry', ['string'])
            ->setRequired('taxCountry')->setAllowedTypes('taxCountry', ['string'])
            ->setRequired('nif')->setAllowedTypes('nif', ['string'])
            ->setRequired('taxAddress')->setAllowedTypes('taxAddress', ['string'])
            ->setRequired('noDematerialization')->setAllowedTypes('noDematerialization', ['string'])
        ;

        return $resolver->resolve($fileParameters);
    }

    /**
     * @param array $parameters
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function generateFile(array $parameters)
    {
        $parameters = $this->parametersFileMap($parameters);
        $resolvedParameters = $this->resolveFileParameters($parameters);

        foreach ([1, 2, 3, 4, 5] as $index_file){
            $html = $this->twig->render(
                '@generali_contracts/page-'.$index_file.'.html.twig',
                $resolvedParameters
            );
            dump($html);

//            $this->container->get('knp_snappy.pdf')->generateFromHtml($html, 'page-'.$index_file.'.pdf');
        }

        return hash('sha1', json_encode($resolvedParameters));
    }
}