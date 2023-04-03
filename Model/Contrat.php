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
     * @var array<Contractant>|null
     */
    private $contractants;

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

    /**
     * Get the value of contractants.
     *
     * @return array<Contractant>|null
     */
    public function getContractants(): ?array
    {
        return $this->contractants;
    }

    /**
     * Set the value of contractants.
     *
     * @param array<Contractant>|null $contractants
     *
     * @return self
     */
    public function setContractants(?array $contractants): self
    {
        $this->contractants = $contractants;

        return $this;
    }
}
