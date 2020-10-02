# Referentials Codes

####Why do you need these codes ?
To build Subscription, FreePayment, ScheduledFreePayment, PartialSurrender, Arbitration, you will send 'referentialCode' referenced by Generali for different attribute.

For example, if you want to create a "married" subscriber, you will not send the string "married", but the code which mean it for Generali. It permits to normalize the data and exploit it.
The subscriber will look like:
```php
$subscriber = $this->subscriberFactory->create([
...
   'familialSituation' => '5'
...
);
```
Here is the list of familySituation that you can send to Generali:
```php
[
    1 => 'Célibataire',
    2 => 'Veuf(ve]',
    3 => 'Divorcé(e]',
    4 => 'Séparé(e]',
    5 => 'Marié(e] sous le régime',
    7 => 'Union libre',
    8 => 'Pacsé(e]',
]
```
For these kind of attribute, you will have to send one in this list.

####Which Attribute does it concerns and on which model ?
```php
| Model            | Attribute                     |
|------------------|-------------------------------|
| AssetOrigin      | codeOrigin                    |
| AssetRepartition | codeRepartition               |
| FundsOrigin      | codeOrigin                    |
| FundsOrigin      | detail                        |
| PayoutTarget     | targetCode                    |
| Subscriber       | civility                      |
| Subscriber       | taxCountry                    |
| Subscriber       | nationality                   |
| Subscriber       | birthCountry                  |
| Subscriber       | legalCapacity                 |
| Subscriber       | familialSituation             |
| Subscriber       | professionalSituation         |
| Subscriber       | matrimonialRegime             |
| Subscriber       | cspCode                       |
| Subscriber       | nafCode                       |
| Subscriber       | cspCodeLastProfession         |
| Subscriber       | identityDocCode               |
| Subscriber       | addressCountryCode            |
| Subscription     | deathBeneficiaryClauseOutcome |
| Subscription     | deathBeneficiaryClauseCode    |
```
For each of these Model's attributes, you will have to retrieve the availables' attribute given list.
#### How to get the list of availables values ?

All the availables' attributes ara retrievable by asking the API with these:
```php
/**
 * To get the provider's contract data
 */ 
 $this->httpClient->retrieveContractData($contractNumber, $expectedItems);
 
/**
 * For the subscription's transaction data
 */ 
 $this->httpClient->retrieveTransactionSubscriptionData($expectedItems);
 
/**
 * For the free payment's transaction data
 */ 
 $this->httpClient->retrieveTransactionFreePaymentData($contractNumber, $expectedItems);
 
/**
 * For the scheduled free payment's transaction data
 */ 
 $this->httpClient->retrieveTransactionScheduledFreePaymentData($contractNumber, $expectedItems);
 
/**
 * For the partial surrender transaction data
 */ 
 $this->httpClient->retrieveTransactionPartialSurrenderData($contractNumber, $expectedItems);
 
/**
 * For the arbitration transaction data
 */ 
 $this->httpClient->retrieveTransactionArbitrationData($contractNumber, $expectedItems);
```

For each you will have a BaseResponse wich have this structure:
```php
[
    "donnee": [
        "situationsProfessionnelles": [
            ...
        ], 
        ...
    ],
    "errorMessages": [
        ...
    ]
]
```

### The ReferentialHandler, an easier way to retrieve attributes' list
The referentialHandler will extract data by expectedItem or by referentialKey following the method you use.

For each of these Models' attributes, you will retrieve the availables' values with these ReferentialKeys.
``` php
| Model            | Attribute                     | ReferentialKey                            |
|------------------|-------------------------------|-------------------------------------------|
| AssetOrigin      | codeOrigin                    | REFERENTIAL_ASSET_ORIGIN_CODES            |
| AssetRepartition | codeRepartition               | REFERENTIAL_ASSET_REPARTITION_CODES       |
| FundsOrigin      | codeOrigin                    | REFERENTIAL_FUND_ORIGIN_CODES             |
| FundsOrigin      | detail                        | 'explained below'                         |
| PayoutTarget     | targetCode                    | REFERENTIAL_PAYMENT_TARGET_CODES          |
| Subscriber       | civility                      | REFERENTIAL_CIVILITIES                    |
| Subscriber       | taxCountry                    | REFERENTIAL_TAX_COUNTRY_CODES             |
| Subscriber       | nationality                   | REFERENTIAL_NATIONALITIES                 |
| Subscriber       | birthCountry                  | REFERENTIAL_BIRTH_COUNTRY_CODES           |
| Subscriber       | legalCapacity                 | REFERENTIAL_LEGAL_CAPACITY_CODES          |
| Subscriber       | familialSituation             | REFERENTIAL_FAMILIAL_SITUATION_CODES      |
| Subscriber       | professionalSituation         | REFERENTIAL_PROFESSIONNAL_SITUATION_CODES |
| Subscriber       | matrimonialRegime             | REFERENTIAL_MATRIMONIAL_REGIME_CODES      |
| Subscriber       | cspCode                       | REFERENTIAL_CSPS_CODES                    |
| Subscriber       | nafCode                       | REFERENTIAL_NAF_CODES                     |
| Subscriber       | cspCodeLastProfession         | REFERENTIAL_CSPS_CODES                    |
| Subscriber       | identityDocCode               | REFERENTIAL_IDENTITY_DOC_CODES            |
| Subscriber       | addressCountryCode            | REFERENTIAL_ADDRESS_COUNTRY_CODES         |
| Subscription     | deathBeneficiaryClauseOutcome | EXPECTED_ITEM_DENOUEMENT_TYPE             |
| Subscription     | deathBeneficiaryClauseCode    | EXPECTED_ITEM_BENEFICIARY_CLAUSE_CODES    |
```

For example, you will use these by doing:
```php
/**
 * For those which start by REFERENTIAL_
 */ 
$availableAttributes = ReferentialHandler::extractReferentialCodes(
    $this->httpClient->retrieveTransactionSubscriptionData([Context::EXPECTED_ITEM_REFERENTIEL])->getDonnees(),
    $ReferentialKey
);

/**
 * For those which start by EXPECTED_ITEM_
 */ 
$availableAttributes = ReferentialHandler::extractExpectedItemsCode(
    $this->httpClient->retrieveTransactionSubscriptionData([$ReferentialKey])->getDonnees(),
    $ReferentialKey
);
```
with REFERENTIAL_IDENTITY_DOC_CODES, you will have a response like this:
```php
 [
  "FE21" => "Carte Nationale d'Identité (CNI)"
  "FE22" => "Passeport"
  "FE23" => "Nouveau permis de conduire"
  "FE25" => "Livret de famille"
  "FE26" => "Carte électorale française"
  "FE27" => "Acte de naissance"
  "FE30" => "Permis de conduire"
]
```

In FundsOrigin, for detail, there is a particularity, you have a subReferentialKey 'detail' which you can call with: 
```php
$availableDetailCode = ReferentialHandler::extractSubReferentialCodes(
    $this->httpClient->retrieveTransactionSubscriptionData([Context::EXPECTED_ITEM_REFERENTIEL])->getDonnees(),
    ReferentialHandler::REFERENTIAL_FUND_ORIGIN_CODES,
    ReferentialHandler::REFERENTIAL_FUND_ORIGINS_DETAILS
);
```

The ExpectedItems you could send are:
```php
[
    ReferentialHandler::REFERENTIAL_PROFESSIONNAL_SITUATION_CODES,
    ReferentialHandler::REFERENTIAL_FAMILIAL_SITUATION_CODES,
    ReferentialHandler::REFERENTIAL_INCOME_SLICES,
    ReferentialHandler::REFERENTIAL_ASSET_SLICES,
    ReferentialHandler::REFERENTIAL_FUND_ORIGIN_CODES,
    ReferentialHandler::REFERENTIAL_FUND_ORIGINS_DETAILS,
    ReferentialHandler::REFERENTIAL_COCONTRACTOR_LINKS,
    ReferentialHandler::REFERENTIAL_PPE_FUNCTIONS,
    ReferentialHandler::REFERENTIAL_COCONTRACTOR_LINKS_PPE,
    ReferentialHandler::REFERENTIAL_PAYMENT_TARGET_CODES,
    ReferentialHandler::REFERENTIAL_NAF_CODES,
    ReferentialHandler::REFERENTIAL_CSPS_CODES,
    ReferentialHandler::REFERENTIAL_TAX_COUNTRY_CODES,
    ReferentialHandler::REFERENTIAL_MATRIMONIAL_REGIME_CODES,
    ReferentialHandler::REFERENTIAL_ASSET_REPARTITION_CODES,
    ReferentialHandler::REFERENTIAL_ASSET_ORIGIN_CODES,
    ReferentialHandler::REFERENTIAL_LEGAL_CAPACITY_CODES,
    ReferentialHandler::REFERENTIAL_NATIONALITIES,
    ReferentialHandler::REFERENTIAL_VOUCHERS,
    ReferentialHandler::REFERENTIAL_BIRTH_COUNTRY_CODES,
    ReferentialHandler::REFERENTIAL_ADDRESS_COUNTRY_CODES,
    ReferentialHandler::REFERENTIAL_CSRS_OCDE_COUNTRIES,
    ReferentialHandler::REFERENTIAL_CIVILITIES,
    ReferentialHandler::REFERENTIAL_IDENTITY_DOCS,
    ReferentialHandler::REFERENTIAL_IDENTITY_DOCS_2,
]
```

####Special Requirements for Arbitration & Partial Surrender
you will need to access the list of available funds, and the subscribed funds on a specific contractNumber, you can retrieve them via:
```php
$investableFunds = $this->httpClient->retrieveTransactionArbitrationData($contractNumber, ReferentialHandler::REFERENTIAL_INVESTABLE_FUNDS);
$investableFunds = $this->httpClient->retrieveTransactionPartialSurrenderData($contractNumber, ReferentialHandler::REFERENTIAL_INVESTABLE_FUNDS);
```
Here is the answer you will have:
```php
[
    'fondsInvestissables' => [
        [
            'fonds' => [
                'codeFonds' => 'TECHNIPC001',
            ],
        ],
    ],
]
```

You will also need to access to the saving reachs:
```php
$savingReachs = $this->httpClient->retrieveTransactionArbitrationData($contractNumber, ReferentialHandler::REFERENTIAL_SAVINGS_REACHS);
```
you will have an answer like this:
```php
[
    'epargneAtteinte' => [
        [
            'repartition' => [
                [
                    'code' => 'codeFondsInvestis',
                    'epargneAtteinte' => 654654,
                ]
            ],
        ],
    ],
]
 ```
Same method for partial Surrender, but not the same answer
```php
$savingReachs = $this->httpClient->retrieveTransactionPartialSurrender($contractNumber, ReferentialHandler::REFERENTIAL_SAVINGS_REACHS);
```

You will have an answer like this:
```php
[
    'epargneAtteinte' => [
        'repartitionList' => [
            [
                'codeFonds' => 'TechniPC5401',
                'montant' => 1234,
                'desinvestissable' => false,
            ],
            [
                'codeFonds' => 'BNP022CFCAL',
                'montant' => 5678,
                'desinvestissable' => true,
            ],
        ],
    ],
]
 ```