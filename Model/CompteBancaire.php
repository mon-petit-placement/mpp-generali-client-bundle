<?php

namespace Mpp\GeneraliClientBundle\Model;

class CompteBancaire
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
    private $domiciliation;

    /**
     * @var string|null
     */
    private $titulaire;

    /**
     * @var bool|null
     */
    private $actif;

    /**
     * @var bool|null
     */
    private $autorise;
}
