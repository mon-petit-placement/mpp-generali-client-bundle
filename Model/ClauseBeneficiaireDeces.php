<?php

namespace Mpp\GeneraliClientBundle\Model;

class ClauseBeneficiaireDeces
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $texteLibre;

    /**
     * Get the value of code.
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set the value of code.
     *
     * @param string|null $code
     *
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of texteLibre.
     *
     * @return string|null
     */
    public function getTexteLibre(): ?string
    {
        return $this->texteLibre;
    }

    /**
     * Set the value of texteLibre.
     *
     * @param string|null $texteLibre
     *
     * @return self
     */
    public function setTexteLibre(?string $texteLibre): self
    {
        $this->texteLibre = $texteLibre;

        return $this;
    }
}
