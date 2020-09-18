<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\AssetsRepartition;
use Mpp\GeneraliClientBundle\Model\Context;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AssetsRepartitionFactory
 */
class AssetsRepartitionFactory extends AbstractFactory
{
    /**
     * {@inheritDoc}
     */
    public function configureData(OptionsResolver $resolver, string $contractNumber): void
    {
        $availableCodeRepartition = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_ASSET_REPARTITIONS, $contractNumber);

        $resolver
            ->setRequired('codeRepartition')->setAllowedTypes('codeRepartition', ['string'])->setAllowedValues('codeRepartition', $availableCodeRepartition)
            ->setRequired('percentRepartition')->setAllowedTypes('percentRepartition', ['float'])
            ->setDefined('precision')->setAllowedTypes('precision', ['string'])
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function doCreate(array $resolvedData, $contractNumber)
    {
        return (new AssetsRepartition())
            ->setPercentRepartition($resolvedData['percentRepartition'])
            ->setPrecision($resolvedData['precision'])
            ->setCodeRepartition($resolvedData['codeRepartition'])
        ;
    }
}