<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\Model\Arbitration;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ArbitrationFactory.
 */
class ArbitrationFactory extends AbstractFactory
{
    /**
     * @var RepartitionFactory
     */
    private $repartitionFactory;

    /**
     * ArbitrationFactory constructor.
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
            ->setRequired('numOperationExterne')->setAllowedTypes('numOperationExterne', ['string'])
            ->setDefault('mandatTransmissionOrdre', false)->setAllowedTypes('mandatTransmissionOrdre', ['bool'])
            ->setDefault('mandatArbitrage', false)->setAllowedTypes('mandatArbitrage', ['bool'])
            ->setRequired('fondsInvestis')->setAllowedTypes('fondsInvestis', ['array'])->setNormalizer('fondsInvestis', function (Options $options, $values) {
                foreach ($values as &$value) {
                    if ($value instanceof Repartition) {
                        continue;
                    }

                    $value = $this->repartitionFactory->create($value);
                }

                return $values;
            })
            ->setRequired('fondsDesinvestis')->setAllowedTypes('fondsDesinvestis', ['array'])->setNormalizer('fondsDesinvestis', function (Options $options, $values) {
                foreach ($values as &$value) {
                    if ($value instanceof Repartition) {
                        continue;
                    }

                    $value = $this->repartitionFactory->create($value);
                }

                return $values;
            })
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new Arbitration())
            ->setNumOperationExterne($resolvedData['numOperationExterne'])
            ->setMandatTransmissionOrdre($resolvedData['mandatTransmissionOrdre'])
            ->setMandatArbitrage($resolvedData['mandatArbitrage'])
            ->setFondsInvestis($resolvedData['fondsInvestis'])
            ->setFondsDesinvestis($resolvedData['fondsDesinvestis'])
        ;
    }
}
