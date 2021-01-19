<?php

namespace Mpp\GeneraliClientBundle\Model;

class Contractant
{
    /**
     * @var string|null
     */
    private $nom;

    /**
     * @var string|null
     */
    private $prenom;

    /**
     * @var string|null
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
     * Get the value of nom.
     *
     * @return string|null
     */
    public function getNom(): ?string
    {
        return $this->nom;
    }

    /**
     * Set the value of nom.
     *
     * @param string|null $nom
     *
     * @return Contractant
     */
    public function setNom(?string $nom): Contractant
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom.
     *
     * @return string|null
     */
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    /**
     * Get the value of prenom.
     *
     * @param string|null $prenom
     *
     * @return Contractant
     */
    public function setPrenom(?string $prenom): Contractant
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of residenceFiscale.
     *
     * @return string|null
     */
    public function getResidenceFiscale(): ?string
    {
        return $this->residenceFiscale;
    }

    /**
     * Set the value of residenceFiscale.
     *
     * @param string|null $residenceFiscale
     *
     * @return self
     */
    public function setResidenceFiscale(?string $residenceFiscale): self
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
}
