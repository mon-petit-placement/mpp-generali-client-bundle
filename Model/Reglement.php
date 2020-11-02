<?php

namespace Mpp\GeneraliClientBundle\Model;

class Reglement
{
    /**
     * @var string|null
     */
    private $typeReglementVersementPonctuel;

    /**
     * @var IbanVirement|null
     */
    private $ibanContractant;

    /**
     * @var array<OrigineFonds>|null
     */
    private $originesFonds;
}
