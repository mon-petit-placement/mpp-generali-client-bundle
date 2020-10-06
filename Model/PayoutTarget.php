<?php

namespace Mpp\GeneraliClientBundle\Model;

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
     * @return array
     */
    public function toArray(): array
    {
        return [
            'codeObjectif' => $this->getTargetCode(),
            'precision' => $this->getPrecision(),
        ];
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
