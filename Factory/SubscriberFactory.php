<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\Subscriber;

/**
 * Class SubscriberFactory
 */
class SubscriberFactory
{
    /**
     * @var GeneraliHttpClientInterface
     */
    private $httpClient;

    /**
     * @param GeneraliHttpClientInterface $httpClient
     */
    public function __construct(GeneraliHttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureData(OptionsResolver $resolver)
    {
        $availableCodeProfessionnalSituation = $this->httpClient->availableCodeProfessionnalSituations($contractNumber);
        $availableCodeFamilialSituation = $this->httpClient->availableCodeFamilialSituations($contractNumber);

        $resolver
            ->setDefault('lastName', null)->setAllowedTypes('lastName', ['string', 'null'])
            ->setDefault('birthName', null)->setAllowedTypes('birthName', ['string', 'null'])
            ->setDefault('firstName', null)->setAllowedTypes('firstName', ['string', 'null'])
            ->setDefault('civility', null)->setAllowedTypes('civility', ['string', 'null'])
            ->setDefault('taxCountry', null)->setAllowedTypes('taxCountry', ['string', 'null'])
            ->setDefault('nationality', null)->setAllowedTypes('nationality', ['string', 'null'])
            ->setDefault('birthDate', null)->setAllowedTypes('birthDate', ['\DateTime', 'null'])
            ->setDefault('birthPlace', null)->setAllowedTypes('birthPlace', ['string', 'null'])
            ->setDefault('birthCountry', null)->setAllowedTypes('birthCountry', ['string', 'null'])
            ->setDefault('birthPostalCode', null)->setAllowedTypes('birthPostalCode', ['string', 'null'])
            ->setDefault('birthDepartmentCode', null)->setAllowedTypes('birthDepartmentCode', ['string', 'null'])
            ->setDefault('birthInseeCode', null)->setAllowedTypes('birthInseeCode', ['string', 'null'])
            ->setDefault('ppeStateIndicator', false)->setAllowedTypes('ppeStateIndicator', ['bool', 'null'])
            ->setDefault('ppeFamilyStateIndicator', false)->setAllowedTypes('ppeFamilyStateIndicator', ['bool', 'null'])
            ->setDefault('usaCitizen', false)->setAllowedTypes('usaCitizen', ['bool', 'null'])
            ->setDefault('usaResident', false)->setAllowedTypes('usaResident', ['bool', 'null'])
            ->setDefault('legalCapacity', null)->setAllowedTypes('legalCapacity', ['string', 'null'])
            ->setDefault('familialSituation', null)->setAllowedTypes('familialSituation', ['string', 'null'])->setAllowedValues('familialSituation', $availableCodeFamilialSituation)
            ->setDefault('professionalSituation', null)->setAllowedTypes('professionalSituation', ['string', 'null'])->setAllowedValues('professionalSituation', $availableCodeProfessionnalSituation)
            ->setDefault('matrimonialRegime', null)->setAllowedTypes('matrimonialRegime', ['string', 'null'])
            ->setDefault('cspCode', null)->setAllowedTypes('cspCode', ['string', 'null'])
            ->setDefault('profession', null)->setAllowedTypes('profession', ['string', 'null'])
            ->setDefault('nafCode', null)->setAllowedTypes('nafCode', ['string', 'null'])
            ->setDefault('siretNumber', null)->setAllowedTypes('siretNumber', ['string', 'null'])
            ->setDefault('employerName', null)->setAllowedTypes('employerName', ['string', 'null'])
            ->setDefault('cspCodeLastProfession', null)->setAllowedTypes('cspCodeLastProfession', ['string', 'null'])
            ->setDefault('startDateInactivity', null)->setAllowedTypes('startDateInactivity', ['\DateTime', 'null'])
            ->setDefault('phoneNumber', null)->setAllowedTypes('phoneNumber', ['string', 'null'])
            ->setDefault('cellPhoneNumber', null)->setAllowedTypes('cellPhoneNumber', ['string', 'null'])
            ->setDefault('email', null)->setAllowedTypes('email', ['string', 'null'])
            ->setDefault('identityDocCode', null)->setAllowedTypes('identityDocCode', ['string', 'null'])
            ->setDefault('identityDocValidityDate', null)->setAllowedTypes('identityDocValidityDate', ['\DateTime', 'null'])
            ->setDefault('addressPostalCode', null)->setAllowedTypes('addressPostalCode', ['string', 'null'])
            ->setDefault('addressCity', null)->setAllowedTypes('addressCity', ['string', 'null'])
            ->setDefault('addressCountryCode', null)->setAllowedTypes('addressCountryCode', ['string', 'null'])
            ->setDefault('addressStreetName', null)->setAllowedTypes('addressStreetName', ['string', 'null'])
            ->setDefault('addressDropOffPoint', null)->setAllowedTypes('addressDropOffPoint', ['string', 'null'])
            ->setDefault('addressGeographicPoint', null)->setAllowedTypes('addressGeographicPoint', ['string', 'null'])
            ->setDefault('addressPostBox', null)->setAllowedTypes('addressPostBox', ['string', 'null'])
        ;
    }

    /**
     * @param array $data
     *
     * @return Subscriber
     */
    public function create(array $data): self
    {
        $resolver = new OptionsResolver();
        self::configureData($resolver);
        $resolvedData = $resolver->resolve($data);

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
            ->setLegalLecay($resolvedData['legalLegacy'])
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
            ->setAddressStreetName($resolvedData['addressStreeName'])
            ->setAddressDropOffPoint($resolvedData['addressDropOffPoint'])
            ->setAddressGeographicPoint($resolvedData['addressGeographicPoint'])
            ->setAddressPostbox($resolvedData['addressPostBox'])
            ;
    }
}