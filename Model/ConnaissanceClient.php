<?php

namespace Mpp\GeneraliClientBundle\Model;

class ConnaissanceClient
{
    /**
     * @var Souscripteur
     */
    private $contractant;

    /**
     * @var RevenusAnnuelsNetFoyer
     */
    private $revenusAnnuelsNetFoyer;

    /**
     * @var EstimationPatrimoineFoyer
     */
    private $estimationPatrimoineFoyer;

    /**
     * @var array<ObjectifVersement>
     */
    private $objectifsVersement;
}
