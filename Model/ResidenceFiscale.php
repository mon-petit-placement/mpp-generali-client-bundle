<?php

namespace Mpp\GeneraliClientBundle\Model;

class ResidenceFiscale
{
    /**
     * @var string|null
     */
    private $codePays;

    /**
     * @var array<PaysCrsOcde>|null
     */
    private $paysCrsOcde;

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
     * Get the value of paysCrsOcde.
     *
     * @return array<PaysCrsOcde>|null
     */
    public function getPaysCrsOcde(): ?array
    {
        return $this->paysCrsOcde;
    }

    /**
     * Set the value of paysCrsOcde.
     *
     * @param array<PaysCrsOcde>|null $paysCrsOcde
     *
     * @return self
     */
    public function setPaysCrsOcde(?array $paysCrsOcde): self
    {
        $this->paysCrsOcde = $paysCrsOcde;

        return $this;
    }
}
