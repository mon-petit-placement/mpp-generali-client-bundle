<?php

namespace Mpp\GeneraliClientBundle\Model;

class SouscripteurComplement
{
    /**
     * @var string|null
     */
    private $situationFamiliale;

    /**
     * @var string|null
     */
    private $regimeMatrimonial;

    /**
     * @var string|null
     */
    private $detailRegimeMatrimonial;

    /**
     * @var string|null
     */
    private $situationProfessionnelle;

    /**
     * @var string|null
     */
    private $csp;

    /**
     * @var string|null
     */
    private $profession;

    /**
     * @var string|null
     */
    private $nomEmployeur;

    /**
     * @var string|null
     */
    private $codeNaf;

    /**
     * @var string|null
     */
    private $siret;

    /**
     * @var \DateTimeInterface|null
     */
    private $dateDebutInactivite;

    /**
     * Get the value of situationFamiliale
     *
     * @return  string|null
     */ 
    public function getSituationFamiliale(): ?string
    {
        return $this->situationFamiliale;
    }

    /**
     * Set the value of situationFamiliale
     *
     * @param  string|null  $situationFamiliale
     *
     * @return  self
     */ 
    public function setSituationFamiliale(?string $situationFamiliale): self
    {
        $this->situationFamiliale = $situationFamiliale;

        return $this;
    }

    /**
     * Get the value of regimeMatrimonial
     *
     * @return  string|null
     */ 
    public function getRegimeMatrimonial(): ?string
    {
        return $this->regimeMatrimonial;
    }

    /**
     * Set the value of regimeMatrimonial
     *
     * @param  string|null  $regimeMatrimonial
     *
     * @return  self
     */ 
    public function setRegimeMatrimonial(?string $regimeMatrimonial): self
    {
        $this->regimeMatrimonial = $regimeMatrimonial;

        return $this;
    }

    /**
     * Get the value of detailRegimeMatrimonial
     *
     * @return  string|null
     */ 
    public function getDetailRegimeMatrimonial(): ?string
    {
        return $this->detailRegimeMatrimonial;
    }

    /**
     * Set the value of detailRegimeMatrimonial
     *
     * @param  string|null  $detailRegimeMatrimonial
     *
     * @return  self
     */ 
    public function setDetailRegimeMatrimonial(?string $detailRegimeMatrimonial): self
    {
        $this->detailRegimeMatrimonial = $detailRegimeMatrimonial;

        return $this;
    }

    /**
     * Get the value of situationProfessionnelle
     *
     * @return  string|null
     */ 
    public function getSituationProfessionnelle(): ?string
    {
        return $this->situationProfessionnelle;
    }

    /**
     * Set the value of situationProfessionnelle
     *
     * @param  string|null  $situationProfessionnelle
     *
     * @return  self
     */ 
    public function setSituationProfessionnelle(?string $situationProfessionnelle): self
    {
        $this->situationProfessionnelle = $situationProfessionnelle;

        return $this;
    }

    /**
     * Get the value of csp
     *
     * @return  string|null
     */ 
    public function getCsp(): ?string
    {
        return $this->csp;
    }

    /**
     * Set the value of csp
     *
     * @param  string|null  $csp
     *
     * @return  self
     */ 
    public function setCsp(?string $csp): self
    {
        $this->csp = $csp;

        return $this;
    }

    /**
     * Get the value of profession
     *
     * @return  string|null
     */ 
    public function getProfession(): ?string
    {
        return $this->profession;
    }

    /**
     * Set the value of profession
     *
     * @param  string|null  $profession
     *
     * @return  self
     */ 
    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get the value of nomEmployeur
     *
     * @return  string|null
     */ 
    public function getNomEmployeur(): ?string
    {
        return $this->nomEmployeur;
    }

    /**
     * Set the value of nomEmployeur
     *
     * @param  string|null  $nomEmployeur
     *
     * @return  self
     */ 
    public function setNomEmployeur(?string $nomEmployeur): self
    {
        $this->nomEmployeur = $nomEmployeur;

        return $this;
    }

    /**
     * Get the value of codeNaf
     *
     * @return  string|null
     */ 
    public function getCodeNaf(): ?string
    {
        return $this->codeNaf;
    }

    /**
     * Set the value of codeNaf
     *
     * @param  string|null  $codeNaf
     *
     * @return  self
     */ 
    public function setCodeNaf(?string $codeNaf): self
    {
        $this->codeNaf = $codeNaf;

        return $this;
    }

    /**
     * Get the value of siret
     *
     * @return  string|null
     */ 
    public function getSiret(): ?string
    {
        return $this->siret;
    }

    /**
     * Set the value of siret
     *
     * @param  string|null  $siret
     *
     * @return  self
     */ 
    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get the value of dateDebutInactivite
     *
     * @return  \DateTimeInterface|null
     */ 
    public function getDateDebutInactivite(): ?\DateTimeInterface
    {
        return $this->dateDebutInactivite;
    }

    /**
     * Set the value of dateDebutInactivite
     *
     * @param  \DateTimeInterface|null  $dateDebutInactivite
     *
     * @return  self
     */ 
    public function setDateDebutInactivite(?\DateTimeInterface $dateDebutInactivite): self
    {
        $this->dateDebutInactivite = $dateDebutInactivite;

        return $this;
    }
}
