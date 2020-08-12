Send Data to generali
=====================

To subscribe a contract you must 
- initiate by sending your data
- check if anything miss
- confirm to get the files needed to be sent
- then send files 
- and finalize request

An example for subscription

```php
<?php

namespace App\Service;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClient;
use GuzzleHttp\Exception\GuzzleException;

class GeneraliHttp 
{
    public function initiateGeneraliSubscription(): void
    {
        $initiateSubscriptionResponse = $this
            ->httpClient
            ->initiate(
                Subscription::PRODUCT_SUBSCRIPTION,
                $this->subscriptionParameters
            );
        $statusToken = $initiateSubscriptionResponse['statut'];
    }
    public function checkGeneraliSubscription(): void
    {
        $checkSubscriptionResponse = $this
            ->httpClient
            ->check(
                Subscription::PRODUCT_SUBSCRIPTION,
                $this
                    ->dataGenerator
                    ->generateContextStatusToken($statusToken)
            )
        ;
    }
    public function confirmGeneraliSubscription(): void
    {
        $confirmSubscriptionResponse = $this
            ->httpClient
            ->confirm(
                Subscription::PRODUCT_SUBSCRIPTION,
                $this
                    ->dataGenerator
                    ->generateContextStatusToken($statusToken)
            )
        ;
    }
    public function sendFileGeneraliSubscription()
    {
        $idTransaction = $confirmSubscriptionResponse['donnees']['idTransaction'];
        $path_file = 'tests/Behat/Files/';
    
        foreach ($confirmSubscriptionResponse['donnees']['piecesAFournir'] as $document){
            if (1 === $document['nombreMin']){
                $sendFileSubscriptionResponse[] = $httpClient->sendFile(
                    Subscription::PRODUCT_SUBSCRIPTION,
                    $path_file,
                    $idTransaction,
                    'doc_test.pdf',
                    $document
                );
            }
        }
    }
    public function finalizeGeneraliSubscription(): void
    {
        $finalizeSubscriptionResponse = $this
            ->httpClient
            ->finalize(
                Subscription::PRODUCT_SUBSCRIPTION,
                $this
                    ->dataGenerator
                    ->generateContextTransaction($idTransaction)
            )
        ;
    }
}
 ```
 
 To build your array of data, use the constants in the Model.
 It will be transformed by the optionResover to send data ti Generali