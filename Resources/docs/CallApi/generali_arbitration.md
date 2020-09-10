Installation:
-------------

Use this model to get all the constants created for this bundl
```php
use Mpp\GeneraliClientBundle\Model\Subscription;
 
/** @var GeneraliHttpClient */
private $httpClient;

public function __construct(GeneraliHttpClient $httpClient)
{
    $this->httpClient = $httpClient;
}
```

In order to create an arbitration, you have to get the available funds you want :
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
Then you have to intiate, check, confirm your request
````php
public function initiateGeneraliArbitration(): void
{
    $initiateResponse = $this->httpClient->initiate(
        Subscription::PRODUCT_ARBITRATION,
        $yourParameters
    );
    $statusToken = $initiateResponse['statut'];
}

public function checkGeneraliArbitration(): void
{
    $checkResponse = $this->httpClient->check(
        Subscription::PRODUCT_ARBITRATION,
        $yourDatasWithStatusToken
    );
    $idTransaction = $checkResponse['donnees']['idTransaction'];
}

public function confirmGeneraliArbitration(): void
{
    $confirmResponse = $this->httpClient->confirm(
        Subscription::PRODUCT_ARBITRATION,
        $yourDataWithStatusToken
    );
}
````
And then you finalize your Arbitration
```php
public function iFinalizeGeneraliArbitration()
{
    $finalizeResponse = $this->httpClient->finalize(
        Subscription::PRODUCT_ARBITRATION,
        $yourDatasWithIdTransaction
    );
}
```