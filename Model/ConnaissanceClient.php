<?php

namespace Mpp\GeneraliClientBundle\Model;

class ConnaissanceClient
{
    /**
     * @var Souscripteur|null
     */
    private $contractant;

    /**
     * @var RevenusAnnuelsNetFoyer|null
     */
    private $revenusAnnuelsNetFoyer;

    /**
     * @var EstimationPatrimoineFoyer|null
     */
    private $estimationPatrimoineFoyer;

    /**
     * @var array<ObjectifVersement>|null
     */
    private $objectifsVersement;
}
