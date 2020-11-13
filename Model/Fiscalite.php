<?php

namespace Mpp\GeneraliClientBundle\Model;

class Fiscalite
{
    const FISCALITE_ASSURANCE_VIE = 'ASSURANCE_VIE';
    const FISCALITE_PERP = 'PERP';
    const FISCALITE_PER = 'PRE';
    const FISCALITE_PEP = 'PEP';
    const FISCALITE_PEA = 'PEA';
    const FISCALITE_LOI_MADELIN = 'LOI_MADELIN';
    const FISCALITE_CAPITALISATION = 'CAPITALISATION';
    const FISCALITE_DSK = 'DSK';
    const FISCALITE_NOUMEA = 'NOUMEA';
    const FISCALITE_NSK = 'NSK';
    const FISCALITE_FOURGOUS = 'FOURGOUS';

    /**
     * @var string|null
     */
    private $codeFiscalite;

    /**
     * @var string|null
     */
    private $texte;

    /**
     * Get the value of codeFiscalite.
     *
     * @return string|null
     */
    public function getCodeFiscalite(): ?string
    {
        return $this->codeFiscalite;
    }

    /**
     * Set the value of codeFiscalite.
     *
     * @param string|null $codeFiscalite
     *
     * @return self
     */
    public function setCodeFiscalite(?string $codeFiscalite): self
    {
        $this->codeFiscalite = $codeFiscalite;

        return $this;
    }

    /**
     * Get the value of texte.
     *
     * @return string|null
     */
    public function getTexte(): ?string
    {
        return $this->texte;
    }

    /**
     * Set the value of texte.
     *
     * @param string|null $texte
     *
     * @return self
     */
    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }
}
