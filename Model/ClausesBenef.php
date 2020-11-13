<?php

namespace Mpp\GeneraliClientBundle\Model;

class ClausesBenef
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $texte;

    /**
     * @var bool|null
     */
    private $texteLibre;

    /**
     * @var string|null
     */
    private $apresTexteLibre;

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
     * Get the value of texte.
     *
     * @return string|null
     */
    public function getTexte(): ?string
    {
        return $this->texte;
    }

    /**
     * Set the value of texte.
     *
     * @param string|null $texte
     *
     * @return self
     */
    public function setTexte(?string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get the value of texteLibre.
     *
     * @return bool|null
     */
    public function getTexteLibre(): ?bool
    {
        return $this->texteLibre;
    }

    /**
     * Set the value of texteLibre.
     *
     * @param bool|null $texteLibre
     *
     * @return self
     */
    public function setTexteLibre(?bool $texteLibre): self
    {
        $this->texteLibre = $texteLibre;

        return $this;
    }

    /**
     * Get the value of apresTexteLibre.
     *
     * @return string|null
     */
    public function getApresTexteLibre(): ?string
    {
        return $this->apresTexteLibre;
    }

    /**
     * Set the value of apresTexteLibre.
     *
     * @param string|null $apresTexteLibre
     *
     * @return self
     */
    public function setApresTexteLibre(?string $apresTexteLibre): self
    {
        $this->apresTexteLibre = $apresTexteLibre;

        return $this;
    }
}
