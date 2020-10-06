<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Model\Repartition;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RepartitionFactory.
 */
class RepartitionFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('amount')->setAllowedTypes('amount', ['float', 'int'])
            ->setRequired('fundsCode')->setAllowedTypes('fundsCode', ['string'])
            ->setDefined('totalSurrender')->setAllowedTypes('totalSurrender', ['bool'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        $repartition = (new Repartition())
            ->setAmount($resolvedData['amount'])
            ->setFundsCode($resolvedData['fundsCode'])
        ;
        if (isset($resolvedData['totalSurrender'])) {
            $repartition->setTotalSurrender($resolvedData['totalSurrender']);
        }

        return $repartition;
    }
}
