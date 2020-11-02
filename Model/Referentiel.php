<?php

namespace Mpp\GeneraliClientBundle\Model;

class Referentiel
{
    /**
     * @var array<SituationProfessionnelle>|null
     */
    private $situationsProfessionnelles;

    /**
     * @var array<SituationFamiliale>|null
     */
    private $situationsFamiliales;

    /**
     * @var array<TrancheRevenus>|null
     */
    private $tranchesRevenus;

    /**
     * @var array<TranchePatrimoine>|null
     */
    private $tranchesPatrimoine;

    /**
     * @var array<OrigineFonds>|null
     */
    private $originesFonds;

    /**
     * @var array<LienContractant>|null
     */
    private $liensCoContractant;

    /**
     * @var array<FonctionPPE>|null
     */
    private $fonctionsPPE;

    /**
     * @var array<LienContractant>|null
     */
    private $liensContractantPPE;

    /**
     * @var array<ObjectifVersement>|null
     */
    private $objectifsVersement;

    /**
     * @var array<CodeNaf>|null
     */
    private $codesNaf;

    /**
     * @var array<Csp>|null
     */
    private $csps;

    /**
     * @var array<PaysResidenceFiscale>|null
     */
    private $paysResidenceFiscale;

    /**
     * @var array<RegimeMatrimonial>|null
     */
    private $regimesMatrimoniaux;

    /**
     * @var array<RepartitionPatrimoine>|null
     */
    private $repartitionsPatrimoine;

    /**
     * @var array<OriginePatrimoine>|null
     */
    private $originesPatrimoine;

    /**
     * @var array<CapaciteJuridique>|null
     */
    private $capacitesJuridiques;

    /**
     * @var array<Nationalite>|null
     */
    private $nationalites;

    /**
     * @var array<PaysNaissance>|null
     */
    private $paysNaissance;

    /**
     * @var array<PaysAdresse>|null
     */
    private $paysAdresses;

    /**
     * @var array<PaysCrsOcde>|null
     */
    private $paysCrsOcde;

    /**
     * @var array<Civilite>|null
     */
    private $civilites;

    /**
     * @var array<PieceIdentite>|null
     */
    private $piecesIdentite;

    /**
     * @var array<PieceIdentite>|null
     */
    private $secondesPiecesIdentite;
}
