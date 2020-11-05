<?php

namespace Mpp\GeneraliClientBundle\Model;

class Fatca
{
    /**
     * @var bool|null
     */
    private $citoyenUSA;

    /**
     * @var bool|null
     */
    private $residenceUSA;

    /**
     * @var string|null
     */
    private $tin;

    /**
     * Get the value of citoyenUSA
     *
     * @return  bool|null
     */ 
    public function getCitoyenUSA(): ?bool
    {
        return $this->citoyenUSA;
    }

    /**
     * Set the value of citoyenUSA
     *
     * @param  bool|null  $citoyenUSA
     *
     * @return  self
     */ 
    public function setCitoyenUSA(?bool $citoyenUSA): self
    {
        $this->citoyenUSA = $citoyenUSA;

        return $this;
    }

    /**
     * Get the value of residenceUSA
     *
     * @return  bool
     */ 
    public function getResidenceUSA(): ?bool
    {
        return $this->residenceUSA;
    }

    /**
     * Set the value of residenceUSA
     *
     * @param  bool  $residenceUSA
     *
     * @return  self
     */ 
    public function setResidenceUSA(?bool $residenceUSA): self
    {
        $this->residenceUSA = $residenceUSA;

        return $this;
    }

    /**
     * Get the value of tin
     *
     * @return  string|null
     */ 
    public function getTin(): ?string
    {
        return $this->tin;
    }

    /**
     * Set the value of tin
     *
     * @param  string|null  $tin
     *
     * @return  self
     */ 
    public function setTin(?string $tin): self
    {
        $this->tin = $tin;

        return $this;
    }
}
