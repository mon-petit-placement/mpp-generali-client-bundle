<?php

namespace Mpp\GeneraliClientBundle\Model;

class Contrat
{
    /**
     * @var string|null
     */
    private ?string $numContrat;

    /**
     * @var InfoVLP|null
     */
    private ?InfoVLP $infoVLP = null;

    /**
     * @var array|null
     */
    private ?array $listeAvenants;

    /**
     * @var EtatSituation[]|null
     */
    private ?array $listeEtatsSituation;

    /**
     * @var Situation|null
     */
    private ?Situation $situation;

    /**
     * @var Contractants|null
     */
    private ?Contractants $contractants;

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
     * Get the value of listeEtatsSituation
     *
     * @return EtatSituation[]|null
     */
    public function getListeEtatsSituation(): ?array
    {
        return $this->listeEtatsSituation;
    }

    /**
     * Set the value of listeEtatsSituation
     *
     * @param EtatSituation[]|null $listeEtatsSituation
     *
     * @return self
     */
    public function setListeEtatsSituation(?array $listeEtatsSituation): self
    {
        $this->listeEtatsSituation = $listeEtatsSituation;

        return $this;
    }

    /**
     * Get the value of situation.
     *
     * @return Situation|null
     */
    public function getSituation(): ?Situation
    {
        return $this->situation;
    }

    /**
     * Set the value of situation.
     *
     * @param Situation|null $situation
     *
     * @return self
     */
    public function setSituation(?Situation $situation): self
    {
        $this->situation = $situation;

        return $this;
    }

    /**
     * Get the value of contractants.
     *
     * @return Contractants|null
     */
    public function getContractants(): ?Contractants
    {
        return $this->contractants;
    }

    /**
     * Set the value of contractants.
     *
     * @param Contractants|null $contractants
     *
     * @return self
     */
    public function setContractants(?Contractants $contractants): self
    {
        $this->contractants = $contractants;

        return $this;
    }
}
