<?php


namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\Repartition;
use Mpp\GeneraliClientBundle\Model\ScheduledFreePayment;

/**
 * Class ScheduledFreePaymentFactory
 */
class ScheduledFreePaymentFactory
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
            ->setDefault('bankDebitDay', null)->setAllowedTypes('bankDebitDay', ['string', 'null'])
            ->setDefault('amount', null)->setAllowedTypes('amount', ['float', 'null'])
            ->setDefault('periodicity', null)->setAllowedTypes('periodicity', ['string', 'null'])
            ->setDefault('repartition', null)->setAllowedTypes('repartition', ['array'])->setNormalizer('repartition', function (Options $options, $values): array {
                $result = [];
                foreach ($values as $value) {
                    $result[] = RepartitionFactory::create($value);
                }
            });
    }

    /**
     * @param array $data
     *
     * @return ScheduledFreePayment
     */
    public function create(array $data)
    {
        $resolver = new OptionsResolver();
        $this->configureData($resolver);

        $resolvedData = $resolver->resolve($data);

        return (new ScheduledFreePayment())
            ->setBankDebitDay($resolvedData['bankDebitDay'])
            ->setAmount($resolvedData['amount'])
            ->setPeriodicity($resolvedData['periodicity'])
            ->setRepartition($resolvedData['repartition'])
            ;
    }

}