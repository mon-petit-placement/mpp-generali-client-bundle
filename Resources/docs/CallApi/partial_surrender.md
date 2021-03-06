# Generali Partial Surrender

## How to create a Partial Surrender ?

Build your $partialSurrender using the $partialSurrenderFactory with the following structure:

```php
$partialSurrender = $this->partialSurrenderFactory->create([
    'amount' => 654.23,
    'reasonCode' => 'toto',
    'proportionalRepartition' => true,
    'settlement' => {
        'paymentType' => 'toto',
        'bankName' => 'toto',
        'accountOwner' => 'toto',
        'accountIban' => 'toto',
        'accountBic' => 'toto',
        'debitAuthorization' => true,
        'fundsOrigin' => [
            {
                'codeOrigin' => '1',
                'amount' => 654.25,
                'date' => '01/01/2020',
                'precision' => 'toto',
            }
        ]
    },
    'repartitions' => [
        {
            'amount' => 564.23,
            'fundsCode' => '54',
            'totalSurrender' => true,
        }
    ]
]
```
You will need to access to the availables' funds and saving Reachs, see [here](../referentials.md) how to.

Once your partialSurrender is build, you can send it to Generali:
```
$partialSurrender = $this->httpClient->createPartialSurrender(
    $partialSurrender,
    ['contractNumber' => $contractNumber]
);
```
You will get an ApiResponse which contains the information returned by the API, like this:
```php
[
    'status' => '5f0cc70b2547d642f44ede2c8d232cca....',
    'idTransaction' => '5f0cc70b2547d',
    'errorMessages' => [],
    'orderTransaction' => null,
    'expectedDocuments' => []
]
```
At the end of this step, you have to keep the idTransaction. In the case you can't finalize at the moment, or your users stop their registration.
You will access the idTransaction by:
```php
$idTransaction = $apiResponse->getIdTransaction();
```

Call the partialSurrender's finalization with the idTransaction
```
$apiResponse = $this->httpClient->finalizePartialSurrender([
    'contractNumber' => $contractNumber,
    'idTransaction'=> $idTransaction
]);
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