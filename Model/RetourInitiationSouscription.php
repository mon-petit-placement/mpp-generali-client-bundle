<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourInitiationSouscription
{
    /**
     * @var array<Fonds>|null
     */
    private $fondsInvestissables;

    /**
     * Get the value of fondsInvestissables.
     *
     * @return array<Fonds>|null
     */
    public function getFondsInvestissables(): ?array
    {
        return $this->fondsInvestissables;
    }

    /**
     * Set the value of fondsInvestissables.
     *
     * @param array<Fonds>|null $fondsInvestissables
     *
     * @return self
     */
    public function setFondsInvestissables(?array $fondsInvestissables): self
    {
        $this->fondsInvestissables = $fondsInvestissables;

        return $this;
    }
}
