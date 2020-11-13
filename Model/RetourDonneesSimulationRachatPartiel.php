<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourDonneesSimulationRachatPartiel
{
    /**
     * @var array<TauxPaysNonResident>|null
     */
    private $tauxPaysNonResidents;

    /**
     * @var int|null
     */
    private $dureeFiscalite;

    /**
     * @var float|null
     */
    private $tauxPfl;

    /**
     * @var float|null
     */
    private $tauxPfo;

    /**
     * @var bool|null
     */
    private $presenceC1;

    /**
     * @var bool|null
     */
    private $presenceC2;

    /**
     * @var bool|null
     */
    private $presenceC3;

    /**
     * @var bool|null
     */
    private $exonerationC3;

    /**
     * Get the value of tauxPaysNonResidents
     *
     * @return  array<TauxPaysNonResident>|null
     */
    public function getTauxPaysNonResidents(): ?array
    {
        return $this->tauxPaysNonResidents;
    }

    /**
     * Set the value of tauxPaysNonResidents
     *
     * @param  array<TauxPaysNonResident>|null  $tauxPaysNonResidents
     *
     * @return  self
     */
    public function setTauxPaysNonResidents(?array $tauxPaysNonResidents): self
    {
        $this->tauxPaysNonResidents = $tauxPaysNonResidents;

        return $this;
    }

    /**
     * Get the value of dureeFiscalite
     *
     * @return  int|null
     */
    public function getDureeFiscalite(): ?int
    {
        return $this->dureeFiscalite;
    }

    /**
     * Set the value of dureeFiscalite
     *
     * @param  int|null  $dureeFiscalite
     *
     * @return  self
     */
    public function setDureeFiscalite(?int $dureeFiscalite): self
    {
        $this->dureeFiscalite = $dureeFiscalite;

        return $this;
    }

    /**
     * Get the value of tauxPfl
     *
     * @return  float|null
     */
    public function getTauxPfl(): ?float
    {
        return $this->tauxPfl;
    }

    /**
     * Set the value of tauxPfl
     *
     * @param  float|null  $tauxPfl
     *
     * @return  self
     */
    public function setTauxPfl(?float $tauxPfl): self
    {
        $this->tauxPfl = $tauxPfl;

        return $this;
    }

    /**
     * Get the value of tauxPfo
     *
     * @return  float|null
     */
    public function getTauxPfo(): ?float
    {
        return $this->tauxPfo;
    }

    /**
     * Set the value of tauxPfo
     *
     * @param  float|null  $tauxPfo
     *
     * @return  self
     */
    public function setTauxPfo(?float $tauxPfo): self
    {
        $this->tauxPfo = $tauxPfo;

        return $this;
    }

    /**
     * Get the value of presenceC1
     *
     * @return  bool|null
     */
    public function getPresenceC1(): ?bool
    {
        return $this->presenceC1;
    }

    /**
     * Set the value of presenceC1
     *
     * @param  bool|null  $presenceC1
     *
     * @return  self
     */
    public function setPresenceC1(?bool $presenceC1): self
    {
        $this->presenceC1 = $presenceC1;

        return $this;
    }

    /**
     * Get the value of presenceC2
     *
     * @return  bool|null
     */
    public function getPresenceC2(): ?bool
    {
        return $this->presenceC2;
    }

    /**
     * Set the value of presenceC2
     *
     * @param  bool|null  $presenceC2
     *
     * @return  self
     */
    public function setPresenceC2(?bool $presenceC2): self
    {
        $this->presenceC2 = $presenceC2;

        return $this;
    }

    /**
     * Get the value of presenceC3
     *
     * @return  bool|null
     */
    public function getPresenceC3(): ?bool
    {
        return $this->presenceC3;
    }

    /**
     * Set the value of presenceC3
     *
     * @param  bool|null  $presenceC3
     *
     * @return  self
     */
    public function setPresenceC3(?bool $presenceC3): self
    {
        $this->presenceC3 = $presenceC3;

        return $this;
    }

    /**
     * Get the value of exonerationC3
     *
     * @return  bool|null
     */
    public function getExonerationC3(): ?bool
    {
        return $this->exonerationC3;
    }

    /**
     * Set the value of exonerationC3
     *
     * @param  bool|null  $exonerationC3
     *
     * @return  self
     */
    public function setExonerationC3(?bool $exonerationC3): self
    {
        $this->exonerationC3 = $exonerationC3;

        return $this;
    }
}
