<?php

namespace Mpp\GeneraliClientBundle\Model;

class Fonds
{
    /**
     * @var string
     */
    private $codeFonds;

    /**
     * @var string
     */
    private $codeISIN;

    /**
     * @var string
     */
    private $typeFonds;

    /**
     * @var string
     */
    private $nomFonds;

    /**
     * @var \DateTimeInterface
     */
    private $dateValeur;

    /**
     * @var float
     */
    private $valeurPart;

    /**
     * @var bool
     */
    private $bloque;

    /**
     * @var string
     */
    private $categorie;

    /**
     * @var string
     */
    private $sousCategorie;

    /**
     * @var bool
     */
    private $avenant;

    /**
     * @var bool
     */
    private $questionnaire;

    /**
     * @var int
     */
    private $degreRisqueDICI;

    /**
     * @var bool
     */
    private $capitalisation;

    /**
     * @var bool
     */
    private $distribution;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $codeElementFinancier;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var bool
     */
    private $existenceQuestionnaire;

    /**
     * @var string
     */
    private $codeIcone;

    /**
     * @var int
     */
    private $risque;

    /**
     * @var string
     */
    private $typeAvenant;

    /**
     * @var string
     */
    private $typeMarcheAvenant;

    /**
     * @var string
     */
    private $natureEtablissementAvenant;

    /**
     * @var string
     */
    private $texteBrutAvenant;

    /**
     * @var string
     */
    private $texteHTLMAvenant;

    /**
     * @var float
     */
    private $performance3ans;

    /**
     * @var bool
     */
    private $presenceAvenant;

    /**
     * @var bool
     */
    private $presenceQuestionnaire;

    /**
     * @var int
     */
    private $degreRisqueSdh;

    /**
     * @var array
     */
    private $restrictions;

    /**
     * @var float
     */
    private $montantBrut;
}
