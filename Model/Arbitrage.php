<?php

namespace Mpp\GeneraliClientBundle\Model;

class Arbitrage
{
    /**
     * @var int|null
     */
    private $numOperationExterne;

    /**
     * @var bool|null
     */
    private $mandatTransmissionOrdre;

    /**
     * @var bool|null
     */
    private $mandatArbitrage;

    /**
     * @var array<FondsInvesti>|null
     */
    private $fondsInvestis;

    /**
     * @var array<FondsInvesti>|null
     */
    private $fondsDesinvestis;
}
