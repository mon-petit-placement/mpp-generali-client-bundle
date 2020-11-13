<?php

namespace Mpp\GeneraliClientBundle\Model;

class PaysCrsOcde
{
    /**
     * @var string|null
     */
    private $codePays;

    /**
     * @var string|null
     */
    private $nif;

    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * Get the value of codePays.
     *
     * @return string|null
     */
    public function getCodePays(): ?string
    {
        return $this->codePays;
    }

    /**
     * Set the value of codePays.
     *
     * @param string|null $codePays
     *
     * @return self
     */
    public function setCodePays(?string $codePays): self
    {
        $this->codePays = $codePays;

        return $this;
    }

    /**
     * Get the value of nif.
     *
     * @return string|null
     */
    public function getNif(): ?string
    {
        return $this->nif;
    }

    /**
     * Set the value of nif.
     *
     * @param string|null $nif
     *
     * @return self
     */
    public function setNif(?string $nif): self
    {
        $this->nif = $nif;

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
