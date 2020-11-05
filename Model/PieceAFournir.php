<?php

namespace Mpp\GeneraliClientBundle\Model;

class PieceAFournir
{
    /**
     * @var string|null
     */
    private $idPieceAFournir;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var string|null
     */
    private $libelleOrdre;

    /**
     * @var string|null
     */
    private $groupe;

    /**
     * @var string|null
     */
    private $groupeOrdre;

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $sousCode;

    /**
     * @var int|null
     */
    private $nombreMin;

    /**
     * @var int|null
     */
    private $nombreMax;

    /**
     * Get the value of idPieceAFournir
     *
     * @return  string|null
     */ 
    public function getIdPieceAFournir(): ?string
    {
        return $this->idPieceAFournir;
    }

    /**
     * Set the value of idPieceAFournir
     *
     * @param  string|null  $idPieceAFournir
     *
     * @return  self
     */ 
    public function setIdPieceAFournir(?string $idPieceAFournir): self
    {
        $this->idPieceAFournir = $idPieceAFournir;

        return $this;
    }

    /**
     * Get the value of libelle
     *
     * @return  string|null
     */ 
    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    /**
     * Set the value of libelle
     *
     * @param  string|null  $libelle
     *
     * @return  self
     */ 
    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of libelleOrdre
     *
     * @return  string|null
     */ 
    public function getLibelleOrdre(): ?string
    {
        return $this->libelleOrdre;
    }

    /**
     * Set the value of libelleOrdre
     *
     * @param  string|null  $libelleOrdre
     *
     * @return  self
     */ 
    public function setLibelleOrdre(?string $libelleOrdre): self
    {
        $this->libelleOrdre = $libelleOrdre;

        return $this;
    }

    /**
     * Get the value of groupe
     *
     * @return  string|null
     */ 
    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    /**
     * Set the value of groupe
     *
     * @param  string|null  $groupe
     *
     * @return  self
     */ 
    public function setGroupe(?string $groupe): self
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get the value of groupeOrdre
     *
     * @return  string|null
     */ 
    public function getGroupeOrdre(): ?string
    {
        return $this->groupeOrdre;
    }

    /**
     * Set the value of groupeOrdre
     *
     * @param  string|null  $groupeOrdre
     *
     * @return  self
     */ 
    public function setGroupeOrdre(?string $groupeOrdre): self
    {
        $this->groupeOrdre = $groupeOrdre;

        return $this;
    }

    /**
     * Get the value of code
     *
     * @return  string|null
     */ 
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @param  string|null  $code
     *
     * @return  self
     */ 
    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of sousCode
     *
     * @return  string|null
     */ 
    public function getSousCode(): ?string
    {
        return $this->sousCode;
    }

    /**
     * Set the value of sousCode
     *
     * @param  string|null  $sousCode
     *
     * @return  self
     */ 
    public function setSousCode(?string $sousCode): self
    {
        $this->sousCode = $sousCode;

        return $this;
    }

    /**
     * Get the value of nombreMin
     *
     * @return  int|null
     */ 
    public function getNombreMin(): ?int
    {
        return $this->nombreMin;
    }

    /**
     * Set the value of nombreMin
     *
     * @param  int|null  $nombreMin
     *
     * @return  self
     */ 
    public function setNombreMin(?int $nombreMin): self
    {
        $this->nombreMin = $nombreMin;

        return $this;
    }

    /**
     * Get the value of nombreMax
     *
     * @return  int|null
     */ 
    public function getNombreMax(): ?int
    {
        return $this->nombreMax;
    }

    /**
     * Set the value of nombreMax
     *
     * @param  int|null  $nombreMax
     *
     * @return  self
     */ 
    public function setNombreMax(?int $nombreMax): self
    {
        $this->nombreMax = $nombreMax;

        return $this;
    }
}
