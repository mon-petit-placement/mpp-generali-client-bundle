# Generali Free Payment

## How to create a FreePayment ?

First you have to build a Context object wich contains your subscription's code and your intermediary code defined in the configuration
````php
$context = $this->httpClient->buildContext();
````

Then you build your $subscription using the SubsriptionFactory with the following structure:
```php
$freePayment = $this->freePaymentFactory->create([
      "externalOperationNumber" => "dfghjkl"
      "customerFolder" => [
        "assetAmount" => 654.25
        "incomeAmount" => 654.25
        "payoutTargets" => [
          [
            "targetCode" => "1"
            "precision" => "toto"
          ], [
            "targetCode" => "1"
            "precision" => "toto"
          ]
        ]
        "assetsOrigin" => [
          [
            "codeOrigin" => "1"
            "precision" => "toto"
          ], [
            "codeOrigin" => "2"
            "precision" => "toto"
          ]
        ]
        "assetsRepartition" => [
         [
            "codeRepartition" => "1"
            "percentRepartition" => 0.5
            "precision" => "toto"
          ], [
            "codeRepartition" => "1"
            "percentRepartition" => 0.5
            "precision" => "toto"
          ]
        ]
      ]
      "repartitions" => [
       [
          "amount" => 564.23
          "fundsCode" => "54"
       ]
      ]
      "settlement" => [
        "paymentType" => "toto"
        "bankName" => "toto"
        "accountOwner" => "toto"
        "accountIban" => "toto"
        "accountBic" => "toto"
        "debitAuthorization" => true
        "fundsOrigin" => [
        [
            "codeOrigin" => "1"
            "amount" => 654.25
            "date" => "01/01/2020"
            "precision" => "toto"
        ], [
            "codeOrigin" => "1"
            "amount" => 654.25
            "date" => "01/01/2020"
            "precision" => "toto"
          ]
        ]
      ]
      "amount" => 564.23
      "subscriber" => [
        "lastName" => "toto"
        "firstName" => "toto"
        "birthName" => "toto"
        "familialSituation" => "1"
        "professionalSituation" => "SAL"
        "civility" => "MONSIEUR"
        "taxCountry" => "XXXXXFRANCE"
        "nationality" => "99110AUTRICHE"
        "birthDate" => "01/01/2020"
        "birthPlace" => "toto"
        "birthCountry" => "XXXXXFRANCE"
        "birthPostalCode" => "toto"
        "birthDepartmentCode" => "toto"
        "legalCapacity" => "4"
        "matrimonialRegime" => "3"
        "cspCode" => "32"
        "profession" => "toto"
        "nafCode" => "14"
        "siretNumber" => 654654654
        "employerName" => "toto"
        "cspCodeLastProfession" => "32"
        "startDateInactivity" => "01/01/2020"
        "phoneNumber" => "toto"
        "cellPhoneNumber" => "toto"
        "email" => "toto"
        "identityDocCode" => "FE21"
        "identityDocValidityDate" => "01/01/2020"
        "addressPostalCode" => "toto"
        "addressCity" => "toto"
        "addressCountryCode" => "XXXXXFRANCE"
        "addressStreetName" => "toto"
        "addressDropOffPoint" => "toto"
        "addressGeographicPoint" => "toto"
        "addressPostBox" => "toto"
      ]
    ]
);
```

Once your free payment is build, you can add a comment and tell if you want to dematerialize or not the process.
And then you can send it to Generali:
```
$subscriptionResponse = $this->httpClient->createFreePayment(
    $context, 
    $freePayment
);
```
You will get a SubscriptionResponse which contains the information returned by the API, like this: 
````php
[
    'status' => '5f0cc70b2547d642f44ede2c8d232cca',
    'idTransaction' => '5f0cc70b2547d',
    'message' => [],
    'orderTransaction' => null,
    'expectedDocuments' => [...]
]
````
At the end of this step, you have to save the idTransaction in your database, in the case you can't finalize at the moment, or your users stop their registration.
You Will access the idTransaction by:
````php
$idTransaction = $suscriptionResponse->getIdTransaction();
````

You will also have access to the list of expected documents, that you will need to send to Generali by doing:
````php
/**
 * array<Document>
 */
$expectedDocuments = $subscriptionResponse->getExpectedDocuments();
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
If you want to access to the list of the documents expected for a subscription, you can still access them until the subscription is finalized:
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

Build a context and affect the idTransaction to it:
```php
$context = $this->httpClient->buildContext(['idTransaction'=> $idTransaction]);
```
And then call the subscription's finalization
```
`$subscriptionResponse = $this->httpClient->finalizeSubscription($context, $documents);
```
you will get in return a numberOrderTransaction, that you have to save


How to use FreePayment with Generali:
-------------

Use this model to get all the constants created for this bundl
```php
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClient;
 
/** @var GeneraliHttpClient */
private $httpClient;

public function __construct(GeneraliHttpClient $httpClient)
{
    $this->httpClient = $httpClient;
}
```

Then you have to intiate, check, confirm your request
````php
public function initiateGeneraliFreePayment(): void
{
    $initiateResponse = $this->httpClient->initiate(
        Subscription::PRODUCT_FREE_PAYMENT,
        $parameters
    );
    $statusToken = $initiateResponse['statut'];
}

public function checkGeneraliFreePayment(): void
{
    $checkResponse = $this->httpClient->check(
        Subscription::PRODUCT_FREE_PAYMENT,
        $yourDataWithStatusToken
    );
}

public function confirmGeneraliFreePayment(): void
{
    $confirmResponse = $this->httpClient->confirm(
        Subscription::PRODUCT_FREE_PAYMENT,
        $yourDataWithStatusToken
    );
    
    $idTransaction = $confirmResponse['donnees']['idTransaction'];
}
````
And then you finalize you send the files neeeded
````php
public function sendFileGeneraliSubscription()
{
    $sendFileResponse = $this->httpClient->sendFile(
        Subscription::PRODUCT_FREE_PAYMENT,
        $path_file,
        $idTransaction,
        $filename,
        $document
        );
    }
}
````
And then you finalize your request
```php
public function finalizeGeneraliFreePayment(): void
{
    $finalizeResponse = $this->httpClient->finalize(
        Subscription::PRODUCT_FREE_PAYMENT,
        $yourDataWithidTransaction
    );²
}
```
