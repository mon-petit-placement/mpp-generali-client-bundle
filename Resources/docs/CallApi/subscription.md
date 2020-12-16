# Generali Subscription

## How to create a Subscription ?

Build your $subscription using the SubsriptionFactory with the following structure:
```php
$amount_1 = 5000;
$amount_2 = 500;

$subscription = $this->subscriptionFactory->create([
    'externalReference1' => 'toto',
    'externalReference2' => 'toto',
    'paymentType' => 'PRELEVEMENT',
    'fiscality' => 'ASSURANCE_VIE',
    'deathBeneficiaryClauseCode' => 'clause.A',
    'deathBeneficiaryClauseText' => 'toto',
    'gestionMode' => 'param.70017002.LIBRE.Gestionlibre0',
    'durationType' => 'VIE_ENTIERE',
    'subscriber' => [
        'lastName' => 'toto',
        'firstName' => 'toto',
        'birthName' => 'toto',
        'familialSituation' => '5',
        'professionalSituation' => 'SAL',
        'civility' => 'MONSIEUR',
        'taxCountry' => 'XXXXXFRANCE',
        'nationality' => 'XXXXXFRANCE',
        'birthDate' => \DateTime::createFromFormat('Y-m-d', '1980-01-01'),
        'birthPlace' => 'toto',
        'birthCountry' => 'XXXXXFRANCE',
        'birthPostalCode' => '65454',
        'birthDepartmentCode' => '01',
        'legalCapacity' => '0',
        'matrimonialRegime' => '3',
        'cspCode' => '63',
        'profession' => 'toto',
        'nafCode' => '14',
        'siretNumber' => 00000000000000,
        'employerName' => 'MON PETIT PLACEMENT',
        'cspCodeLastProfession' => '32',
        'startDateInactivity' => \DateTime::createFromFormat('Y-m-d', '2000-01-01'),
        'phoneNumber' => '0303030303',
        'cellPhoneNumber' => '0606060606',
        'email' => 'toto',
        'identityDocCode' => 'FE21',
        'identityDocValidityDate' => \DateTime::createFromFormat('Y-m-d', '2030-01-01'),
        'addressPostalCode' => '65454',
        'addressCity' => 'toto',
        'addressCountryCode' => 'XXXXXFRANCE',
        'addressStreetName' => 'toto',
        'addressDropOffPoint' => 'toto',
        'addressGeographicPoint' => 'toto',
        'addressPostBox' => 'toto',
    ],
    'customerFolder' => [
        'assetAmount' => 65400.25,
        'incomeAmount' => 6540.25,
        'payoutTargets' => [
            [
                'targetCode' => '1',
                'precision' => 'toto',
            ]
        ],
        'assetsOrigin' => [
            [
                'codeOrigin' => '1',
                'precision' => 'toto',
            ],
            [
                'codeOrigin' => '2',
                'precision' => 'toto',
            ]
        ],
        'assetsRepartition' => [
            [
                'codeRepartition' => '1',
                'percentRepartition' => 0.5,
                'precision' => 'toto'
            ], [
                'codeRepartition' => '3',
                'percentRepartition' => 0.5,
                'precision' => 'toto'
            ]
        ]
    ],
    'settlement'=> [
        'paymentType' => 'toto',
        'bankName' => 'toto',
        'accountOwner' => 'toto',
        'accountIban' => 'FR0000000000000000000000000',
        'accountBic' => 'toto',
        'debitAuthorization' => true,
        'fundsOrigin' => [
            [
                'codeOrigin' => '1',
                'detail' => '2',
                'amount' => $amount_1 + 12 * $amount_2,
                'date' => \DateTime::createFromFormat('Y-m-d', '2020-01-01'),
                'precision' => 'toto',
            ]
        ],
    ],
    'initialPayment'=> [
        'amount' => $amount_1,
        'repartition'=> [
            [
                'amount' => $amount_1,
                'fundsCode' => 'TECHNIPC',
            ]
        ]
    ],
    'scheduledFreePayment' => [
        'bankDebitDay' => 10,
        'amount' => $amount_2,
        'periodicity' => 'MENSUELLE',
        'repartition' => [
            [
                'amount' => $amount_2,
                'fundsCode' => 'TECHNIPC',
            ],
        ]
    ]
]);
```
You will need to access to the available's values on some attribute, please check [here](../referentials.md) to see which ones

Once your subscription is build, you can add a comment and tell if you want to dematerialize or not the process.
And then you can send it to Generali:
```
$apiResponse = $this->httpClient->createSubscription(
    $subscription,
    $context
);
```
You will get an ApiResponse which contains the information returned by the API, like this:
```php
[
    'status' => '5f0cc70b2547d642f44ede2c8d232cca',
    'idTransaction' => '5f0cc70b2547d',
    'errorMessages' => [],
    'orderTransaction' => null,
    'expectedDocuments' => [...]
]
```
At the end of this step, you have to keep the idTransaction. In the case you can't finalize at the moment, or your users stop their registration.
You will access the idTransaction by:
```php
$idTransaction = $apiResponse->getIdTransaction();
````

You will also have access to expected documents' list, that you will need to send to Generali, by doing:
````php
/**
 * array<Document>
 */
$expectedDocuments = $apiResponse->getExpectedDocuments();
````
The Document will have this structure:
```php
[
    'idDocument' => '654d4f564f54df',
    'title' => 'Carte identité',
    'filename' => null,
    'filePath' => null,
    'alreadySent' = > false,
    'required' => true
]
````
If you want to access to the documents expected list for a subscription, you can still access them until the subscription is finalized:
```php
$expectedDocuments = $this->httpClient->listSubscriptionFiles($idTransaction);
```

## How to finalize a Subscription ?

To finalize a subscription, you have to send all the required documents and the idTransaction.

First create your document, and add it to an array $documents
```php
$document = (new Document())
    ->setFilename($yourFilename)
    ->setfilePath($yourFilePath)
    ->setIdDocument($idDocument)
    ->setTitle($title)
;
$documents[] = $document;
```

Call the subscription's finalization with the idTransaction
```
$apiResponse = $this->httpClient->finalizeSubscription($documents, ['idTransaction'=> $idTransaction]);
```
You will get an ApiResponse which contains the numberOrderTransaction that you have to save.

In case you have a problem on a particular customer folder, Generali would ask you the numberOrderTransaction to find the folder in their ERP.

You will receive this ApiResponse:
```php
[
    'status' => '5f0cc70b2547d642f44ede2c8d232cca...',
    'idTransaction' => '5f0cc70b2547d',
    'errorMessages' => [],
    'orderTransaction' => 'fj456225f0cc70b2547d642f44ede2c8d232cca...',
    'expectedDocuments' => []
]
```
#### When will you get your ContractNumber ?
Once the subscription is sent, Generali will generate a csv file "InfoGB", every night that you will have to parse.
The next days or few days after (less 3 days), you will have to connect to the ftp they gave you.
You will find the line where you have a created a subscription by searching your external Reference 1 and/or 2 that you have set in your Subscription object.