<?php

namespace Mpp\GeneraliClientBundle\Model;

class InfoVersement
{
    /**
     * @var string|null
     */
    private $indicateurRepartition;

    /**
     * @var float|null
     */
    private $montantInvestissementMin;

    /**
     * @var float|null
     */
    private $montantversementlibre;

    /**
     * @var bool|null
     */
    private $vlpEncours;

    /**
     * @var bool|null
     */
    private $vlpSuspendu;

    /**
     * @var string|null
     */
    private $periodicite;

    /**
     * @var string|null
     */
    private $debutPeriode;

    /**
     * @var string|null
     */
    private $dateProchainPrelevement;

    /**
     * @var string|null
     */
    private $dateProchaineEcheance;

    /**
     * @var array<FondsInvesti>|null
     */
    private $fondsInvestis;

    /**
     * Get the value of indicateurRepartition.
     *
     * @return string|null
     */
    public function getIndicateurRepartition(): ?string
    {
        return $this->indicateurRepartition;
    }

    /**
     * Set the value of indicateurRepartition.
     *
     * @param string|null $indicateurRepartition
     *
     * @return self
     */
    public function setIndicateurRepartition(?string $indicateurRepartition): self
    {
        $this->indicateurRepartition = $indicateurRepartition;

        return $this;
    }

    /**
     * Get the value of montantInvestissementMin.
     *
     * @return float|null
     */
    public function getMontantInvestissementMin(): ?float
    {
        return $this->montantInvestissementMin;
    }

    /**
     * Set the value of montantInvestissementMin.
     *
     * @param float|null $montantInvestissementMin
     *
     * @return self
     */
    public function setMontantInvestissementMin(?float $montantInvestissementMin): self
    {
        $this->montantInvestissementMin = $montantInvestissementMin;

        return $this;
    }

    /**
     * Get the value of montantversementlibre.
     *
     * @return float|null
     */
    public function getMontantversementlibre(): ?float
    {
        return $this->montantversementlibre;
    }

    /**
     * Set the value of montantversementlibre.
     *
     * @param float|null $montantversementlibre
     *
     * @return self
     */
    public function setMontantversementlibre(?float $montantversementlibre): self
    {
        $this->montantversementlibre = $montantversementlibre;

        return $this;
    }

    /**
     * Get the value of vlpEncours.
     *
     * @return bool|null
     */
    public function getVlpEncours(): ?bool
    {
        return $this->vlpEncours;
    }

    /**
     * Set the value of vlpEncours.
     *
     * @param bool|null $vlpEncours
     *
     * @return self
     */
    public function setVlpEncours(?bool $vlpEncours): self
    {
        $this->vlpEncours = $vlpEncours;

        return $this;
    }

    /**
     * Get the value of vlpSuspendu.
     *
     * @return bool|null
     */
    public function getVlpSuspendu(): ?bool
    {
        return $this->vlpSuspendu;
    }

    /**
     * Set the value of vlpSuspendu.
     *
     * @param bool|null $vlpSuspendu
     *
     * @return self
     */
    public function setVlpSuspendu(?bool $vlpSuspendu): self
    {
        $this->vlpSuspendu = $vlpSuspendu;

        return $this;
    }

    /**
     * Get the value of periodicite.
     *
     * @return string|null
     */
    public function getPeriodicite(): ?string
    {
        return $this->periodicite;
    }

    /**
     * Set the value of periodicite.
     *
     * @param string|null $periodicite
     *
     * @return self
     */
    public function setPeriodicite(?string $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

    /**
     * Get the value of debutPeriode.
     *
     * @return string|null
     */
    public function getDebutPeriode(): ?string
    {
        return $this->debutPeriode;
    }

    /**
     * Set the value of debutPeriode.
     *
     * @param string|null $debutPeriode
     *
     * @return self
     */
    public function setDebutPeriode(?string $debutPeriode): self
    {
        $this->debutPeriode = $debutPeriode;

        return $this;
    }

    /**
     * Get the value of dateProchainPrelevement.
     *
     * @return string|null
     */
    public function getDateProchainPrelevement(): ?string
    {
        return $this->dateProchainPrelevement;
    }

    /**
     * Set the value of dateProchainPrelevement.
     *
     * @param string|null $dateProchainPrelevement
     *
     * @return self
     */
    public function setDateProchainPrelevement(?string $dateProchainPrelevement): self
    {
        $this->dateProchainPrelevement = $dateProchainPrelevement;

        return $this;
    }

    /**
     * Get the value of dateProchaineEcheance.
     *
     * @return string|null
     */
    public function getDateProchaineEcheance(): ?string
    {
        return $this->dateProchaineEcheance;
    }

    /**
     * Set the value of dateProchaineEcheance.
     *
     * @param string|null $dateProchaineEcheance
     *
     * @return self
     */
    public function setDateProchaineEcheance(?string $dateProchaineEcheance): self
    {
        $this->dateProchaineEcheance = $dateProchaineEcheance;

        return $this;
    }

    /**
     * Get the value of fondsInvestis.
     *
     * @return array<FondsInvesti>|null
     */
    public function getFondsInvestis(): ?array
    {
        return $this->fondsInvestis;
    }

    /**
     * Set the value of fondsInvestis.
     *
     * @param array<FondsInvesti>|null $fondsInvestis
     *
     * @return self
     */
    public function setFondsInvestis(?array $fondsInvestis): self
    {
        $this->fondsInvestis = $fondsInvestis;

        return $this;
    }
}
