<?php

namespace Mpp\GeneraliClientBundle\Model;

class ErrorMessage
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $criticite;

    /**
     * @var string|null
     */
    private $texte;

    /**
     * @var string|null
     */
    private $cible;

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
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of criticite
     *
     * @return  string|null
     */ 
    public function getCriticite(): ?string
    {
        return $this->criticite;
    }

    /**
     * Set the value of criticite
     *
     * @param  string|null  $criticite
     *
     * @return  self
     */ 
    public function setCriticite(?string $criticite): self
    {
        $this->criticite = $criticite;

        return $this;
    }

    /**
     * Get the value of texte
     *
     * @return  string|null
     */ 
    public function getTexte(): ?string
    {
        return $this->texte;
    }

    /**
     * Set the value of texte
     *
     * @param  string|null  $texte
     *
     * @return  self
     */ 
    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get the value of cible
     *
     * @return  string|null
     */ 
    public function getCible(): ?string
    {
        return $this->cible;
    }

    /**
     * Set the value of cible
     *
     * @param  string|null  $cible
     *
     * @return  self
     */ 
    public function setCible(?string $cible): self
    {
        $this->cible = $cible;

        return $this;
    }
}
