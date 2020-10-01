<?php

namespace Mpp\GeneraliClientBundle\Handler;

use Mpp\GeneraliClientBundle\Model\Context;

/**
 * Class ReferentialHandler.
 */
class ReferentialHandler
{
    const REFERENTIAL_PROFESSIONNAL_SITUATIONS = 'situationsProfessionnelles';
    const REFERENTIAL_FAMILIAL_SITUATIONS = 'situationsFamiliales';
    const REFERENTIAL_INCOME_SLICES = 'tranchesRevenu';
    const REFERENTIAL_ASSET_SLICES = 'tranchesPatrimoine';
    const REFERENTIAL_FUND_ORIGINS = 'originesFonds';
    const REFERENTIAL_FUND_ORIGINS_DETAILS = 'detail';
    const REFERENTIAL_COCONTRACTOR_LINKS = 'liensCoContractant';
    const REFERENTIAL_PPE_FUNCTIONS = 'fonctionsPPE';
    const REFERENTIAL_COCONTRACTOR_LINKS_PPE = 'liensContractantPPE';
    const REFERENTIAL_PAYMENT_TARGETS = 'objectifsVersement';
    const REFERENTIAL_NAF_CODES = 'codesNaf';
    const REFERENTIAL_CSPS_CODES = 'csps';
    const REFERENTIAL_TAX_COUNTRIES = 'paysResidenceFiscale';
    const REFERENTIAL_MATRIMONIAL_REGIMES = 'regimesMatrimoniaux';
    const REFERENTIAL_ASSET_REPARTITIONS = 'repartitionsPatrimoine';
    const REFERENTIAL_ASSET_ORIGINS = 'originesPatrimoine';
    const REFERENTIAL_LEGAL_CAPACITIES = 'capacitesJuridiques';
    const REFERENTIAL_NATIONALITIES = 'nationalites';
    const REFERENTIAL_VOUCHERS = 'piecesJustificatives';
    const REFERENTIAL_BIRTH_COUNTRIES = 'paysNaissance';
    const REFERENTIAL_ADDRESS_COUNTRIES = 'paysAdresses';
    const REFERENTIAL_CSRS_OCDE_COUNTRIES = 'paysCrsOcde';
    const REFERENTIAL_CIVILITIES = 'civilites';
    const REFERENTIAL_IDENTITY_DOCS = 'piecesIdentite';
    const REFERENTIAL_IDENTITY_DOCS_2 = 'secondesPiecesIdentite';

    const REFERENTIAL_INVESTABLE_FUNDS = 'fondsInvestissables';
    const REFERENTIAL_SAVINGS_REACHS = 'epargneAtteinte';

    const AVAILABLE_REFERENTIALS = [
       self::REFERENTIAL_PROFESSIONNAL_SITUATIONS,
       self::REFERENTIAL_FAMILIAL_SITUATIONS,
       self::REFERENTIAL_INCOME_SLICES,
       self::REFERENTIAL_ASSET_SLICES,
       self::REFERENTIAL_FUND_ORIGINS,
       self::REFERENTIAL_COCONTRACTOR_LINKS,
       self::REFERENTIAL_PPE_FUNCTIONS,
       self::REFERENTIAL_COCONTRACTOR_LINKS_PPE,
       self::REFERENTIAL_PAYMENT_TARGETS,
       self::REFERENTIAL_NAF_CODES,
       self::REFERENTIAL_CSPS_CODES,
       self::REFERENTIAL_TAX_COUNTRIES,
       self::REFERENTIAL_MATRIMONIAL_REGIMES,
       self::REFERENTIAL_ASSET_REPARTITIONS,
       self::REFERENTIAL_ASSET_ORIGINS,
       self::REFERENTIAL_LEGAL_CAPACITIES,
       self::REFERENTIAL_NATIONALITIES,
       self::REFERENTIAL_VOUCHERS,
       self::REFERENTIAL_BIRTH_COUNTRIES,
       self::REFERENTIAL_ADDRESS_COUNTRIES,
       self::REFERENTIAL_CSRS_OCDE_COUNTRIES,
       self::REFERENTIAL_CIVILITIES,
       self::REFERENTIAL_IDENTITY_DOCS,
       self::REFERENTIAL_IDENTITY_DOCS_2,
    ];

    /**
     * @param array  $data
     * @param string $referentialKey
     *
     * @return array
     */
    public static function extractReferentialCodes(array $data, string $referentialKey): array
    {
        $extractedData = self::getReferentialKeyData($data, $referentialKey);

        return array_map(function ($value) {
            return $value['code'];
        }, $extractedData);
    }

    /**
     * @param array  $data
     * @param string $referentialKey
     *
     * @return array
     */
    public static function extractSubReferentialCodes(array $data, string $referentialKey, string $subReferentialKey): array
    {
        $extractedData = self::getReferentialKeyData($data, $referentialKey);

        foreach ($extractedData as $data) {
            if (isset($data[$subReferentialKey])) {
                return array_map(function ($value) {
                    return $value['code'];
                }, $data[$subReferentialKey]);
            }
        }
        throw new \UnexpectedValueException(sprintf('The data does not contains %s field ', $subReferentialKey));
    }

    /**
     * @param array  $data
     * @param string $expectedItem
     *
     * @return array
     */
    public static function extractExpectedItemsCode(array $data, string $expectedItem): array
    {
        $extractedData = self::getExpectedItemsKeyData($data, $expectedItem);

        return array_map(function ($value) {
            return $value['code'];
        }, $extractedData);
    }

    /**
     * @param array  $data
     * @param string $referentialKey
     * @param float  $searchedAmount
     *
     * @return string|null
     */
    public static function guessCodeByAmount(array $data, string $referentialKey, float $searchedAmount): ?string
    {
        $extractedData = self::getReferentialKeyData($data, $referentialKey);

        foreach ($extractedData as $sliceData) {
            $minValue = isset($sliceData['trancheMin']) ? $sliceData['trancheMin'] : 0;
            $maxValue = isset($sliceData['trancheMax']) ? $sliceData['trancheMax'] : 999999999;

            if ($minValue <= $searchedAmount && $searchedAmount <= $maxValue) {
                return $sliceData['code'];
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
    private static function getReferentialKeyData(array $data, string $referentialKey): array
    {
        if (!self::isValidReferentialKey($referentialKey)) {
            throw new \UnexpectedValueException(sprintf('The given referential key %s is not available', $referentialKey));
        }

        if (!isset($data[Context::EXPECTED_ITEM_REFERENTIEL])) {
            throw new \UnexpectedValueException(sprintf('The data does not contains %s field ', Context::EXPECTED_ITEM_REFERENTIEL));
        }

        if (!isset($data[Context::EXPECTED_ITEM_REFERENTIEL][$referentialKey])) {
            throw new \UnexpectedValueException(sprintf('The given referential does not contains %s key ', Context::EXPECTED_ITEM_REFERENTIEL));
        }

        return $data[Context::EXPECTED_ITEM_REFERENTIEL][$referentialKey];
    }

    /**
     * @param array  $data
     * @param string $referentialKey
     *
     * @return mixed
     */
    private static function getExpectedItemsKeyData(array $data, string $expectedItem): array
    {
        if (!isset($data[$expectedItem])) {
            throw new \UnexpectedValueException(sprintf('The data does not contains %s field ', $expectedItem));
        }

        return $data[$expectedItem];
    }

    /**
     * @param array  $data
     * @param string $referentialKey
     *
     * @return array
     */
    public static function formatReferentialValues(array $data, string $referentialKey): array
    {
        $extractedData = self::getReferentialKeyData($data, $referentialKey);

        $extractedReferentialValues = [];
        foreach ($extractedData as $item) {
            $extractedReferentialValues[$item['code']] = $item['libelle'];
        }
        ksort($extractedReferentialValues);

        return $extractedReferentialValues;
    }
}
