<?php

namespace Mpp\GeneraliClientBundle\Model;

class Contrat
{
    /**
     * @var string|null
     */
    private $numContrat;

    /**
     * @var InfoVLP|null
     */
    private $infoVLP;

    /**
     * Get the value of numContrat.
     *
     * @return string|null
     */
    public function getNumContrat(): ?string
    {
        return $this->numContrat;
    }

    /**
     * Set the value of numContrat.
     *
     * @param string|null $numContrat
     *
     * @return self
     */
    public function setNumContrat(?string $numContrat): self
    {
        $this->numContrat = $numContrat;

        return $this;
    }

    /**
     * Get the value of infoVLP.
     *
     * @return InfoVLP|null
     */
    public function getInfoVLP(): ?InfoVLP
    {
        return $this->infoVLP;
    }

    /**
     * Set the value of infoVLP.
     *
     * @param InfoVLP|null $infoVLP
     *
     * @return self
     */
    public function setInfoVLP(?InfoVLP $infoVLP): self
    {
        $this->infoVLP = $infoVLP;

        return $this;
    }
}
