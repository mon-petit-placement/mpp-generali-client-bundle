<?php

namespace Mpp\GeneraliClientBundle\Model;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AssetsOrigin.
 */
class AssetsOrigin
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
     * @return array
     */
    public function toArray(): array
    {
        return [
            'code' => $this->getCodeOrigin(),
            'precision' => $this->getPrecision(),
        ];
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
     * @return self
     */
    public function setCodeOrigin(string $codeOrigin): self
    {
        $this->codeOrigin = $codeOrigin;

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
     * @return self
     */
    public function setPrecision(string $precision): self
    {
        $this->precision = $precision;

        return $this;
    }
}
