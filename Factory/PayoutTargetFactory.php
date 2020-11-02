<?php

namespace Mpp\GeneraliClientBundle\Factory;

use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Mpp\GeneraliClientBundle\Model\PayoutTarget;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PayoutTargetFactory.
 */
class PayoutTargetFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    public function configureData(OptionsResolver $resolver): void
    {
        $targetCode = $this->getReferentialHandler()->getReferentialCodes(ReferentialHandler::REFERENTIAL_PAYMENT_TARGET_CODES);

        $resolver
            ->setRequired('targetCode')->setAllowedTypes('targetCode', ['string'])->setAllowedValues('targetCode', $targetCode)
            ->setDefault('precision', null)->setAllowedTypes('precision', ['string'])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function doCreate(array $resolvedData)
    {
        return (new PayoutTarget())
            ->setPrecision($resolvedData['precision'])
            ->setTargetCode($resolvedData['targetCode'])
        ;
    }
}
