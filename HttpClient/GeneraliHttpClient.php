<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\HttpClient;

use GuzzleHttp\Client;

class GeneraliHttpClient
{
    /**
     * @var Client
     */
    private $httpClient;

    private const STEPS = [
        "initiate" => "initier",
        "check" => "verifier",
        "confirm" => "confirmer",
        "finalize" => "finaliser"
    ];

    private const PRODUCTS = [
        "subscription" => "souscription",
        "free_payment" => "versementLibre",
        "schedule_free_payment" => "versementLibreProgrammes",
        "arbitration" => "arbitrage",
    ];

    /**
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->httpClient = $httpClient;
    }


    /**
     * @param string $step
     * @param string $product
     * @param array $parameters
     * @return bool|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function stepSouscription(string $step, string $product, array $parameters)
    {
        if (!isset(self::STEPS[$step])){
            return 'step musst be part of these: ' . implode(", ", array_keys(yself::STEPS));
        }
        if (!isset(self::PRODUCTS[$product])){
            return 'step musst be part of these: ' . implode(", ", array_keys(self::PRODUCTS));
        }
        
        try {
            $response = $this
                ->httpClient
                ->request(
                    'POST',
                    '/epart/v2.0/transaction/'.self::PRODUCTS[$product].'/'.self::STEPS[$step], [
                        'body'=> json_encode($parameters)
                    ]
                );
            return $response;
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}