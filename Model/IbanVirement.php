<?php

namespace Mpp\GeneraliClientBundle\Model;

class IbanVirement
{
    /**
     * @var string
     */
    private $iban;

    /**
     * @var string
     */
    private $bic;

    /**
     * @var string
     */
    private $titulaire;

    /**
     * @var string
     */
    private $nomBanque;

    /**
     * @var bool
     */
    private $autorisationPrelevement;
}
