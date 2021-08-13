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
     * @var array|null
     */
    private $listeAvenants;

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

    /**
     * Get the value of listeAvenants
     *
     * @return  array|null
     */
    public function getListeAvenants(): ?array
    {
        return $this->listeAvenants;
    }

    /**
     * Set the value of listeAvenants
     *
     * @param  array|null  $listeAvenants
     *
     * @return  self
     */
    public function setListeAvenants(?array $listeAvenants): self
    {
        $this->listeAvenants = $listeAvenants;

        return $this;
    }
}
