<?php

namespace Mpp\GeneraliClientBundle\Model;

class ParametrageVersementLibreProgramme
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $montantMinSupport;

    /**
     * @var array<Periodicite>|null
     */
    private $periodicite;

    /**
     * @var array<int>|null
     */
    private $jourPrelevement;
}
