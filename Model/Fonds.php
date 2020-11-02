<?php

namespace Mpp\GeneraliClientBundle\Model;

class Fonds
{
    /**
     * @var string|null
     */
    private $codeFonds;

    /**
     * @var string|null
     */
    private $codeISIN;

    /**
     * @var string|null
     */
    private $typeFonds;

    /**
     * @var string|null
     */
    private $nomFonds;

    /**
     * @var \DateTimeInterface|null
     */
    private $dateValeur;

    /**
     * @var float|null
     */
    private $valeurPart;

    /**
     * @var bool|null
     */
    private $bloque;

    /**
     * @var string|null
     */
    private $categorie;

    /**
     * @var string|null
     */
    private $sousCategorie;

    /**
     * @var bool|null
     */
    private $avenant;

    /**
     * @var bool|null
     */
    private $questionnaire;

    /**
     * @var int|null
     */
    private $degreRisqueDICI;

    /**
     * @var bool|null
     */
    private $capitalisation;

    /**
     * @var bool|null
     */
    private $distribution;

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $codeElementFinancier;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var bool|null
     */
    private $existenceQuestionnaire;

    /**
     * @var string|null
     */
    private $codeIcone;

    /**
     * @var int|null
     */
    private $risque;

    /**
     * @var string|null
     */
    private $typeAvenant;

    /**
     * @var string|null
     */
    private $typeMarcheAvenant;

    /**
     * @var string|null
     */
    private $natureEtablissementAvenant;

    /**
     * @var string|null
     */
    private $texteBrutAvenant;

    /**
     * @var string|null
     */
    private $texteHTLMAvenant;

    /**
     * @var float|null
     */
    private $performance3ans;

    /**
     * @var bool|null
     */
    private $presenceAvenant;

    /**
     * @var bool|null
     */
    private $presenceQuestionnaire;

    /**
     * @var int|null
     */
    private $degreRisqueSdh;

    /**
     * @var array|null
     */
    private $restrictions;

    /**
     * @var float|null
     */
    private $montantBrut;
}
