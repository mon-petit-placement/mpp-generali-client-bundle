<?php

namespace Mpp\GeneraliClientBundle\Model;

class AvenantFonds
{
    /**
     * @var string|null
     */
    private $codeFonds;

    /**
     * @var bool|null
     */
    private $yaQuestionnaire;

    /**
     * @var string|null
     */
    private $typeAvenant;

    /**
     * @var string|null
     */
    private $typeMarche;

    /**
     * @var string|null
     */
    private $debutCommercialisation;

    /**
     * @var string|null
     */
    private $finCommercialisation;

    /**
     * @var string|null
     */
    private $texteBrutAvenant;

    /**
     * @var string|null
     */
    private $texteHTLMAvenant;

    /**
     * Get the value of codeFonds
     *
     * @return  string|null
     */
    public function getCodeFonds(): ?string
    {
        return $this->codeFonds;
    }

    /**
     * Set the value of codeFonds
     *
     * @param  string|null  $codeFonds
     *
     * @return  self
     */
    public function setCodeFonds(?string $codeFonds): self
    {
        $this->codeFonds = $codeFonds;

        return $this;
    }

    /**
     * Get the value of yaQuestionnaire
     *
     * @return  bool|null
     */
    public function getYaQuestionnaire(): ?bool
    {
        return $this->yaQuestionnaire;
    }

    /**
     * Set the value of yaQuestionnaire
     *
     * @param  bool|null  $yaQuestionnaire
     *
     * @return  self
     */
    public function setYaQuestionnaire(?bool $yaQuestionnaire): self
    {
        $this->yaQuestionnaire = $yaQuestionnaire;

        return $this;
    }

    /**
     * Get the value of typeAvenant
     *
     * @return  string|null
     */
    public function getTypeAvenant(): ?string
    {
        return $this->typeAvenant;
    }

    /**
     * Set the value of typeAvenant
     *
     * @param  string|null  $typeAvenant
     *
     * @return  self
     */
    public function setTypeAvenant(?string $typeAvenant): self
    {
        $this->typeAvenant = $typeAvenant;

        return $this;
    }

    /**
     * Get the value of typeMarche
     *
     * @return  string|null
     */
    public function getTypeMarche(): ?string
    {
        return $this->typeMarche;
    }

    /**
     * Set the value of typeMarche
     *
     * @param  string|null  $typeMarche
     *
     * @return  self
     */
    public function setTypeMarche(?string $typeMarche): self
    {
        $this->typeMarche = $typeMarche;

        return $this;
    }

    /**
     * Get the value of debutCommercialisation
     *
     * @return  string|null
     */
    public function getDebutCommercialisation(): ?string
    {
        return $this->debutCommercialisation;
    }

    /**
     * Set the value of debutCommercialisation
     *
     * @param  string|null  $debutCommercialisation
     *
     * @return  self
     */
    public function setDebutCommercialisation(?string $debutCommercialisation): self
    {
        $this->debutCommercialisation = $debutCommercialisation;

        return $this;
    }

    /**
     * Get the value of finCommercialisation
     *
     * @return  string|null
     */
    public function getFinCommercialisation(): ?string
    {
        return $this->finCommercialisation;
    }

    /**
     * Set the value of finCommercialisation
     *
     * @param  string|null  $finCommercialisation
     *
     * @return  self
     */
    public function setFinCommercialisation(?string $finCommercialisation): self
    {
        $this->finCommercialisation = $finCommercialisation;

        return $this;
    }

    /**
     * Get the value of texteBrutAvenant
     *
     * @return  string|null
     */
    public function getTexteBrutAvenant(): ?string
    {
        return $this->texteBrutAvenant;
    }

    /**
     * Set the value of texteBrutAvenant
     *
     * @param  string|null  $texteBrutAvenant
     *
     * @return  self
     */
    public function setTexteBrutAvenant(?string $texteBrutAvenant): self
    {
        $this->texteBrutAvenant = $texteBrutAvenant;

        return $this;
    }

    /**
     * Get the value of texteHTLMAvenant
     *
     * @return  string|null
     */
    public function getTexteHTLMAvenant(): ?string
    {
        return $this->texteHTLMAvenant;
    }

    /**
     * Set the value of texteHTLMAvenant
     *
     * @param  string|null  $texteHTLMAvenant
     *
     * @return  self
     */
    public function setTexteHTLMAvenant(?string $texteHTLMAvenant): self
    {
        $this->texteHTLMAvenant = $texteHTLMAvenant;

        return $this;
    }
}
