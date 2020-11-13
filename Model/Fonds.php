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
     * @var string|null
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

    /**
     * Get the value of codeFonds.
     *
     * @return string|null
     */
    public function getCodeFonds(): ?string
    {
        return $this->codeFonds;
    }

    /**
     * Set the value of codeFonds.
     *
     * @param string|null $codeFonds
     *
     * @return self
     */
    public function setCodeFonds(?string $codeFonds): self
    {
        $this->codeFonds = $codeFonds;

        return $this;
    }

    /**
     * Get the value of codeISIN.
     *
     * @return string|null
     */
    public function getCodeISIN(): ?string
    {
        return $this->codeISIN;
    }

    /**
     * Set the value of codeISIN.
     *
     * @param string|null $codeISIN
     *
     * @return self
     */
    public function setCodeISIN(?string $codeISIN): self
    {
        $this->codeISIN = $codeISIN;

        return $this;
    }

    /**
     * Get the value of typeFonds.
     *
     * @return string|null
     */
    public function getTypeFonds(): ?string
    {
        return $this->typeFonds;
    }

    /**
     * Set the value of typeFonds.
     *
     * @param string|null $typeFonds
     *
     * @return self
     */
    public function setTypeFonds(?string $typeFonds): self
    {
        $this->typeFonds = $typeFonds;

        return $this;
    }

    /**
     * Get the value of nomFonds.
     *
     * @return string|null
     */
    public function getNomFonds(): ?string
    {
        return $this->nomFonds;
    }

    /**
     * Set the value of nomFonds.
     *
     * @param string|null $nomFonds
     *
     * @return self
     */
    public function setNomFonds(?string $nomFonds): self
    {
        $this->nomFonds = $nomFonds;

        return $this;
    }

    /**
     * Get the value of dateValeur.
     *
     * @return string|null
     */
    public function getDateValeur(): ?string
    {
        return $this->dateValeur;
    }

    /**
     * Set the value of dateValeur.
     *
     * @param string|null $dateValeur
     *
     * @return self
     */
    public function setDateValeur(?string $dateValeur): self
    {
        $this->dateValeur = $dateValeur;

        return $this;
    }

    /**
     * Get the value of valeurPart.
     *
     * @return float|null
     */
    public function getValeurPart(): ?float
    {
        return $this->valeurPart;
    }

    /**
     * Set the value of valeurPart.
     *
     * @param float|null $valeurPart
     *
     * @return self
     */
    public function setValeurPart(?float $valeurPart): self
    {
        $this->valeurPart = $valeurPart;

        return $this;
    }

    /**
     * Get the value of bloque.
     *
     * @return bool|null
     */
    public function getBloque(): ?bool
    {
        return $this->bloque;
    }

    /**
     * Set the value of bloque.
     *
     * @param bool|null $bloque
     *
     * @return self
     */
    public function setBloque(?bool $bloque): self
    {
        $this->bloque = $bloque;

        return $this;
    }

    /**
     * Get the value of categorie.
     *
     * @return string|null
     */
    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie.
     *
     * @param string|null $categorie
     *
     * @return self
     */
    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of sousCategorie.
     *
     * @return string|null
     */
    public function getSousCategorie(): ?string
    {
        return $this->sousCategorie;
    }

    /**
     * Set the value of sousCategorie.
     *
     * @param string|null $sousCategorie
     *
     * @return self
     */
    public function setSousCategorie(?string $sousCategorie): self
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    /**
     * Get the value of avenant.
     *
     * @return bool|null
     */
    public function getAvenant(): ?bool
    {
        return $this->avenant;
    }

    /**
     * Set the value of avenant.
     *
     * @param bool|null $avenant
     *
     * @return self
     */
    public function setAvenant(?bool $avenant): self
    {
        $this->avenant = $avenant;

        return $this;
    }

    /**
     * Get the value of questionnaire.
     *
     * @return bool|null
     */
    public function getQuestionnaire(): ?bool
    {
        return $this->questionnaire;
    }

    /**
     * Set the value of questionnaire.
     *
     * @param bool|null $questionnaire
     *
     * @return self
     */
    public function setQuestionnaire(?bool $questionnaire): self
    {
        $this->questionnaire = $questionnaire;

        return $this;
    }

    /**
     * Get the value of degreRisqueDICI.
     *
     * @return int|null
     */
    public function getDegreRisqueDICI(): ?int
    {
        return $this->degreRisqueDICI;
    }

    /**
     * Set the value of degreRisqueDICI.
     *
     * @param int|null $degreRisqueDICI
     *
     * @return self
     */
    public function setDegreRisqueDICI(?int $degreRisqueDICI): self
    {
        $this->degreRisqueDICI = $degreRisqueDICI;

        return $this;
    }

    /**
     * Get the value of capitalisation.
     *
     * @return bool|null
     */
    public function getCapitalisation(): ?bool
    {
        return $this->capitalisation;
    }

    /**
     * Set the value of capitalisation.
     *
     * @param bool|null $capitalisation
     *
     * @return self
     */
    public function setCapitalisation(?bool $capitalisation): self
    {
        $this->capitalisation = $capitalisation;

        return $this;
    }

    /**
     * Get the value of distribution.
     *
     * @return bool|null
     */
    public function getDistribution(): ?bool
    {
        return $this->distribution;
    }

    /**
     * Set the value of distribution.
     *
     * @param bool|null $distribution
     *
     * @return self
     */
    public function setDistribution(?bool $distribution): self
    {
        $this->distribution = $distribution;

        return $this;
    }

    /**
     * Get the value of code.
     *
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set the value of code.
     *
     * @param string|null $code
     *
     * @return self
     */
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of codeElementFinancier.
     *
     * @return string|null
     */
    public function getCodeElementFinancier(): ?string
    {
        return $this->codeElementFinancier;
    }

    /**
     * Set the value of codeElementFinancier.
     *
     * @param string|null $codeElementFinancier
     *
     * @return self
     */
    public function setCodeElementFinancier(?string $codeElementFinancier): self
    {
        $this->codeElementFinancier = $codeElementFinancier;

        return $this;
    }

    /**
     * Get the value of libelle.
     *
     * @return string|null
     */
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle.
     *
     * @param string|null $libelle
     *
     * @return self
     */
    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of existenceQuestionnaire.
     *
     * @return bool|null
     */
    public function getExistenceQuestionnaire(): ?bool
    {
        return $this->existenceQuestionnaire;
    }

    /**
     * Set the value of existenceQuestionnaire.
     *
     * @param bool|null $existenceQuestionnaire
     *
     * @return self
     */
    public function setExistenceQuestionnaire(?bool $existenceQuestionnaire): self
    {
        $this->existenceQuestionnaire = $existenceQuestionnaire;

        return $this;
    }

    /**
     * Get the value of codeIcone.
     *
     * @return string|null
     */
    public function getCodeIcone(): ?string
    {
        return $this->codeIcone;
    }

    /**
     * Set the value of codeIcone.
     *
     * @param string|null $codeIcone
     *
     * @return self
     */
    public function setCodeIcone(?string $codeIcone): self
    {
        $this->codeIcone = $codeIcone;

        return $this;
    }

    /**
     * Get the value of risque.
     *
     * @return int|null
     */
    public function getRisque(): ?int
    {
        return $this->risque;
    }

    /**
     * Set the value of risque.
     *
     * @param int|null $risque
     *
     * @return self
     */
    public function setRisque(?int $risque): self
    {
        $this->risque = $risque;

        return $this;
    }

    /**
     * Get the value of typeAvenant.
     *
     * @return string|null
     */
    public function getTypeAvenant(): ?string
    {
        return $this->typeAvenant;
    }

    /**
     * Set the value of typeAvenant.
     *
     * @param string|null $typeAvenant
     *
     * @return self
     */
    public function setTypeAvenant(?string $typeAvenant): self
    {
        $this->typeAvenant = $typeAvenant;

        return $this;
    }

    /**
     * Get the value of typeMarcheAvenant.
     *
     * @return string|null
     */
    public function getTypeMarcheAvenant(): ?string
    {
        return $this->typeMarcheAvenant;
    }

    /**
     * Set the value of typeMarcheAvenant.
     *
     * @param string|null $typeMarcheAvenant
     *
     * @return self
     */
    public function setTypeMarcheAvenant(?string $typeMarcheAvenant): self
    {
        $this->typeMarcheAvenant = $typeMarcheAvenant;

        return $this;
    }

    /**
     * Get the value of natureEtablissementAvenant.
     *
     * @return string|null
     */
    public function getNatureEtablissementAvenant(): ?string
    {
        return $this->natureEtablissementAvenant;
    }

    /**
     * Set the value of natureEtablissementAvenant.
     *
     * @param string|null $natureEtablissementAvenant
     *
     * @return self
     */
    public function setNatureEtablissementAvenant(?string $natureEtablissementAvenant): self
    {
        $this->natureEtablissementAvenant = $natureEtablissementAvenant;

        return $this;
    }

    /**
     * Get the value of texteBrutAvenant.
     *
     * @return string|null
     */
    public function getTexteBrutAvenant(): ?string
    {
        return $this->texteBrutAvenant;
    }

    /**
     * Set the value of texteBrutAvenant.
     *
     * @param string|null $texteBrutAvenant
     *
     * @return self
     */
    public function setTexteBrutAvenant(?string $texteBrutAvenant): self
    {
        $this->texteBrutAvenant = $texteBrutAvenant;

        return $this;
    }

    /**
     * Get the value of texteHTLMAvenant.
     *
     * @return string|null
     */
    public function getTexteHTLMAvenant(): ?string
    {
        return $this->texteHTLMAvenant;
    }

    /**
     * Set the value of texteHTLMAvenant.
     *
     * @param string|null $texteHTLMAvenant
     *
     * @return self
     */
    public function setTexteHTLMAvenant(?string $texteHTLMAvenant): self
    {
        $this->texteHTLMAvenant = $texteHTLMAvenant;

        return $this;
    }

    /**
     * Get the value of performance3ans.
     *
     * @return float|null
     */
    public function getPerformance3ans(): ?float
    {
        return $this->performance3ans;
    }

    /**
     * Set the value of performance3ans.
     *
     * @param float|null $performance3ans
     *
     * @return self
     */
    public function setPerformance3ans(?float $performance3ans): self
    {
        $this->performance3ans = $performance3ans;

        return $this;
    }

    /**
     * Get the value of presenceAvenant.
     *
     * @return bool|null
     */
    public function getPresenceAvenant(): ?bool
    {
        return $this->presenceAvenant;
    }

    /**
     * Set the value of presenceAvenant.
     *
     * @param bool|null $presenceAvenant
     *
     * @return self
     */
    public function setPresenceAvenant(?bool $presenceAvenant): self
    {
        $this->presenceAvenant = $presenceAvenant;

        return $this;
    }

    /**
     * Get the value of presenceQuestionnaire.
     *
     * @return bool|null
     */
    public function getPresenceQuestionnaire(): ?bool
    {
        return $this->presenceQuestionnaire;
    }

    /**
     * Set the value of presenceQuestionnaire.
     *
     * @param bool|null $presenceQuestionnaire
     *
     * @return self
     */
    public function setPresenceQuestionnaire(?bool $presenceQuestionnaire): self
    {
        $this->presenceQuestionnaire = $presenceQuestionnaire;

        return $this;
    }

    /**
     * Get the value of degreRisqueSdh.
     *
     * @return int|null
     */
    public function getDegreRisqueSdh(): ?int
    {
        return $this->degreRisqueSdh;
    }

    /**
     * Set the value of degreRisqueSdh.
     *
     * @param int|null $degreRisqueSdh
     *
     * @return self
     */
    public function setDegreRisqueSdh(?int $degreRisqueSdh): self
    {
        $this->degreRisqueSdh = $degreRisqueSdh;

        return $this;
    }

    /**
     * Get the value of restrictions.
     *
     * @return array|null
     */
    public function getRestrictions(): ?array
    {
        return $this->restrictions;
    }

    /**
     * Set the value of restrictions.
     *
     * @param array|null $restrictions
     *
     * @return self
     */
    public function setRestrictions(?array $restrictions): self
    {
        $this->restrictions = $restrictions;

        return $this;
    }

    /**
     * Get the value of montantBrut.
     *
     * @return float|null
     */
    public function getMontantBrut(): ?float
    {
        return $this->montantBrut;
    }

    /**
     * Set the value of montantBrut.
     *
     * @param float|null $montantBrut
     *
     * @return self
     */
    public function setMontantBrut(?float $montantBrut): self
    {
        $this->montantBrut = $montantBrut;

        return $this;
    }
}
