<?php

namespace Mpp\GeneraliClientBundle\Model;

class ParametrageVersementLibreProgramme
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $montantMinSupport;

    /**
     * @var array<Periodicite>|null
     */
    private $periodicite;

    /**
     * @var array<int>|null
     */
    private $jourPrelevement;

    /**
     * Get the value of id.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Set the value of id.
     *
     * @param string|null $id
     *
     * @return self
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of montantMinSupport.
     *
     * @return int|null
     */
    public function getMontantMinSupport(): ?int
    {
        return $this->montantMinSupport;
    }

    /**
     * Set the value of montantMinSupport.
     *
     * @param int|null $montantMinSupport
     *
     * @return self
     */
    public function setMontantMinSupport(?int $montantMinSupport): self
    {
        $this->montantMinSupport = $montantMinSupport;

        return $this;
    }

    /**
     * Get the value of periodicite.
     *
     * @return array<Periodicite>|null
     */
    public function getPeriodicite(): ?array
    {
        return $this->periodicite;
    }

    /**
     * Set the value of periodicite.
     *
     * @param array<Periodicite>|null $periodicite
     *
     * @return self
     */
    public function setPeriodicite(?array $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

    /**
     * Get the value of jourPrelevement.
     *
     * @return array<int>|null
     */
    public function getJourPrelevement(): ?array
    {
        return $this->jourPrelevement;
    }

    /**
     * Set the value of jourPrelevement.
     *
     * @param array<int>|null $jourPrelevement
     *
     * @return self
     */
    public function setJourPrelevement(?array $jourPrelevement): self
    {
        $this->jourPrelevement = $jourPrelevement;

        return $this;
    }
}
