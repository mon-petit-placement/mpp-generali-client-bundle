<?php

namespace Mpp\GeneraliClientBundle\Model;

class InfoVersement
{
    /**
     * @var string|null
     */
    private $indicateurRepartition;

    /**
     * @var float|null
     */
    private $montantInvestissementMin;

    /**
     * @var float|null
     */
    private $montantversementlibre;

    /**
     * @var bool|null
     */
    private $vlpEncours;

    /**
     * @var bool|null
     */
    private $vlpSuspendu;

    /**
     * @var string|null
     */
    private $periodicite;

    /**
     * @var \DateTimeInterface|null
     */
    private $debutPeriode;

    /**
     * @var \DateTimeInterface|null
     */
    private $dateProchainPrelevement;

    /**
     * @var \DateTimeInterface|null
     */
    private $dateProchaineEcheance;

    /**
     * @var array<FondsInvesti>|null
     */
    private $fondsInvestis;
}
