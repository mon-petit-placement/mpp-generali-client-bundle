<?php

namespace Mpp\GeneraliClientBundle\Model;

class InfoVLP
{
    /**
     * @var \DateTimeInterface|null
     */
    private $dateProchainPrelevement;

    /**
     * @var \DateTimeInterface|null
     */
    private $debutPeriode;

    /**
     * @var bool|null
     */
    private $suspendu;

    /**
     * @var string|null
     */
    private $periodicite;

    /**
     * @var float|null
     */
    private $montantPreleve;

    /**
     * @var array<Fonds>|null
     */
    private $fonds;
}
