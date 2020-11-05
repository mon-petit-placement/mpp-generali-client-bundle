<?php

namespace Mpp\GeneraliClientBundle\Model;

class Contact
{
    /**
     * @var AdressePostale|null
     */
    private $adressePostale;

    /**
     * @var string|null
     */
    private $telephone;

    /**
     * @var string|null
     */
    private $email;

    /**
     * Get the value of adressePostale
     *
     * @return  AdressePostale|null
     */ 
    public function getAdressePostale(): ?AdressePostale
    {
        return $this->adressePostale;
    }

    /**
     * Set the value of adressePostale
     *
     * @param  AdressePostale|null  $adressePostale
     *
     * @return  self
     */ 
    public function setAdressePostale(?AdressePostale $adressePostale): self
    {
        $this->adressePostale = $adressePostale;

        return $this;
    }

    /**
     * Get the value of telephone
     *
     * @return  string|null
     */ 
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @param  string|null  $telephone
     *
     * @return  self
     */ 
    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string|null
     */ 
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string|null  $email
     *
     * @return  self
     */ 
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }
}
