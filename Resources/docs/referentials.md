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
For each of these Models' attributes, you will retrieve the list with a ReferentialKey
``` php
| Model            | Attribute                     | ReferentialKey                       |
|------------------|-------------------------------|--------------------------------------|
| AssetOrigin      | codeOrigin                    | REFERENTIAL_ASSET_ORIGINS            |
| AssetRepartition | codeRepartition               | REFERENTIAL_ASSET_REPARTITIONS       |
| FundsOrigin      | codeOrigin                    | REFERENTIAL_FUND_ORIGINS             |
| FundsOrigin      | detail                        | explained_at_the_bottom              |
| PayoutTarget     | targetCode                    | REFERENTIAL_PAYMENT_TARGETS          |
| Subscriber       | civility                      | REFERENTIAL_CIVILITIES               |
| Subscriber       | taxCountry                    | REFERENTIAL_TAX_COUNTRIES            |
| Subscriber       | nationality                   | REFERENTIAL_NATIONALITIES            |
| Subscriber       | birthCountry                  | REFERENTIAL_BIRTH_COUNTRIES          |
| Subscriber       | legalCapacity                 | REFERENTIAL_LEGAL_CAPACITIES         |
| Subscriber       | familialSituation             | REFERENTIAL_FAMILIAL_SITUATIONS      |
| Subscriber       | professionalSituation         | REFERENTIAL_PROFESSIONNAL_SITUATIONS |
| Subscriber       | matrimonialRegime             | REFERENTIAL_MATRIMONIAL_REGIMES      |
| Subscriber       | cspCode                       | REFERENTIAL_CSPS_CODES               |
| Subscriber       | nafCode                       | REFERENTIAL_NAF_CODES                |
| Subscriber       | cspCodeLastProfession         | REFERENTIAL_CSPS_CODES               |
| Subscriber       | identityDocCode               | REFERENTIAL_IDENTITY_DOCS            |
| Subscriber       | addressCountryCode            | REFERENTIAL_ADDRESS_COUNTRIES        |
| Subscription     | deathBeneficiaryClauseOutcome | EXPECTED_ITEM_DENOUEMENT_TYPE        |
| Subscription     | deathBeneficiaryClauseCode    | EXPECTED_ITEM_BENEFICIARY_CLAUSE     |
```
you will use these by doing:
```php
/**
 * For those which start by REFERENTIAL_
 */ 
$availableAttributes = $this->subscriptionFactory->getReferentialCodes(ReferentialHandler::$ReferentialKey);

/**
 * For those which start by EXPECTED_ITEM_
 */ 
$availableAttributes = $this->subscriptionFactory->getExpectedItemCodes(ReferentialHandler::$ReferentialKey);
```
In FundsOrigin, for detail, there is a particularity, you have a subReferentialKey 'detail' which you can call with: 
```php
$availableDetailCode = $this->subscriptionFactory->getSubReferentialCode(ReferentialHandler::REFERENTIAL_FUND_ORIGINS, ReferentialHandler::REFERENTIAL_FUND_ORIGINS_DETAILS);
```

If you want to retrieve any other information you need on subscription, freePayment, scheduledFreePayment, Arbitration, PartialSurrender, you can access them by doing:
```php
$this->httpClient->getFreePaymentInformations($contractNumber, $expectedItems);
$this->httpClient->getScheduledFreePaymentInformations($contractNumber, $expectedItems);
$this->httpClient->getPartialSurrenderInformations($contractNumber, $expectedItems);
$this->httpClient->getArbitrationInformations($contractNumber, $expectedItems);
$this->httpClient->retrieveTransactionSubscriptionData($expectedItems);
```
The ExpectedItems you could send are:
```php
[
    ReferentialHandler::REFERENTIAL_PROFESSIONNAL_SITUATIONS,
    ReferentialHandler::REFERENTIAL_FAMILIAL_SITUATIONS,
    ReferentialHandler::REFERENTIAL_INCOME_SLICES,
    ReferentialHandler::REFERENTIAL_ASSET_SLICES,
    ReferentialHandler::REFERENTIAL_FUND_ORIGINS,
    ReferentialHandler::REFERENTIAL_FUND_ORIGINS_DETAILS,
    ReferentialHandler::REFERENTIAL_COCONTRACTOR_LINKS,
    ReferentialHandler::REFERENTIAL_PPE_FUNCTIONS,
    ReferentialHandler::REFERENTIAL_COCONTRACTOR_LINKS_PPE,
    ReferentialHandler::REFERENTIAL_PAYMENT_TARGETS,
    ReferentialHandler::REFERENTIAL_NAF_CODES,
    ReferentialHandler::REFERENTIAL_CSPS_CODES,
    ReferentialHandler::REFERENTIAL_TAX_COUNTRIES,
    ReferentialHandler::REFERENTIAL_MATRIMONIAL_REGIMES,
    ReferentialHandler::REFERENTIAL_ASSET_REPARTITIONS,
    ReferentialHandler::REFERENTIAL_ASSET_ORIGINS,
    ReferentialHandler::REFERENTIAL_LEGAL_CAPACITIES,
    ReferentialHandler::REFERENTIAL_NATIONALITIES,
    ReferentialHandler::REFERENTIAL_VOUCHERS,
    ReferentialHandler::REFERENTIAL_BIRTH_COUNTRIES,
    ReferentialHandler::REFERENTIAL_ADDRESS_COUNTRIES,
    ReferentialHandler::REFERENTIAL_CSRS_OCDE_COUNTRIES,
    ReferentialHandler::REFERENTIAL_CIVILITIES,
    ReferentialHandler::REFERENTIAL_IDENTITY_DOCS,
    ReferentialHandler::REFERENTIAL_IDENTITY_DOCS_2,
]
```

####Special Requirements for Arbitration & Partial Surrender
you will need to access the list of available funds, and the subscribed funds on a specific contractNumber, you can retrieve them via:
```php
$investableFunds = $this->arbitrationFactory->getArbitrationInformations($contractNumber, ReferentialHandler::REFERENTIAL_INVESTABLE_FUNDS);
$investableFunds = $this->partialSurrenderFactory->retrieveTransactionPartialSurrenderData($contractNumber, ReferentialHandler::REFERENTIAL_INVESTABLE_FUNDS);
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
$savingReachs = $this->arbitrationFactory->getArbitrationInformations($contractNumber, ReferentialHandler::REFERENTIAL_SAVINGS_REACHS);
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
$savingReachs = $this->partialSurrenderFactory->retrieveTransactionPartialSurrender($contractNumber, ReferentialHandler::REFERENTIAL_SAVINGS_REACHS);
```
you will have an answer like this:
```php
[
    'epargneAtteinte' => [
        'repartitionList' => [
            [
                'codeFonds' => 'codeFondsInvestis',
                'montant' => 654654,
                'desinvestissable' => false,
            ],
            [
                'codeFonds' => 'codeFondsInvestis',
                'montant' => 654654,
                'desinvestissable' => true,
            ],
        ],
    ],
]
 ```