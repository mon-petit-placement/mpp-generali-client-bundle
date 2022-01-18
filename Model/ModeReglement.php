<?php

namespace Mpp\GeneraliClientBundle\Model;

class ModeReglement
{
    public const TYPE_PAIEMENT_CHEQUE = 'CHEQUE';
    public const TYPE_PAIEMENT_VIREMENT = 'VIREMENT';

    /**
     * @var string|null
     */
    private $typePaiement;

    /**
     * @var CompteBancaire|null
     */
    private $compteBancaire;

    /**
     * Get the value of typePaiement.
     *
     * @return string|null
     */
    public function getTypePaiement(): ?string
    {
        return $this->typePaiement;
    }

    /**
     * Set the value of typePaiement.
     *
     * @param string|null $typePaiement
     *
     * @return self
     */
    public function setTypePaiement(?string $typePaiement): self
    {
        $this->typePaiement = $typePaiement;

        return $this;
    }

    /**
     * Get the value of compteBancaire.
     *
     * @return CompteBancaire|null
     */
    public function getCompteBancaire(): ?CompteBancaire
    {
        return $this->compteBancaire;
    }

    /**
     * Set the value of compteBancaire.
     *
     * @param CompteBancaire|null $compteBancaire
     *
     * @return self
     */
    public function setCompteBancaire(?CompteBancaire $compteBancaire): self
    {
        $this->compteBancaire = $compteBancaire;

        return $this;
    }
}
