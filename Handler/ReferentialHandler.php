<?php

namespace Mpp\GeneraliClientBundle\Handler;

use Mpp\GeneraliClientBundle\Client\GeneraliClientRegistryInterface;
use Mpp\GeneraliClientBundle\Model\Contexte;
use Mpp\GeneraliClientBundle\Model\Referentiel;
use Mpp\GeneraliClientBundle\Model\TranchePatrimoine;
use Mpp\GeneraliClientBundle\Model\TrancheRevenus;
use ReflectionClass;
use UnexpectedValueException;

/**
 * Class ReferentialHandler.
 */
class ReferentialHandler
{
    const REFERENTIEL_SITUATIONS_PROFESSIONNELLES = 'situationsProfessionnelles';
    const REFERENTIEL_SITUATIONS_FAMILIALES = 'situationsFamiliales';
    const REFERENTIEL_TRANCHES_REVENU = 'tranchesRevenu';
    const REFERENTIEL_TRANCHES_PATRIMOINE = 'tranchesPatrimoine';
    const REFERENTIEL_ORIGINES_FONDS = 'originesFonds';
    const REFERENTIEL_DETAIL = 'detail';
    const REFERENTIEL_LIENS_CO_CONTRACTANT = 'liensCoContractant';
    const REFERENTIEL_FONCTIONS_PPE = 'fonctionsPPE';
    const REFERENTIEL_LIENS_CONTRACTANT_PPE = 'liensContractantPPE';
    const REFERENTIEL_OBJECTIFS_VERSEMENT = 'objectifsVersement';
    const REFERENTIEL_CODES_NAF = 'codesNaf';
    const REFERENTIEL_CSPS = 'csps';
    const REFERENTIEL_PAYS_RESIDENCE_FISCALE = 'paysResidenceFiscale';
    const REFERENTIEL_REGIMES_MATRIMONIAUX = 'regimesMatrimoniaux';
    const REFERENTIEL_REPARTITIONS_PATRIMOINE = 'repartitionsPatrimoine';
    const REFERENTIEL_ORIGINES_PATRIMOINES = 'originesPatrimoine';
    const REFERENTIEL_CAPACITES_JURIDIQUES = 'capacitesJuridiques';
    const REFERENTIEL_NATIONALITES = 'nationalites';
    const REFERENTIEL_PIECES_JUSTIFICATIVES = 'piecesJustificatives';
    const REFERENTIEL_PAYS_NAISSANCE = 'paysNaissance';
    const REFERENTIEL_PAYS_ADRESSES = 'paysAdresses';
    const REFERENTIEL_PAYS_CRS_OCDE = 'paysCrsOcde';
    const REFERENTIEL_CIVILITES = 'civilites';
    const REFERENTIEL_PIECES_IDENTITE = 'piecesIdentite';
    const REFERENTIEL_SECONDES_PIECES_IDENTITE = 'secondesPiecesIdentite';
    const REFERENTIEL_FONDS_INVESTISSABLES = 'fondsInvestissables';
    const REFERENTIEL_EPARGNE_ATTEINTE = 'epargneAtteinte';

    const AVAILABLE_REFERENTIALS = [
        self::REFERENTIEL_SITUATIONS_PROFESSIONNELLES,
        self::REFERENTIEL_SITUATIONS_FAMILIALES,
        self::REFERENTIEL_TRANCHES_REVENU,
        self::REFERENTIEL_TRANCHES_PATRIMOINE,
        self::REFERENTIEL_ORIGINES_FONDS,
        self::REFERENTIEL_DETAIL,
        self::REFERENTIEL_LIENS_CO_CONTRACTANT,
        self::REFERENTIEL_FONCTIONS_PPE,
        self::REFERENTIEL_LIENS_CONTRACTANT_PPE,
        self::REFERENTIEL_OBJECTIFS_VERSEMENT,
        self::REFERENTIEL_CODES_NAF,
        self::REFERENTIEL_CSPS,
        self::REFERENTIEL_PAYS_RESIDENCE_FISCALE,
        self::REFERENTIEL_REGIMES_MATRIMONIAUX,
        self::REFERENTIEL_REPARTITIONS_PATRIMOINE,
        self::REFERENTIEL_ORIGINES_PATRIMOINES,
        self::REFERENTIEL_CAPACITES_JURIDIQUES,
        self::REFERENTIEL_NATIONALITES,
        self::REFERENTIEL_PIECES_JUSTIFICATIVES,
        self::REFERENTIEL_PAYS_NAISSANCE,
        self::REFERENTIEL_PAYS_ADRESSES,
        self::REFERENTIEL_PAYS_CRS_OCDE,
        self::REFERENTIEL_CIVILITES,
        self::REFERENTIEL_PIECES_IDENTITE,
        self::REFERENTIEL_SECONDES_PIECES_IDENTITE,
        self::REFERENTIEL_FONDS_INVESTISSABLES,
        self::REFERENTIEL_EPARGNE_ATTEINTE,
    ];

    /**
     * @var GeneraliClientRegistryInterface
     */
    private $registry;

    public function __construct(GeneraliClientRegistryInterface $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @return Referentiel
     */
    public function getReferential(): Referentiel
    {
        return $this->registry->getSubscription()->getData([Contexte::ELEMENT_ATTENDU_REFERENTIEL])->getDonnees()->getReferentiel();
    }

    /**
     * @param string $referentialKey
     *
     * @return array
     */
    public function getReferentialCodes(string $referentialKey): array
    {
        return self::extractReferentialCodes($this->getReferential(), $referentialKey);
    }

    /**
     * @param string $referentialKey
     * @param string $subReferentialKey
     *
     * @return array
     */
    public function getSubReferentialCode(string $referentialKey, string $subReferentialKey): array
    {
        return self::extractSubReferentialCodes($this->getReferential(), $referentialKey, $subReferentialKey);
    }

    /**
     * @param string $referentialKey
     * @param float  $searchedAmount
     *
     * @return string|null
     */
    public function guessReferentialCode(string $referentialKey, float $searchedAmount): ?string
    {
        return self::guessCodeByAmount($this->getReferential(), $referentialKey, $searchedAmount);
    }

    /**
     * @param string $expectedItem
     *
     * @return array
     */
    public function getExpectedItemCodes(string $expectedItem): array
    {
        return self::extractExpectedItemsCode($this->getReferential(), $expectedItem);
    }

    /**
     * @param array  $data
     * @param string $referentialKey
     *
     * @return array
     */
    public static function extractReferentialCodes(Referentiel $referential, string $referentialKey): array
    {
        $extractedData = self::getReferentialKeyData($referential, $referentialKey);

        return array_map(function ($value) {
            return $value->getCode();
        }, $extractedData);
    }

    /**
     * @param array  $data
     * @param string $referentialKey
     * @param string $subReferentialKey
     *
     * @return array
     */
    public static function extractSubReferentialCodes(Referentiel $referential, string $referentialKey, string $subReferentialKey): array
    {
        $extractedData = self::getReferentialKeyData($referential, $referentialKey);

        foreach ($extractedData as $data) {
            if (isset($data[$subReferentialKey])) {
                return array_map(function ($value) {
                    return $value->getCode();
                }, $data[$subReferentialKey]);
            }
        }
    }

    /**
     * @param array  $data
     * @param string $referentialKey
     * @param float  $searchedAmount
     *
     * @return string|null
     */
    public static function guessCodeByAmount(Referentiel $referential, string $referentialKey, float $searchedAmount): ?string
    {
        $extractedData = self::getReferentialKeyData($referential, $referentialKey);

        foreach ($extractedData as $sliceData) {
            if (!$sliceData instanceof TranchePatrimoine || !$sliceData instanceof TrancheRevenus) {
                continue;
            }

            if ($sliceData->getTrancheMin() <= $searchedAmount && $searchedAmount <= $sliceData->getTrancheMax()) {
                return $sliceData->getCode();
            }
        }

        return null;
    }

    /**
     * @param string $referentialKey
     *
     * @return bool
     */
    public static function isValidReferentialKey(string $referentialKey): bool
    {
        return in_array($referentialKey, self::AVAILABLE_REFERENTIALS);
    }

    /**
     * @param array  $data
     * @param string $referentialKey
     *
     * @return mixed
     */
    private static function getReferentialKeyData(Referentiel $referential, string $referentialKey)
    {
        if (!self::isValidReferentialKey($referentialKey)) {
            throw new UnexpectedValueException(sprintf('The given referential key %s is not available', $referentialKey));
        }

        $getter = sprintf('get%s', ucfirst($referentialKey));
        $class = new ReflectionClass($referential);

        if (!$class->hasMethod($getter)) {
            throw new UnexpectedValueException(sprintf('The given referential does not contains %s key ', Contexte::ELEMENT_ATTENDU_REFERENTIEL));
        }

        return $class->getMethod($getter)->invoke($referential);
    }

    /**
     * @param array  $data
     * @param string $referentialKey
     *
     * @return mixed
     */
    private static function getSubReferentialKeyData(Referentiel $referential, string $referentialKey, string $subReferentialKey)
    {
        $referentialModel = self::getReferentialKeyData($referential, $referentialKey);

        $getter = sprintf('get%s', ucfirst($subReferentialKey));
        $class = new ReflectionClass($referentialModel);

        if (!$class->hasMethod($getter)) {
            throw new UnexpectedValueException(sprintf('The referential %s does not contains %s sub field ', $referentialKey, $subReferentialKey));
        }

        return $class->getMethod($getter)->invoke($referentialModel);
    }

    /**
     * @param array  $data
     * @param string $referentialKey
     *
     * @return array
     */
    public static function formatReferentialValues(Referentiel $referential, string $referentialKey): array
    {
        $extractedData = self::getReferentialKeyData($data, $referentialKey);

        $extractedReferentialValues = [];
        foreach ($extractedData as $item) {
            $extractedReferentialValues[$item->getCode()] = $item->getLibelle();
        }
        ksort($extractedReferentialValues);

        return $extractedReferentialValues;
    }
}
