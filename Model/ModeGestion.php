<?php

namespace Mpp\GeneraliClientBundle\Model;

class ModeGestion
{
    const TYPE_MODE_GESTION_LIBRE = 'LIBRE';
    const TYPE_MODE_GESTION_PILOTEE = 'PILOTEE';
    const TYPE_MODE_GESTION_PROFILEE = 'PROFILEE';
    const TYPE_MODE_GESTION_HORIZON_RETRAITE = 'HORIZON_RETRAITE';
    const TYPE_MODE_GESTION_DEDIEEE = 'DEDIEE';
    const TYPE_MODE_GESTION_CONSEILLEE = 'CONSEILLEE';
    const TYPE_MODE_GESTION_MULTIPROFILEE = 'MULTIPROFILEE';

    /**
     * @var string
     */
    private $idModeGestion;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var string
     */
    private $descriptif;

    /**
     * @var string
     */
    private $typeModeGestion;

    /**
     * @var array<Profil>
     */
    private $profils;
}
