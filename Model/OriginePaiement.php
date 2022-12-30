<?php

namespace Mpp\GeneraliClientBundle\Model;

class OriginePaiement
{
    /**
     * @var bool|null
     */
    private $moyenPaiementFrancais;

    /**
     * @var bool|null
     */
    private $paiementParTiersPayeur;

    /**
     * @var TiersPayeur|null
     */
    private $tiersPayeur;

    /**
     * Get the value of moyenPaiementFrancais.
     *
     * @return bool|null
     */
    public function getMoyenPaiementFrancais(): ?bool
    {
        return $this->moyenPaiementFrancais;
    }

    /**
     * Set the value of moyenPaiementFrancais.
     *
     * @param bool|null $moyenPaiementFrancais
     *
     * @return self
     */
    public function setMoyenPaiementFrancais(?bool $moyenPaiementFrancais): self
    {
        $this->moyenPaiementFrancais = $moyenPaiementFrancais;

        return $this;
    }

    /**
     * Get the value of paiementParTiersPayeur
     *
     * @return  bool|null
     */
    public function getPaiementParTiersPayeur(): ?bool
    {
        return $this->paiementParTiersPayeur;
    }

    /**
     * Set the value of paiementParTiersPayeur
     *
     * @param  bool|null  $paiementParTiersPayeur
     *
     * @return  self
     */
    public function setPaiementParTiersPayeur(?bool $paiementParTiersPayeur): self
    {
        $this->paiementParTiersPayeur = $paiementParTiersPayeur;

        return $this;
    }

    /**
     * Get the value of tiersPayeur
     *
     * @return  TiersPayeur|null
     */
    public function getTiersPayeur(): ?TiersPayeur
    {
        return $this->tiersPayeur;
    }

    /**
     * Set the value of tiersPayeur
     *
     * @param  TiersPayeur|null  $tiersPayeur
     *
     * @return  self
     */
    public function setTiersPayeur(?TiersPayeur $tiersPayeur): self
    {
        $this->tiersPayeur = $tiersPayeur;

        return $this;
    }
}
