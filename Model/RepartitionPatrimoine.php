<?php

namespace Mpp\GeneraliClientBundle\Model;

class RepartitionPatrimoine
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var float|null
     */
    private $pourcentage;

    /**
     * @var string|null
     */
    private $precision;

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

    /**
     * Get the value of pourcentage.
     *
     * @return float|null
     */
    public function getPourcentage(): ?float
    {
        return $this->pourcentage;
    }

    /**
     * Set the value of pourcentage.
     *
     * @param float|null pourcentage
     *
     * @return self
     */
    public function setPourcentage(?float $pourcentage): self
    {
        $this->pourcentage = $pourcentage;

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
     * @param string|null precision
     *
     * @return self
     */
    public function setPrecision(?string $precision): self
    {
        $this->precision = $precision;

        return $this;
    }
}
