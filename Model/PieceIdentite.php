<?php

namespace Mpp\GeneraliClientBundle\Model;

class PieceIdentite
{
    /**
     * @var string|null
     */
    private $codePieceIdentite;

    /**
     * @var string|null
     */
    private $dateValidite;

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * Get the value of codePieceIdentite.
     *
     * @return string|null
     */
    public function getCodePieceIdentite(): ?string
    {
        return $this->codePieceIdentite;
    }

    /**
     * Set the value of codePieceIdentite.
     *
     * @param string|null $codePieceIdentite
     *
     * @return self
     */
    public function setCodePieceIdentite(?string $codePieceIdentite): self
    {
        $this->codePieceIdentite = $codePieceIdentite;

        return $this;
    }

    /**
     * Get the value of dateValidite.
     *
     * @return string|null
     */
    public function getDateValidite(): ?string
    {
        return $this->dateValidite;
    }

    /**
     * Set the value of dateValidite.
     *
     * @param string|null $dateValidite
     *
     * @return self
     */
    public function setDateValidite(?string $dateValidite): self
    {
        $this->dateValidite = $dateValidite;

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
}
