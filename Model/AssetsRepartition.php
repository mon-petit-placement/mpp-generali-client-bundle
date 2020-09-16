<?php

namespace Mpp\GeneraliClientBundle\Model;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AssetsRepartition
 */
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
     * @return string
     */
    public function getCodeReparition(): string
    {
        return $this->codeRepartition;
    }

    /**
     * @param string $codeRepartition
     *
     * @return AssetsRepartition
     */
    public function setCodeRepartition(string $codeRepartition): self
    {
        $this->codeRepartition = $codeRepartition;
    }

    /**
     * @param string $precision
     *
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
     *
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