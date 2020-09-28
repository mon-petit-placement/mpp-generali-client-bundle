# Generali Arbitration

## How to create a Arbitration ?

First you have to build a Context object wich contains your subscription's code and your intermediary code defined in the configuration
````php
$context = $this->httpClient->buildContext();
````

Then you build your $subscription using the ArbitrationFactory with the following structure:
````php
$arbitration = $this->arbitrationFactory->create([
    'numOperationExterne' => '654654'
    'mandatTransmissionOrdre' => false
    'mandatArbitrage' => false
    'fondsInvestis' => [
        [
            'fondsInvesti' => [
                'codeFonds' => 'toto'
                'montant' => 654654
            ]
        ]
    ],
    'fondsDesinvestis' => [
        [
            'fondsDesinvesti' => [
                'codeFonds' => 'toto'
                'montant' => 654654
            ]
        ]
    ]
]);
````

Once your arbitration is build, then you can send it to Generali:
```
$arbitrationResponse = $this->httpClient->createArbitration(
    $context, 
    $arbitration
);
```
You will get a SubscriptionResponse which contains the information returned by the API, like this: 
````php
[
    'status' => '5f0cc70b2547d642f44ede2c8d232cca',
    'idTransaction' => '5f0cc70b2547d',
    'message' => [],
    'orderTransaction' => null,
    'expectedDocuments' => []
]
````
At the end of this step, you have to save the idTransaction in your database, in the case you can't finalize at the moment, or your users stop their registration.
You Will access the idTransaction by:
````php
$idTransaction = $suscriptionResponse->getIdTransaction();
````

## How to finalize an Arbitration ?

To finalize a arbitration, you have to send all the idTransaction, build a context and affect the idTransaction to it:
```php
$context = $this->httpClient->buildContext(['idTransaction'=> $idTransaction]);
```
And then call the subscription's finalization
```
$response = $this->httpClient->finalizeArbitration($context);
```
you will get in return a numberOrderTransaction, that you have to save


```php
public function getFundsAvailableInContract()
{
    $availablesFunds = $this->httpClient->getAvailableFunds(
        Subscription::PRODUCT_ARBITRATION, [
         'contexte' => [
            'codeApporteur' => $generaliIntermediaryCode,
            'numContrat' => $contractCode,
            ],
        ]
    );
}
```