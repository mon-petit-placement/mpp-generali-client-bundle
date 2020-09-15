<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class Subscriber.
 */
class Subscriber
{
    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $birthName;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $civility;

    /**
     * @var string
     */
    protected $taxCountry;

    /**
     * @var string
     */
    protected $nationality;

    /**
     * @var string
     */
    protected $birthDate;

    /**
     * @var string
     */
    protected $birthPlace;

    /**
     * @var string
     */
    protected $birthCountry;

    /**
     * @var string
     */
    protected $birthPostalCode;

    /**
     * @var string
     */
    protected $birthDepartmentCode;

    /**
     * @var string
     */
    protected $birthInseeCode;

    /**
     * @var bool
     */
    protected $ppeStateIndicator;

    /**
     * @var bool
     */
    protected $ppeFamilyStateIndicator;

    /**
     * @var bool
     */
    protected $usaCitizen;

    /**
     * @var bool
     */
    protected $usaResident;

    /**
     * @var string
     */
    protected $legalCapacity;

    /**
     * @var string
     */
    protected $familialSituation;

    /**
     * @var string
     */
    protected $professionalSituation;

    /**
     * @var string
     */
    protected $matrimonialRegime;

    /**
     * @var string
     */
    protected $cspCode;

    /**
     * @var string
     */
    protected $profession;

    /**
     * @var string
     */
    protected $nafCode;

    /**
     * @var string
     */
    protected $siretNumber;

    /**
     * @var string
     */
    protected $employerName;

    /**
     * @var string
     */
    protected $cspCodeLastProfession;

    /**
     * @var string
     */
    protected $startDateInactivity;

    /**
     * @var string
     */
    protected $phoneNumber;

    /**
     * @var string
     */
    protected $cellPhoneNumber;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $identityDocCode;

    /**
     * @var string
     */
    protected $identityDocValidityDate;

    /**
     * @var string
     */
    protected $addressPostalCode;

    /**
     * @var string
     */
    protected $addressCity;

    /**
     * @var string
     */
    protected $addressCountryCode;

    /**
     * @var string
     */
    protected $addressStreetName;

    /**
     * @var string
     */
    protected $addressDropOffPoint;

    /**
     * @var string
     */
    protected $addressGeographicPoint;

    /**
     * @var string
     */
    protected $addressPostBox;

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'noms' => [
                'nom' => $this->lastName,
                'prenom' => $this->lastName,
                'codeCivilite' => $this->civility,
                'nomNaissance' => $this->birthName,
            ],
            'residenceFiscale' => [
                'codePays' => $this->taxCountry,
            ],
            'naissance' => [
                'dateNaissance' => $this->birthDate,
                'lieuNaissance' => $this->birthPlace,
                'paysNaissance' => $this->birthCountry,
                'codeDepartementNaissance' => $this->birthDepartmentCode,
                'codeInseeCommuneNaissance' => $this->birthInseeCode,
                'codePostal' => $this->birthPostalCode,
            ],
            'nationalite' => $this->nationality,
            'complement' => [
                'situationFamiliale' => $this->familialSituation,
                'situationProfessionnelle' => $this->professionalSituation,
                'regimeMatrimonial' => $this->matrimonialRegime,
                'csp' => $this->cspCode,
                'profession' => $this->profession,
                'codeNaf' => $this->nafCode,
                'siret' => $this->siretNumber,
                'nomEmployeur' => $this->employerName,
                'cspDerniereProfession' => $this->cspCodeLastProfession,
                'dateDebutInactivite' => $this->startDateInactivity,
            ],
            'contact' => [
                'adressePostale' => [
                    'adresse1PointRemise' => $this->addressDropOffPoint,
                    'adresse2PointGeographique' => $this->addressGeographicPoint,
                    'adresse3LibelleVoie' => $this->addressCountryCode,
                    'adresse4LieuDitBP' => $this->addressPostBox,
                    'codePostal' => $this->addressPostalCode,
                    'commune' => $this->addressCity,
                    'codePays' => $this->addressCountryCode,
                    'nePasNormaliser' => true,
                ],
                'telephone' => $this->phoneNumber,
                'telephonePortable' => $this->cellPhoneNumber,
                'email' => $this->email,
            ],
            'ppe' => [
                'etatPPE' => [
                    'indicateur' => $this->ppeStateIndicator,
                ],
                'etatPPEFamille' => [
                    'indicateur' => $this->ppeFamilyStateIndicator,
                ],
            ],
            'fatca' => [
                'citoyenUSA' => $this->usaCitizen,
                'residenceUSA' => $this->usaResident,
            ],
            'pieceIdentite' => [
                'codePieceIdentite' => $this->identityDocCode,
                'dateValidite' => $this->identityDocValidityDate,
            ],
            'capaciteJuridique' => $this->legalCapacity,
        ];
    }

    /**
     * @param OptionsResolver $resolver
     */
    public static function configureData(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('firstname', null)->setAllowedTypes('firstname', ['string', 'null'])
            ->setDefault('lastname', null)->setAllowedTypes('lastname', ['string', 'null'])
            ->setDefault('organization', null)->setAllowedTypes('organization', ['string', 'null'])
            ->setDefault('emailAddress', null)->setAllowedTypes('emailAddress', ['string', 'null'])
            ->setDefault('phoneNum', null)->setAllowedTypes('phoneNum', ['string', 'null'])
            ->setDefault('profile', null)->setAllowedTypes('profile', ['string', 'null'])
            ->setDefault('language', null)->setAllowedTypes('language', ['string', 'null'])
            ->setDefault('role', 'signer')->setAllowedValues('role', ['signer', 'observer'])
            ->setDefault('birthDate', null)->setAllowedTypes('birthDate', ['DateTime', 'null'])->setNormalizer('birthDate', function (Options $options, $value): ?\Laminas\XmlRpc\Value\DateTime {
                if (null === $value) {
                    return null;
                }

                return new \Laminas\XmlRpc\Value\DateTime($value);
            })
            ->setDefault('universignId', null)->setAllowedTypes('universignId', ['string', 'null'])
            ->setDefault('successRedirection', null)->setAllowedTypes('successRedirection', ['array', 'null'])
            ->setDefault('cancelRedirection', null)->setAllowedTypes('cancelRedirection', ['array', 'null'])
            ->setDefault('failRedirection', null)->setAllowedTypes('failRedirection', ['array', 'null'])
            ->setDefault('validationSessionId', null)->setAllowedTypes('validationSessionId', ['string', 'null'])
            ->setDefault('idDocuments', null)->setAllowedTypes('idDocuments', ['array', 'null'])
            ->setDefault('certificateType', null)->setAllowedTypes('certificateType', ['string', 'null'])
            ->setDefault('redirectPolicy', 'dashboard')->setAllowedValues('redirectPolicy', ['dashboard', 'quick'])
            ->setDefault('redirectWait', 5)->setAllowedTypes('redirectWait', ['int'])
            ->setDefault('autoSendAgreements', null)->setAllowedTypes('autoSendAgreements', ['bool', 'null'])
            ->setDefault('invitationMessage', null)->setAllowedTypes('invitationMessage', ['string', 'null'])
        ;
    }

    /**
     * @param array $data
     *
     * @return Subscriber
     */
    public static function createFromArray(array $data): self
    {
        $resolver = new OptionsResolver();
        self::configureData($resolver);
        $resolvedData = $resolver->resolve($data);

        return (new self())
            ->setFirstname($resolvedData['firstname'])
            ->setLastname($resolvedData['lastname'])
            ->setOrganization($resolvedData['organization'])
            ->setProfile($resolvedData['profile'])
            ->setEmailAddress($resolvedData['emailAddress'])
            ->setPhoneNum($resolvedData['phoneNum'])
            ->setLanguage($resolvedData['language'])
            ->setRole($resolvedData['role'])
            ->setBirthDate($resolvedData['birthDate'])
            ->setUniversignId($resolvedData['universignId'])
            ->setSuccessRedirection($resolvedData['successRedirection'])
            ->setCancelRedirection($resolvedData['cancelRedirection'])
            ->setFailRedirection($resolvedData['failRedirection'])
            ->setCertificateType($resolvedData['certificateType'])
            ->setIdDocuments($resolvedData['idDocuments'])
            ->setValidationSessionId($resolvedData['validationSessionId'])
            ->setRedirectPolicy($resolvedData['redirectPolicy'])
            ->setRedirectWait($resolvedData['redirectWait'])
            ->setAutoSendAgreements($resolvedData['autoSendAgreements'])
            ->setInvitationMessage($resolvedData['invitationMessage'])
            ;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $birthName
     */
    public function setBirthName(string $birthName): void
    {
        $this->birthName = $birthName;
    }

    /**
     * @return string
     */
    public function getBirthName(): string
    {
        return $this->birthName;
    }

    /**
     * @return string
     */
    public function getCivility(): string
    {
        return $this->civility;
    }

    /**
     * @param string $civility
     */
    public function setCivility(string $civility): void
    {
        $this->civility = $civility;
    }

    /**
     * @return string
     */
    public function getTaxCountry(): string
    {
        return $this->taxCountry;
    }

    /**
     * @param string $taxCountry
     */
    public function setTaxCountry(string $taxCountry): void
    {
        $this->taxCountry = $taxCountry;
    }

    /**
     * @return string
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    public function setNationality(string $nationality): void
    {
        $this->nationality = $nationality;
    }

    /**
     * @return string
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     */
    public function setBirthDate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return string
     */
    public function getBirthPlace(): string
    {
        return $this->birthPlace;
    }

    /**
     * @param string $birthPlace
     */
    public function setBirthPlace(string $birthPlace): void
    {
        $this->birthPlace = $birthPlace;
    }

    /**
     * @return string
     */
    public function getBirthCountry(): string
    {
        return $this->birthCountry;
    }

    /**
     * @param string $birthCountry
     */
    public function setBirthCountry(string $birthCountry)
    {
        $this->birthCountry = $birthCountry;
    }

    /**
     * @return string
     */
    public function getBirthPostalCode(): string
    {
        return $this->birthPostalCode;
    }

    /**
     * @param string $birthPostalCode
     */
    public function setBirthPostalCode(string $birthPostalCode): void
    {
        $this->birthPostalCode = $birthPostalCode;
    }

    /**
     * @return string
     */
    public function getBirthDepartmentCode(): string
    {
        return $this->birthDepartmentCode;
    }

    /**
     * @param string $birthDepartmentCode
     */
    public function setBirthDepartmentCode(string $birthDepartmentCode): void
    {
        $this->birthDepartmentCode = $birthDepartmentCode;
    }

    /**
     * @param string $birthInseeCode
     */
    public function setBirthInseeCode(string $birthInseeCode): void
    {
        $this->birthInseeCode = $birthInseeCode;
    }

    /**
     * @param string $ppeStateIndicator
     */
    public function setPpeStateIndicator(string $ppeStateIndicator): void
    {
        $this->ppeStateIndicator = $ppeStateIndicator;
    }

    /**
     * @return string
     */
    public function getPpeStateIndicator(): string
    {
        return $this->ppeStateIndicator;
    }

    /**
     * @param string $ppeFamilyStateIndicator
     */
    public function setPpeFamilyStateIndicator(string $ppeFamilyStateIndicator): void
    {
        $this->ppeFamilyStateIndicator = $ppeFamilyStateIndicator;
    }

    /**
     * @return string
     */
    public function getPpeFamilyStateIndicator(): string
    {
        return $this->ppeFamilyStateIndicator;
    }

    /**
     * @param bool $usaCitizen
     */
    public function setUsaCitizen(bool $usaCitizen): void
    {
        $this->usaCitizen = $usaCitizen;
    }

    /**
     * @return bool
     */
    public function getUsaCitizen(): bool
    {
        return $this->usaCitizen;
    }

    /**
     * @return bool
     */
    public function getUsaResident(): bool
    {
        return $this->usaResident;
    }

    /**
     * @param bool $usaResident
     */
    public function setUsaResident(bool $usaResident)
    {
        $this->usaResident = $usaResident;
    }

    /**
     * @return string
     */
    public function getLegalLegacy(): string
    {
        return $this->legalCapacity;
    }

    /**
     * @param string $legalLegacy
     */
    public function setLegalLecay(string $legalLegacy): void
    {
        $this->legalCapacity = $legalLegacy;
    }

    /**
     * @return string
     */
    public function getFamilialSituation(): string
    {
        return $this->familialSituation;
    }

    /**
     * @param string $familialSituation
     */
    public function setFamilialSituation(string $familialSituation): void
    {
        $this->familialSituation = $familialSituation;
    }

    /**
     * @return string
     */
    public function getProfessionalSituation(): string
    {
        return $this->professionalSituation;
    }

    /**
     * @param string $professionalSituation
     */
    public function setProfessionalSituation(string $professionalSituation): void
    {
        $this->professionalSituation = $professionalSituation;
    }

    /**
     * @return string
     */
    public function getMatrimonialRegime(): string
    {
        return $this->matrimonialRegime;
    }

    /**
     * @param string $matrimonialRegime
     */
    public function setMatrimonialRegime(string $matrimonialRegime): void
    {
        $this->matrimonialRegime = $matrimonialRegime;
    }

    /**
     * @return string
     */
    public function getCspCode(): string
    {
        return $this->cspCode;
    }

    /**
     * @param string $cspCode
     */
    public function setCspcode(string $cspCode): void
    {
        $this->cspCode = $cspCode;
    }

    /**
     * @return string
     */
    public function getProfession(): string
    {
        return $this->profession;
    }

    /**
     * @param string $profession
     */
    public function setProfession(string $profession): void
    {
        $this->profession = $profession;
    }

    /**
     * @return string
     */
    public function getNafCode(): string
    {
        return $this->nafCode;
    }

    /**
     * @param string $nafCode
     */
    public function setNafCode(string $nafCode): void
    {
        $this->nafCode = $nafCode;
    }

    /**
     * @param string $siretNumber
     */
    public function setSiretNumber(string $siretNumber): void
    {
        $this->siretNumber = $siretNumber;
    }

    /**
     * @return string
     */
    public function getSiretNumber(): string
    {
        return $this->siretNumber;
    }

    /**
     * @return string
     */
    public function getEmployerName(): string
    {
        return $this->employerName;
    }

    /**
     * @param string $employerName
     */
    public function setEmployerName(string $employerName): void
    {
        $this->employerName = $employerName;
    }

    /**
     * @return string
     */
    public function getCspCodeLastProfession(): string
    {
        return $this->cspCodeLastProfession;
    }

    /**
     * @param string $cspCodeLastProfession
     */
    public function setCspCodeLastProfession(string $cspCodeLastProfession): void
    {
        $this->cspCodeLastProfession = $cspCodeLastProfession;
    }

   /**
    * @return string
    */
   public function getStartDateInactivity(): string
   {
       return $this->startDateInactivity;
   }

   /**
    * @param string $startDateInactivity
    */
   public function setStartDateInactivity(string $startDateInactivity): void
   {
       $this->startDateInactivity = $startDateInactivity;
   }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @return string
     */
    public function getCellPhoneNumber(): string
    {
        return $this->cellPhoneNumber;
    }

    /**
     * @param string $cellPhoneNumber
     */
    public function setCellPhoneNumber(string $cellPhoneNumber): void
    {
        $this->cellPhoneNumber = $cellPhoneNumber;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getIdentityDocCode(): string
    {
        return $this->identityDocCode;
    }

    /**
     * @param string $identityDocCode
     */
    public function setIdentityDocCode(string $identityDocCode): void
    {
        $this->identityDocCode = $identityDocCode;
    }

    /**
     * @return string
     */
    public function getIdentityDocValidityDate(): string
    {
        return $this->identityDocValidityDate;
    }

    /**
     * @param string $identityDocValidityDate
     */
    public function setIdentityDocValidityDate(string $identityDocValidityDate): void
    {
        $this->identityDocValidityDate = $identityDocValidityDate;
    }

    /**
     * @return string
     */
    public function getAddressPostalCode(): string
    {
        return $this->addressPostalCode;
    }

    /**
     * @param string $addressPostalCode
     */
    public function setAddressPostalCode(string $addressPostalCode): void
    {
        $this->addressPostalCode = $addressPostalCode;
    }

    /**
     * @return string
     */
    public function getAddressCity(): string
    {
        return $this->addressCity;
    }

    /**
     * @param string $addressCity
     */
    public function setAddressCity(string $addressCity): void
    {
        $this->addressCity = $addressCity;
    }

    /**
     * @return string
     */
    public function getAddressCountryCode(): string
    {
        return $this->addressCountryCode;
    }

    /**
     * @param string $addressCountryCode
     */
    public function setAddressCountryCode(string $addressCountryCode): void
    {
        $this->addressCountryCode = $addressCountryCode;
    }

    /**
     * @return string
     */
    public function getAddressStreetName(): string
    {
        return $this->addressStreetName;
    }

    /**
     * @param string $addressStreeName
     */
    public function setAddressStreetName(string $addressStreeName): void
    {
        $this->addressStreetName = $addressStreeName;
    }

   /**
    * @return string
    */
   public function getAddressDropOffPoint(): string
   {
       return $this->addressDropOffPoint;
   }

   /**
    * @param string $addressDropOffPoint
    */
   public function setAddressDropOffPoint(string $addressDropOffPoint): void
   {
       $this->addressDropOffPoint = $addressDropOffPoint;
   }

   /**
    * @return string
    */
   public function getAddressGeographicPoint(): string
   {
       return $this->addressGeographicPoint;
   }

   /**
    * @param string $addressGeographicPoint
    */
   public function setAddressGeographicPoint(string $addressGeographicPoint): void
   {
       $this->addressGeographicPoint = $addressGeographicPoint;
   }

   /**
    * @return string
    */
   public function getAddressPostBox(): string
   {
       return $this->addressPostBox;
   }

   /**
    * @param string $addressPostBox
    */
   public function setAddressPostbox(string $addressPostBox): void
   {
       $this->addressPostBox = $addressPostBox;
   }
}
