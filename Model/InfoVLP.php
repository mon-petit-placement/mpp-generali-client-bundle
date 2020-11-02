<?php

namespace Mpp\GeneraliClientBundle\Model;

class InfoVLP
{
    /**
     * @var \DateTimeInterface
     */
    private $dateProchainPrelevement;

    /**
     * @var \DateTimeInterface
     */
    private $debutPeriode;

    /**
     * @var bool
     */
    private $suspendu;

    /**
     * @var string
     */
    private $periodicite;

    /**
     * @var float
     */
    private $montantPreleve;

    /**
     * @var array<Fonds>
     */
    private $fonds;
}
