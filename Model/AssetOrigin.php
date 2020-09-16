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
