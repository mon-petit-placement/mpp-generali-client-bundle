<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourSimulationRachatPartiel
{
    /**
     * @var string|null
     */
    private $typeSimulation;

    /**
     * @var bool|null
     */
    private $montantTronque;

    /**
     * @var float|null
     */
    private $montantNet;

    /**
     * @var float|null
     */
    private $montantBrut;

    /**
     * @var float|null
     */
    private $montantAbattement;

    /**
     * @var float|null
     */
    private $montantPlusValueImposable;

    /**
     * @var float|null
     */
    private $montantRetenuPfl;

    /**
     * @var float|null
     */
    private $montantRetenuPrelevementsSociaux;

    /**
     * @var float|null
     */
    private $montanRemboursementPrelevementsSociaux;

    /**
     * @var float|null
     */
    private $tauxPlf;

    /**
     * @var float|null
     */
    private $tauxPfo;

    /**
     * @var float|null
     */
    private $montantPlusValueImposableC3;

    /**
     * @var float|null
     */
    private $montantPlusValueExonere;

    /**
     * @var float|null
     */
    private $montantRetenuPfo;

    /**
     * @var int|null
     */
    private $dureeFiscalite;

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
