<?php

namespace Mpp\GeneraliClientBundle\Model;

class Referentiel
{
    /**
     * @var array<SituationProfessionnelle>
     */
    private $situationsProfessionnelles;

    /**
     * @var array<SituationFamiliale>
     */
    private $situationsFamiliales;

    /**
     * @var array<TrancheRevenus>
     */
    private $tranchesRevenus;

    /**
     * @var array<TranchePatrimoine>
     */
    private $tranchesPatrimoine;

    /**
     * @var array<OrigineFonds>
     */
    private $originesFonds;

    /**
     * @var array<LienContractant>
     */
    private $liensCoContractant;

    /**
     * @var array<FonctionPPE>
     */
    private $fonctionsPPE;

    /**
     * @var array<LienContractant>
     */
    private $liensContractantPPE;

    /**
     * @var array<ObjectifVersement>
     */
    private $objectifsVersement;

    /**
     * @var array<CodeNaf>
     */
    private $codesNaf;

    /**
     * @var array<Csp>
     */
    private $csps;

    /**
     * @var array<PaysResidenceFiscale>
     */
    private $paysResidenceFiscale;

    /**
     * @var array<RegimeMatrimonial>
     */
    private $regimesMatrimoniaux;

    /**
     * @var array<RepartitionPatrimoine>
     */
    private $repartitionsPatrimoine;

    /**
     * @var array<OriginePatrimoine>
     */
    private $originesPatrimoine;

    /**
     * @var array<CapaciteJuridique>
     */
    private $capacitesJuridiques;

    /**
     * @var array<Nationalite>
     */
    private $nationalites;

    /**
     * @var array<PaysNaissance>
     */
    private $paysNaissance;

    /**
     * @var array<PaysAdresse>
     */
    private $paysAdresses;

    /**
     * @var array<PaysCrsOcde>
     */
    private $paysCrsOcde;

    /**
     * @var array<Civilite>
     */
    private $civilites;

    /**
     * @var array<PieceIdentite>
     */
    private $piecesIdentite;

    /**
     * @var array<PieceIdentite>
     */
    private $secondesPiecesIdentite;
}
