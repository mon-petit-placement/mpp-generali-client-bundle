<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\Model\InitialPayment;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class InitialPaymentFactory.
 */
class InitialPaymentFactory extends AbstractFactory
{
    /**
     * @var RepartitionFactory
     */
    private $repartitionFactory;

    /**
     * InitialPaymentFactory constructor.
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
            ->setRequired('amount')->setAllowedTypes('amount', ['float', 'int'])
            ->setRequired('repartitions', [])->setAllowedTypes('repartitions', ['array'])->setNormalizer('repartitions', function (Options $options, $values) {
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
        return (new InitialPayment())
            ->setAmount($resolvedData['amount'])
            ->setRepartitions($resolvedData['repartitions'])
        ;
    }
}
