<?php

namespace Mpp\GeneraliClientBundle\Model;

class TypeDuree
{
    const TYPE_DUREE_CAPITAL_DIFFERE = 'CAPITAL_DIFFERE';
    const TYPE_DUREE_VIE_ENTIERE = 'VIE_ENTIERE';

    /**
     * @var string|null
     */
    private $typeDuree;

    /**
     * @var string|null
     */
    private $libelle;

    /**
     * @var bool|null
     */
    private $dureeNecessaire;

    /**
     * @var int|null
     */
    private $dureeMin;

    /**
     * @var int|null
     */
    private $dureeMax;
}
