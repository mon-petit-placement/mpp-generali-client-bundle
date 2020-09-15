<?php

namespace Mpp\GeneraliClientBundle\Model;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PayoutTarget.
 */
class PayoutTarget
{
    /**
     * @var string
     */
    protected $targetCode;

    /**
     * @var string
     */
    protected $precision;

    /**
     * @param OptionsResolver $resolver
     */
    public static function configureData(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('targetCode', null)->setAllowedTypes('targetCode', ['string', 'null'])
            ->setDefault('precision', null)->setAllowedTypes('precision', ['string', 'null'])
        ;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public static function createFromArray(array $data): array
    {
        $resolver = new OptionsResolver();
        self::configureData($resolver);

        $resolvedValues = $resolver->resolve($data);

        return (new self())
            ->setPrecision($resolvedValues['precision'])
            ->setTargetCode($resolvedValues['targetCode'])
            ;
    }

    /**
     * @return string
     */
    public function getTargetCode(): string
    {
        return $this->targetCode;
    }

    /**
     * @param string $targetCode
     *
     * @return PayoutTarget
     */
    public function setTargetCode(string $targetCode): self
    {
        $this->targetCode = $targetCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrecision(): string
    {
        return $this->precision;
    }

    /**
     * @param string $precision
     *
     * @return PayoutTarget
     */
    public function setPrecision(string $precision): self
    {
        $this->precision = $precision;

        return $this;
    }
}
