<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationArbitrage
{
    /**
     * @var array<FondsInvestissable>|null
     */
    private $fondsInvestissables;

    /**
     * @var array<EpargneAtteinte>|null
     */
    private $epargneAtteinte;

    /**
     * @var ReglesArbitrage|null
     */
    private $reglesArbitrage;

    /**
     * @var FraisArbitrage|null
     */
    private $fraisArbitrage;
}
