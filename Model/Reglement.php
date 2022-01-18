<?php

namespace Mpp\GeneraliClientBundle\Model;

class Reglement
{
    public const REGLEMENT_TYPE_CHEQUE = 'CHEQUE';
    public const REGLEMENT_TYPE_PRELEVEMENT = 'PRELEVEMENT';
    public const REGLEMENT_TYPE_VIREMENT = 'VIREMENT';

    /**
     * @var string|null
     */
    private $typeReglementVersementPonctuel;

    /**
     * @var IbanVirement|null
     */
    private $ibanContractant;

    /**
     * @var array<OrigineFonds>|null
     */
    private $originesFonds;

    /**
     * Get the value of typeReglementVersementPonctuel.
     *
     * @return string|null
     */
    public function getTypeReglementVersementPonctuel(): ?string
    {
        return $this->typeReglementVersementPonctuel;
    }

    /**
     * Set the value of typeReglementVersementPonctuel.
     *
     * @param string|null $typeReglementVersementPonctuel
     *
     * @return self
     */
    public function setTypeReglementVersementPonctuel(?string $typeReglementVersementPonctuel): self
    {
        $this->typeReglementVersementPonctuel = $typeReglementVersementPonctuel;

        return $this;
    }

    /**
     * Get the value of ibanContractant.
     *
     * @return IbanVirement|null
     */
    public function getIbanContractant(): ?IbanVirement
    {
        return $this->ibanContractant;
    }

    /**
     * Set the value of ibanContractant.
     *
     * @param IbanVirement|null $ibanContractant
     *
     * @return self
     */
    public function setIbanContractant(?IbanVirement $ibanContractant): self
    {
        $this->ibanContractant = $ibanContractant;

        return $this;
    }

    /**
     * Get the value of originesFonds.
     *
     * @return array<OrigineFonds>|null
     */
    public function getOriginesFonds(): ?array
    {
        return $this->originesFonds;
    }

    /**
     * Set the value of originesFonds.
     *
     * @param array<OrigineFonds>|null $originesFonds
     *
     * @return self
     */
    public function setOriginesFonds(?array $originesFonds): self
    {
        $this->originesFonds = $originesFonds;

        return $this;
    }
}
