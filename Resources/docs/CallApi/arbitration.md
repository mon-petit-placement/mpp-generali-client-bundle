# Generali Arbitration

## How to create a Arbitration ?

First you have to build a Context object wich contains your subscription's code and your intermediary code defined in the configuration
````php
$context = $this->httpClient->buildContext(['contractNumber' => $contractNumber]);
````

Then you build your $subscription using the ArbitrationFactory with the following structure:
````php
$arbitration = $this->arbitrationFactory->create([
    'numOperationExterne' => '654654',
    'mandatTransmissionOrdre' => false,
    'mandatArbitrage' => false,
    'fondsInvestis' => [
        [
            'fondsInvesti' => [
                'codeFonds' => 'BNPF',
                'montant' => 123,
            ]
        ]
    ],
    'fondsDesinvestis' => [
        [
            'fondsDesinvesti' => [
                'codeFonds' => 'SOGE45',
                'montant' => 456,
            ]
        ]
    ]
]);
````
You will need to access to the availables' funds and saving Reachs, see [here](../referentials.md) how to.
 
Once your arbitration is build, then you can send it to Generali:
```
$apiResponse = $this->httpClient->createArbitration(
    $context, 
    $arbitration
);
```
You will get an ApiResponse which contains the information returned by the API, like this: 
````php
[
    'status' => '5f0cc70b2547d642f44ede2c8d232cca',
    'idTransaction' => '5f0cc70b2547d',
    'errorMessages' => [],
    'orderTransaction' => null,
    'expectedDocuments' => []
]
````
At the end of this step, you have to save the idTransaction in your database, in the case you can't finalize at the moment, or your users stop their registration.
You Will access the idTransaction by:
````php
$idTransaction = $apiResponse->getIdTransaction();
````

## How to finalize an Arbitration ?

To finalize a arbitration, you have to send all the idTransaction, build a context and affect the idTransaction to it:
```php
$context = $this->httpClient->buildContext([
    'contractNumber' => $contractNumber,
    'idTransaction'=> $idTransaction
]);
```
And then call the subscription's finalization
```
$apiResponse = $this->httpClient->finalizeArbitration($context);
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