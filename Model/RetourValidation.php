<?php

namespace Mpp\GeneraliClientBundle\Model;

class RetourValidation
{
    /**
     * @var string|null
     */
    private $idTransaction;

    /**
     * @var string|null
     */
    private $numeroOrdreTransaction;

    /**
     * @var array<PieceAFournir>|null
     */
    private $piecesAFournir;

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
     * Get the value of piecesAFournir.
     *
     * @return array<PieceAFournir>|null
     */
    public function getPiecesAFournir(): ?array
    {
        return $this->piecesAFournir;
    }

    /**
     * Set the value of piecesAFournir.
     *
     * @param array<PieceAFournir>|null $piecesAFournir
     *
     * @return self
     */
    public function setPiecesAFournir(?array $piecesAFournir): self
    {
        $this->piecesAFournir = $piecesAFournir;

        return $this;
    }
}
