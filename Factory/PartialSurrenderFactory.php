<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\Model\PartialSurrender;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SubscriptionFactory.
 */
class PartialSurrenderFactory extends AbstractFactory
{
    /**
     * @var SettlementFactory
     */
    private $settlementFactory;

    /**
     * @var RepartitionFactory
     */
    private $repartitionFactory;

    /**
     * PartialSurrenderFactory constructor.
     *
     * @param ReferentialHandler $referentialHandler
     * @param SettlementFactory  $settlementFactory
     * @param RepartitionFactory $repartitionFactory
     */
    public function __construct(
        ReferentialHandler $referentialHandler,
        SettlementFactory $settlementFactory,
        RepartitionFactory $repartitionFactory
    ) {
        parent::__construct($referentialHandler);

        $this->settlementFactory = $settlementFactory;
        $this->repartitionFactory = $repartitionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('amount')->setAllowedTypes('amount', ['float'])
            ->setRequired('reasonCode')->setAllowedTypes('reasonCode', ['string'])
            ->setRequired('proportionalRepartition')->setAllowedTypes('proportionalRepartition', ['bool'])
            ->setRequired('settlement')->setAllowedTypes('settlement', ['array'])->setNormalizer('settlement', function (Options $options, $value) {
                return $this->settlementFactory->create($value);
            })
            ->setRequired('repartitions')->setAllowedTypes('repartitions', ['array'])->setNormalizer('repartitions', function (Options $options, $values) {
                $resolvedValues = [];
                foreach ($values as $value) {
                    $resolvedValues[] = $this->repartitionFactory->create($value);
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
        return (new PartialSurrender())
            ->setAmount($resolvedData['amount'])
            ->setReasonCode($resolvedData['reasonCode'])
            ->setProportionalRepartition($resolvedData['proportionalRepartition'])
            ->setRepartitions($resolvedData['repartitions'])
            ->setSettlement($resolvedData['settlement'])
        ;
    }
}
