<?php


namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\FundsOrigin;
use Mpp\GeneraliClientBundle\Model\Settlement;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Options;

/**
 * Class SettlementFactory
 */
class SettlementFactory extends AbstractFactory
{
      /**
     * @var FundsOriginFactory
     */
    private $fundsOriginFactory;

    /**
     * @param GeneraliHttpClientInterface $httpClient
     */
    public function __construct(GeneraliHttpClientInterface $httpClient, FundsOriginFactory $fundsOriginFactory)
    {
        parent::__construct($httpClient);
        $this->fundsOriginFactory = $fundsOriginFactory;
    }

    /**
     * @param OptionsResolver $resolver
     * @param string $contractNumber
     */
    public function configureData(OptionsResolver $resolver, string $contractNumber): void
    {
        $resolver
            ->setRequired('paymentType')->setAllowedTypes('paymentType', ['string'])
            ->setDefined('bankName')->setAllowedTypes('bankName', ['string'])
            ->setRequired('accountOwner')->setAllowedTypes('accountOwner', ['string'])
            ->setRequired('accountIban')->setAllowedTypes('accountIban', ['string'])
            ->setRequired('accountBic')->setAllowedTypes('accountBic', ['string'])
            ->setRequired('debitAuthorization', true)->setAllowedTypes('debitAuthorization', ['bool'])
            ->setRequired('fundsOrigin', [])->setAllowedTypes('fundsOrigin', ['array'])->setNormalizer('fundsOrigin', function (Options $options, $values, $contractNumber) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->fundsOriginFactory->create($value, $contractNumber);
                }

                return $resolvedValues;
            })
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function doCreate(array $resolvedData, $contractNumber)
    {
        return (new Settlement())
            ->setPaymentType($resolvedData['paymentType'])
            ->setBankName($resolvedData['bankName'])
            ->setAccountOwner($resolvedData['accountOwner'])
            ->setAccountBic($resolvedData['accountBic'])
            ->setAccountIban($resolvedData['accountIban'])
            ->setFundsOrigin($resolvedData['fundsOrigin'])
        ;
    }
}