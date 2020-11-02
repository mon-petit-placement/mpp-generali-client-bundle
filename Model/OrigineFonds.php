<?php

namespace Mpp\GeneraliClientBundle\Model;

class OrigineFonds
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var float
     */
    private $montant;

    /**
     * @var \DateTimeInterface
     */
    private $date;

    /**
     * @var string
     */
    private $precision;

    /**
     * @var array<string>
     */
    private $codesDetail;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var bool
     */
    private $dateNecessaire;

    /**
     * @var bool
     */
    private $commentaireNecessaire;

    /**
     * @var array<>DetailOrigineFonds
     */
    private $detail;

    /**
     * @var bool
     */
    private $bloquantDemat;
}
