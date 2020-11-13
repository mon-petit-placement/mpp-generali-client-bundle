<?php

namespace Mpp\GeneraliClientBundle\Model;

class OrigineFonds
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var float|null
     */
    private $montant;

    /**
     * @var string|null
     */
    private $date;

    /**
     * @var string|null
     */
    private $precision;

    /**
     * @var array<string>|null
     */
    private $codesDetail;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var bool|null
     */
    private $dateNecessaire;

    /**
     * @var bool|null
     */
    private $commentaireNecessaire;

    /**
     * @var array<DetailOrigineFonds>|null
     */
    private $detail;

    /**
     * @var bool|null
     */
    private $bloquantDemat;

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
     * Get the value of montant.
     *
     * @return float|null
     */
    public function getMontant(): ?float
    {
        return $this->montant;
    }

    /**
     * Set the value of montant.
     *
     * @param float|null $montant
     *
     * @return self
     */
    public function setMontant(?float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get the value of date.
     *
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * Set the value of date.
     *
     * @param string|null $date
     *
     * @return self
     */
    public function setDate(?string $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of precision.
     *
     * @return string|null
     */
    public function getPrecision(): ?string
    {
        return $this->precision;
    }

    /**
     * Set the value of precision.
     *
     * @param string|null $precision
     *
     * @return self
     */
    public function setPrecision(?string $precision): self
    {
        $this->precision = $precision;

        return $this;
    }

    /**
     * Get the value of codesDetail.
     *
     * @return array<string>|null
     */
    public function getCodesDetail(): ?array
    {
        return $this->codesDetail;
    }

    /**
     * Set the value of codesDetail.
     *
     * @param array<string>|null $codesDetail
     *
     * @return self
     */
    public function setCodesDetail(?array $codesDetail): self
    {
        $this->codesDetail = $codesDetail;

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
     * Get the value of dateNecessaire.
     *
     * @return bool|null
     */
    public function getDateNecessaire(): ?bool
    {
        return $this->dateNecessaire;
    }

    /**
     * Set the value of dateNecessaire.
     *
     * @param bool|null $dateNecessaire
     *
     * @return self
     */
    public function setDateNecessaire(?bool $dateNecessaire): self
    {
        $this->dateNecessaire = $dateNecessaire;

        return $this;
    }

    /**
     * Get the value of commentaireNecessaire.
     *
     * @return bool|null
     */
    public function getCommentaireNecessaire(): ?bool
    {
        return $this->commentaireNecessaire;
    }

    /**
     * Set the value of commentaireNecessaire.
     *
     * @param bool|null $commentaireNecessaire
     *
     * @return self
     */
    public function setCommentaireNecessaire(?bool $commentaireNecessaire): self
    {
        $this->commentaireNecessaire = $commentaireNecessaire;

        return $this;
    }

    /**
     * Get the value of detail.
     *
     * @return array<DetailOrigineFonds>|null
     */
    public function getDetail(): ?array
    {
        return $this->detail;
    }

    /**
     * Set the value of detail.
     *
     * @param array<DetailOrigineFonds>|null $detail
     *
     * @return self
     */
    public function setDetail(?array $detail): self
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * Get the value of bloquantDemat.
     *
     * @return bool|null
     */
    public function getBloquantDemat(): ?bool
    {
        return $this->bloquantDemat;
    }

    /**
     * Set the value of bloquantDemat.
     *
     * @param bool|null $bloquantDemat
     *
     * @return self
     */
    public function setBloquantDemat(?bool $bloquantDemat): self
    {
        $this->bloquantDemat = $bloquantDemat;

        return $this;
    }
}
