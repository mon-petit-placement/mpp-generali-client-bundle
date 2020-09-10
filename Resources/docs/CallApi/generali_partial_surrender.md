How to use Partial Surrender with Generali:
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
You will have to find your availables funds
```php
public function getFundsAvailableInContract()
{
    $this->fundsResponse = $this->httpClient->getAvailableFunds(
        Subscription::PRODUCT_PARTIAL_SURRENDER,
        $contextData
    );
}
```

Then you have to intiate, check, confirm your request
````php
public function initiateGeneraliPartialSurrender(): void
{
    $initiateResponse = $this->httpClient->initiate(
         Subscription::PRODUCT_PARTIAL_SURRENDER,
         $this->parameters
    );
    $statusToken = $initiateResponse['statut'];
}

public function checkGeneraliPartialSurrender(): void
{
    $checkResponse = $this->httpClient->check(
        Subscription::PRODUCT_PARTIAL_SURRENDER,
        $yourDataWithStatusToken
    );
}

public function confirmGeneraliPartialSurrender(): void
{
    $confirmResponse = $this->httpClient->confirm(
        Subscription::PRODUCT_PARTIAL_SURRENDER,
        $yourDataWithStatusToken
    );
    
    $idTransaction = $confirmResponse['donnees']['idTransaction'];
}
````
And then you finalize your request
```php
public function finalizeGeneraliPartialSurrender(): void
{
    $finalizeResponse = $this->httpClient->finalize(
        Subscription::PRODUCT_PARTIAL_SURRENDER,
        $yourDataWithidTransaction
    );²
}
```
  

  