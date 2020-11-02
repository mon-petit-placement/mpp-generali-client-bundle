<?php

namespace Mpp\GeneraliClientBundle\Model;

class InfoVersement
{
    /**
     * @var string
     */
    private $indicateurRepartition;

    /**
     * @var float
     */
    private $montantInvestissementMin;

    /**
     * @var float
     */
    private $montantversementlibre;

    /**
     * @var bool
     */
    private $vlpEncours;

    /**
     * @var bool
     */
    private $vlpSuspendu;

    /**
     * @var string
     */
    private $periodicite;

    /**
     * @var \DateTimeInterface
     */
    private $debutPeriode;

    /**
     * @var \DateTimeInterface
     */
    private $dateProchainPrelevement;

    /**
     * @var \DateTimeInterface
     */
    private $dateProchaineEcheance;

    /**
     * @var array<FondsInvesti>
     */
    private $fondsInvestis;
}
