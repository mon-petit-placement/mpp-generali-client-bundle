<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Mpp\GeneraliClientBundle\Model\AssetsOrigin;
use Mpp\GeneraliClientBundle\Model\Context;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AssetsOriginFactory
 */
class AssetsOriginFactory extends AbstractFactory
{
    /**
     * {@inheritDoc}
     */
    public function configureData(OptionsResolver $resolver, string $contractNumber): void
    {
        $availableOriginCode = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_ASSET_ORIGINS, $contractNumber);

        $resolver
            ->setRequired('codeOrigin')->setAllowedTypes('codeOrigin', ['string'])->setAllowedValues('codeOrigin', $availableOriginCode)
            ->setRequired('precision')->setAllowedTypes('precision', ['string'])
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function doCreate(array $resolvedData, string $contractNumber)
    {
        return (new AssetsOrigin())
            ->setPrecision($resolvedData['precision'])
            ->setCodeOrigin($resolvedData['codeOrigin'])
        ;
    }
}