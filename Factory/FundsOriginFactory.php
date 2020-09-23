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
    public function configureData(OptionsResolver $resolver): void
    {
        $allowedCodeOrigin = $this->getReferentialCodes(ReferentialHandler::REFERENTIAL_FUND_ORIGINS);
        $allowedDetailCode = $this->getSubReferentialCode(ReferentialHandler::REFERENTIAL_FUND_ORIGINS, 'detail');

        $resolver
            ->setRequired('codeOrigin')->setAllowedTypes('codeOrigin', ['string'])->setAllowedValues('codeOrigin', $allowedCodeOrigin)
            ->setDefined('detail')->setAllowedTypes('detail', ['string'])->setAllowedValues('detail', $allowedDetailCode)
            ->setRequired('amount')->setAllowedTypes('amount', ['float', 'int'])
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
    public function doCreate(array $resolvedData)
    {
        $fundsOrigin = (new FundsOrigin())
            ->setAmount($resolvedData['amount'])
            ->setCodeOrigin($resolvedData['codeOrigin'])
        ;
        if (isset($resolvedData['detail'])) {
            $fundsOrigin->setDetail($resolvedData['detail']);
        }
        if (isset($resolvedData['date'])) {
            $fundsOrigin->setDate($resolvedData['date']);
        }

        if (isset($resolvedData['precision'])) {
            $fundsOrigin->setPrecision($resolvedData['precision']);
        }

        return $fundsOrigin;
    }
}