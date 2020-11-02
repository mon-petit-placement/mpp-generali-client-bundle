<?php

namespace Mpp\GeneraliClientBundle\Model;

class Seuils
{
    /**
     * @var float|null
     */
    private $montantMinTotalRachat;

    /**
     * @var float|null
     */
    private $montantMaxTotalRachat;

    /**
     * @var float|null
     */
    private $montantMinRachatParFonds;

    /**
     * @var float|null
     */
    private $soldeMinParFondsApresRachat;

    /**
     * @var float|null
     */
    private $soldeMinTotalApresRachat;

    /**
     * @var float|null
     */
    private $soldeMinTotalApresRachatIRPP;

    /**
     * @var float|null
     */
    private $soldeMinTotalApresRachatPFL;

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
