<?php

namespace Mpp\GeneraliClientBundle\Model;

class ParametrageVersementLibreProgramme
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $montantMinSupport;

    /**
     * @var array<Periodicite>
     */
    private $periodicite;

    /**
     * @var array<int>
     */
    private $jourPrelevement;
}
