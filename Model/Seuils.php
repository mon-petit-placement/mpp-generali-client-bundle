<?php

namespace Mpp\GeneraliClientBundle\Model;

class Seuils
{
    /**
     * @var float
     */
    private $montantMinTotalRachat;

    /**
     * @var float
     */
    private $montantMaxTotalRachat;

    /**
     * @var float
     */
    private $montantMinRachatParFonds;

    /**
     * @var float
     */
    private $soldeMinParFondsApresRachat;

    /**
     * @var float
     */
    private $soldeMinTotalApresRachat;

    /**
     * @var float
     */
    private $soldeMinTotalApresRachatIRPP;

    /**
     * @var float
     */
    private $soldeMinTotalApresRachatPFL;

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
