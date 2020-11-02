<?php

namespace Mpp\GeneraliClientBundle\Model;

class RachatPartiel
{
    /**
     * @var float|null
     */
    private $montant;

    /**
     * @var bool|null
     */
    private $rp72;

    /**
     * @var int|null
     */
    private $numOperationExterne;

    /**
     * @var string|null
     */
    private $codeOptionFiscale;

    /**
     * @var string|null
     */
    private $codeMotif;

    /**
     * @var string|null
     */
    private $libMotif;

    /**
     * @var bool|null
     */
    private $repartitionProportionnelle;

    /**
     * @var ModeReglement|null
     */
    private $modeReglement;
}
