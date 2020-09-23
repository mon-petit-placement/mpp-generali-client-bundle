<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\Arbitration;
use Mpp\GeneraliClientBundle\Model\AssetsOrigin;
use Mpp\GeneraliClientBundle\Model\Context;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ArbitrationFactory
 */
class ArbitrationFactory extends AbstractFactory
{
    /**
     * @var RepartitionFactory
     */
    private $repartitionFactory;

    /**
     * ArbitrationFactory constructor.
     * @param GeneraliHttpClientInterface $httpClient
     * @param RepartitionFactory $repartitionFactory
     */
    public function __construct(GeneraliHttpClientInterface $httpClient, RepartitionFactory $repartitionFactory)
    {
        parent::__construct($httpClient);
        $this->repartitionFactory = $repartitionFactory;
    }

    /**
     * {@inheritDoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $resolver
            ->setRequired('externalNumberOperation')->setAllowedTypes('externalNumberOperation', ['int'])
            ->setDefault('mandateTransmissionOrder', false)->setAllowedTypes('mandateTransmissionOrder', ['bool'])
            ->setDefault('mandateArbitration', false)->setAllowedTypes('mandateArbitration', ['bool'])
            ->setRequired('divestedFunds')->setAllowedTypes('divestedFunds', ['array'])->setNormalizer('divestedFunds', function(Options $options, $values) : array {
                $resolvedData = [];
                foreach ($values as $value) {
                    $resolvedData[] = $this->repartitionFactory->create($value);
                }

                return $resolvedData;
            })
            ->setRequired('investedFunds')->setAllowedTypes('investedFunds', ['array'])->setNormalizer('investedFunds', function(Options $options, $values): array {
                $resolvedData = [];
                foreach ($values as $value) {
                    $resolvedData[] = $this->repartitionFactory->create($value);
                }

                return $resolvedData;
            })
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new Arbitration())
            ->setExternalNumberOperation($resolvedData['externalNumberOperation'])
            ->setMandateTransmissionOrder($resolvedData['mandateTransmissionOrder'])
            ->setMandateArbitration($resolvedData['mandateArbitration'])
            ->setDivestedFunds($resolvedData['divestedFunds'])
            ->setInvestedFunds($resolvedData['investedFunds'])
        ;
    }
}