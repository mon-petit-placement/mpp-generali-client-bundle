<?php

namespace Mpp\GeneraliClientBundle\Model;

class Reglement
{
    /**
     * @var string
     */
    private $typeReglementVersementPonctuel;

    /**
     * @var IbanVirement
     */
    private $ibanContractant;

    /**
     * @var array<OrigineFonds>
     */
    private $originesFonds;
}
