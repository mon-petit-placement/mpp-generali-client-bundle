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
     * @var string|null
     */
    private $idModeGestion;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var string|null
     */
    private $descriptif;

    /**
     * @var string|null
     */
    private $typeModeGestion;

    /**
     * @var array<Profil>|null
     */
    private $profils;
}
