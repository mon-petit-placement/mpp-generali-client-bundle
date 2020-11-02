<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\Model\AssetsOrigin;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AssetsOriginFactory.
 */
class AssetsOriginFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $availableOriginCode = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_ASSET_ORIGIN_CODES);

        $resolver
            ->setRequired('codeOrigin')->setAllowedTypes('codeOrigin', ['string'])->setAllowedValues('codeOrigin', $availableOriginCode)
            ->setRequired('precision')->setAllowedTypes('precision', ['string'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new AssetsOrigin())
            ->setPrecision($resolvedData['precision'])
            ->setCodeOrigin($resolvedData['codeOrigin'])
        ;
    }
}
