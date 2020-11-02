<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourDonneesSimulationRachatPartiel
{
    /**
     * @var array<TauxPaysNonResident>|null
     */
    private $tauxPaysNonResidents;

    /**
     * @var int|null
     */
    private $dureeFiscalite;

    /**
     * @var float|null
     */
    private $tauxPfl;

    /**
     * @var float|null
     */
    private $tauxPfo;

    /**
     * @var bool|null
     */
    private $presenceC1;

    /**
     * @var bool|null
     */
    private $presenceC2;

    /**
     * @var bool|null
     */
    private $presenceC3;

    /**
     * @var bool|null
     */
    private $exonerationC3;
}
