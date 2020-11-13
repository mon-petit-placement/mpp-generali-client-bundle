<?php

namespace Mpp\GeneraliClientBundle\Model;

class IbanVirement
{
    /**
     * @var string|null
     */
    private $iban;

    /**
     * @var string|null
     */
    private $bic;

    /**
     * @var string|null
     */
    private $titulaire;

    /**
     * @var string|null
     */
    private $nomBanque;

    /**
     * @var bool|null
     */
    private $autorisationPrelevement;

    /**
     * Get the value of iban.
     *
     * @return string|null
     */
    public function getIban(): ?string
    {
        return $this->iban;
    }

    /**
     * Set the value of iban.
     *
     * @param string|null $iban
     *
     * @return self
     */
    public function setIban(?string $iban): self
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get the value of bic.
     *
     * @return string|null
     */
    public function getBic(): ?string
    {
        return $this->bic;
    }

    /**
     * Set the value of bic.
     *
     * @param string|null $bic
     *
     * @return self
     */
    public function setBic(?string $bic): self
    {
        $this->bic = $bic;

        return $this;
    }

    /**
     * Get the value of titulaire.
     *
     * @return string|null
     */
    public function getTitulaire(): ?string
    {
        return $this->titulaire;
    }

    /**
     * Set the value of titulaire.
     *
     * @param string|null $titulaire
     *
     * @return self
     */
    public function setTitulaire(?string $titulaire): self
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    /**
     * Get the value of nomBanque.
     *
     * @return string|null
     */
    public function getNomBanque(): ?string
    {
        return $this->nomBanque;
    }

    /**
     * Set the value of nomBanque.
     *
     * @param string|null $nomBanque
     *
     * @return self
     */
    public function setNomBanque(?string $nomBanque): self
    {
        $this->nomBanque = $nomBanque;

        return $this;
    }

    /**
     * Get the value of autorisationPrelevement.
     *
     * @return bool|null
     */
    public function getAutorisationPrelevement(): ?bool
    {
        return $this->autorisationPrelevement;
    }

    /**
     * Set the value of autorisationPrelevement.
     *
     * @param bool|null $autorisationPrelevement
     *
     * @return self
     */
    public function setAutorisationPrelevement(?bool $autorisationPrelevement): self
    {
        $this->autorisationPrelevement = $autorisationPrelevement;

        return $this;
    }
}
