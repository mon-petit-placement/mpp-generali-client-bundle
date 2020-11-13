<?php

namespace Mpp\GeneraliClientBundle\Model;

class EtatPPE
{
    /**
     * @var bool|null
     */
    private $indicateur;

    /**
     * @var string|null
     */
    private $codeFonction;

    /**
     * @var string|null
     */
    private $codePays;

    /**
     * @var \DateTimeInterface|null
     */
    private $dateFin;

    /**
     * @var string|null
     */
    private $lienContractantPPE;

    /**
     * @var string|null
     */
    private $nomProche;
    /**
     * @var string|null
     */
    private $prenomProche;

    /**
     * Get the value of indicateur.
     *
     * @return bool|null
     */
    public function getIndicateur(): ?bool
    {
        return $this->indicateur;
    }

    /**
     * Set the value of indicateur.
     *
     * @param bool|null $indicateur
     *
     * @return self
     */
    public function setIndicateur(?bool $indicateur): self
    {
        $this->indicateur = $indicateur;

        return $this;
    }

    /**
     * Get the value of codeFonction.
     *
     * @return string|null
     */
    public function getCodeFonction(): ?string
    {
        return $this->codeFonction;
    }

    /**
     * Set the value of codeFonction.
     *
     * @param string|null $codeFonction
     *
     * @return self
     */
    public function setCodeFonction(?string $codeFonction): self
    {
        $this->codeFonction = $codeFonction;

        return $this;
    }

    /**
     * Get the value of codePays.
     *
     * @return string|null
     */
    public function getCodePays(): ?string
    {
        return $this->codePays;
    }

    /**
     * Set the value of codePays.
     *
     * @param string|null $codePays
     *
     * @return self
     */
    public function setCodePays(?string $codePays): self
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * Get the value of dateFin.
     *
     * @return \DateTimeInterface|null
     */
    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    /**
     * Set the value of dateFin.
     *
     * @param \DateTimeInterface|null $dateFin
     *
     * @return self
     */
    public function setDateFin(?\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get the value of lienContractantPPE.
     *
     * @return string|null
     */
    public function getLienContractantPPE(): ?string
    {
        return $this->lienContractantPPE;
    }

    /**
     * Set the value of lienContractantPPE.
     *
     * @param string|null $lienContractantPPE
     *
     * @return self
     */
    public function setLienContractantPPE(?string $lienContractantPPE): self
    {
        $this->lienContractantPPE = $lienContractantPPE;

        return $this;
    }

    /**
     * Get the value of nomProche.
     *
     * @return string|null
     */
    public function getNomProche(): ?string
    {
        return $this->nomProche;
    }

    /**
     * Set the value of nomProche.
     *
     * @param string|null $nomProche
     *
     * @return self
     */
    public function setNomProche(?string $nomProche): self
    {
        $this->nomProche = $nomProche;

        return $this;
    }

    /**
     * Get the value of prenomProche.
     *
     * @return string|null
     */
    public function getPrenomProche(): ?string
    {
        return $this->prenomProche;
    }

    /**
     * Set the value of prenomProche.
     *
     * @param string|null $prenomProche
     *
     * @return self
     */
    public function setPrenomProche(?string $prenomProche): self
    {
        $this->prenomProche = $prenomProche;

        return $this;
    }
}
