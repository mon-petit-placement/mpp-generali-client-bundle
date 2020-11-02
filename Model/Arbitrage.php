<?php

namespace Mpp\GeneraliClientBundle\Model;

class Arbitrage
{
    /**
     * @var int
     */
    private $numOperationExterne;

    /**
     * @var bool
     */
    private $mandatTransmissionOrdre;

    /**
     * @var bool
     */
    private $mandatArbitrage;

    /**
     * @var array<FondsInvesti>
     */
    private $fondsInvestis;

    /**
     * @var array<FondsInvesti>
     */
    private $fondsDesinvestis;
}
