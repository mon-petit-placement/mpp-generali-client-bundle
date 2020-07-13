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
        "INITIATE" => "initier",
        "CHECK" => "verifier",
        "CONFIRM" => "confirmer",
        "FINALIZE" => "finaliser"
    ];

    private const PRODUCTS = [
        "SOUSCRIPTION" => "souscription",
        "VERSEMENTLIBRE" => "versementLibre",
        "VERSEMENTLIBREPROGRAMMES" => "versementLibreProgrammes",
        "ARBITRAGE" => "arbitrage",
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
        if (in_array($step, self::STEPS, true) && in_array($product, self::PRODUCTS, true)) {
            $url_point = $this->endpoint . $this->path . $product .$step;

            try{
                $response = $this
                    ->httpClient
                    ->request('POST', $url_point, $this->requestOptions($parameters));

                return $response->getBody();
            }catch (\Exception $exception){
                return $exception->getMessage();
            }
        }
        return false;
    }

    /**
     * @param array $body
     * @return array
     */
    private function requestOptions(array $body)
    {
        return [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'apiKey' => $this->parameters->get('generali_api_key')
            ],
            'body' => $body,
        ];
    }
}