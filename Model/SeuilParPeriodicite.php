<?php

namespace Mpp\GeneraliClientBundle\Model;

class SeuilParPeriodicite
{
    const CODE_PERIODICITE_HEBDOMADAIRE = 'HEBDOMADAIRE';
    const CODE_PERIODICITE_MENSUELLE = 'MENSUELLE';
    const CODE_PERIODICITE_TRIMESTRIELLE = 'TRIMESTRIELLE';
    const CODE_PERIODICITE_SEMESTRIELLE = 'SEMESTRIELLE';
    const CODE_PERIODICITE_ANNUELLE = 'ANNUELLE';

    /**
     * @var string
     */
    private $codePeriodicite;

    /**
     * @var float
     */
    private $montantMin;
}
