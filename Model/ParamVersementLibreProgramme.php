<?php

namespace Mpp\GeneraliClientBundle\Model;

class ParamVersementLibreProgramme
{
    /**
     * @var array<Seuil>|null
     */
    private $seuils;

    /**
     * @var array<int>|null
     */
    private $joursPrelevement;

    /**
     * Get the value of seuils.
     *
     * @return array<Seuil>|null
     */
    public function getSeuils(): ?array
    {
        return $this->seuils;
    }

    /**
     * Set the value of seuils.
     *
     * @param array<Seuil>|null $seuils
     *
     * @return self
     */
    public function setSeuils(?array $seuils): self
    {
        $this->seuils = $seuils;

        return $this;
    }

    /**
     * Get the value of joursPrelevement.
     *
     * @return array<int>|null
     */
    public function getJoursPrelevement(): ?array
    {
        return $this->joursPrelevement;
    }

    /**
     * Set the value of joursPrelevement.
     *
     * @param array<int>|null $joursPrelevement
     *
     * @return self
     */
    public function setJoursPrelevement(?array $joursPrelevement): self
    {
        $this->joursPrelevement = $joursPrelevement;

        return $this;
    }
}
