Send Data to generali
=====================

To initiate a subscription in your service:
```php
<?php

namespace App\Service;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClient;
use GuzzleHttp\Exception\GuzzleException;
use Mpp\GeneraliClientBundle\Tests\Constant\Subscription;

class GeneraliHttp 
{    
    /**
     * @param GeneraliHttpClient $client
     * @throws GuzzleException
     */
    public function subscription(GeneraliHttpClient $client): void
    {
        $data = [
          //build your data here
        ];

        $response = $client->stepSubscription('initiate', 'subscription', $data);
        $content = json_decode($response->getBody()->getContents(), true);
        
        //...
        
        $response = $client->stepSubscription('check', 'subscription', $data);
        $response = $client->stepSubscription('confirm', 'subscription', $data);
        $response = $client->stepSubscription('finalize', 'subscription', $data);

    }
}
 ```