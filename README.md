Symfony Bundle to interact with Generali API
============================================

## Installation:

To install this bundle, simply run the following command:
```
$ composer require mpp/generali-client-bundle
```

##How to run:

First you have to configure your credentials in `config/packages/mpp_generali_client.yaml`, like here with env variables:
```yaml
mpp_generali_client:
    intermediary_code: '%env(GENERALI_INTERMEDIARY_CODE)%'
    app_code: '%env(GENERALI_APP_CODE)%'
    subscription_code: '%env(GENERALI_SUBSCRIPTION_CODE)%'
```

Then you must configure the Generali API Client using eight point guzzle, like with env variables, 
in the file `config/packages/eight_points_guzzle.yaml`:
```yaml
eight_points_guzzle:
    clients:
        mpp_generali:
            base_url: '%env(GENERALI_BASE_URL)%'
            options:
                timeout: 30
                http_errors: true
                headers:
                    User-Agent: "MppGeneraliClient/v1.0"
                    Accept: 'application/json'
                    Content-Type: 'application/json'
                    apiKey: '%env(GENERALI_API_KEY)%'
```  

That gives you this configuration in .env file.
```
###> mpp/generali-client-bundle ###

GENERALI_BASE_URL=https://generalifrprod-recette.apigee.net/epart
GENERALI_API_KEY=YOUR_API_KEY
GENERALI_INTERMEDIARY_CODE=YOUR_INTERMEDIARY_CODE
GENERALI_APP_CODE=YOUR_APP_CODE
GENERALI_SUBSCRIPTION_CODE=YOUR_SUBSCRIPTION_CODE

###< mpp/generali-client-bundle ###
```

#### Handle the Generali API Service
To easily handle Generali API calls, the bundle provides a httpClient service. Here is an example on how to retrieve this service in your Symfony Application using Dependancy Injection:
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
````

How you will get the Contract Number ?
--------------
- On development environment: you will have to contact your Generali Partner & he will gives you
- On pre-production and on production environment: you will have to parse some csv files given by sftp access. You will find your contractNumber by searching for your internalReference1 and/or internalReference2 that you have given during your subscription creation

Once you have it, you can create and follow many FreePayment, ScheduledFreePayment, Arbitration, PartialSurrender.


##How to use ? :
First you will have to create a [Subscription](./Resources/docs/CallApi/subscription.md), where you will send all the needed information on your customer and the subscription asked.
Then you will get a contractNumber which will be used to create:
- [Free Payment](./Resources/docs/CallApi/free_payment.md)
- [Scheduled Free Payment](./Resources/docs/CallApi/scheduled_free_payment.md)
- [Partial Surrender](./Resources/docs/CallApi/partial_surrender.md)
- [Arbitration](./Resources/docs/CallApi/arbitration.md)
