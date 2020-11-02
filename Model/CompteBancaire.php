<?php

namespace Mpp\GeneraliClientBundle\Model;

class CompteBancaire
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
    private $domiciliation;

    /**
     * @var string
     */
    private $titulaire;

    /**
     * @var bool
     */
    private $actif;

    /**
     * @var bool
     */
    private $autorise;
}
