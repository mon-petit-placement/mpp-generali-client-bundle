<?php

namespace Mpp\GeneraliClientBundle\Model;

class ModeReglement
{
    const TYPE_PAIEMENT_CHEQUE = 'CHEQUE';
    const TYPE_PAIEMENT_VIREMENT = 'VIREMENT';

    /**
     * @var string
     */
    private $typePaiement;

    /**
     * @var CompteBancaire
     */
    private $compteBancaire;
}
