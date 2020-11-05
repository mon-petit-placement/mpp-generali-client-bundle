<?php

namespace Mpp\GeneraliClientBundle\Model;

class OriginePatrimoniale
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $precision;

    /**
     * Get the value of code
     *
     * @return  string|null
     */ 
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @param  string|null  $code
     *
     * @return  self
     */ 
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of precision
     *
     * @return  string|null
     */ 
    public function getPrecision(): ?string
    {
        return $this->precision;
    }

    /**
     * Set the value of precision
     *
     * @param  string|null  $precision
     *
     * @return  self
     */ 
    public function setPrecision(?string $precision): self
    {
        $this->precision = $precision;

        return $this;
    }
}
