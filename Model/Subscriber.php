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
     * @var \DateTime
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
     * @var \DateTime
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
     * @var \DateTime
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
     * @param string $lastName
     * @return Subscriber
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
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
     * @return Subscriber
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string $birthName
     * @return Subscriber
     */
    public function setBirthName(string $birthName): self
    {
        $this->birthName = $birthName;

        return $this;
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
     * @return Subscriber
     */
    public function setCivility(string $civility): self
    {
        $this->civility = $civility;

        return $this;
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
     * @return Subscriber
     */
    public function setTaxCountry(string $taxCountry): self
    {
        $this->taxCountry = $taxCountry;

        return $this;
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
     * @return Subscriber
     */
    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate(): \DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     * @return Subscriber
     */
    public function setBirthDate(\DateTime $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
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
     * @return Subscriber
     */
    public function setBirthPlace(string $birthPlace): self
    {
        $this->birthPlace = $birthPlace;

        return $this;
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
     * @return Subscriber
     */
    public function setBirthCountry(string $birthCountry): self
    {
        $this->birthCountry = $birthCountry;

        return $this;
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
     * @return Subscriber
     */
    public function setBirthPostalCode(string $birthPostalCode): self
    {
        $this->birthPostalCode = $birthPostalCode;

        return $this;
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
     * @return Subscriber
     */
    public function setBirthDepartmentCode(string $birthDepartmentCode): self
    {
        $this->birthDepartmentCode = $birthDepartmentCode;

        return $this;
    }

    /**
     * @param string $birthInseeCode
     */
    public function setBirthInseeCode(string $birthInseeCode): self
    {
        $this->birthInseeCode = $birthInseeCode;

        return $this;
    }

    /**
     * @param string $ppeStateIndicator
     * @return Subscriber
     */
    public function setPpeStateIndicator(string $ppeStateIndicator): self
    {
        $this->ppeStateIndicator = $ppeStateIndicator;

        return $this;
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
     * @return Subscriber
     */
    public function setPpeFamilyStateIndicator(string $ppeFamilyStateIndicator): self
    {
        $this->ppeFamilyStateIndicator = $ppeFamilyStateIndicator;

        return $this;
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
     * @return Subscriber
     */
    public function setUsaCitizen(bool $usaCitizen): self
    {
        $this->usaCitizen = $usaCitizen;

        return $this;
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
     * @return Subscriber
     */
    public function setUsaResident(bool $usaResident): self
    {
        $this->usaResident = $usaResident;

        return $this;
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
    public function setLegalLecay(string $legalLegacy): self
    {
        $this->legalCapacity = $legalLegacy;

        return $this;
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
     * @return Subscriber
     */
    public function setFamilialSituation(string $familialSituation): self
    {
        $this->familialSituation = $familialSituation;

        return $this;
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
     * @return Subscriber
     */
    public function setProfessionalSituation(string $professionalSituation): self
    {
        $this->professionalSituation = $professionalSituation;

        return $this;
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
     * @return Subscriber
     */
    public function setMatrimonialRegime(string $matrimonialRegime): self
    {
        $this->matrimonialRegime = $matrimonialRegime;

        return $this;
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
     * @return Subscriber
     */
    public function setCspcode(string $cspCode): self
    {
        $this->cspCode = $cspCode;

        return $this;
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
     * @return Subscriber
     */
    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
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
     * @return Subscriber
     */
    public function setNafCode(string $nafCode): self
    {
        $this->nafCode = $nafCode;

        return $this;
    }

    /**
     * @param string $siretNumber
     * @return Subscriber
     */
    public function setSiretNumber(string $siretNumber): self
    {
        $this->siretNumber = $siretNumber;

        return $this;
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
     * @return Subscriber
     */
    public function setEmployerName(string $employerName): self
    {
        $this->employerName = $employerName;

        return $this;
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
     * @return Subscriber
     */
    public function setCspCodeLastProfession(string $cspCodeLastProfession): self
    {
        $this->cspCodeLastProfession = $cspCodeLastProfession;

        return $this;
    }

   /**
    * @return \DateTime
    */
   public function getStartDateInactivity(): \DateTime
   {
       return $this->startDateInactivity;
   }

    /**
     * @param \DateTime $startDateInactivity
     * @return Subscriber
     */
   public function setStartDateInactivity(\DateTime $startDateInactivity): self
   {
       $this->startDateInactivity = $startDateInactivity;

       return $this;
   }

    /**
     * @param string $phoneNumber
     * @return Subscriber
     */
    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
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
     * @return Subscriber
     */
    public function setCellPhoneNumber(string $cellPhoneNumber): self
    {
        $this->cellPhoneNumber = $cellPhoneNumber;

        return $this;
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
     * @return Subscriber
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
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
     * @return Subscriber
     */
    public function setIdentityDocCode(string $identityDocCode): self
    {
        $this->identityDocCode = $identityDocCode;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getIdentityDocValidityDate(): \DateTime
    {
        return $this->identityDocValidityDate;
    }

    /**
     * @param \DateTime $identityDocValidityDate
     * @return Subscriber
     */
    public function setIdentityDocValidityDate(\DateTime $identityDocValidityDate): self
    {
        $this->identityDocValidityDate = $identityDocValidityDate;

        return $this;
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
     * @return Subscriber
     */
    public function setAddressPostalCode(string $addressPostalCode): self
    {
        $this->addressPostalCode = $addressPostalCode;

        return $this;
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
     * @return Subscriber
     */
    public function setAddressCity(string $addressCity): self
    {
        $this->addressCity = $addressCity;

        return $this;
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
     * @return Subscriber
     */
    public function setAddressCountryCode(string $addressCountryCode): self
    {
        $this->addressCountryCode = $addressCountryCode;

        return $this;
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
     * @return Subscriber
     */
    public function setAddressStreetName(string $addressStreeName): self
    {
        $this->addressStreetName = $addressStreeName;

        return $this;
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
     * @return Subscriber
     */
   public function setAddressDropOffPoint(string $addressDropOffPoint): self
   {
       $this->addressDropOffPoint = $addressDropOffPoint;

       return $this;
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
     * @return Subscriber
     */
   public function setAddressGeographicPoint(string $addressGeographicPoint): self
   {
       $this->addressGeographicPoint = $addressGeographicPoint;

       return $this;
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
     * @return Subscriber
     */
   public function setAddressPostbox(string $addressPostBox): self
   {
       $this->addressPostBox = $addressPostBox;

       return $this;
   }
}
