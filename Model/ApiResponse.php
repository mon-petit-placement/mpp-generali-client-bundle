<?php

namespace Mpp\GeneraliClientBundle\Model;

use Mpp\GeneraliClientBundle\Exception\GeneraliApiException;

class ApiResponse
{
    /**
     * @var string|null
     */
    private $statut;

    /**
     * @var array<ErrorMessage>|null
     */
    private $messages;

    /**
     * @var mixed|null
     */
    private $donnees;

    /**
     * @var array<Fonds>|null
     */
    private $fonds;

    /**
     * @var Contrat|null
     */
    private $contrat;

    /**
     * @var ModifVlpRetour|null
     */
    private $modifVlpRetour;

    /**
    * @var array<PieceAFournir>|null
    */
    private $piecesAFournir;

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
     * Get the value of statut.
     *
     * @return string|null
     */
    public function getStatut(): ?string
    {
        return $this->statut;
    }

    /**
     * Set the value of statut.
     *
     * @param string|null $statut
     *
     * @return self
     */
    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of messages.
     *
     * @return array<ErrorMessage>|null
     */
    public function getMessages(): ?array
    {
        return $this->messages;
    }

    /**
     * Set the value of messages.
     *
     * @param array<ErrorMessage>|null $messages
     *
     * @return self
     */
    public function setMessages(?array $messages): self
    {
        $this->messages = $messages;

        return $this;
    }

    /**
     * Get the value of donnees.
     *
     * @return mixed|null
     */
    public function getDonnees()
    {
        return $this->donnees;
    }

    /**
     * Set the value of donnees.
     *
     * @param mixed|null $donnees
     *
     * @return self
     */
    public function setDonnees($donnees): self
    {
        $this->donnees = $donnees;

        return $this;
    }

    /**
     * Get the value of fonds.
     *
     * @return array<Fonds>|null
     */
    public function getFonds(): ?array
    {
        return $this->fonds;
    }

    /**
     * Set the value of fonds.
     *
     * @param array<Fonds>|null $fonds
     *
     * @return self
     */
    public function setFonds(?array $fonds): self
    {
        $this->fonds = $fonds;

        return $this;
    }

    /**
     * Get the value of contrat.
     *
     * @return Contrat|null
     */
    public function getContrat(): ?Contrat
    {
        return $this->contrat;
    }

    /**
     * Set the value of contrat.
     *
     * @param Contrat|null $contrat
     *
     * @return self
     */
    public function setContrat(?Contrat $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    /**
     * Get the value of modifVlpRetour.
     *
     * @return ModifVlpRetour|null
     */
    public function getModifVlpRetour(): ?ModifVlpRetour
    {
        return $this->modifVlpRetour;
    }

    /**
     * Set the value of modifVlpRetour.
     *
     * @param ModifVlpRetour|null $modifVlpRetour
     *
     * @return self
     */
    public function setModifVlpRetour(?ModifVlpRetour $modifVlpRetour): self
    {
        $this->modifVlpRetour = $modifVlpRetour;

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

    public function hasErrors()
    {
        return count($this->getMessages()) > 0;
    }
}
