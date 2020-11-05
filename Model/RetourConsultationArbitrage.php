<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationArbitrage
{
    /**
     * @var array<FondsInvestissable>|null
     */
    private $fondsInvestissables;

    /**
     * @var array<EpargneAtteinte>|null
     */
    private $epargneAtteinte;

    /**
     * @var ReglesArbitrage|null
     */
    private $reglesArbitrage;

    /**
     * @var FraisArbitrage|null
     */
    private $fraisArbitrage;

    /**
     * Get the value of fondsInvestissables
     *
     * @return  array<FondsInvestissable>|null
     */ 
    public function getFondsInvestissables(): ?array
    {
        return $this->fondsInvestissables;
    }

    /**
     * Set the value of fondsInvestissables
     *
     * @param  array<FondsInvestissable>|null  $fondsInvestissables
     *
     * @return  self
     */ 
    public function setFondsInvestissables(?array $fondsInvestissables): self
    {
        $this->fondsInvestissables = $fondsInvestissables;

        return $this;
    }

    /**
     * Get the value of epargneAtteinte
     *
     * @return  array<EpargneAtteinte>|null
     */ 
    public function getEpargneAtteinte(): ?array
    {
        return $this->epargneAtteinte;
    }

    /**
     * Set the value of epargneAtteinte
     *
     * @param  array<EpargneAtteinte>|null  $epargneAtteinte
     *
     * @return  self
     */ 
    public function setEpargneAtteinte(?array $epargneAtteinte): self
    {
        $this->epargneAtteinte = $epargneAtteinte;

        return $this;
    }

    /**
     * Get the value of reglesArbitrage
     *
     * @return  ReglesArbitrage|null
     */ 
    public function getReglesArbitrage(): ?ReglesArbitrage
    {
        return $this->reglesArbitrage;
    }

    /**
     * Set the value of reglesArbitrage
     *
     * @param  ReglesArbitrage|null  $reglesArbitrage
     *
     * @return  self
     */ 
    public function setReglesArbitrage(?ReglesArbitrage $reglesArbitrage): self
    {
        $this->reglesArbitrage = $reglesArbitrage;

        return $this;
    }

    /**
     * Get the value of fraisArbitrage
     *
     * @return  FraisArbitrage|null
     */ 
    public function getFraisArbitrage(): ?FraisArbitrage
    {
        return $this->fraisArbitrage;
    }

    /**
     * Set the value of fraisArbitrage
     *
     * @param  FraisArbitrage|null  $fraisArbitrage
     *
     * @return  self
     */ 
    public function setFraisArbitrage(?FraisArbitrage $fraisArbitrage): self
    {
        $this->fraisArbitrage = $fraisArbitrage;

        return $this;
    }
}
