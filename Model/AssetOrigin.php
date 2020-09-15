<?php

namespace Mpp\GeneraliClientBundle\Model;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AssetOrigin.
 */
class AssetOrigin
{
    /**
     * @var string
     */
    protected $codeOrigin;

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
            ->setDefault('codeOrigin', null)->setAllowedTypes('codeOrigin', ['string', 'null'])
            ->setDefault('precision', null)->setAllowedTypes('precision', ['string', 'null'])
        ;
    }

    /**
     * @param array $value
     *
     * @return AssetOrigin
     */
    public static function createFromArray(array $value)
    {
        $resolver = new OptionsResolver();
        self::configureData($resolver);

        $resolvedValue = $resolver->resolve($value);

        return (new self())
            ->setPrecision($resolvedValue['precision'])
            ->setCodeOrigin($resolvedValue['codeOrigin'])
            ;
    }

    /**
     * @return string
     */
    public function getCodeOrigin(): string
    {
        return $this->codeOrigin;
    }

    /**
     * @param string $codeOrigin
     *
     * @return AssetOrigin
     */
    public function setCodeOrigin(string $codeOrigin): self
    {
        $this->codeOrigin = $codeOrigin;
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
     * @return AssetOrigin
     */
    public function setPrecision(string $precision): self
    {
        $this->precision = $precision;

        return $this;
    }
}
