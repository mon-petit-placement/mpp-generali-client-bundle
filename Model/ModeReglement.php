<?php

namespace Mpp\GeneraliClientBundle\Model;

class ModeReglement
{
    const TYPE_PAIEMENT_CHEQUE = 'CHEQUE';
    const TYPE_PAIEMENT_VIREMENT = 'VIREMENT';

    /**
     * @var string|null
     */
    private $typePaiement;

    /**
     * @var CompteBancaire|null
     */
    private $compteBancaire;
}
