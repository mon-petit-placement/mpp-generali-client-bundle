<?php

namespace Mpp\GeneraliClientBundle\Model;

use DateTimeInterface;

class Avenant
{
    /**
     * @var int|null
     */
    private $numAvenant;

    /**
     * @var DateTimeInterface|null
     */
    private $dateEnvoi;

    /**
     * @var string|null
     */
    private $controle;

    /**
     * @var string|null
     */
    private $codeApp;

    /**
     * @var string|null
     */
    private $typeAvenant;

    /**
     * @var string|null
     */
    private $groupe;

    /**
     * @var string|null
     */
    private $numOperation;


    /**
     * Get the value of numAvenant
     *
     * @return  int|null
     */
    public function getNumAvenant(): ?int
    {
        return $this->numAvenant;
    }

    /**
     * Set the value of numAvenant
     *
     * @param  int|null  $numAvenant
     *
     * @return  self
     */
    public function setNumAvenant(?int $numAvenant): self
    {
        $this->numAvenant = $numAvenant;

        return $this;
    }

    /**
     * Get the value of dateEnvoi
     *
     * @return  DateTimeInterface|null
     */
    public function getDateEnvoi(): ?DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    /**
     * Set the value of dateEnvoi
     *
     * @param  DateTimeInterface|null  $dateEnvoi
     *
     * @return  self
     */
    public function setDateEnvoi(?DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    /**
     * Get the value of controle
     *
     * @return  string|null
     */
    public function getControle(): ?string
    {
        return $this->controle;
    }

    /**
     * Set the value of controle
     *
     * @param  string|null  $controle
     *
     * @return  self
     */
    public function setControle(?string $controle): self
    {
        $this->controle = $controle;

        return $this;
    }

    /**
     * Get the value of codeApp
     *
     * @return  string|null
     */
    public function getCodeApp(): ?string
    {
        return $this->codeApp;
    }

    /**
     * Set the value of codeApp
     *
     * @param  string|null  $codeApp
     *
     * @return  self
     */
    public function setCodeApp(?string $codeApp)
    {
        $this->codeApp = $codeApp;

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
     * Get the value of numOperation
     *
     * @return  string|null
     */
    public function getNumOperation(): ?string
    {
        return $this->numOperation;
    }

    /**
     * Set the value of numOperation
     *
     * @param  string|null  $numOperation
     *
     * @return  self
     */
    public function setNumOperation(?string $numOperation): self
    {
        $this->numOperation = $numOperation;

        return $this;
    }
}
