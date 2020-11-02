<?php

namespace Mpp\GeneraliClientBundle\Model;

class Repartition
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var string|null
     */
    private $codeIsin;

    /**
     * @var float|null
     */
    private $epargneAtteinte;

    /**
     * @var float|null
     */
    private $pourcentageRepartition;

    /**
     * @var int|null
     */
    private $taux;

    /**
     * @var int|null
     */
    private $duree;

    /**
     * @var int|null
     */
    private $anneeTermeEngagement;

    /**
     * @var int|null
     */
    private $numEngagement;

    /**
     * @var bool|null
     */
    private $encoursValidation;

    /**
     * @var bool|null
     */
    private $nonDesinvestissable;
}
