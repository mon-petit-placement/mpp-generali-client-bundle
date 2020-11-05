<?php

namespace Mpp\GeneraliClientBundle\Model;

class InfoVLP
{
    /**
     * @var \DateTimeInterface|null
     */
    private $dateProchainPrelevement;

    /**
     * @var \DateTimeInterface|null
     */
    private $debutPeriode;

    /**
     * @var bool|null
     */
    private $suspendu;

    /**
     * @var string|null
     */
    private $periodicite;

    /**
     * @var float|null
     */
    private $montantPreleve;

    /**
     * @var array<Fonds>|null
     */
    private $fonds;

    /**
     * Get the value of dateProchainPrelevement
     *
     * @return  \DateTimeInterface|null
     */ 
    public function getDateProchainPrelevement(): ?\DateTimeInterface
    {
        return $this->dateProchainPrelevement;
    }

    /**
     * Set the value of dateProchainPrelevement
     *
     * @param  \DateTimeInterface|null  $dateProchainPrelevement
     *
     * @return  self
     */ 
    public function setDateProchainPrelevement(?\DateTimeInterface $dateProchainPrelevement): self
    {
        $this->dateProchainPrelevement = $dateProchainPrelevement;

        return $this;
    }

    /**
     * Get the value of debutPeriode
     *
     * @return  \DateTimeInterface|null
     */ 
    public function getDebutPeriode(): ?\DateTimeInterface
    {
        return $this->debutPeriode;
    }

    /**
     * Set the value of debutPeriode
     *
     * @param  \DateTimeInterface|null  $debutPeriode
     *
     * @return  self
     */ 
    public function setDebutPeriode(?\DateTimeInterface $debutPeriode): self
    {
        $this->debutPeriode = $debutPeriode;

        return $this;
    }

    /**
     * Get the value of suspendu
     *
     * @return  bool|null
     */ 
    public function getSuspendu(): ?bool
    {
        return $this->suspendu;
    }

    /**
     * Set the value of suspendu
     *
     * @param  bool|null  $suspendu
     *
     * @return  self
     */ 
    public function setSuspendu(?bool $suspendu): self
    {
        $this->suspendu = $suspendu;

        return $this;
    }

    /**
     * Get the value of periodicite
     *
     * @return  string|null
     */ 
    public function getPeriodicite(): ?string
    {
        return $this->periodicite;
    }

    /**
     * Set the value of periodicite
     *
     * @param  string|null  $periodicite
     *
     * @return  self
     */ 
    public function setPeriodicite(?string $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

    /**
     * Get the value of montantPreleve
     *
     * @return  float|null
     */ 
    public function getMontantPreleve(): ?float
    {
        return $this->montantPreleve;
    }

    /**
     * Set the value of montantPreleve
     *
     * @param  float|null  $montantPreleve
     *
     * @return  self
     */ 
    public function setMontantPreleve(?float $montantPreleve): self
    {
        $this->montantPreleve = $montantPreleve;

        return $this;
    }

    /**
     * Get the value of fonds
     *
     * @return  array<Fonds>|null
     */ 
    public function getFonds(): ?array
    {
        return $this->fonds;
    }

    /**
     * Set the value of fonds
     *
     * @param  array<Fonds>|null  $fonds
     *
     * @return  self
     */ 
    public function setFonds(?array $fonds): self
    {
        $this->fonds = $fonds;

        return $this;
    }
}
