<?php

namespace Mpp\GeneraliClientBundle\Model;

class CombinaisonPossibleSouscription
{
    /**
     * @var string|null
     */
    private $codeModeGestion;

    /**
     * @var string|null
     */
    private $modeGestion;

    /**
     * @var string|null
     */
    private $garantiePrevoyance;

    /**
     * @var bool|null
     */
    private $securisationPlusValues;

    /**
     * @var bool|null
     */
    private $limitationsMoinsValues;

    /**
     * @var bool|null
     */
    private $rachatPartielProgramme;

    /**
     * @var bool|null
     */
    private $versementLibreProgramme;

    /**
     * Get the value of codeModeGestion.
     *
     * @return string|null
     */
    public function getCodeModeGestion(): ?string
    {
        return $this->codeModeGestion;
    }

    /**
     * Set the value of codeModeGestion.
     *
     * @param string|null $codeModeGestion
     *
     * @return self
     */
    public function setCodeModeGestion(?string $codeModeGestion): self
    {
        $this->codeModeGestion = $codeModeGestion;

        return $this;
    }

    /**
     * Get the value of modeGestion.
     *
     * @return string|null
     */
    public function getModeGestion(): ?string
    {
        return $this->modeGestion;
    }

    /**
     * Set the value of modeGestion.
     *
     * @param string|null $modeGestion
     *
     * @return self
     */
    public function setModeGestion(?string $modeGestion): self
    {
        $this->modeGestion = $modeGestion;

        return $this;
    }

    /**
     * Get the value of garantiePrevoyance.
     *
     * @return string|null
     */
    public function getGarantiePrevoyance(): ?string
    {
        return $this->garantiePrevoyance;
    }

    /**
     * Set the value of garantiePrevoyance.
     *
     * @param string|null $garantiePrevoyance
     *
     * @return self
     */
    public function setGarantiePrevoyance(?string $garantiePrevoyance): self
    {
        $this->garantiePrevoyance = $garantiePrevoyance;

        return $this;
    }

    /**
     * Get the value of securisationPlusValues.
     *
     * @return bool|null
     */
    public function getSecurisationPlusValues(): ?bool
    {
        return $this->securisationPlusValues;
    }

    /**
     * Set the value of securisationPlusValues.
     *
     * @param bool|null $securisationPlusValues
     *
     * @return self
     */
    public function setSecurisationPlusValues(?bool $securisationPlusValues): self
    {
        $this->securisationPlusValues = $securisationPlusValues;

        return $this;
    }

    /**
     * Get the value of limitationsMoinsValues.
     *
     * @return bool|null
     */
    public function getLimitationsMoinsValues(): ?bool
    {
        return $this->limitationsMoinsValues;
    }

    /**
     * Set the value of limitationsMoinsValues.
     *
     * @param bool|null $limitationsMoinsValues
     *
     * @return self
     */
    public function setLimitationsMoinsValues(?bool $limitationsMoinsValues): self
    {
        $this->limitationsMoinsValues = $limitationsMoinsValues;

        return $this;
    }

    /**
     * Get the value of rachatPartielProgramme.
     *
     * @return bool|null
     */
    public function getRachatPartielProgramme(): ?bool
    {
        return $this->rachatPartielProgramme;
    }

    /**
     * Set the value of rachatPartielProgramme.
     *
     * @param bool|null $rachatPartielProgramme
     *
     * @return self
     */
    public function setRachatPartielProgramme(?bool $rachatPartielProgramme): self
    {
        $this->rachatPartielProgramme = $rachatPartielProgramme;

        return $this;
    }

    /**
     * Get the value of versementLibreProgramme.
     *
     * @return bool|null
     */
    public function getVersementLibreProgramme(): ?bool
    {
        return $this->versementLibreProgramme;
    }

    /**
     * Set the value of versementLibreProgramme.
     *
     * @param bool|null $versementLibreProgramme
     *
     * @return self
     */
    public function setVersementLibreProgramme(?bool $versementLibreProgramme): self
    {
        $this->versementLibreProgramme = $versementLibreProgramme;

        return $this;
    }
}
