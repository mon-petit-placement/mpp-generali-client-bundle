<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourFinalisation
{
    /**
     * @var string
     */
    private $idTransaction;

    /**
     * @var string
     */
    private $numeroOrdreTransaction;

    /**
     * @var bool
     */
    private $demat;

    /**
     * Get the value of idTransaction.
     *
     * @return string|null
     */
    public function getIdTransaction(): ?string
    {
        return $this->idTransaction;
    }

    /**
     * Set the value of idTransaction.
     *
     * @param string|null $idTransaction
     *
     * @return self
     */
    public function setIdTransaction(?string $idTransaction): self
    {
        $this->idTransaction = $idTransaction;

        return $this;
    }

    /**
     * Get the value of numeroOrdreTransaction.
     *
     * @return string|null
     */
    public function getNumeroOrdreTransaction(): ?string
    {
        return $this->numeroOrdreTransaction;
    }

    /**
     * Set the value of numeroOrdreTransaction.
     *
     * @param string|null $numeroOrdreTransaction
     *
     * @return self
     */
    public function setNumeroOrdreTransaction(?string $numeroOrdreTransaction): self
    {
        $this->numeroOrdreTransaction = $numeroOrdreTransaction;

        return $this;
    }

    /**
     * Get the value of demat.
     *
     * @return bool|null
     */
    public function isDemat(): ?bool
    {
        return $this->demat;
    }

    /**
     * Set the value of demat.
     *
     * @param bool|null $demat
     *
     * @return self
     */
    public function setDemat(?bool $demat): self
    {
        $this->demat = $demat;

        return $this;
    }
}
