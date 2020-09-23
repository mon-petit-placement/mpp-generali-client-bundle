<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\Subscriber;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Options;

/**
 * Class SubscriberFactory
 */
class SubscriberFactory extends AbstractFactory
{
    /**
     * {@inheritDoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $availableCodeProfessionnalSituation = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_PROFESSIONNAL_SITUATIONS);
        $availableCodeFamilialSituation = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_FAMILIAL_SITUATIONS);
        $availableCodeNaf = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_NAF_CODES);
        $availableCspCode = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_CSPS_CODES);
        $availableTaxCountry = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_TAX_COUNTRIES);
        $availableMatrimonialRegime = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_MATRIMONIAL_REGIMES);
        $availableLegalCapacity = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_LEGAL_CAPACITIES);
        $availableNationalities = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_NATIONALITIES);
        $availableIdentityDocCode = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_IDENTITY_DOCS);
        $availableBirthCountries = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_BIRTH_COUNTRIES);
        $availableAddressCountries = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_ADDRESS_COUNTRIES);
        $availableCivilities = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_CIVILITIES);
        
        $resolver
            ->setRequired('lastName')->setAllowedTypes('lastName', ['string', 'null'])
            ->setDefined('birthName')->setAllowedTypes('birthName', ['string', 'null'])
            ->setRequired('firstName')->setAllowedTypes('firstName', ['string', 'null'])
            ->setRequired('civility')->setAllowedTypes('civility', ['string', 'null'])->setAllowedValues('civility', $availableCivilities)
            ->setRequired('taxCountry')->setAllowedTypes('taxCountry', ['string', 'null'])->setAllowedValues('taxCountry', $availableTaxCountry)
            ->setRequired('nationality')->setAllowedTypes('nationality', ['string', 'null'])->setAllowedValues('nationality', $availableNationalities)
            ->setRequired('birthDate')->setAllowedTypes('birthDate', ['\DateTime', 'string'])->setNormalizer('birthDate', function(Options $options, $value) {
                if ($value instanceof \DateTime) {
                    return $value;
                }

                return \DateTime::createFromFormat('d/m/Y', $value);
            })
            ->setRequired('birthPlace')->setAllowedTypes('birthPlace', ['string'])
            ->setRequired('birthCountry')->setAllowedTypes('birthCountry', ['string'])->setAllowedValues('birthCountry', $availableBirthCountries)
            ->setDefined('birthPostalCode')->setAllowedTypes('birthPostalCode', ['string'])
            ->setDefined('birthDepartmentCode')->setAllowedTypes('birthDepartmentCode', ['string'])
            ->setDefined('birthInseeCode')->setAllowedTypes('birthInseeCode', ['string', 'null'])
            ->setDefault('ppeStateIndicator', false)->setAllowedTypes('ppeStateIndicator', ['bool'])
            ->setDefault('ppeFamilyStateIndicator', false)->setAllowedTypes('ppeFamilyStateIndicator', ['bool'])
            ->setDefault('usaCitizen', false)->setAllowedTypes('usaCitizen', ['bool'])
            ->setDefault('usaResident', false)->setAllowedTypes('usaResident', ['bool'])
            ->setRequired('legalCapacity')->setAllowedTypes('legalCapacity', ['string'])->setAllowedValues('legalCapacity', $availableLegalCapacity)
            ->setRequired('familialSituation')->setAllowedTypes('familialSituation', ['string'])->setAllowedValues('familialSituation', $availableCodeFamilialSituation)
            ->setRequired('professionalSituation')->setAllowedTypes('professionalSituation', ['string'])->setAllowedValues('professionalSituation', $availableCodeProfessionnalSituation)
            ->setDefined('matrimonialRegime')->setAllowedTypes('matrimonialRegime', ['string', 'null'])->setAllowedValues('matrimonialRegime', $availableMatrimonialRegime)
            ->setDefined('cspCode')->setAllowedTypes('cspCode', ['string', 'null'])->setAllowedValues('cspCode', $availableCspCode)
            ->setRequired('profession')->setAllowedTypes('profession', ['string', 'null'])
            ->setDefined('nafCode')->setAllowedTypes('nafCode', ['string', 'null'])->setAllowedValues('nafCode', $availableCodeNaf)
            ->setDefined('siretNumber')->setAllowedTypes('siretNumber', ['int', 'null'])
            ->setDefined('employerName')->setAllowedTypes('employerName', ['string', 'null'])
            ->setDefined('cspCodeLastProfession')->setAllowedTypes('cspCodeLastProfession', ['string', 'null'])->setAllowedValues('cspCode', $availableCspCode)
            ->setDefined('startDateInactivity')->setAllowedTypes('startDateInactivity', ['\DateTime', 'string'])->setNormalizer('startDateInactivity', function(Options $options, $value) {
                if ($value instanceof \DateTime) {
                    return $value;
                }

                return \DateTime::createFromFormat('d/m/Y', $value);
            })
            ->setRequired('phoneNumber')->setAllowedTypes('phoneNumber', ['string'])
            ->setDefined('cellPhoneNumber')->setAllowedTypes('cellPhoneNumber', ['string', 'null'])
            ->setRequired('email')->setAllowedTypes('email', ['string'])
            ->setRequired('identityDocCode')->setAllowedTypes('identityDocCode', ['string'])->setAllowedValues('identityDocCode', $availableIdentityDocCode)
            ->setRequired('identityDocValidityDate')->setAllowedTypes('identityDocValidityDate', ['\DateTime', 'string'])->setNormalizer('identityDocValidityDate', function(Options $options, $value) {
                if ($value instanceof \DateTime) {
                    return $value;
                }

                return \DateTime::createFromFormat('d/m/Y', $value);
            })
            ->setDefined('addressPostalCode')->setAllowedTypes('addressPostalCode', ['string', 'null'])
            ->setDefined('addressCity')->setAllowedTypes('addressCity', ['string', 'null'])
            ->setRequired('addressCountryCode')->setAllowedTypes('addressCountryCode', ['string', 'null'])->setAllowedValues('addressCountryCode', $availableAddressCountries)
            ->setDefined('addressStreetName')->setAllowedTypes('addressStreetName', ['string', 'null'])
            ->setDefined('addressDropOffPoint')->setAllowedTypes('addressDropOffPoint', ['string', 'null'])
            ->setDefined('addressGeographicPoint')->setAllowedTypes('addressGeographicPoint', ['string', 'null'])
            ->setDefined('addressPostBox')->setAllowedTypes('addressPostBox', ['string', 'null'])
        ;
    }

    /**
     * {@inheritDoc}
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