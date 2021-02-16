<?php

namespace Mpp\GeneraliClientBundle\Model;

class FondsInvestissable
{
    /**
     * @var Fonds|null
     */
    private $fonds;

    /**
     * @var array|null
     */
    private $optionsTechniques;

    /**
     * @var bool|null
     */
    private $investissementObligatoire;

    /**
     * @var string|null
     */
    private $categorie;

    /**
     * @var string|null
     */
    private $sousCategorie;

    /**
     * Get the value of fonds.
     *
     * @return Fonds|null
     */
    public function getFonds(): ?Fonds
    {
        return $this->fonds;
    }

    /**
     * Set the value of fonds.
     *
     * @param Fonds|null $fonds
     *
     * @return self
     */
    public function setFonds(?Fonds $fonds): self
    {
        $this->fonds = $fonds;

        return $this;
    }

    /**
     * Get the value of optionsTechniques.
     *
     * @return array|null
     */
    public function getOptionsTechniques(): ?array
    {
        return $this->optionsTechniques;
    }

    /**
     * Set the value of optionsTechniques.
     *
     * @param array|null $optionsTechniques
     *
     * @return self
     */
    public function setOptionsTechniques(?array $optionsTechniques): self
    {
        $this->optionsTechniques = $optionsTechniques;

        return $this;
    }

    /**
     * Get the value of investissementObligatoire.
     *
     * @return bool|null
     */
    public function getInvestissementObligatoire(): ?bool
    {
        return $this->investissementObligatoire;
    }

    /**
     * Set the value of investissementObligatoire.
     *
     * @param bool|null $investissementObligatoire
     *
     * @return self
     */
    public function setInvestissementObligatoire(?bool $investissementObligatoire): self
    {
        $this->investissementObligatoire = $investissementObligatoire;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    /**
     * @param string|null $categorie
     *
     * @return FondsInvestissable
     */
    public function setCategorie(?string $categorie): FondsInvestissable
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSousCategorie(): ?string
    {
        return $this->sousCategorie;
    }

    /**
     * @param string|null $sousCategorie
     *
     * @return FondsInvestissable
     */
    public function setSousCategorie(?string $sousCategorie): FondsInvestissable
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }
}
