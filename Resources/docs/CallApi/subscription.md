How to use Subscription with Generali:
-------------
####To initiate your service:

```php
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
 
 ...
 
/** 
 * @var GeneraliHttpClientInterface 
 */
private $httpClient;

public function __construct(GeneraliHttpClientInterface $httpClient)
{
    $this->httpClient = $httpClient;
}

...

````

First you have to build an object $context wich will contain your subscription's code, your intermediary code given by your .env.local
````php
$context = $this->httpClient->buildContext();
````

Then you build your $subscription using the subsriptionFactory with the following structure:

````php
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
                ], $this->contractNumber);
    
 
            
````

For some attribute, you will need specific code that you will get by asking the ReferentialHandler like this:
###Example
``` php
$allowedCodeOrigin = $this->subscriptionFactory->getReferentialCodes(ReferentialHandler::REFERENTIAL_FUND_ORIGINS, $contractNumber);
$allowedDetailCode = $this->subscriptionFactory->getSubReferentialCode(ReferentialHandler::REFERENTIAL_FUND_ORIGINS, $contractNumber, 'detail');
```
Once your subscription is build, you can send it to Generali
```
    $subscriptionResponse = $this->httpClient->createSubscription(
        $context, 
        $subscription, 
        $comment, 
        $dematerialization
    );
    
    ...
    
    /**
     * array<Document>
     */
    $requiredDocuments = $subscriptionResponse->getRequiredDocuments();    
}
````
#The Document will have this structure:
```php
[
   'idDocument' => '654d4f564f54df',
   'title' => 'Carte identité',
   'filename' => null,
   'filePath' => null,
   'required' => true
]
````
You must at least complete the filename / filePath for all required Documents, before sending it to Generali.

###How to generate Debit Mandate ?
Just send your $subscription object to the [PdfGenerator](../pdf_generation.md), it will build the array you need for it.
And then add it to the array of Documents
````
$parameters = $this->pdfGenerator->subscriptionToFileMapper($subscription);

$documents[] = $this->pdfGenerator->generateFile($template, $parameters);
````
And then finalize the subscription by sending the context, the response you had until here, and the array of Documents

````php
$this->httpClient->finalizeSubscription($context, $response, $documents);
````