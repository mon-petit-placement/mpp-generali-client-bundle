<?php

namespace Mpp\GeneraliClientBundle\Model;

class Contexte
{
    const UTILISATEUR_CLIENT = 'CLIENT';
    const UTILISATEUR_APPORTEUR = 'APPORTEUR';

    /**
     * @var string|null
     */
    private $statut;

    /**
     * @var string|null
     */
    private $codeApporteur;

    /**
     * @var string|null
     */
    private $codeSouscription;

    /**
     * @var string|null
     */
    private $numContrat;

    /**
     * @var array|null
     */
    private $elementsAttendus;

    /**
     * @var string|null
     */
    private $adresseEmailCopie;

    /**
     * @var string|null
     */
    private $idTransaction;

    /**
     * @var string|null
     */
    private $utilisateur;

    /**
     * Get the value of statut
     *
     * @return  string|null
     */ 
    public function getStatut(): ?string
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @param  string|null  $statut
     *
     * @return  self
     */ 
    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of codeApporteur
     *
     * @return  string|null
     */ 
    public function getCodeApporteur(): ?string
    {
        return $this->codeApporteur;
    }

    /**
     * Set the value of codeApporteur
     *
     * @param  string|null  $codeApporteur
     *
     * @return  self
     */ 
    public function setCodeApporteur(?string $codeApporteur): self
    {
        $this->codeApporteur = $codeApporteur;

        return $this;
    }

    /**
     * Get the value of codeSouscription
     *
     * @return  string|null
     */ 
    public function getCodeSouscription(): ?string
    {
        return $this->codeSouscription;
    }

    /**
     * Set the value of codeSouscription
     *
     * @param  string|null  $codeSouscription
     *
     * @return  self
     */ 
    public function setCodeSouscription(?string $codeSouscription): self
    {
        $this->codeSouscription = $codeSouscription;

        return $this;
    }

    /**
     * Get the value of numContrat
     *
     * @return  string|null
     */ 
    public function getNumContrat(): ?string
    {
        return $this->numContrat;
    }

    /**
     * Set the value of numContrat
     *
     * @param  string|null  $numContrat
     *
     * @return  self
     */ 
    public function setNumContrat(?string $numContrat): self
    {
        $this->numContrat = $numContrat;

        return $this;
    }

    /**
     * Get the value of elementsAttendus
     *
     * @return  array|null
     */ 
    public function getElementsAttendus(): ?array
    {
        return $this->elementsAttendus;
    }

    /**
     * Set the value of elementsAttendus
     *
     * @param  array|null  $elementsAttendus
     *
     * @return  self
     */ 
    public function setElementsAttendus(?array $elementsAttendus): self
    {
        $this->elementsAttendus = $elementsAttendus;

        return $this;
    }

    /**
     * Get the value of adresseEmailCopie
     *
     * @return  string|null
     */ 
    public function getAdresseEmailCopie(): ?string
    {
        return $this->adresseEmailCopie;
    }

    /**
     * Set the value of adresseEmailCopie
     *
     * @param  string|null  $adresseEmailCopie
     *
     * @return  self
     */ 
    public function setAdresseEmailCopie(?string $adresseEmailCopie): self
    {
        $this->adresseEmailCopie = $adresseEmailCopie;

        return $this;
    }

    /**
     * Get the value of idTransaction
     *
     * @return  string|null
     */ 
    public function getIdTransaction(): ?string
    {
        return $this->idTransaction;
    }

    /**
     * Set the value of idTransaction
     *
     * @param  string|null  $idTransaction
     *
     * @return  self
     */ 
    public function setIdTransaction(?string $idTransaction): self
    {
        $this->idTransaction = $idTransaction;

        return $this;
    }

    /**
     * Get the value of utilisateur
     *
     * @return  string|null
     */ 
    public function getUtilisateur(): ?string
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     *
     * @param  string|null  $utilisateur
     *
     * @return  self
     */ 
    public function setUtilisateur(?string $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
