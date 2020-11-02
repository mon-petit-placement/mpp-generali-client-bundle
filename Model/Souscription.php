<?php

namespace Mpp\GeneraliClientBundle\Model;

class Souscription
{
    /**
     * @var string|null
     */
    private $codeSouscription;

    /**
     * @var string|null
     */
    private $referenceCG;

    /**
     * @var string|null
     */
    private $fiscalite;

    /**
     * @var TypeDuree|null
     */
    private $duree;

    /**
     * @var ModeGestion|null
     */
    private $modeGestion;

    /**
     * @var ReferenceExterne|null
     */
    private $referencesExternes;

    /**
     * @var Souscripteur|null
     */
    private $souscripteur;

    /**
     * @var DossierClient|null
     */
    private $dossierClient;

    /**
     * @var VersementInitial|null
     */
    private $versementInitial;

    /**
     * @var VersementsLibresProgrammes|null
     */
    private $versementsLibresProgrammes;

    /**
     * @var Reglement|null
     */
    private $reglement;

    /**
     * @var ClauseBeneficiaireDeces|null
     */
    private $clauseBeneficiaireDeces;

    /**
     * @var string|null
     */
    private $codeGarantiePrevoyance;

    /**
     * @var string|null
     */
    private $commentaire;

    /**
     * @var bool|null
     */
    private $dematerialisationCourriers;

    /**
     * @var \DateTimeInterface|null
     */
    private $dateSignature;
}
