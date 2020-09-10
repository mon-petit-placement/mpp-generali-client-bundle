Symfony Bundle to interact with Generali API
============================================

Installation:
-------------

To install this bundle, simply run the following command:
```
$ composer require mpp/generali-client-bundle
```

Then you must configure the generali api client using eight point guzzle:
In the `config/packages/eight_points_guzzle.yaml`:
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
                    
Then you must configure your credentials `config/packages/framework.yaml`:
```yaml
parameters:
    generali_code_apporteur: '%env(GENERALI_CODE_APPORTEUR)%'
    generali_code_app: '%env(GENERALI_CODE_APP)%'
    generali_code_subscription: '%env(GENERALI_CODE_SUBSCRIPTION)%'
```

Documentation:
--------------

Here is resources to use this bundle: 

 * [How to call Generali API to create a Subscription](./Resources/docs/CallApi/subscription.md)
 * [How to call Generali API to create a Partial Surrender](./Resources/docs/CallApi/partial_surrender.md)
 * [How to call Generali API to create a Arbitration](./Resources/docs/CallApi/arbitration.md)
 * [How to call Generali API to create a Free Payment](./Resources/docs/CallApi/free_payment.md)
 * [How to call Generali API to create a Scheduled Free Payment](./Resources/docs/CallApi/scheduled_free_payment.md)
 * [How to generate the Debit Mandate for Generali API](./Resources/docs/pdf_generation.md)
