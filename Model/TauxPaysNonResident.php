<?php

namespace Mpp\GeneraliClientBundle\Model;

class TauxPaysNonResident
{
    /**
     * @var string|null
     */
    private $codPays;

    /**
     * @var string|null
     */
    private $libellePays;

    /**
     * @var float|null
     */
    private $txAvantHuitAns;

    /**
     * @var float|null
     */
    private $txApreshuitAns;

    /**
     * Get the value of codPays.
     *
     * @return string|null
     */
    public function getCodPays(): ?string
    {
        return $this->codPays;
    }

    /**
     * Set the value of codPays.
     *
     * @param string|null $codPays
     *
     * @return self
     */
    public function setCodPays(?string $codPays): self
    {
        $this->codPays = $codPays;

        return $this;
    }

    /**
     * Get the value of libellePays.
     *
     * @return string|null
     */
    public function getLibellePays(): ?string
    {
        return $this->libellePays;
    }

    /**
     * Set the value of libellePays.
     *
     * @param string|null $libellePays
     *
     * @return self
     */
    public function setLibellePays(?string $libellePays): self
    {
        $this->libellePays = $libellePays;

        return $this;
    }

    /**
     * Get the value of txAvantHuitAns.
     *
     * @return float|null
     */
    public function getTxAvantHuitAns(): ?float
    {
        return $this->txAvantHuitAns;
    }

    /**
     * Set the value of txAvantHuitAns.
     *
     * @param float|null $txAvantHuitAns
     *
     * @return self
     */
    public function setTxAvantHuitAns(?float $txAvantHuitAns): self
    {
        $this->txAvantHuitAns = $txAvantHuitAns;

        return $this;
    }

    /**
     * Get the value of txApreshuitAns.
     *
     * @return float|null
     */
    public function getTxApreshuitAns(): ?float
    {
        return $this->txApreshuitAns;
    }

    /**
     * Set the value of txApreshuitAns.
     *
     * @param float|null $txApreshuitAns
     *
     * @return self
     */
    public function setTxApreshuitAns(?float $txApreshuitAns): self
    {
        $this->txApreshuitAns = $txApreshuitAns;

        return $this;
    }
}
