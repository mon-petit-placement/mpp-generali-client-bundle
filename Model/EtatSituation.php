<?php

namespace Mpp\GeneraliClientBundle\Model;

class EtatSituation
{
    private \DateTimeInterface $dateEtatSituation;

    private string $controle;

    private string $libelle;

    private string $numCourrier;

    /**
     * Get the value of dateEtatSituation
     */
    public function getDateEtatSituation(): \DateTimeInterface
    {
        return $this->dateEtatSituation;
    }

    /**
     * Set the value of dateEtatSituation
     */
    public function setDateEtatSituation(\DateTimeInterface $dateEtatSituation): self
    {
        $this->dateEtatSituation = $dateEtatSituation;

        return $this;
    }

    /**
     * Get the value of controle
     */
    public function getControle(): string
    {
        return $this->controle;
    }

    /**
     * Set the value of controle
     */
    public function setControle(string $controle): self
    {
        $this->controle = $controle;

        return $this;
    }

    /**
     * Get the value of libelle
     */
    public function getLibelle(): string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     */
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of numCourrier
     */
    public function getNumCourrier(): string
    {
        return $this->numCourrier;
    }

    /**
     * Set the value of numCourrier
     */
    public function setNumCourrier(string $numCourrier): self
    {
        $this->numCourrier = $numCourrier;

        return $this;
    }
}
