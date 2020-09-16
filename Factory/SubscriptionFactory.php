<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;

/**
 * Class SubscriptionFactory
 */
class SubscriptionFactory
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
            ->setDefault('subscriber', null)->setAllowedTypes('subscriber', ['array', 'null'])->setNormalizer('subscriber', function (Options $options, $value) {
                return SubscriberFactory::create($value);
            })
            ->setDefault('customerFolder', null)->setAllowedTypes('customerFolder', ['array', 'null'])->setNormalizer('customerFolder', function (Options $options, $value) {
                return CustomerFolderFactory::create($value);
            })
            ->setDefault('settlement', null)->setAllowedTypes('settlement', ['array', 'null'])->setNormalizer('settlement', function (Options $options, $value) {
                return SettlementFactory::create($value);
            })
            ->setDefault('intitialPayment', null)->setAllowedTypes('initialPayment', ['array', 'null'])->setNormalizer('initialPayment', function (Options $options, $value) {
                return InitialPaymentFactory::create($value);
            })
            ->setDefault('paymentType', null)->setAllowedTypes('paymentType', ['string', 'null'])
            ->setDefault('fiscality', null)->setAllowedTypes('fiscality', ['string', 'null'])
            ->setDefault('deathBeneficiaryClauseCode', null)->setAllowedTypes('deathBeneficiaryClauseCode', ['string', 'null'])
            ->setDefault('deathBeneficiaryClauseText', null)->setAllowedTypes('deathBeneficiaryClauseText', ['string', 'null'])
            ->setDefault('gestionMode', null)->setAllowedTypes('gestionMode', ['string', 'null'])
        ;
    }

    /**
     * @param array $value
     * @return Subscription
     */
    public function create(array $value)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);

        $resolvedValues = $resolver->resolve($value);

        return (new Subscription())
            ->setSubscriber($resolvedValues['subscriber'])
            ->setCustomerFolder($resolvedValues['customerFolder'])
            ->setSettlement($resolvedValues['settlement'])
            ->setInitialPayment($resolvedValues['initialPayment'])
            ->setPaymentType($resolvedValues['paymentType'])
            ->setFiscality($resolvedValues['fiscality'])
            ->setDeathBeneficiaryClauseCode($resolvedValues['deathBeneficiaryClauseCode'])
            ->setDeathBeneficiaryClauseText($resolvedValues['deathBeneficiaryClauseText'])
            ->setGestionMode($resolvedValues['gestionMode'])
            ;
    }
}