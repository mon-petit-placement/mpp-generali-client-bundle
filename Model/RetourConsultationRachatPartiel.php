<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationRachatPartiel
{
    /**
     * @var Seuils|null
     */
    private $seuils;

    /**
     * @var bool|null
     */
    private $repartitionLibrePossible;

    /**
     * @var bool|null
     */
    private $rp72Possible;

    /**
     * @var InformationSaisieMotifSortie|null
     */
    private $informationSaisieMotifSortie;

    /**
     * @var array<Fiscalite>|null
     */
    private $listeFiscalites;

    /**
     * @var EpargneAtteinte|null
     */
    private $epargneAtteinte;

    /**
     * @var array<IbanVirement>|null
     */
    private $listeIbanVirement;

    /**
     * @var array<MotifDeRachat>|null
     */
    private $motifsDeRachat;
}
