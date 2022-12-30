<?php

namespace Mpp\GeneraliClientBundle\Model;

class ReferenceExterne
{
    /**
     * @var string|null
     */
    private $refExterne;

    /**
     * @var string|null
     */
    private $refExterne2;


    /**
     * @var string|null
     */
    private $refExterne3;

    /**
     * Get the value of refExterne.
     *
     * @return string|null
     */
    public function getRefExterne(): ?string
    {
        return $this->refExterne;
    }

    /**
     * Set the value of refExterne.
     *
     * @param string|null $refExterne
     *
     * @return self
     */
    public function setRefExterne(?string $refExterne): self
    {
        $this->refExterne = $refExterne;

        return $this;
    }

    /**
     * Get the value of refExterne2
     *
     * @return  string|null
     */
    public function getRefExterne2(): ?string
    {
        return $this->refExterne2;
    }

    /**
     * Set the value of refExterne2
     *
     * @param  string|null  $refExterne2
     *
     * @return  self
     */
    public function setRefExterne2(?string $refExterne2): self
    {
        $this->refExterne2 = $refExterne2;

        return $this;
    }

    /**
     * Get the value of refExterne3
     *
     * @return  string|null
     */
    public function getRefExterne3(): ?string
    {
        return $this->refExterne3;
    }

    /**
     * Set the value of refExterne3
     *
     * @param  string|null  $refExterne3
     *
     * @return  self
     */
    public function setRefExterne3(?string $refExterne3): self
    {
        $this->refExterne3 = $refExterne3;

        return $this;
    }
}
