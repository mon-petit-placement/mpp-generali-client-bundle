<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\Model\InitialScheduledFreePayment;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ScheduledFreePaymentFactory.
 */
class InitialScheduledFreePaymentFactory extends AbstractFactory
{
    /**
     * @var RepartitionFactory
     */
    private $repartitionFactory;

    /**
     * ScheduledFreePaymentFactory constructor.
     *
     * @param ReferentialHandler $referentialHandler
     * @param RepartitionFactory $repartitionFactory
     */
    public function __construct(ReferentialHandler $referentialHandler, RepartitionFactory $repartitionFactory)
    {
        parent::__construct($referentialHandler);

        $this->repartitionFactory = $repartitionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('bankDebitDay')->setAllowedTypes('bankDebitDay', ['int'])
            ->setRequired('amount')->setAllowedTypes('amount', ['float', 'int'])
            ->setDefault('periodicity', 'MENSUELLE')->setAllowedTypes('periodicity', ['string'])
            ->setRequired('repartitions')->setAllowedTypes('repartitions', ['array'])->setNormalizer('repartitions', function (Options $options, $values): array {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->repartitionFactory->create($value);
                }

                return $resolvedValues;
            });
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new InitialScheduledFreePayment())
            ->setBankDebitDay($resolvedData['bankDebitDay'])
            ->setAmount($resolvedData['amount'])
            ->setPeriodicity($resolvedData['periodicity'])
            ->setRepartitions($resolvedData['repartitions'])
        ;
    }
}
