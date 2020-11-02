<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\Model\Subscriber;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Options;

/**
 * Class SubscriberFactory.
 */
class SubscriberFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $availableCodeProfessionnalSituation = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_PROFESSIONNAL_SITUATION_CODES);
        $availableCodeFamilialSituation = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_FAMILIAL_SITUATION_CODES);
        $availableCodeNaf = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_NAF_CODES);
        $availableCspCode = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_CSPS_CODES);
        $availableTaxCountry = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_TAX_COUNTRY_CODES);
        $availableMatrimonialRegime = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_MATRIMONIAL_REGIME_CODES);
        $availableLegalCapacity = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_LEGAL_CAPACITY_CODES);
        $availableNationalities = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_NATIONALITIES);
        $availableIdentityDocCode = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_IDENTITY_DOCS);
        $availableBirthCountries = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_BIRTH_COUNTRY_CODES);
        $availableAddressCountries = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_ADDRESS_COUNTRY_CODES);
        $availableCivilities = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_CIVILITIES);

        $resolver
            ->setRequired('lastName')->setAllowedTypes('lastName', ['string', 'null'])
            ->setDefault('birthName', null)->setAllowedTypes('birthName', ['string', 'null'])
            ->setRequired('firstName')->setAllowedTypes('firstName', ['string', 'null'])
            ->setRequired('civility')->setAllowedTypes('civility', ['string', 'null'])->setAllowedValues('civility', $availableCivilities)
            ->setRequired('taxCountry')->setAllowedTypes('taxCountry', ['string', 'null'])->setAllowedValues('taxCountry', $availableTaxCountry)
            ->setRequired('nationality')->setAllowedTypes('nationality', ['string', 'null'])->setAllowedValues('nationality', $availableNationalities)
            ->setRequired('birthDate')->setAllowedTypes('birthDate', ['\DateTime', 'string'])->setNormalizer('birthDate', function (Options $options, $value) {
                if ($value instanceof \DateTime) {
                    return $value;
                }

                return \DateTime::createFromFormat('d/m/Y', $value);
            })
            ->setRequired('birthPlace')->setAllowedTypes('birthPlace', ['string'])
            ->setRequired('birthCountry')->setAllowedTypes('birthCountry', ['string'])->setAllowedValues('birthCountry', $availableBirthCountries)
            ->setDefault('birthPostalCode', null)->setAllowedTypes('birthPostalCode', ['string'])
            ->setDefault('birthDepartmentCode', null)->setAllowedTypes('birthDepartmentCode', ['string'])
            ->setDefault('birthInseeCode', null)->setAllowedTypes('birthInseeCode', ['string', 'null'])
            ->setDefault('ppeStateIndicator', false)->setAllowedTypes('ppeStateIndicator', ['bool'])
            ->setDefault('ppeFamilyStateIndicator', false)->setAllowedTypes('ppeFamilyStateIndicator', ['bool'])
            ->setDefault('usaCitizen', false)->setAllowedTypes('usaCitizen', ['bool'])
            ->setDefault('usaResident', false)->setAllowedTypes('usaResident', ['bool'])
            ->setRequired('legalCapacity')->setAllowedTypes('legalCapacity', ['string'])->setAllowedValues('legalCapacity', $availableLegalCapacity)
            ->setRequired('familialSituation')->setAllowedTypes('familialSituation', ['string'])->setAllowedValues('familialSituation', $availableCodeFamilialSituation)
            ->setRequired('professionalSituation')->setAllowedTypes('professionalSituation', ['string'])->setAllowedValues('professionalSituation', $availableCodeProfessionnalSituation)
            ->setDefault('matrimonialRegime', null)->setAllowedTypes('matrimonialRegime', ['string', 'null'])->setAllowedValues('matrimonialRegime', $availableMatrimonialRegime)
            ->setDefault('cspCode', null)->setAllowedTypes('cspCode', ['string', 'null'])->setAllowedValues('cspCode', $availableCspCode)
            ->setRequired('profession')->setAllowedTypes('profession', ['string', 'null'])
            ->setDefault('nafCode', null)->setAllowedTypes('nafCode', ['string', 'null'])->setAllowedValues('nafCode', $availableCodeNaf)
            ->setDefault('siretNumber', null)->setAllowedTypes('siretNumber', ['int', 'null'])
            ->setDefault('employerName', null)->setAllowedTypes('employerName', ['string', 'null'])
            ->setDefault('cspCodeLastProfession', null)->setAllowedTypes('cspCodeLastProfession', ['string', 'null'])->setAllowedValues('cspCode', $availableCspCode)
            ->setDefault('startDateInactivity', null)->setAllowedTypes('startDateInactivity', ['\DateTime', 'string'])->setNormalizer('startDateInactivity', function (Options $options, $value) {
                if ($value instanceof \DateTime) {
                    return $value;
                }

                return \DateTime::createFromFormat('d/m/Y', $value);
            })
            ->setRequired('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])
            ->setDefault('cellPhoneNumber', null)->setAllowedTypes('cellPhoneNumber', ['string', 'null'])
            ->setRequired('email')->setAllowedTypes('email', ['string'])
            ->setRequired('identityDocCode')->setAllowedTypes('identityDocCode', ['string'])->setAllowedValues('identityDocCode', $availableIdentityDocCode)
            ->setRequired('identityDocValidityDate')->setAllowedTypes('identityDocValidityDate', ['\DateTime', 'string'])->setNormalizer('identityDocValidityDate', function (Options $options, $value) {
                if ($value instanceof \DateTime) {
                    return $value;
                }

                return \DateTime::createFromFormat('d/m/Y', $value);
            })
            ->setDefault('addressPostalCode', null)->setAllowedTypes('addressPostalCode', ['string', 'null'])
            ->setDefault('addressCity', null)->setAllowedTypes('addressCity', ['string', 'null'])
            ->setRequired('addressCountryCode')->setAllowedTypes('addressCountryCode', ['string', 'null'])->setAllowedValues('addressCountryCode', $availableAddressCountries)
            ->setDefault('addressStreetName', null)->setAllowedTypes('addressStreetName', ['string', 'null'])
            ->setDefault('addressDropOffPoint', null)->setAllowedTypes('addressDropOffPoint', ['string', 'null'])
            ->setDefault('addressGeographicPoint', null)->setAllowedTypes('addressGeographicPoint', ['string', 'null'])
            ->setDefault('addressPostBox', null)->setAllowedTypes('addressPostBox', ['string', 'null'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new Subscriber())
            ->setLastName($resolvedData['lastName'])
            ->setFirstName($resolvedData['firstName'])
            ->setBirthName($resolvedData['birthName'])
            ->setCivility($resolvedData['civility'])
            ->setTaxCountry($resolvedData['taxCountry'])
            ->setNationality($resolvedData['nationality'])
            ->setBirthDate($resolvedData['birthDate'])
            ->setBirthPlace($resolvedData['birthPlace'])
            ->setBirthCountry($resolvedData['birthCountry'])
            ->setBirthPostalCode($resolvedData['birthPostalCode'])
            ->setBirthDepartmentCode($resolvedData['birthDepartmentCode'])
            ->setPpeStateIndicator($resolvedData['ppeStateIndicator'])
            ->setPpeFamilyStateIndicator($resolvedData['ppeFamilyStateIndicator'])
            ->setUsaCitizen($resolvedData['usaCitizen'])
            ->setUsaResident($resolvedData['usaResident'])
            ->setLegalCapacity($resolvedData['legalCapacity'])
            ->setFamilialSituation($resolvedData['familialSituation'])
            ->setProfessionalSituation($resolvedData['professionalSituation'])
            ->setMatrimonialRegime($resolvedData['matrimonialRegime'])
            ->setCspcode($resolvedData['cspCode'])
            ->setProfession($resolvedData['profession'])
            ->setNafCode($resolvedData['nafCode'])
            ->setSiretNumber($resolvedData['siretNumber'])
            ->setEmployerName($resolvedData['employerName'])
            ->setCspCodeLastProfession($resolvedData['cspCodeLastProfession'])
            ->setStartDateInactivity($resolvedData['startDateInactivity'])
            ->setPhoneNumber($resolvedData['phoneNumber'])
            ->setCellPhoneNumber($resolvedData['cellPhoneNumber'])
            ->setEmail($resolvedData['email'])
            ->setIdentityDocCode($resolvedData['identityDocCode'])
            ->setIdentityDocValidityDate($resolvedData['identityDocValidityDate'])
            ->setAddressPostalCode($resolvedData['addressPostalCode'])
            ->setAddressCity($resolvedData['addressCity'])
            ->setAddressCountryCode($resolvedData['addressCountryCode'])
            ->setAddressStreetName($resolvedData['addressStreetName'])
            ->setAddressDropOffPoint($resolvedData['addressDropOffPoint'])
            ->setAddressGeographicPoint($resolvedData['addressGeographicPoint'])
            ->setAddressPostbox($resolvedData['addressPostBox'])
        ;
    }
}
