<?php


namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\FundsOrigin;
use Mpp\GeneraliClientBundle\Model\Settlement;

/**
 * Class SettlementFactory
 */
class SettlementFactory
{
    /**
     * @var GeneraliHttpClientInterface
     */
    private $httpClient;

    /**
     * @param GeneraliHttpClientInterface $httpClient
     */
    public function __construct(GeneraliHttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureData(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('paymentType', null)->setAllowedTypes('paymentType', ['string', 'null'])
            ->setDefault('bankName', null)->setAllowedTypes('bankName', ['string', 'null'])
            ->setDefault('accountOwner', null)->setAllowedTypes('accountOwner', ['string', 'null'])
            ->setDefault('accountIban', null)->setAllowedTypes('accountIban', ['string', 'null'])
            ->setDefault('accountBic', null)->setAllowedTypes('accountBic', ['string', 'null'])
            ->setDefault('debitAuthorization', true)->setAllowedTypes('debitAuthorization', ['bool', 'null'])
            ->setDefault('fundsOrigin', [])->setAllowedTypes('fundsOrigin', ['array'])->setNormalizer('fundsOrigin', function (Options $options, $values) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = FundsOriginFactory::create($value);
                }

                return $resolvedValues;
            })
        ;
    }

    /**
     * @param array $value
     */
    public function create(array $value)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);

        $resovedValues = $resolver->resolve($value);

        return (new Settlement())
            ->setPaymentType($resovedValues['paymentType'])
            ->setBankName($resovedValues['bankName'])
            ->setAccountOwner($resovedValues['accountOwner'])
            ->setAccountBic($resovedValues['accountBic'])
            ->setAccountIban($resovedValues['accountIban'])
            ->setFundsOrigin($resovedValues['fundsOrigin'])
            ;
    }
}