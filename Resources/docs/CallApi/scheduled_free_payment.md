How to use Arbitration with Generali:
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

Then you have to intiate, check, confirm your request
````php
public function initiateGeneraliScheduledFreePayment(): void
{
    $initiateResponse = $this->httpClient->initiate(
         Subscription::PRODUCT_SCHEDULED_FREE_PAYMENT,
         $this->parameters
    );
    $statusToken = $initiateResponse['statut'];
}

public function checkGeneraliScheduledFreePayment(): void
{
    $checkResponse = $this->httpClient->check(
        Subscription::PRODUCT_SCHEDULED_FREE_PAYMENT,
        $yourDataWithStatusToken
    );
}

public function confirmGeneraliScheduledFreePayment(): void
{
    $confirmResponse = $this->httpClient->confirm(
        Subscription::PRODUCT_SCHEDULED_FREE_PAYMENT,
        $yourDataWithStatusToken
    );
    
    $idTransaction = $confirmResponse['donnees']['idTransaction'];
}
````
And then you finalize your request
```php
public function finalizeGeneraliScheduledFreePayment(): void
{
    $finalizeResponse = $this->httpClient->finalize(
        Subscription::PRODUCT_FREE_PAYMENT,
        $yourDataWithidTransaction
    );²
}
```
To suspend a scheduled free payment
````
public function suspendGeneraliScheduledFreePayment(string $contractNumber): void
{
    $suspendResponse = $this->httpClient->suspendScheduledFreePayment(
       $yourDataWithContractNumber
    );
}
````
To Edit a Scheduled Free Payment
```
public function initiateEditScheduledFreePayment(string $contractNumber): void
{
    $initiateEditResponse = $this->httpClient->initiateScheduledFreePaymentEdition(
        $parameters
    );
}
public function checkEditScheduledFreePayment(string $contractNumber): void
{
    $checkEditResponse = $this->httpClient->checkScheduledFreePaymentEdition(
        $parameters
    );
}
public function confirmEditScheduledFreePayment(string $contractNumber): void
{
    $confirmEditResponse = $this->httpClient->confirmScheduledFreePaymentEdition(
        $parameters
    );
}
