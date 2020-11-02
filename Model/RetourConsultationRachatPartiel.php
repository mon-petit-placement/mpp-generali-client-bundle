<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourConsultationRachatPartiel
{
    /**
     * @var Seuils
     */
    private $seuils;

    /**
     * @var bool
     */
    private $repartitionLibrePossible;

    /**
     * @var bool
     */
    private $rp72Possible;

    /**
     * @var InformationSaisieMotifSortie
     */
    private $informationSaisieMotifSortie;

    /**
     * @var array<Fiscalite>
     */
    private $listeFiscalites;

    /**
     * @var EpargneAtteinte
     */
    private $epargneAtteinte;

    /**
     * @var array<IbanVirement>
     */
    private $listeIbanVirement;

    /**
     * @var array<MotifDeRachat>
     */
    private $motifsDeRachat;
}
