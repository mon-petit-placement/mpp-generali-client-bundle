<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourSimulationRachatPartiel
{
    /**
     * @var string
     */
    private $typeSimulation;

    /**
     * @var bool
     */
    private $montantTronque;

    /**
     * @var float
     */
    private $montantNet;

    /**
     * @var float
     */
    private $montantBrut;

    /**
     * @var float
     */
    private $montantAbattement;

    /**
     * @var float
     */
    private $montantPlusValueImposable;

    /**
     * @var float
     */
    private $montantRetenuPfl;

    /**
     * @var float
     */
    private $montantRetenuPrelevementsSociaux;

    /**
     * @var float
     */
    private $montanRemboursementPrelevementsSociaux;

    /**
     * @var float
     */
    private $tauxPlf;

    /**
     * @var float
     */
    private $tauxPfo;

    /**
     * @var float
     */
    private $montantPlusValueImposableC3;

    /**
     * @var float
     */
    private $montantPlusValueExonere;

    /**
     * @var float
     */
    private $montantRetenuPfo;

    /**
     * @var int
     */
    private $dureeFiscalite;

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
