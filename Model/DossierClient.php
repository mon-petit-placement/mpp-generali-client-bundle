<?php

namespace Mpp\GeneraliClientBundle\Model;

class DossierClient
{
    /**
     * @var SituationPatrimoniale|null
     */
    private $situationPatrimoniale;

    /**
     * @var array<ObjectifVersement>|null
     */
    private $objectifsVersement;

    /**
     * @var OriginePaiement|null
     */
    private $originePaiement;

    /**
     * Get the value of situationPatrimoniale.
     *
     * @return SituationPatrimoniale|null
     */
    public function getSituationPatrimoniale(): ?SituationPatrimoniale
    {
        return $this->situationPatrimoniale;
    }

    /**
     * Set the value of situationPatrimoniale.
     *
     * @param SituationPatrimoniale|null $situationPatrimoniale
     *
     * @return self
     */
    public function setSituationPatrimoniale(?SituationPatrimoniale $situationPatrimoniale): self
    {
        $this->situationPatrimoniale = $situationPatrimoniale;

        return $this;
    }

    /**
     * Get the value of objectifsVersement.
     *
     * @return array<ObjectifVersement>|null
     */
    public function getObjectifsVersement(): ?array
    {
        return $this->objectifsVersement;
    }

    /**
     * Set the value of objectifsVersement.
     *
     * @param array<ObjectifVersement>|null $objectifsVersement
     *
     * @return self
     */
    public function setObjectifsVersement(?array $objectifsVersement): self
    {
        $this->objectifsVersement = $objectifsVersement;

        return $this;
    }

    /**
     * Get the value of originePaiement.
     *
     * @return OriginePaiement|null
     */
    public function getOriginePaiement(): ?OriginePaiement
    {
        return $this->originePaiement;
    }

    /**
     * Set the value of originePaiement.
     *
     * @param OriginePaiement|null $originePaiement
     *
     * @return self
     */
    public function setOriginePaiement(?OriginePaiement $originePaiement): self
    {
        $this->originePaiement = $originePaiement;

        return $this;
    }
}
