<?php

namespace Mpp\GeneraliClientBundle\Model;

class GarantiePrevoyance
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var int|null
     */
    private $ageMin;

    /**
     * @var int|null
     */
    private $ageMax;

    /**
     * @var int|null
     */
    private $montantMinimum;

    /**
     * Get the value of code
     *
     * @return  string|null
     */ 
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @param  string|null  $code
     *
     * @return  self
     */ 
    public function setCode(?string $code): 
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of libelle
     *
     * @return  string|null
     */ 
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @param  string|null  $libelle
     *
     * @return  self
     */ 
    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string|null
     */ 
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string|null  $description
     *
     * @return  self
     */ 
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of ageMin
     *
     * @return  int|null
     */ 
    public function getAgeMin(): ?int
    {
        return $this->ageMin;
    }

    /**
     * Set the value of ageMin
     *
     * @param  int|null  $ageMin
     *
     * @return  self
     */ 
    public function setAgeMin(?int $ageMin): self
    {
        $this->ageMin = $ageMin;

        return $this;
    }

    /**
     * Get the value of ageMax
     *
     * @return  int|null
     */ 
    public function getAgeMax(): ?int
    {
        return $this->ageMax;
    }

    /**
     * Set the value of ageMax
     *
     * @param  int|null  $ageMax
     *
     * @return  self
     */ 
    public function setAgeMax(?int $ageMax): self
    {
        $this->ageMax = $ageMax;

        return $this;
    }

    /**
     * Get the value of montantMinimum
     *
     * @return  int|null
     */ 
    public function getMontantMinimum(): ?int
    {
        return $this->montantMinimum;
    }

    /**
     * Set the value of montantMinimum
     *
     * @param  int|null  $montantMinimum
     *
     * @return  self
     */ 
    public function setMontantMinimum(?int $montantMinimum): self
    {
        $this->montantMinimum = $montantMinimum;

        return $this;
    }
}
