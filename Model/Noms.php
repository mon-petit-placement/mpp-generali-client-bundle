<?php

namespace Mpp\GeneraliClientBundle\Model;

class Noms
{
    /**
     * @var string|null
     */
    private $codeCivilite;

    /**
     * @var string|null
     */
    private $prenom;

    /**
     * @var string|null
     */
    private $nom;

    /**
     * @var string|null
     */
    private $nomNaissance;

    /**
     * Get the value of codeCivilite
     *
     * @return  string|null
     */ 
    public function getCodeCivilite(): ?string
    {
        return $this->codeCivilite;
    }

    /**
     * Set the value of codeCivilite
     *
     * @param  string|null  $codeCivilite
     *
     * @return  self
     */ 
    public function setCodeCivilite(?string $codeCivilite): self
    {
        $this->codeCivilite = $codeCivilite;

        return $this;
    }

    /**
     * Get the value of prenom
     *
     * @return  string|null
     */ 
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @param  string|null  $prenom
     *
     * @return  self
     */ 
    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     *
     * @return  string|null
     */ 
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @param  string|null  $nom
     *
     * @return  self
     */ 
    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of nomNaissance
     *
     * @return  string|null
     */ 
    public function getNomNaissance(): ?string
    {
        return $this->nomNaissance;
    }

    /**
     * Set the value of nomNaissance
     *
     * @param  string|null  $nomNaissance
     *
     * @return  self
     */ 
    public function setNomNaissance(?string $nomNaissance): self
    {
        $this->nomNaissance = $nomNaissance;

        return $this;
    }
}
