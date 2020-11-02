<?php

namespace Mpp\GeneraliClientBundle\Model;

class TypeDuree
{
    const TYPE_DUREE_CAPITAL_DIFFERE = 'CAPITAL_DIFFERE';
    const TYPE_DUREE_VIE_ENTIERE = 'VIE_ENTIERE';

    /**
     * @var string
     */
    private $typeDuree;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var bool
     */
    private $dureeNecessaire;

    /**
     * @var int
     */
    private $dureeMin;

    /**
     * @var int
     */
    private $dureeMax;
}
