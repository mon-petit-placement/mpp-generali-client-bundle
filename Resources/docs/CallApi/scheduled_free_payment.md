# Generali Scheduled Free Payment

## How to create a FreePayment ?

First you have to build a Context object wich contains your contractNumber's code and your intermediary code defined in the configuration
````php
$context = $this->httpClient->buildContext('contractNumber' => $contractNumber]);
````

Then you build your $scheduledFreePayment using the ScheduledFreePaymentFactory with the following structure:
```php
$scheduledFreePayment = $this->scheduledFreePaymentFactory->create([
    'amount' => 654.23,
    'periodicity' => 'toto',
    'settlement' => [
          'paymentType' => 'toto',
          'bankName' => 'toto',
          'accountOwner' => 'toto',
          'accountIban' => 'toto',
          'accountBic' => 'toto',
          'debitAuthorization' => true,
          'fundsOrigin' => [
              [
                  'codeOrigin' => '1',
                  'amount' => 654.25,
                  'date' => '01/01/2020',
                  'precision' => 'toto'
              ],
              [
                  'codeOrigin' => '1',
                  'amount' => 654.25,
                  'date' => '01/01/2020',
                  'precision' => 'toto'
              ]
          ]
    ],
    'repartitions' => [
          [
              'amount' => 564.23,
              'fundsCode' => '54',
              'totalSurrender' => true
          ]
    ],
    'customerFolder' => {
          'assetAmount' => 654.25,
          'incomeAmount' => 654.25,
          'payoutTargets' => [
               [
                    'targetCode' => '1',
                    'precision' => 'toto',
               ], [
                     'targetCode' => '1',
                     'precision' => 'toto',
               ]
          ],
          'assetsOrigin' => [
               [
                    'codeOrigin' => '1',
                    'precision' => 'toto',
               ], [
                    'codeOrigin' => '2',
                    'precision' => 'toto',
               ]
          ],
          'assetsRepartition' => [
               [
                    'codeRepartition' => '1',
                    'percentRepartition' => 0.5,
                    'precision' => 'toto',
               ], [
                    'codeRepartition' => '1',
                    'percentRepartition' => 0.5,
                    'precision' => 'toto',
               ]
          ]
    ],
    'subscriber' => [
          'lastName' => 'toto',
          'firstName' => 'toto',
          'birthName' => 'toto',
          'familialSituation' => '1',
          'professionalSituation' => 'SAL',
          'civility' => 'MONSIEUR',
          'taxCountry' => 'XXXXXFRANCE',
          'nationality' => '99110AUTRICHE',
          'birthDate' => '01/01/2020',
          'birthPlace' => 'toto',
          'birthCountry' => 'XXXXXFRANCE',
          'birthPostalCode' => 'toto',
          'birthDepartmentCode' => 'toto',
          'legalCapacity' => '4',
          'matrimonialRegime' => '3',
          'cspCode' => '32',
          'profession' => 'toto',
          'nafCode' => '14',
          'siretNumber' => 654654654,
          'employerName' => 'toto',
          'cspCodeLastProfession' => '32',
          'startDateInactivity' => '01/01/2020',
          'phoneNumber' => 'toto',
          'cellPhoneNumber' => 'toto',
          'email' => 'toto',
          'identityDocCode' => 'FE21',
          'identityDocValidityDate' => '01/01/2020',
          'addressPostalCode' => 'toto',
          'addressCity' => 'toto',
          'addressCountryCode' => 'XXXXXFRANCE',
          'addressStreetName' => 'toto',
          'addressDropOffPoint' => 'toto',
          'addressGeographicPoint' => 'toto',
          'addressPostBox' => 'toto'
    ]
]);
```
You will need to access to the availables' values on some attribute, please check [here](../referentials.md) to see which ones 

Once your Scheduled Free Payment is build, you can send it to Generali :
```
$apiResponse = $this->httpClient->createScheduledFreePayment(
    $context, 
    $scheduledFreePayment
);
```
You will get an ApiResponse which contains the information returned by the API, like this: 
````php
[
    'status' => '5f0cc70b2547d642f44ede2c8d232cca...',
    'idTransaction' => '5f0cc70b2547d',
    'errorMessages' => [],
    'orderTransaction' => null,
    'expectedDocuments' => [...]
]
````
At the end of this step, you have to save the idTransaction, in the case you can't finalize at the moment, or your users stop their registration.
You will access the idTransaction by:
````php
$idTransaction = $apiResponse->getIdTransaction();
````

You will also have access to the list of expected documents, that you will need to send to Generali by doing:
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
If you want to access to the list of the documents expected for a freePayment, you can still access them until the freePayment is finalized:
```php
$expectedDocuments = $this->httpClient->listScheduledFreePaymentFiles($idTransaction);
```

## How to finalize a FreePayment ?

To finalize a freePayment, you have to send all the required documents and the idTransaction.

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

Build a context and affect the idTransaction to it:
```php
$context = $this->httpClient->buildContext([
    'contractNumber' => $contractNumber,
    'idTransaction'=> $idTransaction
]);
```
And then call the scheduledFreePayment's finalization
```
$apiResponse = $this->httpClient->finalizeScheduledFreePayment($context, $documents);
```

You will get an ApiResponse which contains the numberOrderTransaction that you have to save.

In case you have a problem on a particular customer folder, Generali would ask you the numberOrderTransaction to find the folder in their ERP.

You will receive this ApiResponse:
````php
[
    'status' => '5f0cc70b2547d642f44ede2c8d232cca...',
    'idTransaction' => '5f0cc70b2547d',
    'errorMessages' => [],
    'orderTransaction' => 'fj456225f0cc70b2547d642f44ede2c8d232cca...',
    'expectedDocuments' => []
]
````

