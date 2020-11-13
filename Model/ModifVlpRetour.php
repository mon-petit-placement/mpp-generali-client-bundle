<?php

namespace Mpp\GeneraliClientBundle\Model;

class ModifVlpRetour
{
    /**
     * @var array<FondsInvestissables>|null
     */
    private $fondsInvestissables;

    /**
     * @var array<CompteBancaire>|null
     */
    private $ribsPrelevement;

    /**
     * @var InfoVersement|null
     */
    private $infoVersement;

    /**
     * @var EpargneAtteinte|null
     */
    private $epargneAtteinte;

    /**
     * Get the value of fondsInvestissables.
     *
     * @return array<FondsInvestissables>|null
     */
    public function getFondsInvestissables(): ?array
    {
        return $this->fondsInvestissables;
    }

    /**
     * Set the value of fondsInvestissables.
     *
     * @param array<FondsInvestissables>|null $fondsInvestissables
     *
     * @return self
     */
    public function setFondsInvestissables(?array $fondsInvestissables): self
    {
        $this->fondsInvestissables = $fondsInvestissables;

        return $this;
    }

    /**
     * Get the value of ribsPrelevement.
     *
     * @return array<CompteBancaire>|null
     */
    public function getRibsPrelevement(): ?array
    {
        return $this->ribsPrelevement;
    }

    /**
     * Set the value of ribsPrelevement.
     *
     * @param array<CompteBancaire>|null $ribsPrelevement
     *
     * @return self
     */
    public function setRibsPrelevement(?array $ribsPrelevement): self
    {
        $this->ribsPrelevement = $ribsPrelevement;

        return $this;
    }

    /**
     * Get the value of infoVersement.
     *
     * @return InfoVersement|null
     */
    public function getInfoVersement(): ?InfoVersement
    {
        return $this->infoVersement;
    }

    /**
     * Set the value of infoVersement.
     *
     * @param InfoVersement|null $infoVersement
     *
     * @return self
     */
    public function setInfoVersement(?InfoVersement $infoVersement): self
    {
        $this->infoVersement = $infoVersement;

        return $this;
    }

    /**
     * Get the value of epargneAtteinte.
     *
     * @return EpargneAtteinte|null
     */
    public function getEpargneAtteinte(): ?EpargneAtteinte
    {
        return $this->epargneAtteinte;
    }

    /**
     * Set the value of epargneAtteinte.
     *
     * @param EpargneAtteinte|null $epargneAtteinte
     *
     * @return self
     */
    public function setEpargneAtteinte(?EpargneAtteinte $epargneAtteinte): self
    {
        $this->epargneAtteinte = $epargneAtteinte;

        return $this;
    }
}
