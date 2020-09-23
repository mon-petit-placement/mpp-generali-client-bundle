<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Model\Subscription;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PdfParameterFactory
 */
class PdfParameterFactory
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('resp')->setAllowedTypes('resp', ['array'])->setNormalizer('resp', function (Options $options, $value) {
                $resolver = new OptionsResolver();
                $resolver
                    ->setRequired('civility')->setAllowedTypes('civility', ['string'])
                    ->setRequired('lastname')->setAllowedTypes('lastname', ['string'])
                    ->setRequired('firstname')->setAllowedTypes('firstname', ['string'])
                    ->setRequired('birthname')->setAllowedTypes('birthname', ['string'])
                    ->setRequired('address')->setAllowedTypes('address', ['string'])
                    ->setRequired('zipcode')->setAllowedTypes('zipcode', ['string'])
                    ->setRequired('city')->setAllowedTypes('city', ['string'])
                    ->setRequired('country')->setAllowedTypes('country', ['string'])
                    ->setRequired('birthdate')->setAllowedTypes('birthdate', ['\DateTime'])->setNormalizer('birthdate', function (Options $options, $value) {
                        return $value->format('Y-m-d');
                    })
                    ->setRequired('birthZipcode')->setAllowedTypes('birthZipcode', ['string'])
                    ->setRequired('birthCity')->setAllowedTypes('birthCity', ['string'])
                    ->setRequired('birthCountry')->setAllowedTypes('birthCountry', ['string'])
                    ->setRequired('nationality')->setAllowedTypes('nationality', ['string'])
                    ->setRequired('taxCountry')->setAllowedTypes('taxCountry', ['string'])
                    ->setRequired('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])
                    ->setRequired('email')->setAllowedTypes('email', ['string'])
                    ->setDefined('identityDocumentType')->setAllowedTypes('identityDocumentType', ['string'])
                    ->setRequired('maritalStatus')->setAllowedTypes('maritalStatus', ['string'])
                    ->setDefined('matrimonialRegime')->setAllowedTypes('matrimonialRegime',['string'])
                    ->setRequired('nbChildren')->setAllowedTypes('nbChildren', ['integer'])
                    ->setRequired('professionalStatus')->setAllowedtypes('professionalStatus', ['string'])
                    ->setRequired('socioprofessionalCategory')->setAllowedTypes('socioprofessionalCategory', ['string'])
                    ->setRequired('activityArea')->setAllowedTypes('activityArea', ['string'])
                    ->setRequired('employer')->setAllowedTypes('employer', ['string'])
                    ->setRequired('siretNumber')->setAllowedTypes('siretNumber', ['integer'])
                    ->setRequired('job')->setAllowedTypes('job', ['string'])
                    ->setRequired('activityEndDate')->setAllowedTypes('activityEndDate', ['\DateTime'])->setNormalizer('activityEndDate', function (Options $options, $value) {
                        return $value->format('Y-m-d');
                    })
                    ->setRequired('incomeCategory')->setAllowedTypes('incomeCategory', ['string'])
                    ->setRequired('patrimonyCategory')->setAllowedTypes('patrimonyCategory', ['string'])
                    ->setRequired('percentFinancialInstruments')->setAllowedTypes('percentFinancialInstruments', ['string'])
                    ->setRequired('percentSavings')->setAllowedTypes('percentSavings', ['string'])
                    ->setRequired('percentCapitalizationContracts')->setAllowedTypes('percentCapitalizationContracts', ['string'])
                    ->setRequired('percentOthers')->setAllowedTypes('percentOthers', ['string'])
                    ->setRequired('patrimonyOrigins')->setAllowedTypes('patrimonyOrigins', ['string'])
                    ->setRequired('goals')->setAllowedTypes('goals', ['string'])
                    ->setRequired('durationCategory')->setAllowedTypes('durationCategory', ['string'])
                    ->setRequired('percentEstate')->setAllowedTypes('percentEstate', ['string'])
                    ->setRequired('fundsOrigins')->setAllowedTypes('fundsOrigins', ['array'])->setNormalizer('fundsOrigins', function (Options $options, $values) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setRequired('label')->setAllowedTypes('label', ['string'])
                            ->setRequired('date')->setAllowedTypes('date', ['\DateTime'])->setNormalizer('date', function (Options $options, $value) {
                                return $value->format('Y-m-d');
                            })
                            ->setRequired('amount')->setAllowedTypes('amount', ['integer'])
                        ;

                        $resolvedValues = [];
                        foreach ($values as $value) {
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
                    ->setRequired('todayDate')->setAllowedTypes('todayDate', ['\DateTime'])->setNormalizer('todayDate', function (Options $options, $value) {
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
                        foreach ($values as $value) {
                            $resolvedValues[] = $resolver->resolve($value);
                        }

                        return $resolvedValues;
                    })
                    ->setRequired('monthlyRepartition')->setAllowedTypes('monthlyRepartition', ['array'])->setNormalizer('monthlyRepartition', function (Options $options, $values) {
                        $resolver = new OptionsResolver();
                        $resolver
                            ->setRequired('name')->setAllowedTypes('name', ['string'])
                            ->setRequired('isin')->setAllowedTypes('isin', ['string'])
                            ->setRequired('percent')->setAllowedTypes('percent', ['string'])
                        ;

                        $resolvedValues = [];
                        foreach ($values as $value) {
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
    }

   /**
     * @param Subscription $subscription
     * @return array
     * @throws \Exception
     */
    public function subscriptionToFileMapper(Subscription $subscription): array
{
    $response = [];

    $subscriber = $subscription->getSubscriber();
    $folder = $subscription->getCustomerFolder();
    $settlement = $subscription->getSettlement();

    $response['resp'] = [
        'civility'=> $subscriber->getCivility(),
        'lastname'=> $subscriber->getLastName(),
        'firstname'=> $subscriber->getFirstName(),
        'birthname'=> $subscriber->getBirthName(),
        'address'=> $subscriber->getAddressPostBox() .' '.$subscriber->getAddressStreetName(),
        'zipcode'=> $subscriber->getAddressPostalCode(),
        'city'=> $subscriber->getAddressCity(),
        'country'=> $subscriber->getAddressCountryCode(),
        'birthdate'=> $subscriber->getBirthDate(),
        'birthZipcode'=> $subscriber->getBirthPostalCode(),
        'birthCity'=> $subscriber->getBirthInseeCode(),
        'birthCountry'=> $subscriber->getBirthCountry(),
        'nationality'=> $subscriber->getNationality(),
        'taxCountry'=> $subscriber->getTaxCountry(),
        'phoneNumber'=> $subscriber->getPhoneNumber(),
        'email'=> $subscriber->getEmail(),
        'identityDocumentType'=> $subscriber->getIdentityDocCode(),
        'maritalStatus'=> $subscriber->getFamilialSituation(),
        'matrimonialRegime'=> $subscriber->getMatrimonialRegime(),
        'nbChildren'=> 000000000, //TODO
        'professionalStatus'=> $subscriber->getProfessionalSituation(),
        'socioprofessionalCategory'=> $subscriber->getCspCode(),
        'activityArea'=> 'toto',
        'employer'=> $subscriber->getEmployerName(),
        'siretNumber'=> $subscriber->getSiretNumber(),
        'job'=> $subscriber->getProfession(),
        'activityEndDate'=> $subscriber->getStartDateInactivity(),
        'incomeCategory'=> $folder->getIncomeCode(),
        'patrimonyCategory'=> $folder->getAssetCode(),
        'percentEstate'=> 'toto',
        'percentFinancialInstruments'=> 'toto',
        'percentSavings'=> 'toto',
        'percentCapitalizationContracts'=> 'toto',
        'percentOthers'=> 'toto',
        'patrimonyOrigins'=> 'toto',
        'goals'=> 'toto',
        'durationCategory'=> $subscription->getDurationType(),
        'beneficiaryClause'=> $subscription->getDeathBeneficiaryClauseCode(),
        'initialInvestment'=> 'toto',
        'todayDate'=> new \DateTime('now'),
        'contractId'=> 'toto', //TODO idTransaction ?
        'establishmentCode'=> 'toto',
        'counter'=> 'toto',
        'accountNumber'=> 'toto',
        'ribKey'=> 'toto',
        'iban'=> $settlement->getAccountIban(),
        'bic'=> $settlement->getAccountBic(),
        'monthlyInvestment'=> 'toto',
    ];

    $funds_origin = [];

    foreach ($settlement->getFundsOrigin() as $fundOrigin) {
        $funds_origin[] = [
            'label' => $fundOrigin->getCodeOrigin(),
            'date' => $fundOrigin->getDate(),
            'amount' => $fundOrigin->getAmount(),
        ];
    }
    $response['resp']['fundsOrigins'] = $funds_origin;

    $response['otherTaxCountry'] = 'toto';
    $response['taxCountry'] = 'toto';
    $response['nif'] = 'toto';
    $response['taxAddress'] = 'toto';
    $response['noDematerialization'] = 'toto';

    $response['resp']['initialRepartition'] = [
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

    $response['resp']['monthlyRepartition'] = [
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

    return $response;
}
}