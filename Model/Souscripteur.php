<?php

namespace Mpp\GeneraliClientBundle\Model;

class Souscripteur
{
    /**
     * @var Noms|null
     */
    private $noms;

    /**
     * @var ResidenceFiscale|null
     */
    private $residenceFiscale;

    /**
     * @var string|null
     */
    private $nationalite;

    /**
     * @var SouscripteurComplement|null
     */
    private $complement;

    /**
     * @var Ppe|null
     */
    private $ppe;

    /**
     * @var string|null
     */
    private $capaciteJuridique;

    /**
     * @var SouscripteurNaissance|null
     */
    private $naissance;

    /**
     * @var Contact|null
     */
    private $contact;

    /**
     * @var PieceIdentite|null
     */
    private $pieceIdentite;

    /**
     * @var PieceIdentite|null
     */
    private $secondePieceIdentite;

    /**
     * Get the value of noms.
     *
     * @return Noms|null
     */
    public function getNoms(): ?Noms
    {
        return $this->noms;
    }

    /**
     * Set the value of noms.
     *
     * @param Noms|null $noms
     *
     * @return self
     */
    public function setNoms(?Noms $noms): self
    {
        $this->noms = $noms;

        return $this;
    }

    /**
     * Get the value of residenceFiscale.
     *
     * @return ResidenceFiscale|null
     */
    public function getResidenceFiscale(): ?ResidenceFiscale
    {
        return $this->residenceFiscale;
    }

    /**
     * Set the value of residenceFiscale.
     *
     * @param ResidenceFiscale|null $residenceFiscale
     *
     * @return self
     */
    public function setResidenceFiscale(?ResidenceFiscale $residenceFiscale): self
    {
        $this->residenceFiscale = $residenceFiscale;

        return $this;
    }

    /**
     * Get the value of nationalite.
     *
     * @return string|null
     */
    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    /**
     * Set the value of nationalite.
     *
     * @param string|null $nationalite
     *
     * @return self
     */
    public function setNationalite(?string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get the value of complement.
     *
     * @return SouscripteurComplement|null
     */
    public function getComplement(): ?SouscripteurComplement
    {
        return $this->complement;
    }

    /**
     * Set the value of complement.
     *
     * @param SouscripteurComplement|null $complement
     *
     * @return self
     */
    public function setComplement(?SouscripteurComplement $complement): self
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get the value of ppe.
     *
     * @return Ppe|null
     */
    public function getPpe(): ?Ppe
    {
        return $this->ppe;
    }

    /**
     * Set the value of ppe.
     *
     * @param Ppe|null $ppe
     *
     * @return self
     */
    public function setPpe(?Ppe $ppe): self
    {
        $this->ppe = $ppe;

        return $this;
    }

    /**
     * Get the value of capaciteJuridique.
     *
     * @return string|null
     */
    public function getCapaciteJuridique(): ?string
    {
        return $this->capaciteJuridique;
    }

    /**
     * Set the value of capaciteJuridique.
     *
     * @param string|null $capaciteJuridique
     *
     * @return self
     */
    public function setCapaciteJuridique(?string $capaciteJuridique): self
    {
        $this->capaciteJuridique = $capaciteJuridique;

        return $this;
    }

    /**
     * Get the value of naissance.
     *
     * @return SouscripteurNaissance|null
     */
    public function getNaissance(): ?SouscripteurNaissance
    {
        return $this->naissance;
    }

    /**
     * Set the value of naissance.
     *
     * @param SouscripteurNaissance|null $naissance
     *
     * @return self
     */
    public function setNaissance(?SouscripteurNaissance $naissance): self
    {
        $this->naissance = $naissance;

        return $this;
    }

    /**
     * Get the value of contact.
     *
     * @return Contact|null
     */
    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    /**
     * Set the value of contact.
     *
     * @param Contact|null $contact
     *
     * @return self
     */
    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get the value of pieceIdentite.
     *
     * @return PieceIdentite|null
     */
    public function getPieceIdentite(): ?PieceIdentite
    {
        return $this->pieceIdentite;
    }

    /**
     * Set the value of pieceIdentite.
     *
     * @param PieceIdentite|null $pieceIdentite
     *
     * @return self
     */
    public function setPieceIdentite(?PieceIdentite $pieceIdentite): self
    {
        $this->pieceIdentite = $pieceIdentite;

        return $this;
    }

    /**
     * Get the value of secondePieceIdentite.
     *
     * @return PieceIdentite|null
     */
    public function getSecondePieceIdentite(): ?PieceIdentite
    {
        return $this->secondePieceIdentite;
    }

    /**
     * Set the value of secondePieceIdentite.
     *
     * @param PieceIdentite|null $secondePieceIdentite
     *
     * @return self
     */
    public function setSecondePieceIdentite(?PieceIdentite $secondePieceIdentite): self
    {
        $this->secondePieceIdentite = $secondePieceIdentite;

        return $this;
    }
}
