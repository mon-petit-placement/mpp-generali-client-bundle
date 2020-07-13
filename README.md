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

Then configure the generali dedicated service with this newly created guzzle client in the `config/services.yaml`:
```yaml
services:
    mpp.generali.api_client:
        class: Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClient
        arguments: ['@eight_points_guzzle.client.mpp_generali']
```
