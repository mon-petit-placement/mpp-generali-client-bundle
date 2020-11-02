<?php

namespace Mpp\GeneraliClientBundle\Model;

class OrigineFonds
{
    /**
     * @var string|null
     */
    private $code;

    /**
     * @var float|null
     */
    private $montant;

    /**
     * @var \DateTimeInterface|null
     */
    private $date;

    /**
     * @var string|null
     */
    private $precision;

    /**
     * @var array<string>|null
     */
    private $codesDetail;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var bool|null
     */
    private $dateNecessaire;

    /**
     * @var bool|null
     */
    private $commentaireNecessaire;

    /**
     * @var array<>DetailOrigineFonds|null
     */
    private $detail;

    /**
     * @var bool|null
     */
    private $bloquantDemat;
}
