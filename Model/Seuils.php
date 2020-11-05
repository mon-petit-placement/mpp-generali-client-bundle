<?php

namespace Mpp\GeneraliClientBundle\Model;

class Seuils
{
    /**
     * @var float|null
     */
    private $montantMinTotalRachat;

    /**
     * @var float|null
     */
    private $montantMaxTotalRachat;

    /**
     * @var float|null
     */
    private $montantMinRachatParFonds;

    /**
     * @var float|null
     */
    private $soldeMinParFondsApresRachat;

    /**
     * @var float|null
     */
    private $soldeMinTotalApresRachat;

    /**
     * @var float|null
     */
    private $soldeMinTotalApresRachatIRPP;

    /**
     * @var float|null
     */
    private $soldeMinTotalApresRachatPFL;

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
     * Get the value of montantMinTotalRachat
     *
     * @return  float|null
     */ 
    public function getMontantMinTotalRachat(): ?float
    {
        return $this->montantMinTotalRachat;
    }

    /**
     * Set the value of montantMinTotalRachat
     *
     * @param  float|null  $montantMinTotalRachat
     *
     * @return  self
     */ 
    public function setMontantMinTotalRachat(?float $montantMinTotalRachat): self
    {
        $this->montantMinTotalRachat = $montantMinTotalRachat;

        return $this;
    }

    /**
     * Get the value of montantMaxTotalRachat
     *
     * @return  float|null
     */ 
    public function getMontantMaxTotalRachat(): ?float
    {
        return $this->montantMaxTotalRachat;
    }

    /**
     * Set the value of montantMaxTotalRachat
     *
     * @param  float|null  $montantMaxTotalRachat
     *
     * @return  self
     */ 
    public function setMontantMaxTotalRachat(?float $montantMaxTotalRachat): self
    {
        $this->montantMaxTotalRachat = $montantMaxTotalRachat;

        return $this;
    }

    /**
     * Get the value of montantMinRachatParFonds
     *
     * @return  float|null
     */ 
    public function getMontantMinRachatParFonds(): ?float
    {
        return $this->montantMinRachatParFonds;
    }

    /**
     * Set the value of montantMinRachatParFonds
     *
     * @param  float|null  $montantMinRachatParFonds
     *
     * @return  self
     */ 
    public function setMontantMinRachatParFonds(?float $montantMinRachatParFonds): self
    {
        $this->montantMinRachatParFonds = $montantMinRachatParFonds;

        return $this;
    }

    /**
     * Get the value of soldeMinParFondsApresRachat
     *
     * @return  float|null
     */ 
    public function getSoldeMinParFondsApresRachat(): ?float
    {
        return $this->soldeMinParFondsApresRachat;
    }

    /**
     * Set the value of soldeMinParFondsApresRachat
     *
     * @param  float|null  $soldeMinParFondsApresRachat
     *
     * @return  self
     */ 
    public function setSoldeMinParFondsApresRachat(?float $soldeMinParFondsApresRachat): self
    {
        $this->soldeMinParFondsApresRachat = $soldeMinParFondsApresRachat;

        return $this;
    }

    /**
     * Get the value of soldeMinTotalApresRachat
     *
     * @return  float|null
     */ 
    public function getSoldeMinTotalApresRachat(): ?float
    {
        return $this->soldeMinTotalApresRachat;
    }

    /**
     * Set the value of soldeMinTotalApresRachat
     *
     * @param  float|null  $soldeMinTotalApresRachat
     *
     * @return  self
     */ 
    public function setSoldeMinTotalApresRachat(?float $soldeMinTotalApresRachat): self
    {
        $this->soldeMinTotalApresRachat = $soldeMinTotalApresRachat;

        return $this;
    }

    /**
     * Get the value of soldeMinTotalApresRachat
     *
     * @return  float|null
     */ 
    public function getSoldeMinTotalApresRachat(): ?float
    {
        return $this->soldeMinTotalApresRachat;
    }

    /**
     * Set the value of soldeMinTotalApresRachat
     *
     * @param  float|null  $soldeMinTotalApresRachat
     *
     * @return  self
     */ 
    public function setSoldeMinTotalApresRachat(?float $soldeMinTotalApresRachat): self
    {
        $this->soldeMinTotalApresRachat = $soldeMinTotalApresRachat;

        return $this;
    }

    /**
     * Get the value of soldeMinTotalApresRachatIRPP
     *
     * @return  float|null
     */ 
    public function getSoldeMinTotalApresRachatIRPP(): ?float
    {
        return $this->soldeMinTotalApresRachatIRPP;
    }

    /**
     * Set the value of soldeMinTotalApresRachatIRPP
     *
     * @param  float|null  $soldeMinTotalApresRachatIRPP
     *
     * @return  self
     */ 
    public function setSoldeMinTotalApresRachatIRPP(?float $soldeMinTotalApresRachatIRPP): self
    {
        $this->soldeMinTotalApresRachatIRPP = $soldeMinTotalApresRachatIRPP;

        return $this;
    }

    /**
     * Get the value of soldeMinTotalApresRachatPFL
     *
     * @return  float|null
     */ 
    public function getSoldeMinTotalApresRachatPFL(): ?float
    {
        return $this->soldeMinTotalApresRachatPFL;
    }

    /**
     * Set the value of soldeMinTotalApresRachatPFL
     *
     * @param  float|null  $soldeMinTotalApresRachatPFL
     *
     * @return  self
     */ 
    public function setSoldeMinTotalApresRachatPFL(?float $soldeMinTotalApresRachatPFL): self
    {
        $this->soldeMinTotalApresRachatPFL = $soldeMinTotalApresRachatPFL;

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
