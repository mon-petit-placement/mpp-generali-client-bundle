<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\Model\AssetsRepartition;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AssetsRepartitionFactory.
 */
class AssetsRepartitionFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $availableCodeRepartition = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_ASSET_REPARTITIONS);

        $resolver
            ->setRequired('codeRepartition')->setAllowedTypes('codeRepartition', ['string'])->setAllowedValues('codeRepartition', $availableCodeRepartition)
            ->setRequired('percentRepartition')->setAllowedTypes('percentRepartition', ['float'])
            ->setDefined('precision')->setAllowedTypes('precision', ['string'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new AssetsRepartition())
            ->setPercentRepartition($resolvedData['percentRepartition'])
            ->setPrecision($resolvedData['precision'])
            ->setCodeRepartition($resolvedData['codeRepartition'])
        ;
    }
}
