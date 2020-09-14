Symfony Bundle to interact with Generali API and wkhtmltopdf API
============================================

Installation:
-------------

To install this bundle, simply run the following command:
```
$ composer require mpp/generali-client-bundle
```

How to run:
-----------

Before run, you need to add `UNIVERSIGN_ENTRYPOINT_URL` variable in the `.env` file of your project with the url and the credentials of the universign account.

```
###> mpp/generali-client-bundle ###
GENERALI_BASE_URL=https://generalifrprod-recette.apigee.net/epart
GENERALI_API_KEY=YOUR_API_KEY
GENERALI_INTERMEDIARY_CODE=YOUR_INTERMEDIARY_CODE
GENERALI_APP_CODE=YOUR_APP_CODE
GENERALI_SUBSCRIPTION_CODE=YOUR_SUBSCRIPTION_CODE

WKHTMLTOPDF_BASE_URL=http://USER:PASSWORD@wkhtmltopdf:5555
###< mpp/generali-client-bundle ###

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
        wkhtmltopdf:
            base_url: '%env(WKHTMLTOPDF_BASE_URL)%'
            options:
                timeout: 60
                http_errors: true
                headers:
                    User-Agent: "MppWkHtmlToPdfClient/v1.0"
                    Accept: 'application/json'
                    Content-Type: 'application/json'
 ```
                    
Then you must configure your template and a pat of exporting pdf `config/packages/framework.yaml`:
```yaml
parameters:
    generali_debit_mandate_export_path: 'var/generali/debit_mandate/'
```                 
Then you must configure credentials `config/packages/mpp_generali_client.yaml`:
```yaml
mpp_generali_client:
    intermediary_code: '%env(GENERALI_INTERMEDIARY_CODE)%'
    app_code: '%env(GENERALI_APP_CODE)%'
    subscription_code: '%env(GENERALI_SUBSCRIPTION_CODE)%'
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
