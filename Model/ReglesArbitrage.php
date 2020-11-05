<?php

namespace Mpp\GeneraliClientBundle\Model;

class ReglesArbitrage
{
    /**
     * @var float|null
     */
    private $minimumDesinvestissementParFond;

    /**
     * @var float|null
     */
    private $minimumReinvestissementParFond;

    /**
     * @var float|null
     */
    private $soldeRestantMinimumParFond;

    /**
     * @var float|null
     */
    private $minimumDesinvestissementTotal;

    /**
     * @var float|null
     */
    private $maximumDesinvestissementTotal;

    /**
     * Get the value of minimumDesinvestissementParFond
     *
     * @return  float|null
     */ 
    public function getMinimumDesinvestissementParFond(): ?float
    {
        return $this->minimumDesinvestissementParFond;
    }

    /**
     * Set the value of minimumDesinvestissementParFond
     *
     * @param  float|null  $minimumDesinvestissementParFond
     *
     * @return  self
     */ 
    public function setMinimumDesinvestissementParFond(?float $minimumDesinvestissementParFond): self
    {
        $this->minimumDesinvestissementParFond = $minimumDesinvestissementParFond;

        return $this;
    }

    /**
     * Get the value of minimumReinvestissementParFond
     *
     * @return  float|null
     */ 
    public function getMinimumReinvestissementParFond(): ?float
    {
        return $this->minimumReinvestissementParFond;
    }

    /**
     * Set the value of minimumReinvestissementParFond
     *
     * @param  float|null  $minimumReinvestissementParFond
     *
     * @return  self
     */ 
    public function setMinimumReinvestissementParFond(?float $minimumReinvestissementParFond): self
    {
        $this->minimumReinvestissementParFond = $minimumReinvestissementParFond;

        return $this;
    }

    /**
     * Get the value of soldeRestantMinimumParFond
     *
     * @return  float|null
     */ 
    public function getSoldeRestantMinimumParFond(): ?float
    {
        return $this->soldeRestantMinimumParFond;
    }

    /**
     * Set the value of soldeRestantMinimumParFond
     *
     * @param  float|null  $soldeRestantMinimumParFond
     *
     * @return  self
     */ 
    public function setSoldeRestantMinimumParFond(?float $soldeRestantMinimumParFond): self
    {
        $this->soldeRestantMinimumParFond = $soldeRestantMinimumParFond;

        return $this;
    }

    /**
     * Get the value of minimumDesinvestissementTotal
     *
     * @return  float|null
     */ 
    public function getMinimumDesinvestissementTotal(): ?float
    {
        return $this->minimumDesinvestissementTotal;
    }

    /**
     * Set the value of minimumDesinvestissementTotal
     *
     * @param  float|null  $minimumDesinvestissementTotal
     *
     * @return  self
     */ 
    public function setMinimumDesinvestissementTotal(?float $minimumDesinvestissementTotal): self
    {
        $this->minimumDesinvestissementTotal = $minimumDesinvestissementTotal;

        return $this;
    }

    /**
     * Get the value of maximumDesinvestissementTotal
     *
     * @return  float|null
     */ 
    public function getMaximumDesinvestissementTotal(): ?float
    {
        return $this->maximumDesinvestissementTotal;
    }

    /**
     * Set the value of maximumDesinvestissementTotal
     *
     * @param  float|null  $maximumDesinvestissementTotal
     *
     * @return  self
     */ 
    public function setMaximumDesinvestissementTotal(?float $maximumDesinvestissementTotal): self
    {
        $this->maximumDesinvestissementTotal = $maximumDesinvestissementTotal;

        return $this;
    }
}
