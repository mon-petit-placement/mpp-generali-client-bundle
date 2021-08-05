Symfony Bundle to interact with Generali API
============================================

## Installation

To install this bundle, simply run the following command:
```
$ composer require mpp/generali-client-bundle
```

## Configuration

First you must configure a guzzle client using eight point guzzle in the file `config/packages/eight_points_guzzle.yaml`:

```yaml
eight_points_guzzle:
    clients:
        my_generali_client:
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

Then you have to configure your credentials in `config/packages/mpp_generali_client.yaml`:

```yaml
mpp_generali_client:
    http_client: 'eight_points_guzzle.client.mpp_generali' # reference to guzzle client
    app_code: '%env(string:GENERALI_APP_CODE)%'
    default_context:
        codeApporteur: '%env(string:GENERALI_DEFAULT_PROVIDER_CODE)%'
        codeSouscription: '%env(string:GENERALI_DEFAULT_SUBSCRIPTION_CODE)%'
```

Put these environment variables i your ```.env``` file:

```
###> mpp/generali-client-bundle ###
GENERALI_BASE_URL=https://generalifrprod-recette.apigee.net/epart
GENERALI_API_KEY=YOUR_API_KEY
GENERALI_APP_CODE=YOUR_APP_CODE
GENERALI_DEFAULT_PROVIDER_CODE=YOUR_PROVIDER_CODE
GENERALI_DEFAULT_SUBSCRIPTION_CODE=YOUR_SUBSCRIPTION_CODE
###< mpp/generali-client-bundle ###
```

## Clients

<table>
    <thead>
        <tr>
            <th>Specification name</th>
            <th>Base path</th>
            <th>Client</th>
            <th>Client alias</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Arbitrage</td>
            <td>/v2.0/transaction/arbitrage</td>
            <td><a href="./Client/GeneraliArbitrationClient.php">GeneraliArbitrationClient</a></td>
            <td>arbitration</td>
        </tr>
        <tr>
            <td>Contrat</td>
            <td>/v2.0/contrats</td>
            <td><a href="./Client/GeneraliContractClient.php">GeneraliContractClient</a></td>
            <td>contract</td>
        </tr>
        <tr>
            <td>Fonds</td>
            <td>/v1.0/fonds</td>
            <td><a href="./Client/GeneraliFundsClient.php">GeneraliFundsClient</a></td>
            <td>funds</td>
        </tr>
        <tr>
            <td>Pièces justificatives</td>
            <td>/v1.0/transaction/piecesAFournir & /v1.0/transaction/fournirPiece</td>
            <td><a href="./Client/GeneraliAttachmentClient.php">GeneraliAttachmentClient</a></td>
            <td>document</td>
        </tr>
        <tr>
            <td>Rachat partiel</td>
            <td>/v1.0/donnees/rachatpartiel</td>
            <td><a href="./Client/GeneraliPartialRepurchaseClient.php">GeneraliPartialRepurchaseClient</a></td>
            <td>partial_repruchase</td>
        </tr>
        <tr>
            <td>Souscription</td>
            <td>/v2.0/transaction/souscription</td>
            <td><a href="./Client/GeneraliSubscriptionClient.php">GeneraliSubscriptionClient</a></td>
            <td>subscription</td>
        </tr>
        <tr>
            <td>Versement Libre</td>
            <td>/v2.0/transaction/versementLibre</td>
            <td><a href="./Client/GeneraliFreePaymentClient.php">GeneraliFreePaymentClient</a></td>
            <td>free_payment</td>
        </tr>
        <tr>
            <td>Versement libre programmé</td>
            <td>/v2.0/transaction/versementsLibresProgrammes</td>
            <td><a href="./Client/GeneraliScheduledFreePaymentClient.php">GeneraliScheduledFreePaymentClient</a></td>
            <td>scheduled_free_payment</td>
        </tr>
        <tr>
            <td>Versement libre programmé - Modification</td>
            <td>/v1.0/transaction/modificationVersementsLibresProgrammes</td>
            <td><a href="./Client/GeneraliScheduledFreePaymentEditClient.php">GeneraliScheduledFreePaymentEditClient</a></td>
            <td>scheduled_free_payment_edit</td>
        </tr>
        <tr>
            <td>Versement libre programmé - Suspension</td>
            <td>/v1.0/transaction/suspensionVersementsLibresProgrammes</td>
            <td><a href="./Client/GeneraliScheduledFreePaymentSuspendClient.php">GeneraliScheduledFreePaymentSuspendClient</a></td>
            <td>scheduled_free_payment_suspend</td>
        </tr>
    </tbody>
</table>

## How to use ?

#### How to get a specific client domain ?

```php
<?php

namespace App\Controller;

use Mpp\GeneraliClientBundle\Client\GeneraliClientRegistryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExampleController extends AbstractController
{
    public function exampleAction(GeneraliClientRegistryInterface $generaliClientRegistry)
    {
        // Here are the three different available methods on how to retrieve a client domain by its alias (choose the one you prefer)
        $myClient = $generaliClientRegistry->get('client_domain_alias');
        // or
        $myClient = $generaliClientRegistry->getClientDomainAlias();

        // Execute operations from the retrieved client domain
        // ...
    }
}
```

#### How to use each clients ?

You'll find an exemple of usage of each client below

* [WIP] [GeneraliArbitrationClient](./Resources/docs/examples/arbitration.md) (arbitration)
* [WIP] [GeneraliContractClient](./Resources/docs/examples/contract.md) (contract)
* [WIP] [GeneraliAttachmentClient](./Resources/docs/examples/document.md) (document)
* [WIP] [GeneraliFreePaymentClient](./Resources/docs/examples/free_payment.md) (free_payment)
* [WIP] [GeneraliFundsClient](./Resources/docs/examples/funds.md) (funds)
* [WIP] [GeneraliPartialRepurchaseClient](./Resources/docs/examples/partial_repruchase.md) (partial_repruchase)
* [WIP] [GeneraliScheduledFreePaymentClient](./Resources/docs/examples/scheduled_free_payment.md) (scheduled_free_payment)
* [WIP] [GeneraliScheduledFreePaymentEditClient](./Resources/docs/examples/scheduled_free_payment_edit.md) (scheduled_free_payment_edit)
* [WIP] [GeneraliScheduledFreePaymentSuspendClient](./Resources/docs/examples/scheduled_free_payment_suspend.md) (scheduled_free_payment_suspend)
* [GeneraliSubscriptionClient](./Resources/docs/examples/subscription.md) (subscription)

#### How can I create model object easily

Thanks to the [ModelFactory](./Factory/ModelFactory.php) you can create objects with deep relationships thanks to ```createFromArray``` & ```createFromJson``` methods:

Here is an example:

```php
<?php

namespace App\Controller;

use Mpp\GeneraliClientBundle\Factory\ModelFactory;
use Mpp\GeneraliClientBundle\Model\Arbitrage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExampleController extends AbstractController
{
    public function exampleAction(ModelFactory $generaliModelFactory)
    {
        $arbitration = $generaliModelFactory->createFromArray(Arbitrage::class, [
            'numOperationExterne' => 1234,
            'mandatTransmissionOrdre' => true,
            'mandatArbitrage' => false,
            'fondsInvestis' => [],
            'fondsDesinvestis' => [
                [
                    'codeFonds' => 'FP12SN73DU4EJ',
                    'montant' => 750.40,
                    'pourcentage' => 0.4,
                    'avenantValide' => true,
                    'taux' => 5,
                    'duree' => 2,
                    'numeroEngagement' => 1,
                ],
            ],
        ]);

        // or

        $arbitration = $generaliModelFactory->createFromJson(Arbitrage::class, file_get_contents('/path/to/arbitration.json'));
    }
}
```

#### How the api works (outdated)

First you will have to create a [Subscription](./Resources/docs/CallApi/subscription.md), where you will send all the needed information on your customer and the subscription asked.

Then you will get a contractNumber which will be used to create:
- [Free Payment](./Resources/docs/CallApi/free_payment.md)
- [Scheduled Free Payment](./Resources/docs/CallApi/scheduled_free_payment.md)
- [Partial Surrender](./Resources/docs/CallApi/partial_surrender.md)
- [Arbitration](./Resources/docs/CallApi/arbitration.md)

You will use specifics code for some attributes, please check [here](./Resources/docs/referentials.md) when you will build your data structure.

#### How can you get the contract number ?

- On development environment: you will have to contact your Generali Partner
- On pre-production and on production environment: you will have to parse some csv files given by sftp access. You will find your contractNumber by searching for your internalReference1 and/or internalReference2 that you have given during your subscription creation

## Tests

Update the environment variables in ```phpunit.xml.dist``` or create a ```phpunit.xml``` file:

```xml
<!-- ... -->
<php>
    <!-- ... -->
    <env name="APP_ENV" value="test" />
    <env name="GENERALI_BASE_URL" value="" />
    <env name="GENERALI_API_KEY" value="" />
    <env name="GENERALI_APP_CODE" value="" />
    <env name="GENERALI_DEFAULT_PROVIDER_CODE" value="" />
    <env name="GENERALI_DEFAULT_SUBSCRIPTION_CODE" value="" />
    <!-- ... -->
</php>
<!-- ... -->
```

Then, use the following commands if you want to run the tests suite

```sh
$ make composer-install # once
$ make phpunit
```

## TODO

- There is a problem with "avenant" field which can be bool or objet depending on context in GeneraliFundsClient & other clients
- Finish client tests
