How to use Subscription with Generali:
-------------

The use cases covered by the API are as follows:

- Subscription of a free management contract:
- Investment in one or more euro funds / unit of account
- Investment in a rider fund
- Investment on a Growth commitment
- Subscription of a managed management contract

####Steps
- Create an object subscription depending on your subscriber, the funds he will invest, his familial funds, their origins etc...
- Then build a context wich will follow your request with the needed tokens, access code
- Create a generaliSubscription with these 2 variables
- Then get the needed Files to send, and carry on sending them
- Generate a mandate debit, with the [pdfGenerator](../pdf_generation.md) and send it also to Generali
- And finalize the subscription

####To create initiate your service:

```php
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
 
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
First you have to build an object $context wich will contain your subscription's code, your intermediary code
````php
$context = $this->httpClient->buildContext([
    'subscriptionCode'=> 'your_subscription_code',
]);
````

Generali ask for specific code to subscribe and to understand the profile of the customer, to see all references needed to set on the request, 
you will access via this request:

### list of expectedItems possible

- clausesBenefs
- garantiesPrevoyance
- modesReglementAutorises
- modesGestion
- infoProduit
- fiscalites
- typesDuree
- typesDenouement
- combinaisonsPossiblesSouscription
- paramVersementInitial
- paramVersementLibreProgramme
- paramRachatPartielProgramme
- referentiel

###Example
```
$this->httpClient->getSubscriptionInformations($contractNumber,[
    'paramVersementLibreProgramme',
    'paramRachatPartielProgramme',
]);
```
You will get the reference of your contract for this product:
````json
{
    "messages": [],
    "donnees": {
       
        "paramVersementLibreProgramme": {
            "seuils": [
                {
                    "minParSupport": 25,
                    "seuilsParPeriodicite": [
                        {
                            "codePeriodicite": "MENSUELLE",
                            "montantMin": 75
                        },
                        {
                            "codePeriodicite": "TRIMESTRIELLE"
                        },
                        {
                            "codePeriodicite": "ANNUELLE"
                        }
                    ]
                }
            ],
            "joursPrelevement": [
                10
            ]
        },
        "paramRachatPartielProgramme": {
            "codeProduit": "7001",
            "periodicites": [],
            "montantEAMinimum": 0.0,
            "seuils": [
                {
                    "seuilsParPeriodicite": []
                }
            ]
        }
    }
}
````

Then build your $subscription with the follwoing structure:

````php
    $subscription = Subscription::create([
        'refExterne' => $faker->numberBetween(999, 99999999),
        'refExterne2' => $faker->numberBetween(999, 99999999),
        'subscriber' => [
            'lastName' => 'toto',
            'birthName' => 'toto',
            'firstName' => 'toto',
            'civility' => 'toto',
            'taxCountry' => 'toto',
            'nationality' => 'toto',
            'birthDate' => 'new \DateTime::createFromFormat('Y-m-d', '2000-01-01'),',
            'birthPlace' => 'toto',
            'birthCountry' => 'toto',
            'birthPostalCode' => 'toto',
            'birthDepartmentCode' => 'toto',
            'birthInseeCode' => 'toto',
            'ppeStateIndicator' => 'toto',
            'ppeFamilyStateIndicator' => 'toto',
            'usaCitizen' => false,
            'usaResident' => false,
            'legalCapacity' => 'toto',
            'familialSituation' => 'toto',
            'professionalSituation' => 'toto',
            'matrimonialRegime' => 'toto',
            'cspCode' => 'toto',
            'profession' => 'toto',
            'nafCode' => 'toto',
            'siretNumber' => 'toto',
            'employerName' => 'toto',
            'cspCodeLastProfession' => 'toto',
            'startDateInactivity' => 'new \DateTime::createFromFormat('Y-m-d', '2000-01-01'),',
            'phoneNumber' => 'toto',
            'cellPhoneNumber' => 'toto',
            'email' => 'toto',
            'identityDocCode' => 'toto',
            'identityDocValidityDate' => 'new \DateTime::createFromFormat('Y-m-d', '2030-01-01'),',
            'addressPostalCode' => 'toto',
            'addressCity' => 'toto',
            'addressCountryCode' => 'toto',
            'addressStreetName' => 'toto',
            'addressDropOffPoint' => 'toto',
            'addressGeographicPoint' => 'toto',
            'addressPostBox' => 'toto',
        ],
        'customerFolder' => [
        ],
        'settlement' => [
        ],
        'initialPayment'=> [
        ],
        'paymentType'=> [
        ],
        'fiscality' => ,
        'deathBeneficiaryClauseCode' => ,
        'gestionMode' => ,
     ]
            
````
Create a subscription with the following command
```
    $subscriptionResponse = $this->httpClient->createSubscription(
        $context, 
        $subscription, 
        $comment, 
        $dematerialization
    );
    $requiredDocuments = $subscriptionResponse->getRequiredDocuments();    
}
````
The array requiredDocuments will have this structure
```php
[
    'idPieceAFournir'=> 'tdfghjkljhgfdfghjkl',
    'nombreMin' => 1 //or 0 if not required
]
````
Fourth, you have to send the needed files to Generali
````
public function sendFile(): void
{
    $this->httpClient->sendFile(
        $documentId, 
        $fileName
    );
}
````
Fifth, you have to generate your mandate file, and send it to Generali
Follow this [doc](../pdf_generation.md) to see how to generate it, and then send it to generali with the same way as above

To check that you have sent all the needed files, check with this method, you will see every document you've already sent
````php
$this->httpClient->listFile($idTransaction, $product);
````

Finally, you have to finalize your request
````php
public function finalizeSubscription(GeneraliContext $context): TransactionOrder
{
    $this->httpClient->finalizeSubscription($context);
}
````