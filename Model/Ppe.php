<?php

namespace Mpp\GeneraliClientBundle\Model;

class Ppe
{
    /**
     * @var EtatPPE|null
     */
    private $etatPPE;

    /**
     * @var EtatPPE|null
     */
    private $etatPPEFamille;
<<<<<<< HEAD

    /**
     * Get the value of etatPPE
     *
     * @return  EtatPPE|null
     */ 
    public function getEtatPPE(): ?EtatPPE
    {
        return $this->etatPPE;
    }

    /**
     * Set the value of etatPPE
     *
     * @param  EtatPPE|null  $etatPPE
     *
     * @return  self
     */ 
    public function setEtatPPE(?EtatPPE $etatPPE): self
    {
        $this->etatPPE = $etatPPE;

        return $this;
    }

    /**
     * Get the value of etatPPEFamille
     *
     * @return  EtatPPE|null
     */ 
    public function getEtatPPEFamille(): ?EtatPPE
    {
        return $this->etatPPEFamille;
    }

    /**
     * Set the value of etatPPEFamille
     *
     * @param  EtatPPE|null  $etatPPEFamille
     *
     * @return  self
     */ 
    public function setEtatPPEFamille(?EtatPPE $etatPPEFamille): self
    {
        $this->etatPPEFamille = $etatPPEFamille;

        return $this;
    }
=======
>>>>>>> 78eca0cf506f39f6c7ac10f5abdcde398c5468ec
}
