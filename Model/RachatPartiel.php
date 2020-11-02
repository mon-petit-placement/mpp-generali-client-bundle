<?php

namespace Mpp\GeneraliClientBundle\Model;

class RachatPartiel
{
    /**
     * @var float
     */
    private $montant;

    /**
     * @var bool
     */
    private $rp72;

    /**
     * @var int
     */
    private $numOperationExterne;

    /**
     * @var string
     */
    private $codeOptionFiscale;

    /**
     * @var string
     */
    private $codeMotif;

    /**
     * @var string
     */
    private $libMotif;

    /**
     * @var bool
     */
    private $repartitionProportionnelle;

    /**
     * @var ModeReglement
     */
    private $modeReglement;
}
