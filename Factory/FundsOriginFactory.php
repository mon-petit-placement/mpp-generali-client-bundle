<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Laminas\Validator\Date;
use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\Model\Context;
use Mpp\GeneraliClientBundle\Model\FundsOrigin;
use Mpp\GeneraliClientBundle\HttpClient\GeneraliHttpClientInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class FundsOriginFactory
 */
class FundsOriginFactory extends AbstractFactory
{
    /**
     * {@inheritDoc}
     */
    public function configureData(OptionsResolver $resolver, string $contractNumber): void
    {
        $allowedCodeOrigin = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_FUND_ORIGINS, $contractNumber);

        $resolver
            ->setRequired('codeOrigin')->setAllowedTypes('codeOrigin', ['string'])->setAllowedValues('codeOrigin', $allowedCodeOrigin)
            ->setRequired('amount')->setAllowedTypes('amount', ['float'])
            ->setDefined('date')->setAllowedTypes('date', ['\DateTime', 'string'])->setNormalizer('date', function(Options $options, $value) {
                if ($value instanceof \DateTime) {
                    return $value;
                }

                return \DateTime::createFromFormat('d/m/Y', $value);
            })
            ->setDefined('precision')->setAllowedTypes('precision', ['string'])
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function doCreate(array $resolvedData, string $contractNumber)
    {
        return (new FundsOrigin())
            ->setPrecision($resolvedData['precision'])
            ->setAmount($resolvedData['amount'])
            ->setDate($resolvedData['date'])
            ->setCodeOrigin($resolvedData['codeOrigin'])
        ;
    }
}