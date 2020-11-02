<?php

namespace Mpp\GeneraliClientBundle\Model;

class IbanVirement
{
    /**
     * @var string|null
     */
    private $iban;

    /**
     * @var string|null
     */
    private $bic;

    /**
     * @var string|null
     */
    private $titulaire;

    /**
     * @var string|null
     */
    private $nomBanque;

    /**
     * @var bool|null
     */
    private $autorisationPrelevement;
}
