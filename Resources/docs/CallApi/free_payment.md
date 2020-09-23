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
