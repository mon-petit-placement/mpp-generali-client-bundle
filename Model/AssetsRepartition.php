<?php


namespace Mpp\GeneraliClientBundle\Model;


use Symfony\Component\OptionsResolver\OptionsResolver;

class AssetsRepartition
{
    /**
     * @var string
     */
    protected $codeRepartition;

    /**
     * @var float
     */
    protected $percentRepartition;

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
            ->setDefault('codeRepartition', null)->setAllowedTypes('codeRepartition', ['string', 'null'])
            ->setDefault('percentRepartition', null)->setAllowedTypes('percentRepartition', ['float', 'null'])
            ->setDefault('precision', null)->setAllowedTypes('precision', ['string', 'null'])
        ;
    }

    public static function createFromArray(array $value)
    {
        $resolver = new OptionsResolver();
        self::configureData($resolver);

        $resolvedValues = $resolver->resolve($value);

        return (new self())
            ->setPercentRepartition($resolvedValues['percentRepartition'])
            ->setPrecision($resolvedValues['precision'])
            ->setCodeRepartition($resolvedValues['codeRepartition'])
            ;
    }

    /**
     * @return string
     */
    public function getCodeReparition(): string
    {
        return $this->codeRepartition;
    }

    /**
     * @param string $codeRepartition
     * @return AssetsRepartition
     */
    public function setCodeRepartition(string $codeRepartition): self
    {
        $this->codeRepartition = $codeRepartition;
    }

    /**
     * @param string $precision
     * @return AssetsRepartition
     */
    public function setPrecision(string $precision): self
    {
        $this->precision = $precision;

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
     * @param string $percentRepartition
     * @return AssetsRepartition
     */
    public function setPercentRepartition(string $percentRepartition): self
    {
        $this->percentRepartition = $percentRepartition;
    }

    /**
     * @return string
     */
    public function getPercentRepartition(): string
    {
        return $this->percentRepartition;
    }
}