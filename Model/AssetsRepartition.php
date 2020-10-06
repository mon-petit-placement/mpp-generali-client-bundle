<?php

namespace Mpp\GeneraliClientBundle\Model;

/**
 * Class AssetsRepartition.
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
     * @return array
     */
    public function toArray(): array
    {
        return [
            'code' => $this->getCodeReparition(),
            'pourcentage' => $this->getPercentRepartition(),
            'precision' => $this->getPrecision(),
        ];
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
     *
     * @return self
     */
    public function setCodeRepartition(string $codeRepartition): self
    {
        $this->codeRepartition = $codeRepartition;

        return $this;
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
     * @param float $percentRepartition
     *
     * @return self
     */
    public function setPercentRepartition(float $percentRepartition): self
    {
        $this->percentRepartition = $percentRepartition;

        return $this;
    }

    /**
     * @return float
     */
    public function getPercentRepartition(): float
    {
        return $this->percentRepartition;
    }
}
