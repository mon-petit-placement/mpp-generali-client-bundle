<?php


namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\Repartition;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Options;

/**
 * Class RepartitionFactory
 */
class RepartitionFactory extends AbstractFactory
{
    /**
     * {@inheritDoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('amount')->setAllowedTypes('amount', ['float', 'int'])
            ->setDefined('fundsCode')->setAllowedTypes('fundsCode', ['string'])
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new Repartition())
            ->setAmount($resolvedData['amount'])
            ->setFundsCode($resolvedData['fundsCode'])
        ;
    }
}