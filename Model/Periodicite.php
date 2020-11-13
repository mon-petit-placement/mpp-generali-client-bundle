<?php

namespace Mpp\GeneraliClientBundle\Model;

class Periodicite
{
    /**
     * @var string|null
     */
    private $typePeriodicite;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var float|null
     */
    private $min;

    /**
     * Get the value of typePeriodicite.
     *
     * @return string|null
     */
    public function getTypePeriodicite(): ?string
    {
        return $this->typePeriodicite;
    }

    /**
     * Set the value of typePeriodicite.
     *
     * @param string|null $typePeriodicite
     *
     * @return self
     */
    public function setTypePeriodicite(?string $typePeriodicite): self
    {
        $this->typePeriodicite = $typePeriodicite;

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
     * Get the value of min.
     *
     * @return float|null
     */
    public function getMin(): ?float
    {
        return $this->min;
    }

    /**
     * Set the value of min.
     *
     * @param float|null $min
     *
     * @return self
     */
    public function setMin(?float $min): self
    {
        $this->min = $min;

        return $this;
    }
}
