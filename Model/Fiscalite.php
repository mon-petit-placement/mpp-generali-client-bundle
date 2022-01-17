<?php

namespace Mpp\GeneraliClientBundle\Model;

class Fiscalite
{
    public const FISCALITE_ASSURANCE_VIE = 'ASSURANCE_VIE';
    public const FISCALITE_PERP = 'PERP';
    public const FISCALITE_PER = 'PRE';
    public const FISCALITE_PEP = 'PEP';
    public const FISCALITE_PEA = 'PEA';
    public const FISCALITE_LOI_MADELIN = 'LOI_MADELIN';
    public const FISCALITE_CAPITALISATION = 'CAPITALISATION';
    public const FISCALITE_DSK = 'DSK';
    public const FISCALITE_NOUMEA = 'NOUMEA';
    public const FISCALITE_NSK = 'NSK';
    public const FISCALITE_FOURGOUS = 'FOURGOUS';

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
