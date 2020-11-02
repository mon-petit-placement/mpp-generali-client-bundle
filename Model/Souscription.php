<?php

namespace Mpp\GeneraliClientBundle\Model;

class Souscription
{
    /**
     * @var string
     */
    private $codeSouscription;

    /**
     * @var string
     */
    private $referenceCG;

    /**
     * @var string
     */
    private $fiscalite;

    /**
     * @var TypeDuree
     */
    private $duree;

    /**
     * @var ModeGestion
     */
    private $modeGestion;

    /**
     * @var ReferenceExterne
     */
    private $referencesExternes;

    /**
     * @var Souscripteur
     */
    private $souscripteur;

    /**
     * @var DossierClient
     */
    private $dossierClient;

    /**
     * @var VersementInitial
     */
    private $versementInitial;

    /**
     * @var VersementsLibresProgrammes
     */
    private $versementsLibresProgrammes;

    /**
     * @var Reglement
     */
    private $reglement;

    /**
     * @var ClauseBeneficiaireDeces
     */
    private $clauseBeneficiaireDeces;

    /**
     * @var string
     */
    private $codeGarantiePrevoyance;

    /**
     * @var string
     */
    private $commentaire;

    /**
     * @var bool
     */
    private $dematerialisationCourriers;

    /**
     * @var \DateTimeInterface
     */
    private $dateSignature;
}
