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

How to use:
--------------
First you will have to create a [Subscription](./Resources/docs/CallApi/subscription.md), where you will send all the needed information on your customer and the subscription asked.
Then you will get a contractNumber which will be used to create:
- [Free Payment](./Resources/docs/CallApi/free_payment.md)
- [Scheduled Free Payment](./Resources/docs/CallApi/scheduled_free_payment.md)
- [Partial Surrender](./Resources/docs/CallApi/partial_surrender.md)
- [Arbitration](./Resources/docs/CallApi/arbitration.md)

How you will get the Contract Number ?
--------------
- On development environment: you will have to contact your Generali Partner & he will give you
- On pre-production and on production environment: you will have to parse some csv files, where you will get your contractNumber by searching for your internalReference1 and/or internalReference2 that you have given during your subscription creation

Once you have it, you can create and follow many FreePayment, ScheduledFreePayment, Arbitration, PartialSurrender