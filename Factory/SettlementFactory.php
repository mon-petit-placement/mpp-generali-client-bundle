<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\FundsOrigin;
use Mpp\GeneraliClientBundle\Model\Settlement;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Options;

/**
 * Class SettlementFactory.
 */
class SettlementFactory extends AbstractFactory
{
    /**
     * @var FundsOriginFactory
     */
    private $fundsOriginFactory;

    /**
     * SettlementFactory constructor.
     *
     * @param GeneraliHttpClientInterface $httpClient
     * @param FundsOriginFactory          $fundsOriginFactory
     */
    public function __construct(GeneraliHttpClientInterface $httpClient, FundsOriginFactory $fundsOriginFactory)
    {
        parent::__construct($httpClient);
        $this->fundsOriginFactory = $fundsOriginFactory;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('paymentType')->setAllowedValues('paymentType', ['PRELEVEMENT', 'VIREMENT', 'CHEQUE'])
            ->setDefined('bankName')->setAllowedTypes('bankName', ['string'])
            ->setRequired('accountOwner')->setAllowedTypes('accountOwner', ['string'])
            ->setRequired('accountIban')->setAllowedTypes('accountIban', ['string'])
            ->setRequired('accountBic')->setAllowedTypes('accountBic', ['string'])
            ->setRequired('debitAuthorization')->setAllowedTypes('debitAuthorization', ['bool'])
            ->setRequired('fundsOrigin')->setAllowedTypes('fundsOrigin', ['array'])->setNormalizer('fundsOrigin', function (Options $options, $values) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->fundsOriginFactory->create($value);
                }

                return $resolvedValues;
            })
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new Settlement())
            ->setDebitAuthorization($resolvedData['debitAuthorization'])
            ->setPaymentType($resolvedData['paymentType'])
            ->setBankName($resolvedData['bankName'])
            ->setAccountOwner($resolvedData['accountOwner'])
            ->setAccountBic($resolvedData['accountBic'])
            ->setAccountIban($resolvedData['accountIban'])
            ->setFundsOrigin($resolvedData['fundsOrigin'])
        ;
    }
}
