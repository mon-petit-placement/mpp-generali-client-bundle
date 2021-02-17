<?php

namespace Mpp\GeneraliClientBundle\Model;

class ModifVersementLibreProgrammes
{
    /**
     * @var VlpMontant|null
     */
    private $versement;

    /**
     * @var RepartitionModifVLP|null
     */
    private $repartition;

    /**
     * Get the value of versement.
     *
     * @return VlpMontant|null
     */
    public function getVersement(): ?VlpMontant
    {
        return $this->versement;
    }

    /**
     * Set the value of versement.
     *
     * @param VlpMontant|null $versement
     *
     * @return self
     */
    public function setVersement(?VlpMontant $versement): self
    {
        $this->versement = $versement;

        return $this;
    }

    /**
     * Get the value of repartition.
     *
     * @return RepartitionModifVLP|null
     */
    public function getRepartition(): ?RepartitionModifVLP
    {
        return $this->repartition;
    }

    /**
     * Set the value of repartition.
     *
     * @param RepartitionModifVLP|null $repartition
     *
     * @return self
     */
    public function setRepartition(?RepartitionModifVLP $repartition): self
    {
        $this->repartition = $repartition;

        return $this;
    }
}
