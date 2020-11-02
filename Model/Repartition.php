<?php

namespace Mpp\GeneraliClientBundle\Model;

class Repartition
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var string
     */
    private $codeIsin;

    /**
     * @var float
     */
    private $epargneAtteinte;

    /**
     * @var float
     */
    private $pourcentageRepartition;

    /**
     * @var int
     */
    private $taux;

    /**
     * @var int
     */
    private $duree;

    /**
     * @var int
     */
    private $anneeTermeEngagement;

    /**
     * @var int
     */
    private $numEngagement;

    /**
     * @var bool
     */
    private $encoursValidation;

    /**
     * @var bool
     */
    private $nonDesinvestissable;
}
