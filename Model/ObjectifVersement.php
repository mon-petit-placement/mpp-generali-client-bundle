<?php

namespace Mpp\GeneraliClientBundle\Model;

class ObjectifVersement
{
    /**
     * @var string|null
     */
    private $codeObjectif;

    /**
     * @var string|null
     */
    private $precision;

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * Get the value of codeObjectif.
     *
     * @return string|null
     */
    public function getCodeObjectif(): ?string
    {
        return $this->codeObjectif;
    }

    /**
     * Set the value of codeObjectif.
     *
     * @param string|null $codeObjectif
     *
     * @return self
     */
    public function setCodeObjectif(?string $codeObjectif): self
    {
        $this->codeObjectif = $codeObjectif;

        return $this;
    }

    /**
     * Get the value of precision.
     *
     * @return string|null
     */
    public function getPrecision(): ?string
    {
        return $this->precision;
    }

    /**
     * Set the value of precision.
     *
     * @param string|null $precision
     *
     * @return self
     */
    public function setPrecision(?string $precision): self
    {
        $this->precision = $precision;

        return $this;
    }

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
     * Get the value of libelle.
     *
     * @return string|null
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle.
     *
     * @param string|null $libelle
     *
     * @return self
     */
    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }
}
