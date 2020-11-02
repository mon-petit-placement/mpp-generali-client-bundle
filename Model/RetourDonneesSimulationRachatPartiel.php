<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourDonneesSimulationRachatPartiel
{
    /**
     * @var array<TauxPaysNonResident>
     */
    private $tauxPaysNonResidents;

    /**
     * @var int
     */
    private $dureeFiscalite;

    /**
     * @var float
     */
    private $tauxPfl;

    /**
     * @var float
     */
    private $tauxPfo;

    /**
     * @var bool
     */
    private $presenceC1;

    /**
     * @var bool
     */
    private $presenceC2;

    /**
     * @var bool
     */
    private $presenceC3;

    /**
     * @var bool
     */
    private $exonerationC3;
}
